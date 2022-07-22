<?php
    require_once '../config.php';
    require_once '../../helpers/functions.php';
    require_once 'manage_create_apikey.php';

    // USING THE CLASS CREATED

    $create = new ManageCreateAPI();
    $create->__createAPIConstruct();
    echo $create->createNewBusiness($con);
    
?>

