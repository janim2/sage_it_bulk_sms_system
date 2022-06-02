<?php
    require_once 'partials/header.php';
    
?>

<section id="content" class="table-layout animated fadeIn">
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
                                    <textarea class="gui-textarea bg-light" id="comment" name="comment"
                                        placeholder="Enter Message Here..."></textarea>
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
                                        <textarea class="gui-textarea bg-light" id="comment" name="comment"
                                            placeholder="Enter Phone Number Here..."></textarea>
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
</section>

<?php
    require_once 'partials/footer.php';
?>