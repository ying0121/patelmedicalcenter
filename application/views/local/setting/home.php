
<div class = "row px-5 py-10 bg-white border rounded">
    <div class = "col-12 my-3"><h3>Home Header Text</h3></div>
    <div class = "col-6">
        <div class = "form-group">
            <h6 class="mb-3">Header Text(En)</h6>
            <div id="header_text_en" class="home_summernote"></div>
        </div>
    </div>
    <div class = "col-6">
        <div class = "form-group">
            <h6 class="mb-3">Header Text(Es)</h6>
            <div id="header_text_es" class="home_summernote"></div>
        </div>
    </div>
    <div class="col-12"><hr class="my-5" /></div>
    <div class = "col-12 my-3"><h3>Home Footer Text</h3></div>
    <div class = "col-6">
        <div class = "form-group">
            <h6 class="mb-3">Footer Text(En)</h6>
            <div id="footer_text_en" class="home_summernote"></div>
        </div>
    </div>
    <div class = "col-6">
        <div class = "form-group">
            <h6 class="mb-3">Footer Text(Es)</h6>
            <div id="footer_text_es" class="home_summernote"></div>
        </div>
    </div>
    <div class="col-12 text-right">
        <button class="btn btn-light-primary" onclick = "updateHomeOrientationDesc();">Update</button>
    </div>
</div>
<script>
    $(document).ready(() => {
        $('.home_summernote').summernote({
            tabsize: 1,
            height: 150,
        });
        $("#header_text_en").summernote("code",'<?php echo $component['t_home_header']['en'] ?>');
        $("#header_text_es").summernote("code",'<?php echo $component['t_home_header']['es'] ?>');
        $("#footer_text_en").summernote("code",'<?php echo $component['t_home_footer']['en'] ?>');
        $("#footer_text_es").summernote("code",'<?php echo $component['t_home_footer']['es'] ?>');
    });

    function updateHomeOrientationDesc() {
        header_text_en = $("#header_text_en").summernote("code").replace(/<[^>]*>/g, '');
        header_text_es = $("#header_text_es").summernote("code").replace(/<[^>]*>/g, '');
        footer_text_en = $("#footer_text_en").summernote("code").replace(/<[^>]*>/g, '');
        footer_text_es = $("#footer_text_es").summernote("code").replace(/<[^>]*>/g, '');
        $.ajax({
            url: '<?php echo base_url() ?>local/Home/updateHomeText',
            method: "POST",
            data: {
                header_en: header_text_en, 
                header_es: header_text_es,
                footer_en: footer_text_en, 
                footer_es: footer_text_es
            },
            dataType: "text",
            success: function (data) {
                mynotify('success', 'Update Success')
            }
        });
    }
</script>