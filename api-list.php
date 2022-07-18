<?php
    require_once 'partials/header.php';
    require_once 'helpers/functions.php';
    require_once 'database/config.php';
?>

<section id="content" class="table-layout animated fadeIn">
    <div class="chute chute-center">

        <div class="col-md-12">
            <div class="panel panel-visible" id="spy3">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        API Settings
                    </div>
                    <!-- <div class="panel-footer text-right">
                        <a href="#" class="btn btn-primary ph15 mr5" type="button">CREATE API KEY</a>
                    </div> -->
                </div>
                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable3" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <!-- <th class="va-m sorting_desc">Name of Project</th> -->
                                    <th class="va-m">Key</th>
                                    <th class="va-m">Status</th>
                                    <!-- <th class="va-m text-right">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- <td>DaChurchMan</td> -->
                                    <td><?=fetchAPIKey($con);?></td>
                                    <td class="hidden-xs"><span class="badge-sucess">ON</span></td>
                                    <!-- <td class="hidden-xs">
                                        <a class="btn btn-warning ph15 mr5" type="button">Disable</a>
                                        <a class="btn btn-danger ph15 mr5" type="button">Delete</a>
                                    </td> -->
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