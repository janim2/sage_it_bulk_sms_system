
<?php
    require_once 'partials/header.php';
    
?>




        <section id="content" class="table-layout animated fadeIn">
            <div class="chute chute-center">

                    <div class="col-md-12">
                        <div class="panel panel-visible" id="spy3">
                            <div class="panel-heading">
                                <div class="panel-title hidden-xs">
                                    Sent Messages
                                </div>
                                <div class="panel-footer text-right">
                                    <a href="sms-group-add.php" class="btn btn-primary ph15 mr5" type="button">Add Group </a>
                                </div>
                            </div>
                            <div class="panel-body pn">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="datatable3" cellspacing="0"
                                           width="100%">
                                        <thead>
                                        <tr>
                                            <th class="va-m sorting_desc">Group Name</th>
                                            <th class="va-m">Number Of Contacts</th>
                                            <th class="va-m">Total SMS Sent</th>
                                            <th class="va-m">Created On</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                           <th class="va-m sorting_desc">Group Name</th>
                                            <th class="va-m">Number Of Contacts</th>
                                            <th class="va-m">Total SMS Sent</th>
                                            <th class="va-m">Created On</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="hidden-xs"></td>
                                            <td class="hidden-xs"></td>
                                        </tr>
                                        
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

       