<?php
    session_start();
    require_once '../config.php';
    include_once '../../helpers/functions.php';
    // require_once 'manage_quick_sms.php';

    //USING THE API CREATED

    $email      = $_SESSION['sage_it_sms_email'];
    $sender_id  = convertSenderIDToName($con, $_POST['senderID']);
    $message    = $_POST['message']; 
    $recipients = $_POST['recipients'];

    $result = sendMessage($con, $email, $sender_id, $recipients, $message);
    // echo var_dump($result);
    if($result['code'] == 2000){
        echo 1;
    }
    else{
        echo $result['message'];
    }

    //USING THE CLASS CREATED

    // $add = new ManageQuickSMS();
    // $add->__quickSMSConstruct();
    // echo $add->SaveQuickSMS($con);