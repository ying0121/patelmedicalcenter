<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 my-3">
        <h3>Communication Setting</h3>
    </div>
    <div class="row">
        <div class="col-md-12 bg-primary p-2 mb-2 text-white">
            <ul class="nav nav-tabs nav-pills" data-tabs="tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#contact_email" data-toggle="tab">
                        Contact Emails
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact_reason" data-toggle="tab">
                        Contact Reason
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#optin_out" data-toggle="tab">
                        Opt In & Out
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#send_to_friend" data-toggle="tab">
                        Send To Friend
                    </a>
                </li>
            </ul>
        </div>

        <div class="col-md-12">
            <div class="tab-content">
                <div class="tab-pane active" id="contact_email">
                    <?php include('communication/contactemail.php') ?>
                </div>
                <div class="tab-pane" id="contact_reason">
                    <?php include('communication/contactreason.php') ?>
                </div>
                <div class="tab-pane" id="optin_out">
                    <?php include('communication/optinout.php') ?>
                </div>
                <div class="tab-pane" id="send_to_friend">
                    <?php include('communication/send_to_friend.php') ?>
                </div>
            </div>
        </div>
    </div>
</div>