
<?php
    require_once 'partials/header.php';
    
?>







        <section id="content" class="table-layout animated fadeIn">
            <div class="chute chute-center">

         

                   

                    <div class="row" id="">
                        <div class="col-md-6">
                            <div class="bs-component">
                                <div class="panel panel-widget draft-widget">
                                    <div class="panel-heading">
                                        <span class="panel-title">Select Group</span>
                                    </div>
                                    <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                                <tr class="bg-light">
                                                    <th class="text-center">Select</th>
                                                    <th class="text-center">S/N</th>
                                                    <th class="">Name Of Group</th>
                                                    <th class="">Number Of Contacts</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">
                                                        <label class="option block mn">
                                                            <input type="checkbox" name="inputname" value="FR">
                                                            <span class="checkbox mn"></span>
                                                        </label>
                                                    </td>
                                                    <td  class="text-center">1</td>
                                                    <td class="">John Doe</td>
                                                    <td class="">340</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <div class="bs-component">
                                <div class="panel panel-widget draft-widget">
                                    <div class="panel-heading">
                                        <span class="panel-title">Type Message</span>
                                    </div>
                                    <div class="panel-body p20">
                                        <div class="allcp-form theme-primary">
                                            <div class="section">
                                                <label class="field">
                                                    <textarea class="gui-textarea bg-light" id="comment" name="comment" placeholder="Type Your Message Here...">
                                                    </textarea>
                                                </label>
                                            </div>
                                        </div>

                                        <h6 class="mb15"> Sender ID</h6>
                                        <div class="bs-component">
                                            <div class="allcp-form theme-primary mw1000 center-block">
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="language" name="language">
                                                            <option value="">Select SMS Sender ID</option>
                                                        </select>
                                                        <i class="arrow double"></i>
                                                    </label>
                                                </div>
                                                <div class="text-right">
                                                    <button class="btn btn-primary ph15" type="button">Send SMS</button>
                                                </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>





            </div>
        </section>





<?php
    require_once 'partials/footer.php';
    
?>



