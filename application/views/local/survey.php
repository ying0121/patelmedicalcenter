<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('header.php'); ?>
        <style>
            .deleteqbtn{
                position: absolute;
                top: 10px;
                right: 10px;
                color: #f44336;
                cursor: pointer;
            }
            .questionitem{
                cursor: pointer;
            }
            .questionitem:hover{
                text-decoration:underline;
            }
            .field_ul{
                list-style: none;
                font-size: .875rem;
                padding:0!important;
            }
            .field_ul li{
                padding: 10px;
                border: 1px solid #eee;
                padding-left: 30px;
                border-radius: 10px;
                cursor: pointer;
                margin-bottom:5px;
                position: relative;
            }
            .response-item{
                padding: 10px;
                border: 1px solid #eee;
                padding-left: 30px;
                border-radius: 10px;
                cursor: pointer;
                margin-bottom:5px;
            }
            .response-item:hover{
                background: #eee;
            }
            .btn-group, .btn-group-vertical {
                margin: 0!important;
            }
            .ui-helper-hidden-accessible{
                display:none;
            }
            .text-danger{
                color:#f00;
            }
        </style>
    </head>
    <body>
        <div class="wrapper ">
			<div class="main-panel" style="width: 100%;">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-light-primary btn-sm generatebtn">Save</button>
                                <input type="hidden" id="chosen_id" value="<?php echo $id; ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header card-header-icon card-header-primary">
                                        <div class="card-icon">
                                        <i class="material-icons">widgets</i>
                                        </div>
                                        <div class = 'row'>
                                            <div class = 'col-md-12'><h4 class="card-title ">Category</h4></div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="accordion" id="accordionExample">
                                            <?php $tmpcnt = 0; ?>
                                            <?php foreach($questions as $key=>$questions_array): ?>
                                                <?php $tmpcnt ++; ?>
                                                <div class="card" style="margin:5px">
                                                    <div class="card-header" id="<?php echo $tmpcnt; ?>_headingOne" style="padding:0">
                                                        <h2 class="mb-0">
                                                            <a style="width:100%;text-align:left;" class="btn btn-link text-success" data-toggle="collapse" data-target="#<?php echo $tmpcnt; ?>_collapseOne" aria-expanded="false" aria-controls="<?php echo $tmpcnt; ?>_collapseOne">
                                                            <?php echo $key; ?>
                                                            </a>
                                                        </h2>
                                                    </div>
                                                    <div id="<?php echo $tmpcnt; ?>_collapseOne" class="collapse" aria-labelledby="<?php echo $tmpcnt; ?>_headingOne" data-parent="#accordionExample">
                                                        <div class="card-body">
                                                            <?php foreach($questions_array as $items): ?>
                                                                <p class="text-primary questionitem" key="<?php echo $items['id']; ?>" catname="<?php echo $key; ?>"><?php echo $items['question']; ?></p>
                                                            <?php endforeach ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card" style="min-height:800px;">
                                    <div class="card-header card-header-icon card-header-primary no-print">
                                    </div>
                                    <div class="card-body form-area">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul id="question_area" class = "field_ul">
                                                    <?php if($result['quiz'][0] != null): ?>
                                                    <?php for($i=0;$i<count($result['quiz']);$i++): ?>
                                                        <li class='parent' key = "<?php echo $result['quiz'][$i]['id'] ?>">
                                                            <p><?php echo $result['quiz'][$i]['quiz'] ?> (<span class="text-danger"><?php echo $result['quiz'][$i]['catname'] ?></span>)</p>
                                                            <i class="fa fa-trash deleteqbtn"></i>
                                                            <div class="<?php echo $result['quiz'][$i]['id'] ?>_response response_area">
                                                                <?php $tmpresArr = explode(",",$result['res'][$i]['res']); ?>
                                                                <?php if(count($tmpresArr) == 1 && $tmpresArr[0] == ""): ?>
                                                                    <div reskey="<?php echo $result['res'][$i]['id'] ?>" id="<?php echo $result['quiz'][$i]['id']."_".$result['res'][$i]['id'] ?>_response_item">
                                                                        <textarea class="form-control" rows="3" placeholder="General Response"></textarea>
                                                                    </div>
                                                                <?php else: ?>
                                                                    <div reskey="<?php echo $result['res'][$i]['id'] ?>" id="<?php echo $result['quiz'][$i]['id']."_".$result['res'][$i]['id'] ?>_response_item">
                                                                    <?php for($j=0;$j<count($tmpresArr);$j++): ?>
                                                                        <div class="form-check form-check-radio form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input" type="radio" name="<?php echo $result['quiz'][$i]['id']."_".$result['res'][$i]['id']."_option" ?>"> <?php echo $tmpresArr[$j]; ?>
                                                                                <span class="circle">
                                                                                    <span class="check"></span>
                                                                                </span>
                                                                            </label>
                                                                        </div>
                                                                    <?php endfor ?>
                                                                    </div>
                                                                <?php endif ?>
                                                            </div>
                                                        </li>
                                                    <?php endfor ?>
                                                    <?php endif ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header card-header-icon card-header-primary">
                                        <div class="card-icon">
                                        <i class="material-icons">widgets</i>
                                        </div>
                                        <div class = 'row'>
                                            <div class = 'col-md-12'><h4 class="card-title ">Response Widgets</h4></div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php foreach($reponses as $key=>$reponses_array): ?>
                                                    <?php $tmparray = explode(",",$reponses_array['response']); ?>
                                                    <div class="response-item" reskey="<?php echo $reponses_array['id'] ?>">
                                                        <?php if(count($tmparray) == 1 && $tmparray[0] == ""): ?>
                                                        <textarea class="form-control" rows="3" disabled placeholder="General Response"></textarea>
                                                        <?php else: ?>
                                                            <?php for($i=0;$i<count($tmparray);$i++): ?>
                                                            <div class="form-check form-check-radio form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="radio" disabled> <?php echo $tmparray[$i]; ?>
                                                                    <span class="circle">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <?php endfor ?>
                                                        <?php endif ?>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#question_area" ).sortable();
            $( "#question_area" ).disableSelection();
        } );
    </script>
    <script>
        var question_arr = [];
       
        $(document).ready(function() {
            $(".questionitem").click(function(){
                if(!question_arr.includes($(this).attr("key"))){
                    if($("#question_area li").length > 0 && $("#question_area li:last-child div.response_area div").length == 0){
                        $.notify({
                            icon: "add_alert",
                            message: "Please add response option before adding new question"

                            }, {
                            icon: 'warning',
                            timer: 1000,
                            placement: {
                                from: 'top',
                                align: 'center'
                            }
                        });
                    }
                    else{
                        question_arr.push($(this).attr("key"));
                        $("#question_area").append(`
                            <li class='parent' key = "${$(this).attr("key")}">
                                <p>${$(this).html()} (<span class="text-danger">${$(this).attr("catname")}</span>)</p>
                                <i class="fa fa-trash deleteqbtn"></i>
                                <div class="${$(this).attr("key")}_response response_area"></div>
                            </li>
                        `);
                    }
                }
                else{
                    $.notify({
                        icon: "add_alert",
                        message: "This question is already added"

                        }, {
                        icon: 'warning',
                        timer: 1000,
                        placement: {
                            from: 'top',
                            align: 'center'
                        }
                    });
                }
            });
            $(document).on("click",".deleteqbtn",function(){
                var tmpid = $(this).parent().attr("key");
                const index = question_arr.indexOf(tmpid);
                if (index > -1) {
                    question_arr.splice(index, 1);
                }
                $(this).parent().remove();
            });
            $(".response-item").click(function(){
                $.ajax({
                    url: '<?php echo base_url() ?>local/survey/chosenresponse',
                    type: 'post',
                    data: {id:$(this).attr("reskey")},
                    dataType: "json",
                    success: function (data) {
                        var tmpArr = data['response'].split(",");
                        if($("#question_area li:last-child div.response_area div").length == 0){
                            if(tmpArr.length == 1 && tmpArr[0] == ""){
                                $("#question_area li:last-child div.response_area").append(`
                                    <div reskey=${data['id']} id=${$("#question_area li:last-child").attr("key")+"_"+data['id']}_response_item>
                                        <textarea class="form-control" rows="3" placeholder="General Response"></textarea>
                                    </div>
                                `);
                            }
                            else{
                                $("#question_area li:last-child div.response_area").append(`
                                    <div reskey=${data['id']} id=${$("#question_area li:last-child").attr("key")+"_"+data['id']}_response_item></div>
                                `);
                                for(var i = 0;i < tmpArr.length;i++){
                                    $("#"+$("#question_area li:last-child").attr("key")+"_"+data['id']+"_response_item").append(`
                                        <div class="form-check form-check-radio form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="${$("#question_area li:last-child").attr("key")+"_"+data['id']}_option"> ${tmpArr[i]}
                                                <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    `);
                                }
                            }
                        }
                        else{
                            $.notify({
                                icon: "add_alert",
                                message: "Response is already added"

                                }, {
                                icon: 'warning',
                                timer: 1000,
                                placement: {
                                    from: 'top',
                                    align: 'center'
                                }
                            });
                        }
                    }
                });
            });
            $(".generatebtn").click(function(){
                var questionArr = [];
                var responseArr = [];
                for(var i = 0;i < $("#question_area li").length;i++){
                    questionArr.push($("#question_area").children().eq(i).attr("key"));
                    responseArr.push($("#question_area").children().eq(i).find("div.response_area").find("div").attr("reskey"));
                }
                if(questionArr.length == 0){
                    $.notify({
                        icon: "add_alert",
                        message: "Please add some questions to create survey"

                        }, {
                        type: 'info',
                        timer: 1000,
                        placement: {
                            from: 'top',
                            align: 'center'
                        }
                    });
                }
                else{
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        
                        
                        confirmButtonText: 'Yes, submit it!'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: '<?php echo base_url() ?>local/survey/generatesurvey',
                                type: 'post',
                                data: {id:$("#chosen_id").val(),quiz:questionArr,res:responseArr},
                                dataType: "text",
                                success: function (data) {
                                    if(data == "ok"){
                                        $.notify({
                                            icon: "add_alert",
                                            message: "Action Successfully"

                                            }, {
                                            type: 'info',
                                            timer: 1000,
                                            placement: {
                                                from: 'top',
                                                align: 'center'
                                            }
                                        });
                                    }
                                    else{
                                        $.notify({
                                            icon: "add_alert",
                                            message: "Action failed"

                                            }, {
                                            type: 'info',
                                            timer: 1000,
                                            placement: {
                                                from: 'top',
                                                align: 'center'
                                            }
                                        });
                                    }
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>
</html>
