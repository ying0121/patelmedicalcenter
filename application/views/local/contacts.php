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

                    <div class = "row my-3 p-10 bg-white border rounded">
                        <div class = "col-12 d-flex d-flex align-items-center justify-content-end">
                            <div class = "mr-1">Show:</div>
                            <div class = "d-flex align-items-center"><input type = "checkbox" id = "desc_toggle" style = "width:20px; height:20px;"></div>
                        </div>
                        <div class = "col-12 mb-2">
                            <h3>Contact Description</h3>
                        </div>
                        <div class = "col-6 mb-2">
                            <div class="form-group">
                                <h6>Description(En)</h6>
                                <textarea class="form-control" id="contact_desc_en"><?php echo $component['t_contact_desc']['en'] ?></textarea>
                            </div>
                        </div>
                        <div class = "col-6 mb-2">
                            <div class="form-group">
                                <h6>Description(Es)</h6>
                                <textarea class="form-control" id="contact_desc_es"><?php echo $component['t_contact_desc']['es'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-12 text-right">
                            <button class="btn btn-light-primary pull-right" onclick = "updateContactDesc()">Update</button>
                        </div>
                    </div>
                    <div class = "row my-3 p-10 bg-white border rounded">
                        <div class = "col-12 d-flex justify-content-between ">
                            <div><h3>Google Map</h3><h4>(Automatically shows the clinic address)</h4></div>
                            <div class = "d-flex d-flex align-items-center">
                                <div class = "mr-1">Show:</div>
                                <div class = "d-flex align-items-center"><input type = "checkbox" id = "map_toggle" style = "width:20px; height:20px;"></div>
                            </div>
                        </div>
                        <iframe
                            id="preview"
                            width="100%"
                            height="450"
                            style="border:none;"
                            loading="lazy"
                            allowfullscreen
                            src="https://www.google.com/maps/embed/v1/place?key=<?php echo $this->config->item('google_api_key')?>&q=<?php echo $contact_info['address']; ?> <?php echo $contact_info['city']; ?> <?php echo $contact_info['state']; ?> <?php echo $contact_info['zip']; ?>">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function updateContactDesc(){
        var data = {
            desc_en: $("#contact_desc_en").val(),
            desc_es: $("#contact_desc_es").val()
        };

        $.ajax({
            url: '<?php echo base_url() ?>local/Contacts/updateContactDesc',
            method: "POST",
            data: data,
            dataType: "text",
            success: function (data) {
                mynotify('success', 'Contact Info Updated.')
            }
        });
    }
    $(document).ready(function () {
        $('#map_toggle').prop('checked', <?php echo $area_toggle['contact_map'] == 1?>)
        $('#map_toggle').change(function(){
            var status = $('#map_toggle').is(":checked") ? 1 : 0;

            $.ajax({
                url: '<?php echo base_url() ?>AreaToggle/update',
                method: "POST",
                data: {area_id: "contact_map", status: status},
                dataType: "text",
                success: function (data) {
                    if(data == "ok")
                        mynotify('success', 'Toggle Updated.');
                    else
                        mynotify('danger', 'Toggle Update Fail.');
                }
            });
        })

        $('#desc_toggle').prop('checked', <?php echo $area_toggle['contact_desc'] == 1?>)
        $('#desc_toggle').change(function(){
            var status = $('#desc_toggle').is(":checked") ? 1 : 0;

            $.ajax({
                url: '<?php echo base_url() ?>AreaToggle/update',
                method: "POST",
                data: {area_id: "contact_desc", status: status},
                dataType: "text",
                success: function (data) {
                    if(data == "ok")
                        mynotify('success', 'Toggle Updated.');
                    else
                        mynotify('danger', 'Toggle Update Fail.');
                }
            });
        })
    })
</script>
</html>
