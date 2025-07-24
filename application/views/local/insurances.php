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

                    <div class="row">
                        <div class="col-md-12 bg-primary p-2 mb-2 text-white">
                            <div class="d-flex justify-content-around">
                                <div class="d-flex align-items-center" style="font-size:20px; font-weight:bold;">Insurances</div>
                                <ul class="nav nav-tabs nav-pills" data-tabs="tabs">
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row px-5 py-10 bg-white border rounded">
                                <div class="col-6">
                                    <div class="form-group">
                                        <h6 class="mb-3">Title(En)</h6>
                                        <div class="insurance_desc" id="insurance_title_en"></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <h6 class="mb-3">Title(Es)</h6>
                                        <div class="insurance_desc" id="insurance_title_es"></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <h6 class="mb-3">Description(En)</h6>
                                        <div class="insurance_desc" id="insurance_desc_en"></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <h6 class="mb-3">Description(Es)</h6>
                                        <div class="insurance_desc" id="insurance_desc_es"></div>
                                    </div>
                                </div>
                                <div class="col-12 text-right">
                                    <button class="btn btn-light-primary" onclick="updateInsuranceDesc();">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(() => {
        $('.insurance_desc').summernote({
            tabsize: 1,
            height: 150,
        });
        $("#insurance_title_en").summernote("code", '<?php echo $component['t_ins_title']['en'] ?>');
        $("#insurance_title_es").summernote("code", '<?php echo $component['t_ins_title']['es'] ?>');
        $("#insurance_desc_en").summernote("code", '<?php echo $component['t_ins_desc']['en'] ?>');
        $("#insurance_desc_es").summernote("code", '<?php echo $component['t_ins_desc']['es'] ?>');
    });

    function updateInsuranceDesc() {
        insurance_title_en = $("#insurance_title_en").summernote("code").replace(/<[^>]*>/g, '');
        insurance_title_es = $("#insurance_title_es").summernote("code").replace(/<[^>]*>/g, '');
        insurance_desc_en = $("#insurance_desc_en").summernote("code").replace(/<[^>]*>/g, '');
        insurance_desc_es = $("#insurance_desc_es").summernote("code").replace(/<[^>]*>/g, '');
        $.ajax({
            url: '<?php echo base_url() ?>local/Insurance/updateInsuranceDesc',
            method: "POST",
            data: {
                insurance_title_en: insurance_title_en,
                insurance_title_es: insurance_title_es,
                insurance_desc_en: insurance_desc_en,
                insurance_desc_es: insurance_desc_es
            },
            dataType: "text",
            success: function(data) {
                mynotify('success', 'Update Success')
            }
        });
    }
</script>

</html>