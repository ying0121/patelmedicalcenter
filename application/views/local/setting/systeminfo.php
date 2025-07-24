
<div class="row px-5 py-10 bg-white border rounded justify-content-center">
    <div class="col-11 my-10"><h3>System Version</h3></div>
    <div class="col-10 d-flex justify-content-start align-items-center mb-5">
        <h4 for="sysinfo_month" class="control-label d-flex justify-content-end" style="min-width: 120px;">Month&nbsp;:&nbsp;</h4>
        <input id="sysinfo_month" class="form-control" style="max-width: 200px; width: 120px;" value="<?php echo $sysinfo["month"] ?>" />
    </div>
    <div class="col-10 d-flex justify-content-start align-items-center mb-5">
        <h4 for="sysinfo_year" class="control-label d-flex justify-content-end" style="min-width: 120px;">Year&nbsp;:&nbsp;</h4>
        <input id="sysinfo_year" class="form-control" style="max-width: 200px; width: 120px;" value="<?php echo $sysinfo["year"] ?>" />
    </div>
    <div class="col-10 d-flex justify-content-start align-items-center mb-5">
        <h4 for="sysinfo_word" class="control-label d-flex justify-content-end" style="min-width: 120px;">Word&nbsp;:&nbsp;</h4>
        <input id="sysinfo_word" class="form-control" style="max-width: 200px; width: 120px;" value="<?php echo $sysinfo["word"] ?>" />
    </div>
    <div class="col-10 d-flex justify-content-start align-items-center mb-5">
        <h4 for="sysinfo_type" class="control-label d-flex justify-content-end" style="min-width: 120px;">Type&nbsp;:&nbsp;</h4>
        <input id="sysinfo_type" class="form-control" style="max-width: 200px; width: 120px;" value="<?php echo $sysinfo["type"] ?>" />
    </div>
    <div class="col-10 d-flex justify-content-start align-items-center mb-5">
        <h4 for="sysinfo_lang" class="control-label d-flex justify-content-end" style="min-width: 120px;">Language&nbsp;:&nbsp;</h4>
        <input id="sysinfo_lang" class="form-control" style="max-width: 200px; width: 120px;" value="<?php echo $sysinfo["language"] ?>" />
    </div>
    <div class="col-12 text-right">
        <button class="btn btn-light-primary" id="sysinfo_update_btn">Update</button>
    </div>
</div>
<script>
    $(document).ready(() => {
        $("#sysinfo_update_btn").click(() => {
            $.post({
                url: "<?php echo base_url() ?>local/Setting/updateSysInfo",
                method: "POST",
                data: {
                    month: $("#sysinfo_month").val(),
                    year: $("#sysinfo_year").val(),
                    word: $("#sysinfo_word").val(),
                    type: $("#sysinfo_type").val(),
                    language: $("#sysinfo_lang").val()
                },
                dataType: 'json',
                success: function(res) {
                    if (res.status == 'success') {
                        toastr.success("Update Success!")
                    } else {
                        toastr.info("Action Failed!")
                    }
                },
                error: function(error) {
                    toastr.error("Error was occurred on the server!")
                }
            })
        })
    })
</script>