
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
                                        <span class="panel-title">Import Contacts</span>
                                    </div>
                                    <div class="panel-body p20">
                                        <div class="allcp-form theme-primary">
                                            <div class="section">
                                                <label class="field">
                            <textarea class="gui-textarea bg-light"
                                      placeholder="" disabled></textarea>
                                                </label>
                                            </div>
                                        </div>
                                        <h6 class="mb15">In uploading the excel file, the 1st column should contain the names, the 2nd column should contain phone numbers, the 3rd column should contain contacts title e.g. Mr.,etc[optional] the 4th column date of birth in the format year-month-day[optional] and the 5th column email address [optional]</h6>

                                    <div class="text-left">
                                        <button class="btn btn-primary ph15" type="button">Download Sample File</button>
                                    </div>

                                    </div>
                                    
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="bs-component">
                                <div class="allcp-form theme-primary mw1000 center-block pb175">
                                     <h6 class="mb15">Import to Group:</h6>
                                    <div class="section">
                                    <label class="field select">
                                        <select id="language" name="language">
                                            <option value="">Select SMS Sender ID</option>
                                        </select>
                                        <i class="arrow double"></i>
                                    </label>
                                </div>

                               <h6 class="mb15">Choose excel file containing contacts:</h6>
                               <div class="section">    
                                    <label class="field select">
                                        <input type="file" name="" id="" class="gui-input"
                                                   placeholder="Purpose">
                                    </label>
                                </div>
                                
                                    <div class="text-center">
                                        <button class="btn btn-primary ph15" type="button">Import Contacts</button>
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

       