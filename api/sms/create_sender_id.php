<?php
    require_once '../../database/config.php';
    require_once 'manage_senderID_API.php';

    $key = new ManageSenderIDAPI();
    $key->__apiKeyConstruct();
    echo $key->doesSenderIDExist($con);
?>