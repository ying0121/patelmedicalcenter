<style>
    .static-body {
        border-radius: 6px;
        box-shadow: 2px 2px 4px #00000020;
        transition: all 200ms ease-out;
    }

    .static-body:hover {
        box-shadow: 4px 4px 8px #00000040;
        transition: all 200ms ease-out;
        background-color: #FFFFFF90 !important;
    }

    .static-mark {
        border-radius: 5px;
        box-shadow: 2px 2px 7px #00000020;
        transition: all 200ms ease-out;
    }

    .p-1px {
        padding: 1px !important;
    }

    .p-2px {
        padding: 2px !important;
    }

    .p-5px {
        padding: 5px !important;
    }

    .p-10px {
        padding: 10px !important;
    }

    .p-15px {
        padding: 15px !important;
    }

    .p-20px {
        padding: 20px !important;
    }

    .p-50px {
        padding: 50px !important;
    }

    .px-20px {
        padding-left: 20px !important;
        padding-right: 20px !important;
    }

    .py-20px {
        padding-top: 20px !important;
        padding-bottom: 20px !important;
    }

    .fs-1 {
        font-size: 36px !important;
    }

    .fs-2 {
        font-size: 32px !important;
    }

    .fs-3 {
        font-size: 28px !important;
    }

    .fs-4 {
        font-size: 24px !important;
    }

    .fs-5 {
        font-size: 20px !important;
    }

    .fs-6 {
        font-size: 16px !important;
    }

    .fs-7 {
        font-size: 12px !important;
    }

    .round-5px {
        border: 1px solid #00000000;
        border-radius: 5px;
    }

    .split-line {
        height: 1px;
        background-color: gray;
    }

    .m-0 {
        margin: 0px;
    }

    .control-label {
        width: auto;
        min-width: 120px;
        margin: 0px;
        display: flex;
        justify-content: end;
        padding-right: 5px;
    }

    .control-date {
        max-width: 150px;
    }

    #contact_history_modal .modal-body {
        max-height: 500px;
        overflow-y: auto;
        scrollbar-width: thin;
    }

    .w-18 {
        width: 18% !important;
    }
</style>

<div class="row my-5 d-flex justify-content-around align-items-center">
    <div data="0" class="w-18 h-120px bg-white static-body cursor-pointer">
        <div class="p-20px w-100 d-flex justify-content-between">
            <span class="d-inline-block round-5px">
                <i class="p-15px fs-3 fa fa-list-ul text-primary bg-light-primary static-mark"></i>
            </span>
            <span class="d-inline-block p-2px">
                <h4 class="d-flex justify-content-end text-black">Pay Request</h4>
                <span id="stt-total-message" class="d-flex justify-content-end text-primary fs-5 cursor-pointer stt-number">109</span>
            </span>
        </div>
        <div class="px-20px">
            <hr class="m-0">
        </div>
    </div>
    <div data="1" class="w-18 h-120px bg-white static-body">
        <div class="p-20px w-100 d-flex justify-content-between cursor-pointer">
            <span class="d-inline-block round-5px">
                <i class="p-15px fs-3 fa fa-list-ul text-danger bg-light-danger static-mark"></i>
            </span>
            <span class="d-inline-block p-2px">
                <h4 class="d-flex justify-content-end text-black">Open</h4>
                <span id="stt-total-message" class="d-flex justify-content-end text-danger fs-5 cursor-pointer stt-number">65</span>
            </span>
        </div>
        <div class="px-20px">
            <hr class="m-0">
        </div>
    </div>
    <div data="2" class="w-18 h-120px bg-white static-body">
        <div class="p-20px w-100 d-flex justify-content-between cursor-pointer">
            <span class="d-inline-block round-5px">
                <i class="p-15px fs-3 fa fa-list-ul text-success bg-light-success static-mark"></i>
            </span>
            <span class="d-inline-block p-2px">
                <h4 class="d-flex justify-content-end text-black">In Progress</h4>
                <span id="stt-total-message" class="d-flex justify-content-end text-success fs-5 cursor-pointer stt-number">23</span>
            </span>
        </div>
        <div class="px-20px">
            <hr class="m-0">
        </div>
    </div>
    <div data="3" class="w-18 h-120px bg-white static-body">
        <div class="p-20px w-100 d-flex justify-content-between cursor-pointer">
            <span class="d-inline-block round-2px">
                <i class="p-15px fs-3 fa fa-list-ul text-primary bg-light-primary static-mark"></i>
            </span>
            <span class="d-inline-block p-2px">
                <h4 class="d-flex justify-content-end text-black">Closed</h4>
                <span id="stt-total-message" class="d-flex justify-content-end text-primary fs-5 cursor-pointer stt-number">1
        </div>
        <div class="px-20px">
            <hr class="m-0">
        </div>
    </div>
    <div data="4" class="w-18 h-120px bg-white static-body">
        <div class="p-20px w-100 d-flex justify-content-between cursor-pointer">
            <span class="d-inline-block round-2px">
                <i class="p-15px fs-3 fa fa-list-ul text-info bg-light-info static-mark"></i>
            </span>
            <span class="d-inline-block p-2px">
                <h4 class="d-flex justify-content-end text-black">Paid</h4>
                <span id="stt-total-message" class="d-flex justify-content-end text-info fs-5 cursor-pointer stt-number">20
        </div>
        <div class="px-20px">
            <hr class="m-0">
        </div>
    </div>
</div>

<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <div>
            <h3>Payment Contact Records</h3>
        </div>
    </div>
    <div class="row mb-10">
        <div class="col-md-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="control-label">Assigned : </h5>
                <select id="contact_assigned" class="form-control">
                    <option value="all">All</option>
                    <option value="0">Nobody</option>
                    <?php for ($i = 0; $i < count($staffs); $i++): ?>
                        <option value="<?php echo $staffs[$i]['id'] ?>"><?php echo $staffs[$i]['en_name'] ?></option>
                    <?php endfor ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="control-label">Reason : </h5>
                <select id="contact_reason" class="form-control">
                    <option value="All Reason">All Reason</option>
                    <option value="Appointment Request">Appointment Request</option>
                    <option value="Letter Request">Letter Request</option>
                    <option value="Prescription Refill Request">Prescription Refill Request</option>
                    <option value="Referral Request">Referral Request</option>
                    <option value="Test Results Request">Test Results Request</option>
                    <option value="General Message">General Message</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-start align-items-center">
                <h5 class="control-label">Date Range : </h5>
                <input type="date" id="payment_start_date" class="form-control control-date" value="" />
                <h5 class="">&nbsp;&nbsp;&nbsp;~&nbsp;&nbsp;&nbsp;</h5>
                <input type="date" id="payment_end_date" class="form-control control-date" value="" />
            </div>
        </div>
    </div>
    <input type="hidden" id="payment_chosen_id" />
    <div class="col-12">
        <table class="table w-100" id="payment_track_tb">
            <thead>
                <th>Case</th>
                <th>Assigned To</th>
                <th>Updated Time</th>
                <th>Service Type</th>
                <th>From</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Payment</th>
                <th>Action</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>