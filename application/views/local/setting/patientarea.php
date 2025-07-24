<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 my-3">
        <h3>Patient Area Setting</h3>
    </div>
    <div class="row">
        <div class="col-md-12 bg-primary p-2 mb-2 text-white">
            <ul class="nav nav-tabs nav-pills" data-tabs="tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#pa_signin" data-toggle="tab">
                        Sign In
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pa_signup" data-toggle="tab">
                        Sign Up
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pa_loginfailed" data-toggle="tab">
                        Login Failed
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pa_logoutrules" data-toggle="tab">
                        Pt Area Rules
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pa_prompts" data-toggle="tab">
                        Prompts
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pa_emails" data-toggle="tab">
                        Email Account
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pa_password" data-toggle="tab">
                        Email Password
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pa_emailupdate" data-toggle="tab">
                        Email Update
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pa_emailclosed" data-toggle="tab">
                        Email Closed
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pa_needhelp" data-toggle="tab">
                        Access Help
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pa_vault" data-toggle="tab">
                        Vault
                    </a>
                </li>
            </ul>
        </div>

        <div class="col-md-12">
            <div class="tab-content">
                <div class="tab-pane active" id="pa_signin">
                    <?php include('patientarea/signin.php') ?>
                </div>
                <div class="tab-pane" id="pa_signup">
                    <?php include('patientarea/signup.php') ?>
                </div>
                <div class="tab-pane" id="pa_loginfailed">
                    <?php include('patientarea/loginfailed.php') ?>
                </div>
                <div class="tab-pane" id="pa_logoutrules">
                    <?php include('patientarea/logoutrules.php') ?>
                </div>
                <div class="tab-pane" id="pa_prompts">
                    <?php include('patientarea/prompts.php') ?>
                </div>
                <div class="tab-pane" id="pa_emails">
                    <?php include('patientarea/emails.php') ?>
                </div>
                <div class="tab-pane" id="pa_password">
                    <?php include('patientarea/password.php') ?>
                </div>
                <div class="tab-pane" id="pa_emailupdate">
                    <?php include('patientarea/emailupdate.php') ?>
                </div>
                <div class="tab-pane" id="pa_emailclosed">
                    <?php include('patientarea/emailclosed.php') ?>
                </div>
                <div class="tab-pane" id="pa_needhelp">
                    <?php include('patientarea/accesshelp.php') ?>
                </div>
                <div class="tab-pane" id="pa_vault">
                    <?php include('patientarea/vault.php') ?>
                </div>
            </div>
        </div>
    </div>
</div>