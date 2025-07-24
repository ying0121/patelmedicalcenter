
<div class = "row my-3 p-10 bg-white border rounded">
    <div class = "col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <div class = "col-12 mb-4 d-flex justify-content-between align-items-center my-5">
            <h3>CONECTOR API</h3>
            <div><span id="setting_api_conector_add" class = 'btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
        </div>
        <input type="hidden" id="api_conector_chosen_id" />
    </div>
    <div class = "col-12">
        <select class="form-control" id="api-conector-selected" style="height:36px;">
            <?php 
                $html = "";
                for($i = 0; $i < count($api); $i ++) {
                    $html = $html."<option value='".$api[$i]['id']."'>".$api[$i]['url']."</option>";
                }
                echo $html;
            ?>
        </select>
        <div class="d-flex justify-content-end my-10">
            <button class="btn btn-primary mx-5" id="setting_api_conector_update">Update</button>
            <button class="btn btn-danger" id="setting_api_conector_delete">Delete</button>
        </div>
    </div>
</div>

<div class="modal fade" id="conector_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <input type="hidden" id="conector_type" />
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Conector API</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class = "row">
                    <div class = 'col-md-12'>
                        <div class="form-group">
                            <h6>API</h6>
                            <input class="form-control" id="api_url" type="text" placeholder="https://externalsite.com/route/api">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" id="api_conector_modal_save" class="btn btn-light-primary" data-dismiss="modal">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function getAPI() {
        $.post({
            url: '<?php echo base_url() ?>/local/ConectorApi/read',
            method: 'POST',
            data: {},
            dataType: 'json',
            success: function(data) {
                var html = ''
                for (var i = 0; i < data.data.length; i ++) {
                    html += `<option value = '${data.data[i].id}'>${data.data[i].url}</option>`
                }
                $('#api-conector-selected').html(html)
            }
        })
    }

    $(document).ready(() => {
        $('#setting_api_conector_add').click(() => {
            $('#conector_type').val('0')
            $('#api_url').val('')
            $('#conector_modal').modal('show')
        })

        $('#setting_api_conector_update').click(() => {
            if (!$('#api-conector-selected').val()) {
                toastr.info('API url is not existed!')
                return
            }

            $('#conector_type').val('1')
            $('#api_conector_chosen_id').val($('#api-conector-selected').val())
            $('#api_url').val($('#api-conector-selected option:selected').text())
            $('#conector_modal').modal('show')
        })

        $('#api_conector_modal_save').click(() => {
            if (!$('#api_url').val()) {
                toastr.info('Please input an api.')
                return
            }

            var type = $('#conector_type').val()

            $.post({
                url: type == 0 ? '<?php echo base_url() ?>/local/ConectorApi/add' : '<?php echo base_url() ?>/local/ConectorApi/update',
                method: 'POST',
                data: {
                    id: $('#api_conector_chosen_id').val(),
                    url: $('#api_url').val()
                },
                dataType: 'json',
                success: function(result) {
                    if (result.status == 'success') {
                        getAPI()
                        toastr.success('Action Success!')
                    } else if (result.status == 'exist') {
                        toastr.info('The API is already existed!')
                    } else {
                        toastr.error('Action Failed!')
                    }
                    $('#conector_modal').modal('hide')
                },
                error: function(result) {
                    toastr.error('An error was occured on server side!')
                    $('#conector_modal').modal('hide')
                }
            })
        })

        $('#setting_api_conector_delete').click(() => {
            var id = $('#api-conector-selected option:selected').val()
            if (!id) {
                toastr.info('Please select an api.')
                return
            }

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax ({
                        url: '<?php echo base_url() ?>local/ConectorApi/delete',
                        method: "POST",
                        data: {id: id},
                        dataType: "json",
                        success: function (data) {
                            if(data.status == "success") {
                                getAPI()
                                toastr.success('Action Success!')
                            } else {
                                toastr.error('Action Failed!')
                            }
                        },
                        error: function (data) {
                            toastr.error('An error was occured on server side!')
                        }
                    })
                }
            })
        })
    })
</script>
