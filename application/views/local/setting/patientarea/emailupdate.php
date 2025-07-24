
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
            <div id="pa_eu_subject_en" class="pa_eu_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Sujeto</h3>
            <div id="pa_eu_subject_sp" class="pa_eu_summernote"></div>
        </div>
    </div>
    
    <div class="col-12">
        <hr class="my-6" />
    </div>
    <!-- Updated Text -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Updated Text</h3>
            <div id="pa_eu_etext_en" class="pa_eu_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Texto actualizado</h3>
            <div id="pa_eu_etext_sp" class="pa_eu_summernote"></div>
        </div>
    </div>

    <div class="col-12 text-right">
        <button id="pa_eu_update" class="btn btn-light-primary">Update</button>
    </div>
</div>

<script>
    $(document).ready(async () => {
        $('.pa_eu_summernote').summernote({
            tabsize: 1,
            height: 100,
        })

        $.ajax({
            url: '<?php echo base_url() ?>local/Setting/readEmailUpdateContent',
            method: 'POST',
            data: {},
            dataType: 'text',
            success: function(data) {
                let result = JSON.parse(data)['data'];
                if (result) {
                    $('#pa_eu_subject_en').summernote('code', result.en.t_pa_eu_subject)
                    $('#pa_eu_subject_sp').summernote('code', result.es.t_pa_eu_subject)
                    $('#pa_eu_etext_en').summernote('code', result.en.t_pa_eu_etext)
                    $('#pa_eu_etext_sp').summernote('code', result.es.t_pa_eu_etext)
                }
            }
        })

        $('#pa_eu_update').click(function() {
            $.ajax({
                url: '<?php echo base_url() ?>local/Setting/updateEmailUpdateContent',
                method: "POST",
                data: {
                    pa_eu_subject_en: $('#pa_eu_subject_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_eu_subject_sp: $('#pa_eu_subject_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_eu_etext_en: $('#pa_eu_etext_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_eu_etext_sp: $('#pa_eu_etext_sp').summernote('code').replace(/<[^>]*>/g, ''),
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
