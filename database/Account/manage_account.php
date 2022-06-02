<?php
    require_once '../../helpers/functions.php';

    session_start();
    class ManageAccounts{
        public $email;
        public $password;
        public $confirm_password;
        public $fullname;
        public $business_name;
        public $phonenumber;

        function __loginConstruct(){
            $this->email     = $_POST['login_email'];
            $this->password  = $_POST['login_password'];
        }

        function  __signupConstruct(){
            $this->fullname     = $_POST['fullname'];
            $this->email        = $_POST['email'];
            $this->business_name= $_POST['business_name'];
            $this->phonenumber  = $_POST['phonenumber'];
            $this->password     = $_POST['password'];
            $this->confirm_password = $_POST['confirmPassword'];
        }

        function checkForPresence($con){
            $query = "SELECT * FROM clients WHERE email = :e";
            $statement = $con->prepare($query);
            $statement->execute(
                array(
                    ":e" => $this->email
                )
            );

            $count = $statement->rowCount();
            if($count > 0) return 0;
            return 1;
        }

        function Register($con){
            if($this->password != $this->confirm_password){
                return "Password mismatch";
            }
            else if(strlen($this->password) < 6){
                return "Password length must be greater than 6";
            }
            else if($this->checkForPresence($con) == 1){
                $query = "INSERT INTO clients(fullname, email, business_name, phonenumber, password) 
                VALUES(:f, :e, :bn, :pn, :p)";
                $statement = $con->prepare($query);
                $has_added = $statement->execute(
                    array(
                        ":f"    => $this->fullname, 
                        ":e"    => $this->email, 
                        ":bn"   => $this->business_name, 
                        ":pn"   => $this->phonenumber, 
                        ":p"    => $this->password, 
                    )
                );
                if($has_added){
                    return 1;
                }
                else{
                    return 0;
                }
            }
            else{
                return "User with same email already exists";
            }
            
        }

        function Login($con){
            $query = "SELECT * FROM clients WHERE email = :e AND password = :p";
            $statement = $con->prepare($query);
            $statement->execute(
                array(
                    ":e" => $this->email,
                    ":p" => $this->password
                )
            );

            $count = $statement->rowCount();
            if($count > 0){
               // user is present
               $result = $statement->fetch();
            //    session_start();
               $_SESSION['sage_it_sms_id']      = $result['id'];
               $_SESSION['sage_it_sms_name']    = $result['fullname'];
               $_SESSION['sage_it_business_name'] = $result['business_name'];
               return 1;

            }else{
                echo "Invalid user credentials";
            }
        }

        function Logout(){
            // unset($_SESSION['name']);
            // session_start();
            session_unset();     // unset $_SESSION variable for the run-time 
            session_destroy(); 
            return 1;
        }
    }
?>