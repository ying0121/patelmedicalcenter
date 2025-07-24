
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
    <!-- Login Footer -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Login Footer</h3>
            <div id="pa_pr_footer_en" class="pa_pr_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Pie de Iniciar Sesión</h3>
            <div id="pa_pr_footer_sp" class="pa_pr_summernote"></div>
        </div>
    </div>
    <!-- Security Question -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Security Question</h3>
            <div id="pa_pr_security_en" class="pa_pr_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Pregunta de seguridad</h3>
            <div id="pa_pr_security_sp" class="pa_pr_summernote"></div>
        </div>
    </div>
    <!-- Sign In Help -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Sign In Help</h3>
            <div id="pa_pr_sihelp_en" class="pa_pr_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Ayuda para iniciar sesión</h3>
            <div id="pa_pr_sihelp_sp" class="pa_pr_summernote"></div>
        </div>
    </div>

    <div class="col-12 text-right">
        <button id="pa_pr_update" class="btn btn-light-primary">Update</button>
    </div>
</div>

<script>
    $(document).ready(async () => {
        $('.pa_pr_summernote').summernote({
            tabsize: 1,
            height: 100,
        })

        $.ajax({
            url: '<?php echo base_url() ?>local/Setting/readPromptsContent',
            method: 'POST',
            data: {},
            dataType: 'text',
            success: function(data) {
                let result = JSON.parse(data)['data'];
                if (result) {
                    $('#pa_pr_footer_en').summernote('code', result.en.t_pa_pr_footer)
                    $('#pa_pr_footer_sp').summernote('code', result.es.t_pa_pr_footer)
                    $('#pa_pr_security_en').summernote('code', result.en.t_pa_pr_security)
                    $('#pa_pr_security_sp').summernote('code', result.es.t_pa_pr_security)
                    $('#pa_pr_sihelp_en').summernote('code', result.en.t_pa_pr_sihelp)
                    $('#pa_pr_sihelp_sp').summernote('code', result.es.t_pa_pr_sihelp)
                }
            }
        })

        $('#pa_pr_update').click(function() {
            $.ajax({
                url: '<?php echo base_url() ?>local/Setting/updatePromptsContent',
                method: "POST",
                data: {
                    pa_pr_footer_en: $('#pa_pr_footer_en').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_pr_footer_sp: $('#pa_pr_footer_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_pr_security_en: $('#pa_pr_security_en').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_pr_security_sp: $('#pa_pr_security_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_pr_sihelp_en: $('#pa_pr_sihelp_en').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_pr_sihelp_sp: $('#pa_pr_sihelp_sp').summernote('code').replace(/<[^>]*>/g, ''),
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
