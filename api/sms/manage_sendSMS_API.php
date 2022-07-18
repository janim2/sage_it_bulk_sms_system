<?php    
    require_once '../../helpers/sms.php';

    class ManageSendSMSAPI{
        private $apiKey;
        private $email; 
        private $senderID;
        private $phoneNumber;
        private $message;

        function __sendSMSContruct(){
            $data = json_decode(file_get_contents('php://input'));
            $this->email    = $data->email ?? "";
            $this->apiKey   = $data->api_key ?? "";
            $this->senderID = $data->senderID ?? "";
            $this->phoneNumber = $data->phoneNumber ?? "";
            $this->message  = $data->message ?? "";
        }

        function verifyAPIKey($con){
            if(!empty($this->email) && !empty($this->apiKey) && !empty($this->senderID)  
                    && !empty($this->phoneNumber) && !empty($this->message)){
                $query = "SELECT * FROM clients WHERE email = :email AND apikey = :apikey";
                $statement = $con->prepare($query);
                $statement->execute(
                    array(
                        ":email"  => $this->email,
                        ":apikey" => $this->apiKey
                    )
                );
    
                $is_present = $statement->rowCount();
    
                if($is_present > 0){
                    //continue to add sender ID
                    return 1;
                }
                else{
                    http_response_code(400);
                    echo json_encode(
                        array(
                            "status"  => 400,
                            "code"    => 4006,
                            "message" => "Invalid API key"
                        )
                    );
                }
            }
            else{
                http_response_code(406);
                echo json_encode(
                    array(
                        "status"  => 406,
                        "code"    => 4001,
                        "message" => "All fields required"
                    )
                );
            }
        }


        function convertSenderIDToClientID($con){
            // echo "senderID".$this->senderID;

            // echo "3";
            $query = "SELECT client_id FROM senderID WHERE sender_id = :id";
            $statement = $con->prepare($query);
    
            $statement->execute(
                array(
                    ":id" => $this->senderID, 
                )
            );
            return $statement->fetch()['client_id'];
        }


        function convertSenderNameToID($con, $senderName){
            $query = "SELECT id FROM senderID WHERE sender_id = :n";
            $statement = $con->prepare($query);

            $statement->execute(
                array(
                    ":n" => $senderName, 
                )
            );
            return $statement->fetch()['id'];
        }

        function convertAPIKeyToID($con, $key){
            $query = "SELECT id FROM clients WHERE apikey = :apikey";
            $statement = $con->prepare($query);
    
            $statement->execute(
                array(
                    ":apikey" => $key, 
                )
            );
            return $statement->fetch()['id'];
        }


        function checkSMSCount($con){
            $client_id = $this->convertSenderIDToClientID($con);
            // echo "senderID".$this->senderID;
            // echo "clientID".$client_id;
            $query = "SELECT sms_credits FROM clients WHERE id = :id";
            $statement = $con->prepare($query);
            $statement->execute(
                array(
                    ":id" => $client_id,
                )
            );
            $result = $statement->fetch();
            // echo "Credits".$result['sms_credits'];
            return $result['sms_credits'];
        }

        function determineSmsCredits($message){
            $len = strlen($message);
            if($len >= 1 && $len <= 160){
                return 1;
            }
            else if($len >= 161 && $len <= 320){
                return 2;
            }
            else{
                return 3;
            }
        }

        function verifySenderID($con){
            if($this->verifyAPIKey($con) == 1){
                //check if sender ID exists for a particular user
                $query = "SELECT * FROM senderID WHERE client_id = :id AND sender_id = :s_id";
                $statement = $con->prepare($query);
                $statement->execute(
                    array(
                        ":id" => $this->convertAPIKeyToID($con, $this->apiKey), 
                        ":s_id" => $this->senderID
                    )
                );
                $ifexists = $statement->rowCount();
                if($ifexists > 0){
                    //check if senderID has been approved
                    $approved = $statement->fetch();
                    if($approved['status'] == 1){
                        //send message
                        $this->sendSms($con, $this->senderID, $this->phoneNumber, $this->message);
                    }else{
                        http_response_code(206);
                        echo json_encode(
                            array(
                                "status"  => 206,
                                "code"    => 2006,
                                "message" => "Sender ID has not been approved. Call 054 880 1288 if you need it urgently."
                            )
                        );
                    }
                }
                else{
                    http_response_code(400);
                    echo json_encode(
                        array(
                            "status"  => 400,
                            "code"    => 4000,
                            "message" => "Invalid Sender ID"
                        )
                    );
                }
            }
        }

        //sendSMS from the API perspective
        function sendSms($con, $sender_id, $phone, $msg)
        {
            // echo $sender_id;
            $send = new SendSms();
            $send->key = '5zFWCDwTTpKT6xeSz1OjZp4BW';
            $send->message = $msg;
            $send->numbers = $phone;
            $send->sender = $sender_id;
            if($this->checkSMSCount($con) > 0){
                //$sender_id is a word, convert it into an id to be stored in the database
                $this->saveSMS($con, $this->convertSenderNameToID($con, $sender_id), 
                $phone, $msg, $this->checkSMSCount($con) - $this->determineSmsCredits($msg));
                return $send->sendMessage();
            }
            else{
                http_response_code(400);
                echo json_encode(
                    array(
                        "status"  => 400,
                        "code"    => 3000,
                        "message" => "SMS credits exhausted"
                    )
                );
            }
        }

        function saveSMS($con, $sender_id, $phone, $msg, $sms_count){
            // echo $sender_id;
            // echo $this->convertSenderIDToClientID($con, $sender_id);
            $query = "INSERT INTO sms_logs(client_id, senderID_used_id, recipient, message) 
                VALUES(:c_id, :s_id, :r, :m)";
            $statement = $con->prepare($query);
            $saved = $statement->execute(
                array(
                    ":c_id" => $this->convertSenderIDToClientID($con),
                    ":s_id" => $sender_id,
                    ":r"  => $phone,
                    ":m"  => $msg
                )
            );
            if($saved){
                $u_query = "UPDATE clients SET sms_credits = :sms WHERE id = :id";
                $u_statement = $con->prepare($u_query);
                $reduced = $u_statement->execute(
                    array(
                        ":sms" => $sms_count,
                        ":id" => $this->convertSenderIDToClientID($con),
                        )
                );
                if($reduced){
                    http_response_code(200);
                    echo json_encode(
                        array(
                            "status"  => 200,
                            "code"    => 2000,
                            "message" => "SMS sent"
                        )
                    );
                }
            }
            else{
                http_response_code(500);
                echo json_encode(
                    array(
                        "status"  => 500,
                        "message" => "Something went wrong"
                    )
                );
            }
        }
    }

?>