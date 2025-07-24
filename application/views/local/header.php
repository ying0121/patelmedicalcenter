<meta charset="utf-8" />
<link rel="icon" type="image/png" href="<?php echo base_url(), 'assets/images/favicon.png'; ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title><?php echo $contact_info['name']; ?></title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

<link href="<?php echo base_url() ?>adminassets/plugins/global/plugins.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>adminassets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>adminassets/css/style.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>adminassets/css/themes/layout/header/base/light.css?v=7.0.5" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>adminassets/css/themes/layout/header/menu/light.css?v=7.0.5" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>adminassets/css/themes/layout/brand/light.css?v=7.0.5" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>adminassets/css/themes/layout/aside/light.css?" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>adminassets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1200
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#6993FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#F3F6F9",
                    "dark": "#212121"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1E9FF",
                    "secondary": "#ECF0F3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#212121",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#ECF0F3",
                "gray-300": "#E5EAEE",
                "gray-400": "#D6D6E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#80808F",
                "gray-700": "#464E5F",
                "gray-800": "#1B283F",
                "gray-900": "#212121"
            }
        },
        "font-family": "Poppins"
    };
</script>
<script src="<?php echo base_url() ?>adminassets/plugins/global/plugins.bundle.js?v=7.0.5"></script>
<script src="<?php echo base_url() ?>adminassets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.5"></script>
<script src="<?php echo base_url() ?>adminassets/js/scripts.bundle.js?v=7.0.5"></script>
<script src="<?php echo base_url() ?>adminassets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsencrypt/3.3.2/jsencrypt.min.js" integrity="sha512-94ncgEEqkuZ4yNTFmu2dSn1TJ6Ij+ANQqpR7eLVU99kzvYzu6UjBxuVoNHtnd29R+T6nvK+ugCVI698pbyEkvQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<script>
    $(document).ready(function() {
        $(".brand").height($(".logo-img").height());
        $('.aside-menu').height($(window).height() - $(".logo-img").height() - 25);
    });
    window.area_toggle = <?php echo json_encode($area_toggle) ?>;

    function handleAreaToggleBox(toggle_box_id, toggle_area_name) {
        $(toggle_box_id).prop('checked', window.area_toggle[toggle_area_name] == 1);
        $(toggle_box_id).change(function() {
            var status = $(toggle_box_id).is(":checked") ? 1 : 0;

            $.ajax({
                url: '<?php echo base_url() ?>AreaToggle/update',
                method: "POST",
                data: {
                    area_id: toggle_area_name,
                    status: status
                },
                dataType: "text",
                success: function(data) {
                    if (data == "ok")
                        mynotify('success', 'Toggle Updated');
                    else
                        mynotify('success', 'Toggle Update Fail');
                }
            });
        });
    }

    function mynotify(type, message) {
        $.notify({
            message: message
        }, {
            type: type,
            delay: 2000,
            newest_on_top: true,
            animate: {
                enter: 'animate__animated animate__' + 'bounceIn',
                exit: 'animate__animated animate__' + 'fadeOut'
            },
            placement: {
                from: 'top',
                align: 'right'
            }
        });
    }

    function handleTableReload(data, table) {
        if (data == "ok") {
            setTimeout(function() {
                $(table).DataTable().ajax.reload();
            }, 1000);
            mynotify('success', 'Update Success');
        } else
            mynotify('danger', 'Update Fail');
    }

    function handleResponse(data) {
        if (data == "ok") {
            mynotify('success', 'Update Success');
        } else
            mynotify('danger', 'Update Fail');
    }
</script>