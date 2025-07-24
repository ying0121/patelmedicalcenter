<style>
    .col-gap-0 {
        column-gap: 0 !important;
    }

    .col-gap-1 {
        column-gap: 0.25rem !important;
    }

    .col-gap-2 {
        column-gap: 0.5rem !important;
    }

    .col-gap-3 {
        column-gap: 0.75rem !important;
    }

    .col-gap-4 {
        column-gap: 1.0rem !important;
    }

    .col-gap-5 {
        column-gap: 1.25rem !important;
    }

    .col-gap-6 {
        column-gap: 1.5rem !important;
    }

    .col-gap-7 {
        column-gap: 1.75rem !important;
    }

    .col-gap-8 {
        column-gap: 2.0rem !important;
    }

    .col-gap-9 {
        column-gap: 2.25rem !important;
    }

    .col-gap-10 {
        column-gap: 2.5rem !important;
    }
</style>

<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <div>
            <h3>Request Reports</h3>
        </div>
    </div>
    <div class="col-12">
        <div class="row mb-10">
            <div class="col-md-3 d-none">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="control-label">Assigned : </h5>
                    <select id="request_assigned" class="form-control">
                        <option value="0">Nobody</option>
                        <?php for ($i = 0; $i < count($staffs); $i++): ?>
                            <option value="<?php echo $staffs[$i]['id'] ?>"><?php echo $staffs[$i]['en_name'] ?></option>
                        <?php endfor ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3 d-none">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="control-label">Reason : </h5>
                    <select id="request_reason" class="form-control">
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
                <div class="w-100 h-100 d-flex justify-content-center align-items-center col-gap-8">
                    <div class=" d-flex d-flex align-items-center justify-content-end">
                        <div class="d-flex align-items-center"><input type="radio" value="1" checked name="request_filter_day" id="request_filter_monthly" style="width:20px; height:20px;"></div>
                        <div class="ml-1"> Monthly</div>
                    </div>
                    <div class="d-flex d-flex align-items-center justify-content-end">
                        <div class="d-flex align-items-center"><input type="radio" value="2" name="request_filter_day" id="request_filter_bi-weekly" style="width:20px; height:20px;"></div>
                        <div class="ml-1"> Bi-Weekly</div>
                    </div>
                    <div class="d-flex d-flex align-items-center justify-content-end">
                        <div class="d-flex align-items-center"><input type="radio" value="3" name="request_filter_day" id="request_filter_weekly" style="width:20px; height:20px;"></div>
                        <div class="ml-1"> Weekly</div>
                    </div>
                    <div class="d-flex d-flex align-items-center justify-content-end">
                        <div class="d-flex align-items-center"><input type="radio" value="4" name="request_filter_day" id="request_filter_daily" style="width:20px; height:20px;"></div>
                        <div class="ml-1"> Daily</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="row mb-10">
            <div id="request_year_container" class="col-md-2">
                <select id="request_year_select" class="form-control">
                </select>
            </div>
            <div id="request_monthly_container" class="col-md-2">
                <select id="request_monthly_select" class="form-control">
                    <option value="0">January</option>
                    <option value="1">February</option>
                    <option value="2">March</option>
                    <option value="3">April</option>
                    <option value="4">May</option>
                    <option value="5">June</option>
                    <option value="6">July</option>
                    <option value="7">August</option>
                    <option value="8">September</option>
                    <option value="9">October</option>
                    <option value="10">November</option>
                    <option value="11">December</option>
                </select>
            </div>
            <div id="request_biweekly_container" class="col-md-2 d-none">
                <select id="request_biweekly_select" class="form-control">
                    <option value="0">First Bi-Week</option>
                    <option value="1">Second Bi-Week</option>
                </select>
            </div>
            <div id="request_weekly_container" class="col-md-2 d-none">
                <select id="request_weekly_select" class="form-control">
                    <option value="0">First Week</option>
                    <option value="1">Second Week</option>
                    <option value="2">Third Week</option>
                    <option value="3">Fourth Week</option>
                    <option id="request_fifth-week" value="4">Fifth Week</option>
                </select>
            </div>
            <div id="request_daily_container" class="col-md-2 d-none">
                <input type="date" id="request_daily_date" class="form-control control-date" value="" />
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="row" id="request-report-charts">
            <div class="col-md-6 d-flex justify-content-center align-items-center mb-10">
                <canvas id="request_canvas_all" data-id="all" data-name="Total" style="width: 100%"></canvas>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center mb-10">
                <canvas id="request_canvas_0" data-id="0" data-name="Nobody" style="width: 100%"></canvas>
            </div>
            <?php for ($i = 0; $i < count($staffs); $i++): ?>
                <div class="col-md-6 d-flex justify-content-center align-items-center mb-10">
                    <canvas id="request_canvas_<?php echo $staffs[$i]['id'] ?>" data-id="<?php echo $staffs[$i]['id'] ?>" data-name="<?php echo $staffs[$i]['en_name'] ?>" style="width: 100%"></canvas>
                </div>
            <?php endfor ?>
        </div>
    </div>
