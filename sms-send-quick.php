<?php
    require_once 'partials/header.php';
    require_once 'database/config.php';

    $client_id = $_SESSION['sage_it_sms_id']; 

    $query = "SELECT * FROM senderID WHERE client_id = :c AND status = 1";
    $statement = $con->prepare($query);

    $statement->execute(
        array(
            ":c" => $client_id, 
        )
    );
    $count = $statement->rowCount();
    $row = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<section id="content" class="table-layout animated fadeIn">
    <form id="quick_sms_form" method="POST">
        <div class="chute chute-center">
            <div class="row" id="">
                <div class="col-md-12">
                    <div class="panel panel-widget compose-widget">
                        <div class="panel-heading">
                            <span class="panel-title"> Compose Quick SMS</span>
                        </div>
                        <div class="panel-body p20">
                            <div class="allcp-form theme-primary">
                                <div class="section">
                                    <label class="field">
                                        <textarea class="gui-textarea bg-light" id="message" name="message"
                                            placeholder="Enter Message Here..." required></textarea>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="">
                <div class="col-md-6">
                    <div class="bs-component">
                        <div class="panel panel-widget draft-widget">
                            <div class="panel-heading">
                                <span class="panel-title"> Enter Number(s) To Receive SMS</span>
                            </div>
                            <div class="panel-body p20">
                                <div class="allcp-form theme-primary">
                                    <div class="section">
                                        <label class="field">
                                            <textarea class="gui-textarea bg-light" id="recipients" name="recipients"
                                                placeholder="Enter Phone Number Here..." required></textarea>
                                        </label>
                                    </div>
                                </div>
                                <h6 class="mb15">Use COMMA to separate number. <br /> Eg. 0244123123,0274123123</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="bs-component">
                        <div class="allcp-form theme-primary mw1000 center-block pb175">
                            <div class="section">
                                <label class="field select">
                                    <select id="senderID" name="senderID" required>
                                        <option value="">Select SMS Sender ID</option>
                                        <?php
                                        if($count > 0 && !(empty($row))){
                                            foreach($row as $result){?>
                                        <option value="<?= $result['id']; ?>"><?= $result['sender_id']; ?></option>
                                        <?php
                                            }
                                        }
                                        else{?>
                                        <p>Create a senderID first <a href='register-sender-id-add.php'></a></p>
                                        <?php
                                    }
                                    ?>
                                    </select>
                                    <i class="arrow double"></i>
                                </label>
                            </div>

                            <div class="text-right">
                                <button class="btn btn-primary ph15 loading" type="submit">Send SMS</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

<?php
    require_once 'partials/footer.php';
?>

<script src="helpers/submittion_helper.js"></script>

<script>
    $(document).on('submit', '#quick_sms_form', function (event) {
        event.preventDefault();
        return submitFormQuery(this, "database/QuickSMS/send_quick_sms.php", ".loading", "All SMS sent",
            "send_quick_sms");
    });
</script>