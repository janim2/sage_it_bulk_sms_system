<?php
    require_once '../config.php';
    require_once '../../helpers/functions.php';
    require_once 'manage_group_sms.php';

    // USING THE CLASS CREATED

    $add = new ManageGroupSMS();
    $add->__addSMSGroupNameConstruct();
    echo $add->SaveSMSGroup($con);
    
?>

