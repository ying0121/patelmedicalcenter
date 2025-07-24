<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <div class="d-flex justify-content-start align-items-center">
            <h3 class="m-0 mr-5">Meta Info</h3>
            <div>
                <select class="form-control" id="letters_desc_language_filter">
                </select>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <h6 class="mb-3">Description</h6>
            <textarea class="form-control" id="letter_description" type="text" rows="7"></textarea>
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
            url: '<?php echo base_url() ?>' + 'local/Letters/getLetterDescription',
            method: "POST",
            dataType: "json",
            data: {
                lang: $("#letters_desc_language_filter").val() ? $("#letters_desc_language_filter").val() : 17
            },
            success: function(res) {
                if (res) {
                    $("#letter_description").val(res.desc)
                } else {
                    $("#letter_description").val("")
                }
            }
        })

        $("#desc_update_btn").click(function() {
            $.ajax({
                url: '<?php echo base_url() ?>' + 'local/Letters/updateLetterDescription',
                method: "POST",
                data: {
                    desc: $("#letter_description").val(),
                    lang: $("#letters_desc_language_filter").val()
                },
                dataType: "text",
                success: function(res) {
                    if (res == "ok") {
                        toastr.success("Saved Successfully!")
                    }
                }
            })
        })

        $("#letters_desc_language_filter").change(e => {
            $.ajax({
                url: '<?php echo base_url() ?>' + 'local/Letters/getLetterDescription',
                method: "POST",
                dataType: "json",
                data: {
                    lang: $("#letters_desc_language_filter").val() ? $("#letters_desc_language_filter").val() : 17
                },
                success: function(res) {
                    if (res) {
                        $("#letter_description").val(res.desc)
                    } else {
                        $("#letter_description").val("")
                    }
                }
            })
        })
    })
</script>