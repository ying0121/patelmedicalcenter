
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
    <!-- Login Failed -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Login Failed</h3>
            <div id="pa_lf_failed_en" class="pa_lf_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Error de inicio de sesion</h3>
            <div id="pa_lf_failed_sp" class="pa_lf_summernote"></div>
        </div>
    </div>
    <!-- Invalid -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Invalid</h3>
            <div id="pa_lf_invalid_en" class="pa_lf_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Inválida</h3>
            <div id="pa_lf_invalid_sp" class="pa_lf_summernote"></div>
        </div>
    </div>
    <!-- Text -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Text</h3>
            <div id="pa_lf_text_en" class="pa_lf_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Texto</h3>
            <div id="pa_lf_text_sp" class="pa_lf_summernote"></div>
        </div>
    </div>
    <!-- Inactived -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Inactive</h3>
            <div id="pa_lf_inactive_en" class="pa_lf_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Inactivo</h3>
            <div id="pa_lf_inactive_sp" class="pa_lf_summernote"></div>
        </div>
    </div>

    <div class="col-12 text-right">
        <button id="pa_lf_update" class="btn btn-light-primary">Update</button>
    </div>
</div>

<script>
    $(document).ready(async () => {
        $('.pa_lf_summernote').summernote({
            tabsize: 1,
            height: 100,
        })

        $.ajax({
            url: '<?php echo base_url() ?>local/Setting/readLoginFailedContent',
            method: 'POST',
            data: {},
            dataType: 'text',
            success: function(data) {
                let result = JSON.parse(data)['data'];
                if (result) {
                    $('#pa_lf_invalid_en').summernote('code', result.en.t_pa_lf_invalid)
                    $('#pa_lf_invalid_sp').summernote('code', result.es.t_pa_lf_invalid)
                    $('#pa_lf_text_en').summernote('code', result.en.t_pa_lf_text)
                    $('#pa_lf_text_sp').summernote('code', result.es.t_pa_lf_text)
                    $('#pa_lf_failed_en').summernote('code', result.en.t_pa_lf_failed)
                    $('#pa_lf_failed_sp').summernote('code', result.es.t_pa_lf_failed)
                    $('#pa_lf_inactive_en').summernote('code', result.en.t_pa_lf_inactive)
                    $('#pa_lf_inactive_sp').summernote('code', result.es.t_pa_lf_inactive)
                }
            }
        })

        $('#pa_lf_update').click(function() {
            $.ajax({
                url: '<?php echo base_url() ?>local/Setting/updateLoginFailedContent',
                method: "POST",
                data: {
                    pa_lf_invalid_en: $('#pa_lf_invalid_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_lf_invalid_sp: $('#pa_lf_invalid_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_lf_text_en: $('#pa_lf_text_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_lf_text_sp: $('#pa_lf_text_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_lf_failed_en: $('#pa_lf_failed_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_lf_failed_sp: $('#pa_lf_failed_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_lf_inactive_en: $('#pa_lf_inactive_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_lf_inactive_sp: $('#pa_lf_inactive_sp').summernote('code').replace(/<[^>]*>/g, ''),
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