</div>

<script>
    var __chartList = []
    var __requests = null
    var __staffs = null
    var __reasons = null
    var __date = null
    var __year = null
    var __month = null

    const getReports = async (dayType, year, month, date) => {
        $.post({
            'url': '<?php echo base_url() ?>Contact/getReports',
            'type': 'POST',
            'data': {
                dayType: dayType ?? 1,
                year: year,
                month: parseInt(month) + 1,
                date: date
            },
            'dataType': 'json',
            'success': function(data) {
                __requests = null
                __requests = data.data
                __staffs = data.staffs
                __reasons = data.reasons
                const _dayType = data.dayType

                let _data = null
                if (_dayType == "monthly") {
                    _data = __requests[$("#request_monthly_select").val()]
                } else if (_dayType == "biweekly") {
                    _data = __requests[$("#request_biweekly_select").val()]
                } else if (_dayType == "weekly") {
                    _data = __requests[$("#request_weekly_select").val()]
                    if (_data.length == 4) {
                        $("#request_fifth-week").addClass("d-none")
                    } else if (_data.length == 5) {
                        $("#request_fifth-week").removeClass("d-none")
                    }
                } else if (_dayType == "daily") {
                    _data = __requests
                }

                renderBarChart(_dayType, __staffs, __reasons, _data)
            },
            'error': function(error) {
                toastr.error("An error was occurred on the server");
            }
        })
    }

    const renderBarChart = (_dayType, _staffs, _reasons, _data) => {
        const _total = []
        // calculate total
        for (var i = 0; i < _data.length; i++) {
            if (i == 0) {
                for (var j = 0; j < _reasons.length; j++) {
                    _total[j] = 0
                    _total[j] += parseInt(_data[i]['data'][j]['count'])
                }
            } else {
                for (var j = 0; j < _reasons.length; j++) {
                    _total[j] += parseInt(_data[i]['data'][j]['count'])
                }
            }
        }

        _canvasIndex = 0
        var _canvasList = $("canvas")
        _canvasList.each(function() {
            // re-render
            const _canvas = $(this)[0]; // Get the DOM element
            const _ctx = _canvas.getContext('2d'); // Get the 2D context
            _ctx.clearRect(0, 0, _canvas.width, _canvas.height); // Clear the canvas

            const xValues = _reasons
            const yValues = []
            if ($(this).attr("data-id") == "all") {
                _total.forEach(item => {
                    yValues.push(item)
                })
            } else {
                _data[_canvasIndex]['data'].forEach(item => {
                    yValues.push(parseInt(item.count))
                })
                _canvasIndex++
            }

            const color = ["red", "green", "blue", "orange", "brown", "pink"]

            const theChart = __chartList[$(this).attr("id")]
            if (theChart == null || theChart == undefined) {
                const newChart = new Chart($(this).attr("id"), {
                    type: "bar",
                    data: {
                        labels: xValues,
                        datasets: [{
                            data: yValues,
                            backgroundColor: color,
                            borderColor: color,
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: $(this).attr("data-name"),
                            position: 'bottom',
                            fontSize: 21,
                            fontColor: "gray"
                        },
                        legend: {
                            display: false
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    min: 0,
                                    max: Math.max(...yValues) < 12 ? 12 : Math.round(Math.max(...yValues) * 1.2)
                                }
                            }]
                        }
                    }
                })
                __chartList[$(this).attr("id")] = newChart
            } else {
                theChart.data.datasets[0].data = yValues
                theChart.options.scales.yAxes[0].ticks.max = Math.max(...yValues) < 12 ? 12 : Math.round(Math.max(...yValues) * 1.2)
                theChart.update()
            }
        })
    }

    $(document).ready(function() {
        __date = new Date()
        __year = __date.getFullYear()
        __month = __date.getMonth()

        // Year
        let __html = ""
        for (var i = 2000; i <= __year; i++) {
            __html += `<option value="${i}">${i}</option>`
        }
        $("#request_year_select").html(__html)
        $("#request_year_select").val(__year)
        __html = ""
        // Monthly
        $("#request_monthly_select").val(new Date().getMonth())
        // Daily
        $("#request_daily_date").val(__date.toISOString().substr(0, 10))

        $(document).on("change", "input[name='request_filter_day']", function() {
            const _type = $(this).val()
            if (_type == 1) { // Monthly
                $("#request_year_container").removeClass("d-none")
                $("#request_monthly_container").removeClass("d-none")
                $("#request_biweekly_container").addClass("d-none")
                $("#request_weekly_container").addClass("d-none")
                $("#request_daily_container").addClass("d-none")
            } else if (_type == 2) { // Bi-Weekly
                $("#request_year_container").removeClass("d-none")
                $("#request_monthly_container").removeClass("d-none")
                $("#request_biweekly_container").removeClass("d-none")
                $("#request_weekly_container").addClass("d-none")
                $("#request_daily_container").addClass("d-none")
            } else if (_type == 3) { // Weekly
                $("#request_year_container").removeClass("d-none")
                $("#request_monthly_container").removeClass("d-none")
                $("#request_biweekly_container").addClass("d-none")
                $("#request_weekly_container").removeClass("d-none")
                $("#request_daily_container").addClass("d-none")
            } else if (_type == 4) { // Daily
                $("#request_year_container").addClass("d-none")
                $("#request_monthly_container").addClass("d-none")
                $("#request_biweekly_container").addClass("d-none")
                $("#request_weekly_container").addClass("d-none")
                $("#request_daily_container").removeClass("d-none")
            }
            getReports(_type, $("#request_year_select").val(), $("#request_monthly_select").val(), $("#request_daily_date").val())
        })

        getReports(1, __year, __month, __date)
    });

    // change event
    $("#request_year_select").change(e => {
        const _type = $("input[name='request_filter_day']:checked").val()
        getReports(_type, e.target.value, $("#request_monthly_select").val(), $("#request_daily_date").val())
    })

    $("#request_monthly_select").change(e => {
        const _type = $("input[name='request_filter_day']:checked").val()
        if (_type == 2 || _type == 3) {
            getReports(_type, $("#request_year_select").val(), e.target.value, $("#request_daily_date").val())
        } else if (_type == 1) {
            renderBarChart(_type, __staffs, __reasons, __requests[$("#request_monthly_select").val()])
        }
    })

    $("#request_biweekly_select").change(e => {
        const _type = $("input[name='request_filter_day']:checked").val()
        renderBarChart(_type, __staffs, __reasons, __requests[$("#request_biweekly_select").val()])
    })

    $("#request_weekly_select").change(e => {
        const _type = $("input[name='request_filter_day']:checked").val()
        renderBarChart(_type, __staffs, __reasons, __requests[$("#request_weekly_select").val()])
    })

    $("#request_daily_date").change(e => {
        const _type = $("input[name='request_filter_day']:checked").val()
        getReports(_type, $("#request_year_select").val(), $("#request_monthly_select").val(), e.target.value)
    })
</script>