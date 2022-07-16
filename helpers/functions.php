<?php
    include('sms.php');

    function checkSMSCount($con){
        $query = "SELECT sms_credits FROM clients WHERE id = :id";
        $statement = $con->prepare($query);
        $statement->execute(
            array(
                ":id" => $_SESSION['sage_it_sms_id'],
            )
        );
        $result = $statement->fetch();
        return $result['sms_credits'];
    }

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

    function sendSms($con, $sender_id, $phone, $msg)
    {
        $send = new SendSms();
        $send->key = '5zFWCDwTTpKT6xeSz1OjZp4BW';
        $send->message = $msg;
        $send->numbers = $phone;
        $send->sender = convertSenderIDToName($con, $sender_id);
        if(checkSMSCount($con) > 0){
            saveSMS($con, $sender_id, $phone, $msg, checkSMSCount($con) - determineSmsCredits($msg));
            return $send->sendMessage();
        }
        else{?>
            <script>alert("SMS credits exhausted");</script>
        <?php
        }
    }

    function saveSMS($con, $sender_id, $phone, $msg, $sms_count){
        $query = "INSERT INTO sms_logs(client_id, senderID_used_id, recipient, message) 
            VALUES(:c_id, :s_id, :r, :m)";
        $statement = $con->prepare($query);
        $saved = $statement->execute(
            array(
                ":c_id" => $_SESSION['sage_it_sms_id'],
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
                    ":id" => $_SESSION['sage_it_sms_id'],
                    )
            );
            if($reduced){
                return 1;
            }
        }
        else{
            return 0;
        }
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
    

    function hashPassword($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

?>