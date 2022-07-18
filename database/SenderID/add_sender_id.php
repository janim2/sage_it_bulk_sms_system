<?php
    require_once '../config.php';
    // require_once 'manage_sender_ID.php';
    include_once '../../helpers/functions.php';

    //USING THE API CREATED

    $email      = $_SESSION['sage_it_sms_email'];
    $sender_id  = $_POST['sender_id'];
    $purpose    = $_POST['purpose']; 

    $result = createSenderID($con, $email, $sender_id, $purpose);
    echo $result['message'];

    // USING THE CLASS CREATED

    // $add = new ManageSenderID();
    // $add->__senderIDConstruct();
    // echo $add->AddSenderID($con);

