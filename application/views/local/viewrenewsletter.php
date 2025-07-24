<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('header.php'); ?>
    </head>
    <body>
        <div class="wrapper ">
			<div class="main-panel" style="width:100%">
                <div class="content mt-0">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <span class="btn btn-icon btn-sm btn-light-warning submitnewsletterbtn">Update</span>
                                        <input type = 'hidden' class = 'base_url' value = "<?php echo base_url(); ?>" />
                                        <input type="hidden" id="chosen_id" value="<?php echo $result['id']; ?>" />
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>Author</h6>
                                            <input name = 'newsletter_author' id = 'newsletter_author' class="form-control" type="text" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>Date</h6>
                                            <input type="text" name = 'newsletter_date' id = 'newsletter_date' class="form-control datepicker">
                                        </div>
                                    </div>
 
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group  bmd-form-group">
                                            <label for="exampleFormControlSelect2">MEDICAL CONDITION</label>
                                            <select multiple class="form-control selectpicker" data-style="btn btn-link" id="newsletter_med_cond">
                                                <?php foreach($medConditions as $key=>$value): ?>
                                                    <option value="<?php echo $value["id"]; ?>"><?php echo $value["name"]; ?></option>
                                                <?php endforeach; ?>  
                                            </select>
                                        </div>
                                    </div>  
                                    <div class="col-md-4">
                                        <h6>GENDER</h6>
                                        <div class="form-check form-check-radio form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="gender_radio" id="inlineRadio1" value="0"> All
                                                <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-radio form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="gender_radio" id="inlineRadio2" value="1"> Male
                                                <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-radio form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="gender_radio" id="inlineRadio2" value="2"> Female
                                                <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h6>AGE</h6>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input newsletter_age_all_checkbox" type="checkbox" id="newsletter_age_all_checkbox" value="1"> All
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-group" style="display:inline-block!important">
                                            <label>From</label>
                                            <input style="width:50px" name = 'newsletter_age_from' id = 'newsletter_age_from' class="form-control" type="number" />
                                        </div>
                                        <span>~</span>
                                        <div class="form-group" style="display:inline-block!important">
                                            <label>To</label>
                                            <input style="width:50px" name = 'newsletter_age_to' id = 'newsletter_age_to' class="form-control" type="number" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group  bmd-form-group">
                                            <label for="exampleFormControlSelect2">Education Material</label>
                                            <select multiple class="form-control selectpicker" data-style="btn btn-link" id="newsletter_education_material">
                                            </select>
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>Subject (En)</h6>
                                            <input name = 'newsletter_sub_en' id = 'newsletter_sub_en' class="form-control" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>Subject (Es)</h6>
                                            <input name = 'newsletter_sub_es' id = 'newsletter_sub_es' class="form-control" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>Description (En)</h6>
                                            <div name = 'newsletter_desc_en' id = 'newsletter_desc_en'></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>Description (Es)</h6>
                                            <div name = 'newsletter_desc_es' id = 'newsletter_desc_es'></div>
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
    <script>
        console.log($('.base_url').val())
        $('#newsletter_desc_en').summernote({
            tabsize: 2,
            height: 700,
        });
        $('#newsletter_desc_es').summernote({
            tabsize: 2,
            height: 700,
        });
        $("#newsletter_sub_en").val("<?php echo $result['en_sub']; ?>");
        $("#newsletter_sub_es").val("<?php echo $result['es_sub']; ?>");
        $("#newsletter_author").val("<?php echo $result['author']; ?>");
        $("#newsletter_date").val("<?php echo $result['published']; ?>");
        $("#newsletter_desc_en").summernote("code",`<?php echo $result['en_desc']; ?>`);
        $("#newsletter_desc_es").summernote("code",`<?php echo $result['es_desc']; ?>`);
        $('#newsletter_med_cond').val(JSON.parse('<?php echo $result['med_cond']; ?>'));
        $('#newsletter_age_all_checkbox').prop('checked', <?php echo $result['age_all']; ?>);
        $("#newsletter_age_from").val("<?php echo $result['age_from']; ?>");
        $("#newsletter_age_to").val("<?php echo $result['age_to']; ?>");

        $("input:radio[name=gender_radio][value=<?php echo $result['gender']?>]").click();

        $(document).ready(function() {
            $(".submitnewsletterbtn").click(function(){
                var fd = new FormData();
                fd.append('id',$("#chosen_id").val());
                fd.append('en_sub',$("#newsletter_sub_en").val());
                fd.append('es_sub',$("#newsletter_sub_es").val());
                fd.append('author',$("#newsletter_author").val());
                fd.append('date',$("#newsletter_date").val());
                fd.append('med_cond',JSON.stringify($("#newsletter_med_cond").val()));
                fd.append('education_material',JSON.stringify($("#newsletter_education_material").val()));
                fd.append('gender', $('input[name=gender_radio]:checked').val());
                fd.append('age_all', $("#newsletter_age_all_checkbox").is(':checked'));
                fd.append('age_from', $("#newsletter_age_from").val());
                fd.append('age_to', $("#newsletter_age_to").val());
                fd.append('en_desc',$("#newsletter_desc_en").summernote("code"));
                fd.append('es_desc',$("#newsletter_desc_es").summernote("code"));
                $.ajax({
                    url: '<?php echo base_url() ?>local/newsletter/updatenewsletter',
                    type: 'POST',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            $.notify({
                                icon: "add_alert",
                                message: "Action Successful"

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
            })
            $("#newsletter_age_all_checkbox").change(function(){
                if($("#newsletter_age_all_checkbox").is(':checked')){
                    $("#newsletter_age_from").prop('disabled', true);
                    $("#newsletter_age_to").prop('disabled', true);
                }
                else{
                    $("#newsletter_age_from").prop('disabled', false);
                    $("#newsletter_age_to").prop('disabled', false);
                }

            });
            $("#newsletter_med_cond").change(()=>{loadEducationMateiral();});

        });

        loadEducationMateiral();

        function loadEducationMateiral() {

           

            var fd = new FormData();
            fd.append('med_cond',JSON.stringify($("#newsletter_med_cond").val()));
            $.ajax({
                url: '<?php echo base_url() ?>local/newsletter/getEducationMaterial',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                dataType: "text",
                success: function (data) {
                    var items = JSON.parse(data);
                    console.log(items);
                    $('#newsletter_education_material').empty();
                    $.each(items.data, function (i, item) {
                        
                        $('#newsletter_education_material').append($('<option>', { 
                            value: item.value,
                            text : item.text 
                        }));
                    });

                    $('#newsletter_education_material').val(JSON.parse('<?php echo $result['edu_material']; ?>'));
                    $('#newsletter_education_material').data().selectpicker.refresh();
                }
            }); 
        }
    </script>
</html>
