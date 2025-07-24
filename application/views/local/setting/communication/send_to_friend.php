<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <h3>Send To Friend</h3>
    </div>
    <!-- Subject -->
    <div class="col-6">
        <div class="form-group">
            <h3 class="mx-5">Subject</h3>
            <div id="sf_subject_en" class="sf_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <h3 class="mx-5">Sujeto</h3>
            <div id="sf_subject_es" class="sf_summernote"></div>
        </div>
    </div>
    <!-- Updated Text -->
    <div class="col-6">
        <div class="form-group">
            <h3 class="mx-5">Updated Text</h3>
            <div id="sf_updated_text_en" class="sf_summernote"></div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <h3 class="mx-5">Texto actualizado</h3>
            <div id="sf_updated_text_es" class="sf_summernote"></div>
        </div>
    </div>

    <div class="col-12 text-right">
        <button id="sf_update" class="btn btn-light-primary">Update</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.sf_summernote').summernote({
            tabsize: 1,
            height: 150,
        });

        $.ajax({
            url: '<?php echo base_url() ?>local/Setting/readSendToFriend',
            method: 'POST',
            data: {},
            dataType: 'text',
            success: function(data) {
                let result = JSON.parse(data)['data'];
                if (result) {
                    $('#sf_subject_en').summernote('code', result.en.t_sf_subject);
                    $('#sf_subject_es').summernote('code', result.es.t_sf_subject);
                    $('#sf_updated_text_en').summernote('code', result.en.t_sf_updated_text);
                    $('#sf_updated_text_es').summernote('code', result.es.t_sf_updated_text);
                }
            }
        });

        $('#sf_update').click(function() {
            $.ajax({
                url: '<?php echo base_url() ?>local/Setting/updateSendToFriend',
                method: "POST",
                data: {
                    sf_subject_en: $('#sf_subject_en').summernote('code').replace(/<[^>]*>/g, ''),
                    sf_subject_es: $('#sf_subject_es').summernote('code').replace(/<[^>]*>/g, ''),
                    sf_updated_text_en: $('#sf_updated_text_en').summernote('code'),
                    sf_updated_text_es: $('#sf_updated_text_es').summernote('code'),
                },
                dataType: "text",
                success: function(data) {
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