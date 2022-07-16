<?php    

    require_once '../../helpers/functions.php';

    class ManageSenderIDAPI{
        private $apiKey;
        private $email; 
        private $senderID;
        private $purpose;

        function __apiKeyConstruct(){
            $data = json_decode(file_get_contents('php://input'));
            $this->email   = $data->email ?? "";
            $this->apiKey  = $data->api_key ?? "";
            $this->senderID = $data->senderID ?? "";
            $this->purpose  = $data->purpose ?? ""; 
        }

        function verifyAPIKey($con){
            if(!empty($this->email) && !empty($this->apiKey) && !empty($this->senderID) && !empty($this->purpose)){
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
                        "message" => "All Fields required"
                    )
                );
            }
        }

        function doesSenderIDExist($con){
            if($this->verifyAPIKey($con) == 1){
                $query = "SELECT * FROM senderID WHERE sender_id = :id";
                $statement = $con->prepare($query);
                $statement->execute(
                    array(
                        ":id" => $this->senderID
                    )
                );
                $doesitexist = $statement->rowCount();
                if($doesitexist > 0){
                    http_response_code(208);
                    echo json_encode(
                        array(
                            "status"  => 208,
                            "message" => "Sender ID not allowed"
                        )
                    );
                }else{
                    $this->saveSenderID($con);
                }
            }
        }

        function saveSenderID($con){
            $query = "INSERT INTO senderID(client_id, sender_id, purpose) VALUES(:client_id, :sender_id, :purpose)";
            $statement = $con->prepare($query);

            $has_saved = $statement->execute(
                array(
                    ":client_id" => convertAPIKeyToID($con, $this->apiKey),
                    ":sender_id" => $this->senderID,
                    ":purpose"   => $this->purpose
                )
            );

            if($has_saved){
                http_response_code(200);
                echo json_encode(
                    array(
                        "status"  => 200,
                        "message" => "Sender ID created. It would be verified within 10 mins. Call 0274756446 if you need it urgently."
                    )
                );
            }
            else{
                http_response_code(503);
                echo json_encode(
                    array(
                        "status"  => 503,
                        "message" => "Something went wrong. Try again later"
                    )
                );
            }
        }
    }

?>