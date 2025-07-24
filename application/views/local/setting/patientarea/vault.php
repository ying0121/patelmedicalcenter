<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-6 mt-10">
        <h1 class="mb-3">English</h1>
    </div>
    <div class="col-6 mt-10">
        <h1 class="mb-3">Español</h1>
    </div>
    <div class="col-12">
        <hr class="my-5" />
    </div>
    <!-- Welcome -->
    <div class="col-6">
        <div class="form-group">
            <h3 class="mx-5">Welcome</h3>
            <div id="pa_v_welcome_en" class="pa_v_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <h3 class="mx-5">Bienvenido</h3>
            <div id="pa_v_welcome_sp" class="pa_v_summernote"></div>
        </div>
    </div>
    <!-- Description -->
    <div class="col-6">
        <div class="form-group">
            <h3 class="mx-5">Description</h3>
            <div id="pa_v_desc_en" class="pa_v_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <h3 class="mx-5">Descripción</h3>
            <div id="pa_v_desc_sp" class="pa_v_summernote"></div>
        </div>
    </div>
    <!-- Header Text -->
    <div class="col-6">
        <div class="form-group">
            <h3 class="mx-5">Patient Area Description</h3>
            <div id="pa_v_htext_en" class="pa_v_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <h3 class="mx-5">Area del Paciente Descripción</h3>
            <div id="pa_v_htext_sp" class="pa_v_summernote"></div>
        </div>
    </div>

    <div class="col-12">
        <hr class="my-6" />
    </div>
    <!-- Alert Success -->
    <div class="col-6">
        <div class="form-group">
            <h3 class="mx-5"> Alert Success</h3>
            <div id="pa_v_alert_success_en" class="pa_v_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <h3 class="mx-5">Alerta de éxito</h3>
            <div id="pa_v_alert_success_sp" class="pa_v_summernote"></div>
        </div>
    </div>
    <!-- Alert Failed -->
    <div class="col-6">
        <div class="form-group">
            <h3 class="mx-5">Alert Failed</h3>
            <div id="pa_v_alert_failed_en" class="pa_v_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <h3 class="mx-5">Alerta fallida</h3>
            <div id="pa_v_alert_failed_sp" class="pa_v_summernote"></div>
        </div>
    </div>

    <div class="col-12 text-right">
        <button id="pa_v_update" class="btn btn-light-primary">Update</button>
    </div>
</div>

<script>
    $(document).ready(async () => {
        $('.pa_v_summernote').summernote({
            tabsize: 1,
            height: 100,
        })

        $.ajax({
            url: '<?php echo base_url() ?>local/Setting/readVaultContent',
            method: 'POST',
            data: {},
            dataType: 'text',
            success: function(data) {
                let result = JSON.parse(data)['data'];
                if (result) {
                    $('#pa_v_welcome_en').summernote('code', result.en.t_pa_v_welcome)
                    $('#pa_v_welcome_sp').summernote('code', result.es.t_pa_v_welcome)
                    $('#pa_v_desc_en').summernote('code', result.en.t_pa_v_desc)
                    $('#pa_v_desc_sp').summernote('code', result.es.t_pa_v_desc)
                    $('#pa_v_htext_en').summernote('code', result.en.t_pa_v_htext)
                    $('#pa_v_htext_sp').summernote('code', result.es.t_pa_v_htext)
                    $('#pa_v_alert_success_en').summernote('code', result.en.t_pa_v_alert_success)
                    $('#pa_v_alert_success_sp').summernote('code', result.es.t_pa_v_alert_success)
                    $('#pa_v_alert_failed_en').summernote('code', result.en.t_pa_v_alert_failed)
                    $('#pa_v_alert_failed_sp').summernote('code', result.es.t_pa_v_alert_failed)
                }
            }
        })

        $('#pa_v_update').click(function() {
            $.ajax({
                url: '<?php echo base_url() ?>local/Setting/updateVaultContent',
                method: "POST",
                data: {
                    pa_v_welcome_en: $('#pa_v_welcome_en').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_v_welcome_sp: $('#pa_v_welcome_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_v_desc_en: $('#pa_v_desc_en').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_v_desc_sp: $('#pa_v_desc_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_v_htext_en: $('#pa_v_htext_en').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_v_htext_sp: $('#pa_v_htext_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_v_alert_success_en: $('#pa_v_alert_success_en').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_v_alert_success_sp: $('#pa_v_alert_success_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_v_alert_failed_en: $('#pa_v_alert_failed_en').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_v_alert_failed_sp: $('#pa_v_alert_failed_sp').summernote('code').replace(/<[^>]*>/g, ''),
                },
                dataType: "text",
                success: function(data) {
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