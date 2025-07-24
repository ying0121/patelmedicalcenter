
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
            <div id="pa_ep_subject_en" class="pa_ep_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Sujeto</h3>
            <div id="pa_ep_subject_sp" class="pa_ep_summernote"></div>
        </div>
    </div>
    <!-- Email Text -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Email Text</h3>
            <div id="pa_ep_emailtext_en" class="pa_ep_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Email Texto</h3>
            <div id="pa_ep_emailtext_sp" class="pa_ep_summernote"></div>
        </div>
    </div>
    <!-- Link Time -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Link Time</h3>
            <div id="pa_ep_linktime_en" class="pa_ep_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Enlace Tiempo</h3>
            <div id="pa_ep_linktime_sp" class="pa_ep_summernote"></div>
        </div>
    </div>
    <!-- Not Existed -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Not Existed</h3>
            <div id="pa_ep_notexisted_en" class="pa_ep_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">No existía</h3>
            <div id="pa_ep_notexisted_sp" class="pa_ep_summernote"></div>
        </div>
    </div>
    <div class="col-12">
        <hr class="my-6" />
    </div>
    <!-- Success Alert -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Success Alert</h3>
            <div id="pa_ep_alert_success_en" class="pa_ep_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Alerta de éxito</h3>
            <div id="pa_ep_alert_success_sp" class="pa_ep_summernote"></div>
        </div>
    </div>

    <div class="col-12 text-right">
        <button id="pa_ep_update" class="btn btn-light-primary">Update</button>
    </div>
</div>

<script>
    $(document).ready(async () => {
        $('.pa_ep_summernote').summernote({
            tabsize: 1,
            height: 100,
        })

        $.ajax({
            url: '<?php echo base_url() ?>local/Setting/readEmailPasswordContent',
            method: 'POST',
            data: {},
            dataType: 'text',
            success: function(data) {
                let result = JSON.parse(data)['data'];
                if (result) {
                    $('#pa_ep_subject_en').summernote('code', result.en.t_pa_ep_subject)
                    $('#pa_ep_subject_sp').summernote('code', result.es.t_pa_ep_subject)
                    $('#pa_ep_emailtext_en').summernote('code', result.en.t_pa_ep_emailtext)
                    $('#pa_ep_emailtext_sp').summernote('code', result.es.t_pa_ep_emailtext)
                    $('#pa_ep_linktime_en').summernote('code', result.en.t_pa_ep_linktime)
                    $('#pa_ep_linktime_sp').summernote('code', result.es.t_pa_ep_linktime)
                    $('#pa_ep_notexisted_en').summernote('code', result.en.t_pa_ep_notexisted)
                    $('#pa_ep_notexisted_sp').summernote('code', result.es.t_pa_ep_notexisted)
                    $('#pa_ep_alert_success_en').summernote('code', result.en.t_pa_ep_alert_success)
                    $('#pa_ep_alert_success_sp').summernote('code', result.es.t_pa_ep_alert_success)
                }
            }
        })

        $('#pa_ep_update').click(function() {
            $.ajax({
                url: '<?php echo base_url() ?>local/Setting/updateEmailPasswordContent',
                method: "POST",
                data: {
                    pa_ep_subject_en: $('#pa_ep_subject_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ep_subject_sp: $('#pa_ep_subject_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_ep_emailtext_en: $('#pa_ep_emailtext_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ep_emailtext_sp: $('#pa_ep_emailtext_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_ep_linktime_en: $('#pa_ep_linktime_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ep_linktime_sp: $('#pa_ep_linktime_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_ep_notexisted_en: $('#pa_ep_notexisted_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ep_notexisted_sp: $('#pa_ep_notexisted_sp').summernote('code').replace(/<[^>]*>/g, ''),
                    pa_ep_alert_success_en: $('#pa_ep_alert_success_en').summernote('code').replace(/<[^>]*>/g, ''), 
                    pa_ep_alert_success_sp: $('#pa_ep_alert_success_sp').summernote('code').replace(/<[^>]*>/g, ''),
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
