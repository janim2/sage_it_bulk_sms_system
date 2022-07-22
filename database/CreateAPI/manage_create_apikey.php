<?php
    require_once '../../helpers/functions.php';
    include '../../database/SenderID/manage_sender_ID.php';

    class ManageCreateAPI{
        public $fullname;
        public $email;
        public $business_name;
        public $phone;
        public $sender_id;
        public $purpose;

        function __createAPIConstruct(){
            $this->client_id    = $_SESSION['sage_it_sms_id'];
            $this->fullname     = $_POST['fullname'];
            $this->email        = $_POST['email']; 
            $this->business_name= $_POST['business_name'];
            $this->phone        = $_POST['phonenumber'];
            $this->sender_id    = $_POST['sender_id'];
            $this->purpose      = $_POST['purpose'];
        }

        function checkForPresence($con){
            $query = "SELECT * FROM clients WHERE email = :e AND business_name = :bn";
            $statement = $con->prepare($query);
            $statement->execute(
                array(
                    ":e"  => $this->email,
                    ":bn" => $this->business_name,
                )
            );

            $count = $statement->rowCount();
            if($count > 0){
                 echo "Business already exists";
            }else{
                return 1;
            }
        }

        function checkForSenderIDPresence($con){
            $query = "SELECT * FROM senderID WHERE sender_id = :s_id AND client_id = :c";
            $statement = $con->prepare($query);
            $statement->execute(
                array(
                    ":s_id" => $this->sender_id, 
                    ":c"    => $this->client_id,
                )
            );

            $count = $statement->rowCount();
            if($count > 0) return 0;
            return 1;
        }

        function AddSenderID($con){
            if($this->checkForSenderIDPresence($con) == 1){
                $query = "INSERT INTO senderID(client_id, sender_id, purpose) 
                VALUES(:c, :s_id, :p)";
                $statement = $con->prepare($query);
                $has_added = $statement->execute(
                    array(
                        ":c"    => $this->client_id, 
                        ":s_id" => $this->sender_id, 
                        ":p"    => $this->purpose,
                    )
                );
                if($has_added){
                    return 1;
                }
                else{
                    return "Something went wrong";
                }
            }
            else{
                return "Sender ID already exists";
            } 
        }

        function linkBusinessCreatedToAccount($con){
            $query = "SELECT id FROM clients WHERE fullname = :f AND email = :e AND business_name = :bn AND phonenumber = :p";
            $statement = $con->prepare($query);
            $statement->execute(
                array(
                    ":f"  => $this->fullname,
                    ":e"  => $this->email,
                    ":bn" => $this->business_name,
                    ":p"  => $this->phone
                )
            );
            $id = $statement->fetch();

            //INSERT INTO TABLE
            $iquery = "INSERT INTO api_created(creator_id, created_id) 
                VALUES(:ci, :created_id)";
            $istatement = $con->prepare($iquery);
            $ihas_added = $istatement->execute(
                array(
                    ":ci"           => $this->client_id,
                    ":created_id"   => $id['id'],
                )
            );
            if($ihas_added){
                echo 1;
            }
        }

        function createNewBusiness($con){
            $result = $this->AddSenderID($con);
            if($this->checkForPresence($con) == 1 && $result == 1){
                $query = "INSERT INTO clients(apikey, fullname, email, business_name, phonenumber, password) 
                VALUES(:api, :fn, :e, :bn, :pn, '12@34@56')";
                $statement = $con->prepare($query);
                $has_added = $statement->execute(
                    array(
                        ":api"=> generateAPIKey($con),
                        ":fn" => $this->fullname,
                        ":e"  => $this->email,
                        ":bn" => $this->business_name,
                        ":pn" => $this->phone
                    )
                );
                if($has_added){
                    // $result = creatSenderID($con, $this->email, $this->sender_id, $this->purpose);
                    // if($result['code'] == 2001){
                        $this->linkBusinessCreatedToAccount($con);

                    // }
                    // else{
                    //     echo $result['message'];
                    // }
                    // return 1;
                }
                else{
                    return "Something went wrong";
                }
            }
            else{
                return "\n".$result;
            }
            
        }
        
    }
?>