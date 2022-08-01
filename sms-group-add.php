<?php
    require_once 'partials/header.php';
?>
<section id="content" class="table-layout animated fadeIn">
    <div class="chute chute-center">
        <div class="row" id="">
            <div class="bs-component">
                <form id="add-group-form">
                    <div class="allcp-form theme-primary mw1000 center-block pb175">
                        <div class="section">
                            <label class="field select">
                                <input type="text" name="group_name" id="group_name" class="gui-input" 
                                    placeholder="Group Name">
                            </label>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary ph15" type="submit">Add Group</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
    require_once 'partials/footer.php';    
?>
<script src="helpers/submittion_helper.js"></script>

<script>
    $(document).on('submit', '#add-group-form', function (event) {
        event.preventDefault();
        return submitFormQuery(this, "database/GroupSMS/add_sms_group.php", ".loading", "SMS group created",
            "add_sms_group");
    });
</script>