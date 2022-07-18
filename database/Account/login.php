<?php
    require_once '../config.php';
    require_once 'manage_account.php';

    $login = new ManageAccounts();
    $login->__loginConstruct();
    echo $login->Login($con);