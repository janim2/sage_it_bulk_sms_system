<?php
    require_once '../../helpers/functions.php';

    session_start();
    class ManageGroupSMS{
        public $client_id;
        public $group_name;

        function __addSMSGroupNameConstruct(){
            $this->client_id  = $_SESSION['sage_it_sms_id'];
            $this->group_name  = $_POST['group_name'];
        }

        function checkForSMSGroupPresence($con){
            $query = "SELECT * FROM sms_groups WHERE name = :_name AND client_id = :c";
            $statement = $con->prepare($query);
            $statement->execute(
                array(
                    ":_name" => $this->group_name, 
                    ":c"     => $this->client_id,
                )
            );

            $count = $statement->rowCount();
            if($count > 0) return 0;
            return 1;
        }


        function SaveSMSGroup($con){
            if($this->checkForSMSGroupPresence($con) == 1){
                $query = "INSERT INTO sms_groups(client_id, name) 
                VALUES(:c_id, :n)";
                $statement = $con->prepare($query);
                $has_added = $statement->execute(
                    array(
                        ":c_id" => $this->client_id, 
                        ":n"    => $this->group_name, 
                    )
                );
                if($has_added){
                    return 1;
                    // $this->sendQuickSMS($con);
                }
                else{
                    return "Something went wrong";
                }
        
            }
            else{
                return "SMS group already exists";
            }
        }

    }
?>