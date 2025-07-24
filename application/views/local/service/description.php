<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 my-3">
        <h3>Meta Info</h3>
    </div>
    <div class="col-12">
        <div class="form-group">
            <h6 class="mb-3">Description (EN)</h6>
            <textarea class="form-control" id="desc_en" type="text" rows="7"></textarea>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <h6 class="mb-3">Description (ES)</h6>
            <textarea class="form-control" id="desc_es" type="text" rows="7"></textarea>
        </div>
    </div>
    <div class="col-12 text-right">
        <button class="btn btn-light-primary" id="desc_update_btn">Update</button>
    </div>
</div>

<script>
    $(document).ready(async function() {
        // service description
        $.ajax({
            url: '<?php echo base_url() ?>' + 'local/Services/getDesc',
            method: "POST",
            dataType: "json",
            success: function(res) {
                $("#desc_en").val(res.en)
                $("#desc_es").val(res.es)
            }
        })

        $("#desc_update_btn").click(function() {
            $.ajax({
                url: '<?php echo base_url() ?>' + 'local/Services/updateDesc',
                method: "POST",
                data: {
                    en: $("#desc_en").val(),
                    es: $("#desc_es").val()
                },
                dataType: "text",
                success: function(res) {
                    if (res == "ok") {
                        toastr.success("Saved Successfully!")
                    }
                }
            })
        })
    })
</script>