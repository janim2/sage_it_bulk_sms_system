<?php
    require_once 'partials/header.php';
    require_once 'helpers/functions.php';
    require_once 'database/config.php';

    $query = "SELECT * FROM clients WHERE id = :id";
    $statement = $con->prepare($query);

    $statement->execute(
        array(
            ":id" => $_SESSION['sage_it_sms_id']
        )
    );
    $result = $statement->fetch();
?>

<section id="content" class="table-layout animated fadeIn">
    <div class="chute chute-center">

        <div class="col-md-12">
            <div class="panel panel-visible" id="spy3">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        API Settings
                    </div>
                     <div class="panel-footer text-right">
                        <a href="api_create.php" class="btn btn-primary ph15 mr5" type="button">CREATE API KEY</a>
                    </div>
                </div>
                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable3" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="va-m sorting_desc">Business Name</th>
                                    <th class="va-m">Key</th>
                                    <!-- <th class="va-m">Sender ID</th> -->
                                    <!-- <th class="va-m">Status</th>
                                    <th class="va-m text-right">Date Created</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $result['business_name']?></td>
                                    <td><?=fetchAPIKey($con);?></td>
                                    <!-- <td><?php
                                        $s_query = "SELECT sender_id FROM senderID WHERE client_id = :id";
                                        $s_statement = $con->prepare($s_query);
                                        $s_statement->execute(
                                            array(
                                                ":id" => $_SESSION['sage_it_sms_id']
                                            )
                                        );
                                        $s_ans = $s_statement->fetchAll(PDO::FETCH_ASSOC);
                                        $s_count = $s_statement->rowCount();

                                        if($s_count > 0 && !(empty($s_ans))){
                                            foreach($s_ans as $s_result){?>
                                                <br><a href='register-sender-id.php'><?= $s_result['sender_id']?></a>
                                        <?php
                                            }
                                        }else{?>
                                            <p>No sender ID yet</p>
                                        <?php
                                        }
                                    ?>
                                    </td> -->
                                    <!-- <td class="hidden-xs"><span class="badge-sucess">Active</span></td> -->
                                    <!-- <td class="hidden-xs"></td>
                                    <td class="hidden-xs"></td> -->
                                </tr>    
                            </tbody>

                            <tbody>
                                <tr>
                                    <?php
                                        $fetch_business_query = "SELECT * FROM api_created WHERE creator_id = :id";
                                        $fetch_business_statement = $con->prepare($fetch_business_query);
                                        $fetch_business_statement->execute(
                                            array(
                                                ":id" => $_SESSION['sage_it_sms_id']
                                            )
                                        );
                                        $fetch_business_statement_count = $fetch_business_statement->rowCount();
                                        if($fetch_business_statement_count > 0){
                                            $fetch_business_statement_result = $fetch_business_statement->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($fetch_business_statement_result as $fetcher){
                                                //FETCH OTHER BUSINESSES
                                                $other_query = "SELECT * FROM clients WHERE id = :id";
                                                $other_statement = $con->prepare($other_query);
                                                $other_statement->execute(
                                                    array(
                                                        ":id" => $fetcher['created_id']
                                                    )
                                                );
                                                $other_result_count = $other_statement->rowCount();
                                                if($other_result_count > 0){
                                                    $other_result = $other_statement->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach($other_result as $o_result){?>
                                                        <tr>
                                                            <td><?= $o_result['business_name'];?></td>
                                                            <td><?= $o_result['apikey'];?></td>
                                                            <!-- <td></td> -->
                                                        </tr>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                        <?php
                                            }
                                        }
                                    ?>
                                    <!-- <td></td>
                                    <td class="hidden-xs"><span class="badge-sucess">Active</span></td>
                                    <td class="hidden-xs"></td>
                                    <td class="hidden-xs"></td> -->
                                </tr>    
                            </tbody>
                        </table>
                        <p>Visit the <a href="api-documentation/documentation.php"> documentation page </a> to read about the API v1.0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    require_once 'partials/footer.php';
    
?>