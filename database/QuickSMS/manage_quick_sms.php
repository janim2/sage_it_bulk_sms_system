<?php
    require_once '../../helpers/functions.php';

    session_start();
    class ManageQuickSMS{
        public $client_id;
        public $sender_id;
        public $message;
        public $recipients;

        function __quickSMSConstruct(){
            $this->client_id  = $_SESSION['sage_it_sms_id'];
            $this->sender_id  = $_POST['senderID'];
            $this->message    = $_POST['message']; 
            $this->recipients = $_POST['recipients'];
        }

        // function checkForPresence($con){
        //     $query = "SELECT * FROM senderID WHERE sender_id = :s_id AND client_id = :c";
        //     $statement = $con->prepare($query);
        //     $statement->execute(
        //         array(
        //             ":s_id" => $this->sender_id, 
        //             ":c"    => $this->client_id,
        //         )
        //     );

        //     $count = $statement->rowCount();
        //     if($count > 0) return 0;
        //     return 1;
        // }

        function splitPhoneNumbers($phonenumbers){
            // $individualnumbersArray = preg_split ("/\,/", $phonenumbers);  
            $individualnumbersArray =  explode(",", $phonenumbers);
            return $individualnumbersArray;
        }

        function sendQuickSMS($con){
            $array = $this->splitPhoneNumbers($this->recipients);
            $counter = 0;

            // sendSms($con, "DaChurchMan", "0268977129", "I am testing the sms");

            foreach($array as $numbers){
                // echo $counter . "/" . count($array);
                if($counter >= count($array)){
                    return 1;
                }
                // sendSMS($numbers, $this->message);
                sendSms($con, $this->sender_id, $numbers, $this->message);
                $counter++;
            }
           
        }

        function SaveQuickSMS($con){
            // if($this->checkForPresence($con) == 1){
            $query = "INSERT INTO quickSMS(client_id, senderID_used_id, recipients, message) 
            VALUES(:c, :s_id, :r, :m)";
            $statement = $con->prepare($query);
            $has_added = $statement->execute(
                array(
                    ":c"    => $this->client_id, 
                    ":s_id" => $this->sender_id, 
                    ":r"    => $this->recipients,
                    ":m"    => $this->message,
                )
            );
            if($has_added){
                // return 1;
                $this->sendQuickSMS($con);
            }
            else{
                return 0;
            }
        
            // }
            // else{
            //     return "Sender ID already exists";
            // }
            
        }

    }
?>