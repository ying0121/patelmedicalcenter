<div class="row px-5 py-10 bg-white border rounded justify-content-center">
    <div class="col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <div class="col-12 mb-4 d-flex justify-content-start align-items-center my-5">
            <h3 class="m-0 mr-5">Payment</h3>
            <div class="d-flex justify-content-start align-items-center flex-wrap">
                <div class="d-flex my-3 align-items-center">
                    <input type="checkbox" style="width:24px; height:24px;" id="payment_on" class="mx-1"> Pay before service request
                </div>
                <div class="d-flex my-3 align-items-center mx-4">
                    <input type="checkbox" style="width:24px; height:24px;" id="payment_on" class="mx-1"> Request Service then get invoice before the service is provided
                </div>
                <div class="d-flex my-3 align-items-center">
                    <input type="checkbox" style="width:24px; height:24px;" id="payment_on" class="mx-1"> Pay after completion of service
                </div>
            </div>
        </div>
        <input type="hidden" id="payment_chosen_id" />
    </div>
    <div class="col-md-12 d-flex justify-content-between align-items-center my-3">
        <h4 for="payment_stripe" class="control-label d-flex justify-content-end m-0" style="min-width: 120px;">Stripe&nbsp;:&nbsp;</h4>
        <select class="form-control" id="payment_stripe" style="height:36px;">
            <?php for ($i = 0; $i < count($stripes); $i++): ?>
                <option value="<?php echo $stripes[$i]["id"] ?>"><?php echo $stripes[$i]["stripe"] ?></option>
            <?php endfor ?>
        </select>
        <div style="padding-left: 6px;"><span id="payment_add" class="btn btn-light-primary"><i class="fa fa-plus"></i></span></div>
    </div>
    <div class="col-md-12 text-right my-3">
        <button class="btn btn-light-primary" id="payment_update_btn">Update</button>
        <button class="btn btn-light-danger" id="payment_delete_btn">Delete</button>
    </div>
    <div class="col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <div class="col-12 mb-4 d-flex justify-content-between align-items-center my-5">
            <h3>Apple PAY</h3>
        </div>
    </div>
</div>

<div class="modal fade" id="payment_stripe_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <input type="hidden" id="payment_stripe_modal_type" />
            <input type="hidden" id="payment_stripe_modal_chosen_id" />
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Stripe</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class='col-md-12'>
                        <div class="form-group">
                            <h6>Stripe</h6>
                            <input class="form-control" id="payment_stripe_input" type="text" placeholder="input a stripe">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" id="payment_stripe_modal_save" class="btn btn-light-primary">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    const loadPaymentStripe = () => {
        $.post({
            url: `<?php echo base_url() ?>local/Setting/readPaymentStripe`,
            method: "POST",
            dataType: 'json',
            success: function(res) {
                let html = ""
                res.forEach(item => {
                    html += `<option value="${item.id}">${item.stripe}</option>`
                })
                $("#payment_stripe").html(html)
            },
            error: function(error) {
                toastr.error("Error was occurred on the server!")
            }
        })
    }
    $(document).ready(function() {
        $("#payment_add").click(function() {
            $("#payment_stripe_input").val("")
            $("#payment_stripe_modal_type").val("0")
            $("#payment_stripe_modal").modal("show")
        })

        $("#payment_stripe_modal_save").click(function() {
            const type = $("#payment_stripe_modal_type").val()
            const entry = {
                id: $("#payment_stripe_modal_chosen_id").val(),
                stripe: $("#payment_stripe_input").val()
            }

            $.post({
                url: `<?php echo base_url() ?>local/Setting/${type == 0 ? "addPaymentStripe" : "updatePaymentStripe"}`,
                method: "POST",
                data: entry,
                dataType: 'json',
                success: function(res) {
                    if (res.status == 'ok') {
                        loadPaymentStripe()
                        toastr.success("Saved Successfully!")
                        $("#payment_stripe_modal").modal("hide")
                    } else {
                        toastr.info("Action Failed!")
                    }
                },
                error: function(error) {
                    toastr.error("Error was occurred on the server!")
                }
            })
        })

        $("#payment_update_btn").click(function() {
            $("#payment_stripe_modal_type").val("1")
            $("#payment_stripe_modal_chosen_id").val($("#payment_stripe").val())
            $.post({
                url: `<?php echo base_url() ?>local/Setting/chosenPaymentStripe`,
                method: "POST",
                data: {
                    id: $("#payment_stripe").val()
                },
                dataType: 'json',
                success: function(res) {
                    $("#payment_stripe_input").val(res.stripe)
                    $("#payment_stripe_modal").modal("show")
                },
                error: function(error) {
                    toastr.error("Error was occurred on the server!")
                }
            })
        })

        $("#payment_delete_btn").click(function() {
            $.post({
                url: `<?php echo base_url() ?>local/Setting/deletePaymentStripe`,
                method: "POST",
                data: {
                    id: $("#payment_stripe").val()
                },
                dataType: 'json',
                success: function(res) {
                    if (res.status == 'ok') {
                        loadPaymentStripe()
                        toastr.success("Deleted Successfully!")
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