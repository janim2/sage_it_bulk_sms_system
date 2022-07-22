<?php
    require_once '../../helpers/functions.php';

    session_start();
    class ManageSenderID{
        public $client_id;
        public $sender_id;
        public $purpose;

        function __senderIDConstruct(){
            $this->client_id  = $_SESSION['sage_it_sms_id'];
            $this->sender_id  = $_POST['sender_id'];
            $this->purpose    = $_POST['purpose']; 
        }

        function checkForPresence($con){
            $query = "SELECT * FROM senderID WHERE sender_id = :s_id AND client_id = :c";
            $statement = $con->prepare($query);
            $statement->execute(
                array(
                    ":s_id" => $this->sender_id, 
                    ":c"    => $this->client_id,
                )
            );

            $count = $statement->rowCount();
            if($count > 0) return 0;
            return 1;
        }

        function AddSenderID($con){
            if($this->checkForPresence($con) == 1){
                $query = "INSERT INTO senderID(client_id, sender_id, purpose) 
                VALUES(:c, :s_id, :p)";
                $statement = $con->prepare($query);
                $has_added = $statement->execute(
                    array(
                        ":c"    => $this->client_id, 
                        ":s_id" => $this->sender_id, 
                        ":p"    => $this->purpose,
                    )
                );
                if($has_added){
                    return 1;
                }
                else{
                    return 0;
                }
            }
            else{
                return "Sender ID already exists";
            } 
        }
    }
?>