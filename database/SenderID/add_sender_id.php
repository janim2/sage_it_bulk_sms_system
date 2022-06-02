<?php
    require_once '../config.php';
    require_once 'manage_sender_ID.php';

    $add = new ManageSenderID();
    $add->__senderIDConstruct();
    echo $add->AddSenderID($con);