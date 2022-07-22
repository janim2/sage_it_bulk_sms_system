<?php
    include('sms.php');
    include('sageITsenderID.php');
    include('sageITsms.php');

    // function checkSMSCount($con){
    //     $query = "SELECT sms_credits FROM clients WHERE id = :id";
    //     $statement = $con->prepare($query);
    //     $statement->execute(
    //         array(
    //             ":id" => $_SESSION['sage_it_sms_id'],
    //         )
    //     );
    //     $result = $statement->fetch();
    //     return $result['sms_credits'];
    // }

    function convertSenderIDToName($con, $senderID){
        $query = "SELECT sender_id FROM senderID WHERE id = :id";
        $statement = $con->prepare($query);

        $statement->execute(
            array(
                ":id" => $senderID, 
            )
        );
        return $statement->fetch()['sender_id'];
    }

    function fetchAPIKey($con){
        $query = "SELECT apikey FROM clients WHERE id = :id";
        $statement = $con->prepare($query);
        $statement->execute(
            array(
                ":id" => $_SESSION['sage_it_sms_id'],
            )
        );
        $result = $statement->fetch();
        return $result['apikey'];
    }

    function generateAPIKey($con){
        return implode('-', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
    }

    // function convertAPIKeyToID($con, $key){
    //     $query = "SELECT id FROM clients WHERE apikey = :apikey";
    //     $statement = $con->prepare($query);

    //     $statement->execute(
    //         array(
    //             ":apikey" => $key, 
    //         )
    //     );
    //     return $statement->fetch()['id'];
    // }

    // function determineSmsCredits($message){
    //     $len = strlen($message);
    //     if($len >= 1 && $len <= 160){
    //         return 1;
    //     }
    //     else if($len >= 161 && $len <= 320){
    //         return 2;
    //     }
    //     else{
    //         return 3;
    //     }
    // }

    function creatSenderID($con, $email, $sender_id, $purpose){
        // echo fetchAPIKey($con);
        $senda_id = new SenderID();
        $senda_id->keey = fetchAPIKey($con);
        $senda_id->email = $email;
        $senda_id->senderID = $sender_id;
        $senda_id->purpose = $purpose;
        return $senda_id->createSenderID();
    }

    function sendMessage($con, $email, $sender_id, $phoneNumber, $message){
        $sendmessage = new sendMessage();
        $sendmessage->keey = fetchAPIKey($con);
        $sendmessage->email = $email;
        $sendmessage->senderID = $sender_id;
        $sendmessage->phoneNumber = $phoneNumber;
        $sendmessage->message = $message;
        return $sendmessage->sendTheMessage();
    }

    //sendSMS from the UI perspective
    // function sendSms($con, $sender_id, $phone, $msg)
    // {
    //     $send = new SendSms();
    //     $send->key = '5zFWCDwTTpKT6xeSz1OjZp4BW';
    //     $send->message = $msg;
    //     $send->numbers = $phone;
    //     $send->sender = convertSenderIDToName($con, $sender_id);
    //     if(checkSMSCount($con) > 0){
    //         saveSMS($con, $sender_id, $phone, $msg, checkSMSCount($con) - determineSmsCredits($msg));
    //         return $send->sendMessage();
    //     }
   

    // function saveSMS($con, $sender_id, $phone, $msg, $sms_count){
    //     $query = "INSERT INTO sms_logs(client_id, senderID_used_id, recipient, message) 
    //         VALUES(:c_id, :s_id, :r, :m)";
    //     $statement = $con->prepare($query);
    //     $saved = $statement->execute(
    //         array(
    //             ":c_id" => $_SESSION['sage_it_sms_id'] ?? convertSenderIDToClientID($con, $sender_id),
    //             ":s_id" => $sender_id,
    //             ":r"  => $phone,
    //             ":m"  => $msg
    //         )
    //     );
    //     if($saved){
    //         $u_query = "UPDATE clients SET sms_credits = :sms WHERE id = :id";
    //         $u_statement = $con->prepare($u_query);
    //         $reduced = $u_statement->execute(
    //             array(
    //                 ":sms" => $sms_count,
    //                 ":id" => $_SESSION['sage_it_sms_id'],
    //                 )
    //         );
    //         if($reduced){
    //             return 1;
    //         }
    //     }
    //     else{
    //         return 0;
    //     }
    // }

    // function convertSenderNameToID($con, $senderName){
    //     $query = "SELECT id FROM senderID WHERE sender_id = :n";
    //     $statement = $con->prepare($query);

    //     $statement->execute(
    //         array(
    //             ":n" => $senderName, 
    //         )
    //     );
    //     return $statement->fetch()['id'];
    // }
    

    function hashPassword($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

?>