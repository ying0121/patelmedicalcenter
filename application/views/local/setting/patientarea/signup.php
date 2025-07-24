
<div class = "row my-3 p-10 bg-white border rounded">
    <div class="col-6 mt-10">
        <h1 class="mb-3">English</h1>
    </div>
    <div class="col-6 mt-10">
        <h1 class="mb-3">Español</h1>
    </div>
    <div class="col-12">
        <hr class="my-5" />
    </div>
    <!-- Active Account -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Active Account</h3>
            <div id="pa_su_account_en" class="pa_su_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Cuenta activa</h3>
            <div id="pa_su_account_sp" class="pa_su_summernote"></div>
        </div>
    </div>
    <!-- Sign Up -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Sign Up</h3>
            <div id="pa_su_signup_en" class="pa_su_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Inscribirse</h3>
            <div id="pa_su_signup_sp" class="pa_su_summernote"></div>
        </div>
    </div>
    <!-- Send -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Send</h3>
            <div id="pa_su_send_en" class="pa_su_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Enviar</h3>
            <div id="pa_su_send_sp" class="pa_su_summernote"></div>
        </div>
    </div>
    <!-- Email Header -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Sign up Request</h3>
            <div id="pa_su_eheader_en" class="pa_su_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Solicitud de Registro</h3>
            <div id="pa_su_eheader_sp" class="pa_su_summernote"></div>
        </div>
    </div>
    <div class="col-12">
        <hr class="my-6" />
    </div>
    <!-- Success Alert -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Success Alert</h3>
            <div id="pa_su_alert_success_en" class="pa_su_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Alerta de éxito</h3>
            <div id="pa_su_alert_success_sp" class="pa_su_summernote"></div>
        </div>
    </div>
    <!-- Failed Alert -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Failed Alert</h3>
            <div id="pa_su_alert_failed_en" class="pa_su_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Alerta fallida</h3>
            <div id="pa_su_alert_failed_sp" class="pa_su_summernote"></div>
        </div>
    </div>
    <!-- Existed Alert -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Existed Alert</h3>
            <div id="pa_su_alert_exist_en" class="pa_su_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Alerta existente</h3>
            <div id="pa_su_alert_exist_sp" class="pa_su_summernote"></div>
        </div>
    </div>

    <div class="col-12 text-right">
        <button id="pa_su_update" class="btn btn-light-primary">Update</button>
    </div>
</div>

<script>
    $(document).ready(async () => {
        $('.pa_su_summernote').summernote({
            tabsize: 1,
            height: 100,
        })

        $.ajax({
            url: '<?php echo base_url() ?>local/Setting/readSignUpContent',
            method: 'POST',
            data: {},
            dataType: 'text',
            success: function(data) {
                let result = JSON.parse(data)['data'];
                if (result) {
                    $('#pa_su_account_en').summernote('code', result.en.t_pa_su_account)
                    $('#pa_su_account_sp').summernote('code', result.es.t_pa_su_account)
                    $('#pa_su_signup_en').summernote('code', result.en.t_pa_su_signup)
                    $('#pa_su_signup_sp').summernote('code', result.es.t_pa_su_signup)
                    $('#pa_su_send_en').summernote('code', result.en.t_pa_su_send)
                    $('#pa_su_send_sp').summernote('code', result.es.t_pa_su_send)
                    $('#pa_su_eheader_en').summernote('code', result.en.t_pa_su_eheader)
                    $('#pa_su_eheader_sp').summernote('code', result.es.t_pa_su_eheader)
                    $('#pa_su_alert_success_en').summernote('code', result.en.t_pa_su_alert_success)
                    $('#pa_su_alert_success_sp').summernote('code', result.es.t_pa_su_alert_success)
                    $('#pa_su_alert_failed_en').summernote('code', result.en.t_pa_su_alert_failed)
                    $('#pa_su_alert_failed_sp').summernote('code', result.es.t_pa_su_alert_failed)
                    $('#pa_su_alert_exist_en').summernote('code', result.en.t_pa_su_alert_exist)
                    $('#pa_su_alert_exist_sp').summernote('code', result.es.t_pa_su_alert_exist)
                }
            }
        })

        $('#pa_su_update').click(function() {
            $.ajax({
                url: '<?php echo base_url() ?>local/Setting/updateSignUpContent',
                method: "POST",
                data: {
                    pa_su_account_en: $('#pa_su_account_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_su_account_sp: $('#pa_su_account_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_su_signup_en: $('#pa_su_signup_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_su_signup_sp: $('#pa_su_signup_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_su_send_en: $('#pa_su_send_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_su_send_sp: $('#pa_su_send_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_su_eheader_en: $('#pa_su_eheader_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_su_eheader_sp: $('#pa_su_eheader_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_su_alert_success_en: $('#pa_su_alert_success_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_su_alert_success_sp: $('#pa_su_alert_success_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_su_alert_failed_en: $('#pa_su_alert_failed_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_su_alert_failed_sp: $('#pa_su_alert_failed_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_su_alert_exist_en: $('#pa_su_alert_exist_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_su_alert_exist_sp: $('#pa_su_alert_exist_sp').summernote('code').replace(/<[^>]*>/g, ''),
                },
                dataType: "text",
                success: function (data) {
                    let result = JSON.parse(data)
                    if (result.status == 'success') {
                        toastr.success('Action Success!')
                    } else {
                        toastr.error('Action Failed!')
                    }
                }
            })
        })
    })
</script>
