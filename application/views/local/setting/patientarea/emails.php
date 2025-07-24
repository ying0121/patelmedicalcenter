
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
    <!-- Subject -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Subject</h3>
            <div id="pa_ea_subject_en" class="pa_ea_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Sujeto</h3>
            <div id="pa_ea_subject_sp" class="pa_ea_summernote"></div>
        </div>
    </div>
    <!-- Email Text -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Email Text</h3>
            <div id="pa_ea_email_text_en" class="pa_ea_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Email Texto</h3>
            <div id="pa_ea_email_text_sp" class="pa_ea_summernote"></div>
        </div>
    </div>
    <!-- Link -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Link</h3>
            <div id="pa_ea_link_en" class="pa_ea_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Enlace</h3>
            <div id="pa_ea_link_sp" class="pa_ea_summernote"></div>
        </div>
    </div>
    <!-- Disclaimer -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Disclaimer</h3>
            <div id="pa_ea_disclaimer_en" class="pa_ea_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Descargo de responsabilidad</h3>
            <div id="pa_ea_disclaimer_sp" class="pa_ea_summernote"></div>
        </div>
    </div>

    <div class="col-12 text-right">
        <button id="pa_ea_update" class="btn btn-light-primary">Update</button>
    </div>
</div>

<script>
    $(document).ready(async () => {
        $('.pa_ea_summernote').summernote({
            tabsize: 1,
            height: 100,
        })

        $.ajax({
            url: '<?php echo base_url() ?>local/Setting/readEmailAccountContent',
            method: 'POST',
            data: {},
            dataType: 'text',
            success: function(data) {
                let result = JSON.parse(data)['data'];
                if (result) {
                    $('#pa_ea_email_text_en').summernote('code', result.en.t_pa_ea_email_text)
                    $('#pa_ea_email_text_sp').summernote('code', result.es.t_pa_ea_email_text)
                    $('#pa_ea_link_en').summernote('code', result.en.t_pa_ea_link)
                    $('#pa_ea_link_sp').summernote('code', result.es.t_pa_ea_link)
                    $('#pa_ea_subject_en').summernote('code', result.en.t_pa_ea_subject)
                    $('#pa_ea_subject_sp').summernote('code', result.es.t_pa_ea_subject)
                    $('#pa_ea_disclaimer_en').summernote('code', result.en.t_pa_ea_disclaimer)
                    $('#pa_ea_disclaimer_sp').summernote('code', result.es.t_pa_ea_disclaimer)
                }
            }
        })

        $('#pa_ea_update').click(function() {
            $.ajax({
                url: '<?php echo base_url() ?>local/Setting/updateEmailAccountContent',
                method: "POST",
                data: {
                    pa_ea_email_text_en: $('#pa_ea_email_text_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ea_email_text_sp: $('#pa_ea_email_text_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_ea_link_en: $('#pa_ea_link_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ea_link_sp: $('#pa_ea_link_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_ea_subject_en: $('#pa_ea_subject_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ea_subject_sp: $('#pa_ea_subject_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_ea_disclaimer_en: $('#pa_ea_disclaimer_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ea_disclaimer_sp: $('#pa_ea_disclaimer_sp').summernote('code').replace(/<[^>]*>/g, ''),
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
