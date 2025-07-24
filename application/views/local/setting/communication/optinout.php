
<div class = "row my-3 p-10 bg-white border rounded">
    <div class = "col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <div><h3>Contact Opt in & out</h3></div>
        <input type="hidden" id="chosen_id" />
    </div>
    <div class="col-md-2 form-check">
        <input class="form-check-input" type="radio" name="contact_optin_out" id="contact_optinout_email" checked>
        <label class="form-check-label" for="contact_optinout_email">Email</label>
    </div>
    <div class="col-md-2 form-check">
        <input class="form-check-input" type="radio" name="contact_optin_out" id="contact_optinout_sms">
        <label class="form-check-label" for="contact_optinout_sms">SMS</label>
    </div>
    <div class="col-md-2 form-check">
        <input class="form-check-input" type="radio" name="contact_optin_out" id="contact_optinout_whatsapp">
        <label class="form-check-label" for="contact_optinout_whatsapp">Whatsapp</label>
    </div>
    <div class="col-md-2 form-check">
        <input class="form-check-input" type="radio" name="contact_optin_out" id="contact_optinout_social">
        <label class="form-check-label" for="contact_optinout_social">Social Media</label>
    </div>
    <div class="col-md-2 form-check">
        <input class="form-check-input" type="radio" name="contact_optin_out" id="contact_optinout_all">
        <label class="form-check-label" for="contact_optinout_all">All</label>
    </div>
    <div class="col-6 mt-10">
        <h1 class="mb-3">English</h1>
    </div>
    <div class="col-6 mt-10">
        <h1 class="mb-3">Español</h1>
    </div>
    <div class="col-12">
        <hr class="my-5" />
    </div>
    <!-- Header Text -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Header Text</h3>
            <div id="opt_header_en" class="opt_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Texto del encabezado</h3>
            <div id="opt_header_sp" class="opt_summernote"></div>
        </div>
    </div>
    <!-- Opt In -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Opt In</h3>
            <div id="opt_in_en" class="opt_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Optar por participar</h3>
            <div id="opt_in_sp" class="opt_summernote"></div>
        </div>
    </div>
    <!-- Opt Out -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Opt Out</h3>
            <div id="opt_out_en" class="opt_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Optar por no participar</h3>
            <div id="opt_out_sp" class="opt_summernote"></div>
        </div>
    </div>
    <!-- Footer Text -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Footer Text</h3>
            <div id="opt_footer_en" class="opt_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Texto de pie de página</h3>
            <div id="opt_footer_sp" class="opt_summernote"></div>
        </div>
    </div>
    <!-- More Info -->
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">More Info</h3>
            <div id="opt_more_en" class="opt_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class = "form-group">
            <h3 class="mx-5">Más informacióna</h3>
            <div id="opt_more_sp" class="opt_summernote"></div>
        </div>
    </div>

    <div class="col-12 text-right">
        <button id="opt_in_out_update" class="btn btn-light-primary">Update</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.opt_summernote').summernote({
            tabsize: 1,
            height: 100,
        });

        $.ajax({
            url: '<?php echo base_url() ?>local/OptInOut/read',
            method: 'POST',
            data: {},
            dataType: 'text',
            success: function(data) {
                let result = JSON.parse(data)['data'];
                if (result) {
                    $('#opt_header_en').summernote('code', result.en.t_opt_in_out_header);
                    $('#opt_header_sp').summernote('code', result.es.t_opt_in_out_header);
                    $('#opt_in_en').summernote('code', result.en.t_opt_in_out_in);
                    $('#opt_in_sp').summernote('code', result.es.t_opt_in_out_in);
                    $('#opt_out_en').summernote('code', result.en.t_opt_in_out_out);
                    $('#opt_out_sp').summernote('code', result.es.t_opt_in_out_out);
                    $('#opt_footer_en').summernote('code', result.en.t_opt_in_out_footer);
                    $('#opt_footer_sp').summernote('code', result.es.t_opt_in_out_footer);
                    $('#opt_more_en').summernote('code', result.en.t_opt_in_out_more);
                    $('#opt_more_sp').summernote('code', result.es.t_opt_in_out_more);
                }
            }
        });

        $('#opt_in_out_update').click(function() {
            $.ajax({
                url: '<?php echo base_url() ?>local/OptInOut/updateOptInOutText',
                method: "POST",
                data: {
                    opt_header_en: $('#opt_header_en').summernote('code'), 
                    opt_header_sp: $('#opt_header_sp').summernote('code'),
                    opt_in_en: $('#opt_in_en').summernote('code'), 
                    opt_in_sp: $('#opt_in_sp').summernote('code'),
                    opt_out_en: $('#opt_out_en').summernote('code'), 
                    opt_out_sp: $('#opt_out_sp').summernote('code'),
                    opt_footer_en: $('#opt_footer_en').summernote('code'), 
                    opt_footer_sp: $('#opt_footer_sp').summernote('code'),
                    opt_more_en: $('#opt_more_en').summernote('code'), 
                    opt_more_sp: $('#opt_more_sp').summernote('code'),
                },
                dataType: "text",
                success: function (data) {
                    let result = JSON.parse(data);
                    if (result.status == 'success') {
                        toastr.success('Action Success!');
                    } else {
                        toastr.error('Action Failed!');
                    }
                }
            });
        });
    })
</script>
