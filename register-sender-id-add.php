<?php
    require_once 'partials/header.php';
?>
<section id="content" class="table-layout animated fadeIn">
    <div class="chute chute-center">
        <div class="row" id="">
            <div class="bs-component">
                <form id="register_sender_id_form">
                    <div class="allcp-form theme-primary mw1000 center-block pb175">
                        <div class="section">
                            <label class="field select">
                                <input type="text" name="sender_id" id="sender_id" class="gui-input" placeholder="Sender Id" maxlength="11" required>
                            </label>
                        </div>

                        <div class="section">
                            <label class="field select">
                                <input type="text" name="purpose" id="purpose" class="gui-input" placeholder="Purpose" required>
                            </label>
                        </div>

                        <h6 class="mb20 mt40" id="spy7 text-danger">NOTE</h6>

                        <div class="section">
                            <p> 1 - Sender ID CANNOT exceed 11 character.</p>

                            <p> 2 - Be SPECIFIC with the purpose of the sender ID. eg. For Sending SMS News Letters.
                                <br />
                                &nbsp; &nbsp; &nbsp; Avoid descriptions like "For Messages", "For Business", "For
                                Communication", "Personal", "For Work". <br />
                                &nbsp; &nbsp; &nbsp; For sender ids that are abbreviations, please make sure to state
                                the
                                full meaning of the abreviation</p>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary ph15 loading" type="submit">Add Sender ID</button>
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
    $(document).on('submit', '#register_sender_id_form', function (event) {
        event.preventDefault();
        return submitFormQuery(this, "database/SenderID/add_sender_id.php", ".loading", "Sender ID submitted. Waiting to be approved. This usually happens between 24 hours.",
            "register_sender_id");
    });
</script>