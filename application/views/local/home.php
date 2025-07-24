<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('local/header'); ?>
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <?php $this->load->view('local/mobile_topmenu'); ?>
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">
            <?php $this->load->view('local/menu'); ?>
            <div class="d-flex flex-column flex-row-fluid wrapper pt-20" id="kt_wrapper">
                <?php $this->load->view('local/topmenu'); ?>

                <div class="content d-flex flex-column flex-column-fluid p-10">

                    <div class = "row px-5 py-10 bg-white border rounded">
                        <div class = "col-12 my-3"><h3>Home Header Text</h3></div>
                        <div class = "col-6">
                            <div class = "form-group">
                                <h6 class="mb-3">Header Text(En)</h6>
                                <div id="text_en"></div>
                            </div>
                        </div>
                        <div class = "col-6">
                            <div class = "form-group">
                                <h6 class="mb-3">Header Text(Es)</h6>
                                <div id="text_es"></div>
                            </div>
                        </div>
                        <div class="col-12 text-right">
                            <button class="btn btn-light-primary" onclick = "updateOrientationDesc();">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(() => {
        localStorage.setItem("once_logged_in", true);
        
        $('#text_en').summernote({
            tabsize: 1,
            height: 150,
        });
        $('#text_es').summernote({
            tabsize: 1,
            height: 150,
        });
        $("#text_en").summernote("code",'<?php echo $component['t_home_header']['en'] ?>');
        $("#text_es").summernote("code",'<?php echo $component['t_home_header']['es'] ?>');
    });

    function updateOrientationDesc(){
        text_en = $("#text_en").summernote("code");
        text_es = $("#text_es").summernote("code");
        $.ajax({
            url: '<?php echo base_url() ?>local/Home/updateHomeHeaderText',
            method: "POST",
            data: {text_en: text_en, text_es: text_es},
            dataType: "text",
            success: function (data) {
                mynotify('success', 'Update Success')
            }
        });
    }
</script>
</html>
