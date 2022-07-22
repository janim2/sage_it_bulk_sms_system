<?php
    require_once 'partials/header.php';
    require_once 'helpers/functions.php';
    require_once 'database/config.php';
?>

<section id="content" class="pull-center">

    <div class="allcp-form theme-primary ">

        <div class="panel panel-primary">
            <div class="panel-heading pn">
                <span class="panel-title">Create API Key</span>
            </div>

            <form method="post" id="create_api_form">
                <div class="panel-body pn">

                    <div class="section">
                        <label for="fullname" class="field prepend-icon">
                            <input type="test" name="fullname" id="fullname" class="gui-input" placeholder="Full Name"
                                required>
                            <label for="fullname" class="field-icon">
                                <i class="fa fa-user"></i>
                            </label>
                        </label>
                    </div>

                    <div class="section">
                        <label for="email" class="field prepend-icon">
                            <input type="email" name="email" id="email" class="gui-input" placeholder="Email address"
                                required>
                            <label for="email" class="field-icon">
                                <i class="fa fa-envelope"></i>
                            </label>
                        </label>
                    </div>

                    <div class="section">
                        <label for="business-name" class="field prepend-icon">
                            <input type="text" name="business_name" id="business_name" class="gui-input"
                                placeholder="Business Name" required>
                            <label for="username" class="field-icon">
                                <i class="fa fa-user"></i>
                            </label>
                        </label>
                    </div>

                    <div class="section">
                        <label for="phone-number" class="field prepend-icon">
                            <input type="text" name="phonenumber" id="phonenumber" class="gui-input"
                                placeholder="Phone Number" required>
                            <label for="phone-number" class="field-icon">
                                <i class="fa fa-phone"></i>
                            </label>
                        </label>
                    </div>

                    <div class="section">
                        <label for="sender-id" class="field prepend-icon">
                            <input type="text" name="sender_id" id="sender_id" class="gui-input"
                                placeholder="Create a Sender ID" maxlength="11" required>
                            <label for="sender-id" class="field-icon">
                                <i class="fa fa-lock"></i>
                            </label>
                        </label>
                        <p>Sender ID CANNOT exceed 11 character.</p>
                    </div>

                    <div class="section">
                        <label for="purpose" class="field prepend-icon">
                            <input type="text" name="purpose" id="purpose" class="gui-input"
                                placeholder="Purpose of Sender ID" required>
                            <label for="purpose" class="field-icon">
                                <i class="fa fa-unlock-alt"></i>
                            </label>
                        </label>
                        <p> Be SPECIFIC with the purpose of the sender ID. eg. For Sending SMS News Letters.</p>
                    </div>

                    <div class="section text-center">
                        <div class="">
                            <button type="cancel" class="btn btn-bordered btn-danger" onclick="location.href='api-list.php'">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-bordered btn-primary loading">
                                Create API Key
                            </button>
                        </div>
                    </div>


                </div>
                <div class="panel-footer"> </div>
            </form>
        </div>
    </div>
</section>




</section>

</div>

<script src="assets/js/jquery/jquery-1.11.3.min.js"></script>
<script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
<script src="assets/js/plugins/canvasbg/canvasbg.js"></script>
<script src="assets/js/utility/utility.js"></script>
<script src="assets/js/main.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function () {
        "use strict";
        // Init Theme Core
        Core.init();

        // Init Demo JS
        Demo.init();

        // Init CanvasBG
        CanvasBG.init({
            Loc: {
                x: window.innerWidth / 5,
                y: window.innerHeight / 10
            }
        });
    });
</script>

<?php include_once 'helpers/sweet_alert.php'; ?>

<script src="helpers/submittion_helper.js"></script>

<script>
    $(document).on('submit', '#create_api_form', function (event) {
        event.preventDefault();
        return submitFormQuery(this, "database/CreateAPI/create_apikey.php", ".loading", "API Key created Successfully",
            "register_api");
    });
</script>


</body>

</html>