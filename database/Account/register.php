<?php
    require_once '../config.php';
    require_once 'manage_account.php';

    $register = new ManageAccounts();
    $register->__signupConstruct();
    echo $register->Register($con);