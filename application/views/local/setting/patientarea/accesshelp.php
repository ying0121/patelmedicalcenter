
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
    <!-- Invalid Value -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Invalid</h3>
            <div id="pa_ah_invalid_en" class="pa_ah_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Inválido</h3>
            <div id="pa_ah_invalid_sp" class="pa_ah_summernote"></div>
        </div>
    </div>
    <!-- Access Help -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Access Help</h3>
            <div id="pa_ah_help_en" class="pa_ah_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Acceso Ayuda</h3>
            <div id="pa_ah_help_sp" class="pa_ah_summernote"></div>
        </div>
    </div>
    <!-- Header Question -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Header Question</h3>
            <div id="pa_ah_hques_en" class="pa_ah_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Pregunta de encabezado</h3>
            <div id="pa_ah_hques_sp" class="pa_ah_summernote"></div>
        </div>
    </div>
    <!-- Forgot Account -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Forgot Account</h3>
            <div id="pa_ah_facc_en" class="pa_ah_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Olvidé mi cuenta</h3>
            <div id="pa_ah_facc_sp" class="pa_ah_summernote"></div>
        </div>
    </div>
    <!-- Forgot Password -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Forgot Password</h3>
            <div id="pa_ah_fpwd_en" class="pa_ah_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Has olvidado tu contraseña</h3>
            <div id="pa_ah_fpwd_sp" class="pa_ah_summernote"></div>
        </div>
    </div>
    <!-- Description -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Description</h3>
            <div id="pa_ah_desc_en" class="pa_ah_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Descripción</h3>
            <div id="pa_ah_desc_sp" class="pa_ah_summernote"></div>
        </div>
    </div>
    <!-- Repassword Header -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Repassword Header</h3>
            <div id="pa_ah_rpheader_en" class="pa_ah_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Encabezado de recontraseña</h3>
            <div id="pa_ah_rpheader_sp" class="pa_ah_summernote"></div>
        </div>
    </div>
    <!-- Footer Question -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Footer Question</h3>
            <div id="pa_ah_ques_en" class="pa_ah_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Pregunta de pie de página</h3>
            <div id="pa_ah_ques_sp" class="pa_ah_summernote"></div>
        </div>
    </div>
    <div class="col-12">
        <hr class="my-6" />
    </div>
    <!-- Success Alert -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Success Alert</h3>
            <div id="pa_ah_alert_success_en" class="pa_ah_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Alerta de éxito</h3>
            <div id="pa_ah_alert_success_sp" class="pa_ah_summernote"></div>
        </div>
    </div>
    <!-- Failed Alert -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Failed Alert</h3>
            <div id="pa_ah_alert_failed_en" class="pa_ah_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Alerta fallida</h3>
            <div id="pa_ah_alert_failed_sp" class="pa_ah_summernote"></div>
        </div>
    </div>
    <!-- Not Exited Alert -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Not Existed Alert</h3>
            <div id="pa_ah_alert_notexisted_en" class="pa_ah_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Alerta No Existía</h3>
            <div id="pa_ah_alert_notexisted_sp" class="pa_ah_summernote"></div>
        </div>
    </div>

    <div class="col-12 text-right">
        <button id="pa_ah_update" class="btn btn-light-primary">Update</button>
    </div>
</div>

<script>
    $(document).ready(async () => {
        $('.pa_ah_summernote').summernote({
            tabsize: 1,
            height: 100,
        })

        $.ajax({
            url: '<?php echo base_url() ?>local/Setting/readNeedHelpContent',
            method: 'POST',
            data: {},
            dataType: 'text',
            success: function(data) {
                let result = JSON.parse(data)['data'];
                if (result) {
                    $('#pa_ah_invalid_en').summernote('code', result.en.t_pa_ah_invalid)
                    $('#pa_ah_invalid_sp').summernote('code', result.es.t_pa_ah_invalid)
                    $('#pa_ah_help_en').summernote('code', result.en.t_pa_ah_help)
                    $('#pa_ah_help_sp').summernote('code', result.es.t_pa_ah_help)
                    $('#pa_ah_hques_en').summernote('code', result.en.t_pa_ah_hques)
                    $('#pa_ah_hques_sp').summernote('code', result.es.t_pa_ah_hques)
                    $('#pa_ah_facc_en').summernote('code', result.en.t_pa_ah_facc)
                    $('#pa_ah_facc_sp').summernote('code', result.es.t_pa_ah_facc)
                    $('#pa_ah_fpwd_en').summernote('code', result.en.t_pa_ah_fpwd)
                    $('#pa_ah_fpwd_sp').summernote('code', result.es.t_pa_ah_fpwd)
                    $('#pa_ah_desc_en').summernote('code', result.en.t_pa_ah_desc)
                    $('#pa_ah_desc_sp').summernote('code', result.es.t_pa_ah_desc)
                    $('#pa_ah_rpheader_en').summernote('code', result.en.t_pa_ah_rpheader)
                    $('#pa_ah_rpheader_sp').summernote('code', result.es.t_pa_ah_rpheader)
                    $('#pa_ah_ques_en').summernote('code', result.en.t_pa_ah_ques)
                    $('#pa_ah_ques_sp').summernote('code', result.es.t_pa_ah_ques)
                    $('#pa_ah_alert_success_en').summernote('code', result.en.t_pa_ah_alert_success)
                    $('#pa_ah_alert_success_sp').summernote('code', result.es.t_pa_ah_alert_success)
                    $('#pa_ah_alert_failed_en').summernote('code', result.en.t_pa_ah_alert_failed)
                    $('#pa_ah_alert_failed_sp').summernote('code', result.es.t_pa_ah_alert_failed)
                    $('#pa_ah_alert_notexisted_en').summernote('code', result.en.t_pa_ah_alert_notexisted)
                    $('#pa_ah_alert_notexisted_sp').summernote('code', result.es.t_pa_ah_alert_notexisted)
                }
            }
        })

        $('#pa_ah_update').click(function() {
            $.ajax({
                url: '<?php echo base_url() ?>local/Setting/updateNeedHelpContent',
                method: "POST",
                data: {
                    pa_ah_invalid_en: $('#pa_ah_invalid_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ah_invalid_sp: $('#pa_ah_invalid_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_ah_help_en: $('#pa_ah_help_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ah_help_sp: $('#pa_ah_help_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_ah_hques_en: $('#pa_ah_hques_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ah_hques_sp: $('#pa_ah_hques_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_ah_facc_en: $('#pa_ah_facc_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ah_facc_sp: $('#pa_ah_facc_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_ah_fpwd_en: $('#pa_ah_fpwd_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ah_fpwd_sp: $('#pa_ah_fpwd_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_ah_desc_en: $('#pa_ah_desc_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ah_desc_sp: $('#pa_ah_desc_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_ah_rpheader_en: $('#pa_ah_rpheader_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ah_rpheader_sp: $('#pa_ah_rpheader_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_ah_ques_en: $('#pa_ah_ques_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ah_ques_sp: $('#pa_ah_ques_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_ah_alert_success_en: $('#pa_ah_alert_success_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ah_alert_success_sp: $('#pa_ah_alert_success_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_ah_alert_failed_en: $('#pa_ah_alert_failed_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ah_alert_failed_sp: $('#pa_ah_alert_failed_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_ah_alert_notexisted_en: $('#pa_ah_alert_notexisted_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ah_alert_notexisted_sp: $('#pa_ah_alert_notexisted_sp').summernote('code').replace(/<[^>]*>/g, ''),
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
