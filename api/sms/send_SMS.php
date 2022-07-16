<?php
    require_once '../../database/config.php';
    require_once 'manage_sendSMS_API.php';

    $key = new ManageSendSMSAPI();
    $key->__sendSMSContruct();
    echo $key->verifySenderID($con);
?>