<?php    

    require_once '../../helpers/functions.php';

    class ManageSendSMSAPI{
        private $apiKey;
        private $email; 
        private $senderID;
        private $phoneNumber;
        private $message;

        function __sendSMSContruct(){
            $data = json_decode(file_get_contents('php://input'));
            $this->email    = $data->email;
            $this->apiKey   = $data->api_key;
            $this->senderID = $data->senderID;
            $this->phoneNumber = $data->phoneNumber;
            $this->message  = $data->message;
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
                        "message" => "All fields required"
                    )
                );
            }
        }

        function verifySenderID($con){
            if($this->verifyAPIKey($con) == 1){
                //check if sender ID exists for a particular user
                $query = "SELECT * FROM senderID WHERE client_id = :id AND sender_id = :s_id";
                $statement = $con->prepare($query);
                $statement->execute(
                    array(
                        ":id" => convertAPIKeyToID($con, $this->apiKey), 
                        ":s_id" => $this->senderID
                    )
                );
                $ifexists = $statement->rowCount();
                if($ifexists > 0){
                    //check if senderID has been approved
                    $approved = $statement->fetch();
                    if($approved['status'] == 1){
                        //send message
                        $this->sendSMS($con);

                    }else{
                        http_response_code(206);
                        echo json_encode(
                            array(
                                "status"  => 206,
                                "message" => "Sender ID has not been approved. Call 0274756446 if you need it urgently."
                            )
                        );
                    }
                }
                else{
                    http_response_code(400);
                    echo json_encode(
                        array(
                            "status"  => 400,
                            "message" => "Invalid Sender ID"
                        )
                    );
                }
            }
        }

        function sendSMS($con){
            sendSms($con, $this->senderID, $this->phoneNumber, $this->message);
        }
    }

?>