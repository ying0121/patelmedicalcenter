<div class="row m-3">
    <div class = "col-12 d-flex d-flex align-items-center justify-content-end">
        <div class = "mr-1">Show:</div>
        <div class = "d-flex align-items-center"><input type = "checkbox" id = "vault_toggle" style = "width:20px; height:20px;"></div>
    </div>
</div>
<div class = "row my-3 p-10 bg-white border rounded">
    <div class = "col-12 mb-2"><h3>Login Area</h3></div>
    <div class = "col-6">
        <div class = "form-group">
            <h6>Welcome(En)</h6>
            <input class="form-control" id="vault_title_en" type="text" value = "<?php echo $component['t_vault_title']['en']?>"/>
        </div>
        <div class = "form-group">
            <h6>Description(En)</h6>
            <textarea class="form-control" id="vault_desc_en" rows = "5"><?php echo $component['t_vault_desc']['en']?></textarea>
        </div>
    </div>
    <div class = "col-6">
        <div class = "form-group">
            <h6>Welcome(Es)</h6>
            <input class="form-control" id="vault_title_es" type="text" value = "<?php echo $component['t_vault_title']['es']?>"/>
        </div>
        <div class = "form-group">
            <h6>Description(Es)</h6>
            <textarea class="form-control" id = "vault_desc_es" rows = "5"><?php echo $component['t_vault_desc']['es']?></textarea>
        </div>
    </div>
    <div class="col-12 text-right">
        <button class="btn btn-light-primary pull-right" onclick = "updateVaultDesc();">Update</button>
    </div>
</div>

<div class = "row my-3 p-10 bg-white border rounded">
    <div class = "col-12 mb-2"><h3>Patient Area</h3></div>
    <div class = "col-6">
        <div class = "form-group">
            <h6>Title(En)</h6>
            <input class="form-control" id="login_title_en" type="text" value = "<?php echo $component['t_vault_login_title']['en']?>"/>
        </div>
        <div class = "form-group">
            <h6>Description(En)</h6>
            <textarea class="form-control" id="login_desc_en" rows = "5"><?php echo $component['t_vault_login_desc']['en']?></textarea>
        </div>
        <div class = "form-group">
            <h6>Footer(En)</h6>
            <textarea class="form-control" id="login_footer_en" rows = "5"><?php echo $component['t_vault_login_footer']['en']?></textarea>
        </div>
    </div>
    <div class = "col-6">
        <div class = "form-group">
            <h6>Title(Es)</h6>
            <input class="form-control" id="login_title_es" type="text" value = "<?php echo $component['t_vault_login_title']['es']?>"/>
        </div>
        <div class = "form-group">
            <h6>Description(Es)</h6>
            <textarea class="form-control" id = "login_desc_es" rows = "5"><?php echo $component['t_vault_login_desc']['es']?></textarea>
        </div>
        <div class = "form-group">
            <h6>Footer(Es)</h6>
            <textarea class="form-control" id="login_footer_es" rows = "5"><?php echo $component['t_vault_login_footer']['es']?></textarea>
        </div>
    </div>
    <div class="col-12 text-right">
        <button class="btn btn-light-primary pull-right" onclick = "updateLoginDesc();">Update</button>
    </div>
</div>

<script>
    function updateVaultDesc(){
        title_en = $("#vault_title_en").val();
        title_es = $("#vault_title_es").val();

        desc_en = $("#vault_desc_en").val();
        desc_es = $("#vault_desc_es").val();

        $.ajax({
            url: '<?php echo base_url() ?>local/Vault/updateVaultDesc',
            method: "POST",
            data: {title_en: title_en, title_es: title_es, desc_en: desc_en, desc_es: desc_es},
            dataType: "text",
            success: function (data) {
                handleResponse(data);
            }
        });
    }
    function updateLoginDesc(){
        title_en = $("#login_title_en").val();
        title_es = $("#login_title_es").val();

        desc_en = $("#login_desc_en").val();
        desc_es = $("#login_desc_es").val();

        footer_en = $("#login_footer_en").val();
        footer_es = $("#login_footer_es").val();

        $.ajax({
            url: '<?php echo base_url() ?>local/Vault/updateLoginDesc',
            method: "POST",
            data: {title_en: title_en, title_es: title_es, desc_en: desc_en, desc_es: desc_es, footer_en: footer_en, footer_es: footer_es},
            dataType: "text",
            success: function (data) {
                handleResponse(data);
            }
        });
    }
    $(document).ready(function(){
        handleAreaToggleBox('#vault_toggle', 'vault_area');
    });
</script>