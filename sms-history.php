<?php
    require_once 'partials/header.php';
    require_once 'database/config.php';
    require_once 'helpers/functions.php';

    $client_id = $_SESSION['sage_it_sms_id'];

    $query = "SELECT * FROM sms_logs WHERE client_id = :c_id ORDER BY date DESC";
    $statement = $con->prepare($query);

    $statement->execute(
        array(
            ":c_id" => $client_id
        )
    );

    $count = $statement->rowCount();
    $row = $statement->fetchAll(PDO::FETCH_ASSOC);
    
?>
<section id="content" class="table-layout animated fadeIn">
    <div class="chute chute-center">

        <div class="col-md-12">
            <div class="panel panel-visible" id="spy3">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        Sent Messages
                    </div>
                    <!-- <div class="panel-footer text-right">
                        <a href="sms-campaigns.php" class="btn btn-primary ph15 mr5" type="button">View Campiagn</a>
                    </div> -->
                </div>
                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable3" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="va-m sorting_desc">Mobile</th>
                                    <th class="va-m">Message</th>
                                    <th class="va-m">Status</th>
                                    <th class="va-m">Credit</th>
                                    <th class="hidden-xs va-m">Sender ID</th>
                                    <th class="hidden-xs va-m"> Date & Time</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="va-m sorting_desc">Mobile</th>
                                    <th class="va-m">Message</th>
                                    <th class="va-m">Status</th>
                                    <th class="va-m">Credit</th>
                                    <th class="hidden-xs va-m">Sender ID</th>
                                    <th class="hidden-xs va-m"> Date & Time</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                    if($count > 0 && !(empty($row))){
                                        foreach($row as $results){?>
                                        <tr>
                                            <td><?= $results['recipient'];?></td>
                                            <td><?= $results['message'];?></td>
                                            <td>Sent</td>
                                            <td><?= $results['sms_credits'];?></td>
                                            <td class="hidden-xs"><?= convertSenderIDToName($con, $results['senderID_used_id']);?></td>
                                            <td class="hidden-xs"><?= $results['date'];?></td>
                                        </tr>
                                    <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    require_once 'partials/footer.php';
    
?>