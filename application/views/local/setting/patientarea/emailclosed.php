
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
            <div id="pa_ec_subject_en" class="pa_ec_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Sujeto</h3>
            <div id="pa_ec_subject_sp" class="pa_ec_summernote"></div>
        </div>
    </div>
    
    <div class="col-12">
        <hr class="my-6" />
    </div>
    <!-- Closed Text -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Closed Text</h3>
            <div id="pa_ec_etext_en" class="pa_ec_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Texto cerrado</h3>
            <div id="pa_ec_etext_sp" class="pa_ec_summernote"></div>
        </div>
    </div>

    <div class="col-12 text-right">
        <button id="pa_ec_update" class="btn btn-light-primary">Update</button>
    </div>
</div>

<script>
    $(document).ready(async () => {
        $('.pa_ec_summernote').summernote({
            tabsize: 1,
            height: 100,
        })

        $.ajax({
            url: '<?php echo base_url() ?>local/Setting/readEmailCloseContent',
            method: 'POST',
            data: {},
            dataType: 'text',
            success: function(data) {
                let result = JSON.parse(data)['data'];
                if (result) {
                    $('#pa_ec_subject_en').summernote('code', result.en.t_pa_ec_subject)
                    $('#pa_ec_subject_sp').summernote('code', result.es.t_pa_ec_subject)
                    $('#pa_ec_etext_en').summernote('code', result.en.t_pa_ec_etext)
                    $('#pa_ec_etext_sp').summernote('code', result.es.t_pa_ec_etext)
                }
            }
        })

        $('#pa_ec_update').click(function() {
            $.ajax({
                url: '<?php echo base_url() ?>local/Setting/updateEmailCloseContent',
                method: "POST",
                data: {
                    pa_ec_subject_en: $('#pa_ec_subject_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ec_subject_sp: $('#pa_ec_subject_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_ec_etext_en: $('#pa_ec_etext_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ec_etext_sp: $('#pa_ec_etext_sp').summernote('code').replace(/<[^>]*>/g, ''),
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
