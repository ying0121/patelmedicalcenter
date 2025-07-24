<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('header.php'); ?>
        <style>
            .btn-group, .btn-group-vertical {
                margin: 0!important;
            }
        </style>
    </head>
    <body>
        <div class="wrapper ">
            <?php include('menu.php'); ?>
			<div class="main-panel">
                <div class = "loading-bg"><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>
                <div class="content">
                    <div class="container-fluid">
                        <?php include('topmenu.php'); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-icon card-header-primary no-print">
                                        <div class="card-icon">
                                        <i class="material-icons">widgets</i>
                                        </div>
                                        <div class = 'row'>
                                            <input type="hidden" id="itemid" value="<?php echo $widget['id']; ?>" />
                                            <div class = 'col-md-12'><h6 style="font-size: 16px;" class="card-title"><?php echo $widget['widget']; ?></h6></div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class = "row">
                                            <div class="col-md-12">
                                                <h6 style="font-size: 16px;">Header</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" id="header_en" name="header_en" placeholder="English" value="<?php echo $widget['header_en']; ?>"  />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" id="header_es" name="header_es" placeholder="Español" value="<?php echo $widget['header_es']; ?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <h6 style="font-size: 16px;">Sub header</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" id="subheader_en" name="subheader_en" value="<?php echo $widget['subheader_en']; ?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" id="subheader_es" name="subheader_es" value="<?php echo $widget['subheader_es']; ?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <h6 style="font-size: 16px;">Description</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div id="desc_en"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div id="desc_es"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <h6 style="font-size: 16px;">Full Description</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div id="fdesc_en"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div id="fdesc_es"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button class="btn btn-light-primary" id="updatebtn">Update</button>
                                            </div>
                                        </div>
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
        $('#desc_en').summernote({
            tabsize: 1,
            height: 150
        });
        $('#desc_es').summernote({
            tabsize: 1,
            height: 150
        });
        $('#fdesc_en').summernote({
            tabsize: 1,
            height: 250
        });
        $('#fdesc_es').summernote({
            tabsize: 1,
            height: 250
        });
        $("#desc_en").summernote("code",`<?php echo $widget['desc_en']; ?>`);
        $("#desc_es").summernote("code",`<?php echo $widget['desc_es']; ?>`);
        $("#fdesc_en").summernote("code",`<?php echo $widget['fdesc_en']; ?>`);
        $("#fdesc_es").summernote("code",`<?php echo $widget['fdesc_es']; ?>`);
        $(document).ready(function() {
            $("#updatebtn").click(function(){
                let entry = {
                    id:$("#itemid").val(),
                    header_en:$("#header_en").val(),
                    header_es:$("#header_es").val(),
                    subheader_en:$("#subheader_en").val(),
                    subheader_es:$("#subheader_es").val(),
                    desc_en:$("#desc_en").summernote("code"),
                    desc_es:$("#desc_es").summernote("code"),
                    fdesc_en:$("#fdesc_en").summernote("code"),
                    fdesc_es:$("#fdesc_es").summernote("code")
                }
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/updatewidgetitem',
                    method: "POST",
                    data: entry,
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            $.notify({
                                icon: "add_alert",
                                message: "Action Successfully"

                                }, {
                                type: 'info',
                                timer: 1000,
                                placement: {
                                    from: 'top',
                                    align: 'center'
                                }
                            });
                        }
                        else{
                            $.notify({
                                icon: "add_alert",
                                message: "Action failed"

                                }, {
                                type: 'info',
                                timer: 1000,
                                placement: {
                                    from: 'top',
                                    align: 'center'
                                }
                            });
                        }
                    }
                });
            });
        });
    </script>
</html>
