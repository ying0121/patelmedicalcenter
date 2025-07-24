
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
    <!-- Welcome -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Welcome</h3>
            <div id="pa_si_welcome_en" class="pa_si_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Bienvenida</h3>
            <div id="pa_si_welcome_sp" class="pa_si_summernote"></div>
        </div>
    </div>
    <!-- Sign In -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Sign In</h3>
            <div id="pa_si_signin_en" class="pa_si_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Iniciar sesión</h3>
            <div id="pa_si_signin_sp" class="pa_si_summernote"></div>
        </div>
    </div>
    <!-- Form Text -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Form Text</h3>
            <div id="pa_si_formtext_en" class="pa_si_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Texto del formulario</h3>
            <div id="pa_si_formtext_sp" class="pa_si_summernote"></div>
        </div>
    </div>

    <div class="col-12 text-right">
        <button id="pa_si_update" class="btn btn-light-primary">Update</button>
    </div>
</div>

<script>
    $(document).ready(async () => {
        $('.pa_si_summernote').summernote({
            tabsize: 1,
            height: 100,
        })

        $.ajax({
            url: '<?php echo base_url() ?>local/Setting/readSignInContent',
            method: 'POST',
            data: {},
            dataType: 'text',
            success: function(data) {
                let result = JSON.parse(data)['data'];
                if (result) {
                    $('#pa_si_welcome_en').summernote('code', result.en.t_pa_si_welcome)
                    $('#pa_si_welcome_sp').summernote('code', result.es.t_pa_si_welcome)
                    $('#pa_si_signin_en').summernote('code', result.en.t_pa_si_signin)
                    $('#pa_si_signin_sp').summernote('code', result.es.t_pa_si_signin)
                    $('#pa_si_formtext_en').summernote('code', result.en.t_pa_si_formtext)
                    $('#pa_si_formtext_sp').summernote('code', result.es.t_pa_si_formtext)
                }
            }
        })

        $('#pa_si_update').click(function() {
            $.ajax({
                url: '<?php echo base_url() ?>local/Setting/updateSignInContent',
                method: "POST",
                data: {
                    pa_si_welcome_en: $('#pa_si_welcome_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_si_welcome_sp: $('#pa_si_welcome_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_si_signin_en: $('#pa_si_signin_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_si_signin_sp: $('#pa_si_signin_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_si_formtext_en: $('#pa_si_formtext_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_si_formtext_sp: $('#pa_si_formtext_sp').summernote('code').replace(/<[^>]*>/g, ''),
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
