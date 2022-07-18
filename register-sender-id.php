<?php
    require_once 'partials/header.php';
    require_once 'database/config.php';

    $client_id = $_SESSION['sage_it_sms_id']; 

    $query = "SELECT * FROM senderID WHERE client_id = :c_id";
    $statement = $con->prepare($query);

    $statement->execute(
        array(
            ":c_id" => $client_id
        )
    );
    $count = $statement->rowCount();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    //TODO: count SMS sent from sent SMS table. 
?>

<section id="content" class="table-layout animated fadeIn">
    <div class="chute chute-center">

        <div class="col-md-12">
            <div class="panel panel-visible" id="spy3">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        Sender ID(s)
                    </div>
                    <div class="panel-footer text-right">
                        <a href="register-sender-id-add.php" class="btn btn-primary ph15 mr5" type="button">Add Sender
                            ID</a>
                    </div>
                </div>
                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable3" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="va-m sorting_desc">Sender ID</th>
                                    <th class="va-m">Status</th>
                                    <th class="va-m">Purpose</th>
                                    <th class="va-m">Total SMS Sent</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="va-m sorting_desc">Sender ID</th>
                                    <th class="va-m">Status</th>
                                    <th class="va-m">Purpose</th>
                                    <th class="va-m">Total SMS Sent</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                    if($count > 0 && !(empty($rows))){
                                        foreach($rows as $results){?>
                                            <tr>
                                                <td><?= $results['sender_id']; ?></td>
                                                <td><span class="badge <?= $results['status'] == 0 ? 'badge-danger' : 'badge-dark'?>"><?= $results['status'] == 0 ? 'Pending' : 'Approved'?></span></td>
                                                <td class="hidden-xs"><?= $results['sender_id']; ?></td>
                                                <td class="hidden-xs">0</td>
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