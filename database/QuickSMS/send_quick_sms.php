<?php
    require_once '../config.php';
    require_once 'manage_quick_sms.php';

    $add = new ManageQuickSMS();
    $add->__quickSMSConstruct();
    echo $add->SaveQuickSMS($con);