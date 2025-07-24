<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-6 mt-10">
        <div class="d-flex form-group">
            <label for="pa_timeout" class="form-control">Automatic Logout Time (mins)</label>
            <input type="number" class="form-control" id="pa_timeout" style="max-width: 100px;">
        </div>
    </div>
    <div class="col-6 mt-10">
        <div class="d-flex form-group">
            <label for="pa_limit" class="form-control">Unsuccessful Account Login Limit</label>
            <input type="number" class="form-control" id="pa_limit" style="max-width: 100px;">
        </div>
    </div>
    <div class="col-6 mt-10">
        <div class="d-flex form-group">
            <label for="pa_limit" class="form-control">Automatic Vault Doc Auto Delete (Days)</label>
            <input type="number" class="form-control" id="pa_vault_doc_del" style="max-width: 100px;">
        </div>
    </div>
</div>

<script>
    $(document).ready(async () => {
        $('#pa_timeout').val('<?php echo $logout_rules[0]['value'] ?>')
        $('#pa_limit').val('<?php echo $logout_rules[1]['value'] ?>')
        $('#pa_vault_doc_del').val('<?php echo $logout_rules[2]['value'] ?>')

        $('#pa_timeout').change(e => {
            if (e.target.value < 1) {
                toastr.warning('Please Input Correctly!')
                return
            }
            $.ajax({
                url: '<?php echo base_url() ?>local/Setting/updateSettingValue',
                method: 'POST',
                data: {
                    value: e.target.value,
                    type: 'session_timeout'
                },
                dataType: 'json',
                success: function(data) {
                    if (data == true) {
                        toastr.success('Action Success!')
                    } else {
                        toastr.error('Action Failed!')
                    }
                }
            })
        })

        $('#pa_limit').change(e => {
            if (e.target.value < 1) {
                toastr.warning('Please Input Correctly!')
                return
            }
            $.ajax({
                url: '<?php echo base_url() ?>local/Setting/updateSettingValue',
                method: 'POST',
                data: {
                    value: e.target.value,
                    type: 'failed_limit'
                },
                dataType: 'json',
                success: function(data) {
                    if (data == true) {
                        toastr.success('Action Success!')
                    } else {
                        toastr.error('Action Failed!')
                    }
                }
            })
        })

        $('#pa_vault_doc_del').change(e => {
            if (e.target.value < 1) {
                toastr.warning('Please Input Correctly!')
                return
            }
            $.ajax({
                url: '<?php echo base_url() ?>local/Setting/updateSettingValue',
                method: 'POST',
                data: {
                    value: e.target.value,
                    type: 'vault_doc_del_timeout'
                },
                dataType: 'json',
                success: function(data) {
                    if (data == true) {
                        toastr.success('Action Success!')
                    } else {
                        toastr.error('Action Failed!')
                    }
                }
            })
        })
    })
</script>