<div class="row my-3 p-10 bg-white border rounded">
    <div class = "col-12 d-flex d-flex align-items-center justify-content-end">
        <div class = "mr-1">Show:</div>
        <div class = "d-flex align-items-center"><input type = "checkbox" id = "aboutclinic_toggle" style = "width:20px; height:20px;"></div>
    </div>
    <div class="row col-12">
        <div class = "col-md-6">
            <div class="form-group">
                <h6>Short Description (EN)</h6>
                <div name = 'en_desc' id = 'en_desc'></div>
            </div>
        </div>
        <div class = "col-md-6">
            <div class="form-group">
                <h6>Short Description (ES)</h6>
                <div name = 'es_desc' id = 'es_desc'></div>
            </div>
        </div>
        <div class = "col-md-6">
            <div class="form-group">
                <h6>Full Description (EN)</h6>
                <div name = 'en_fdesc' id = 'en_fdesc'></div>
            </div>
        </div>
        <div class = "col-md-6">
            <div class="form-group">
                <h6>Full Description (ES)</h6>
                <div name = 'es_fdesc' id = 'es_fdesc'></div>
            </div>
        </div>
        <div class="col-md-12 text-right">
            <button class="btn btn-light-primary updatebtn">Update</button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#en_desc').summernote({
            tabsize: 1,
            height: 150,
        });
        $('#es_desc').summernote({
            tabsize: 1,
            height: 150,
        });
        $('#en_fdesc').summernote({
            tabsize: 1,
            height: 250,
        });
        $('#es_fdesc').summernote({
            tabsize: 1,
            height: 250,
        });

        $("#en_desc").summernote("code",`<?php echo $component['t_about_clinic_desc']['en'] ?>`);
        $("#es_desc").summernote("code",`<?php echo $component['t_about_clinic_desc']['es'] ?>`);
        $("#en_fdesc").summernote("code",`<?php echo $component['t_about_clinic_fdesc']['en'] ?>`);
        $("#es_fdesc").summernote("code",`<?php echo $component['t_about_clinic_fdesc']['es'] ?>`);
        $(".updatebtn").click(function(){
            var fd = new FormData();
            fd.append('en_desc',$("#en_desc").summernote("code"));
            fd.append('es_desc',$("#es_desc").summernote("code"));
            fd.append('en_fdesc',$("#en_fdesc").summernote("code"));
            fd.append('es_fdesc',$("#es_fdesc").summernote("code"));
            $.ajax({
                url: '<?php echo base_url() ?>local/AboutUs/updateAboutClinic',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                dataType: "text",
                success: function (data) {
                    mynotify('success', 'Update Success.');
                }
            });
        });
        handleAreaToggleBox('#aboutclinic_toggle', 'aboutus_aboutclinic');
    });
</script>
