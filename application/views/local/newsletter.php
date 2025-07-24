<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('header.php'); ?>
    <style>
      .btn-group, .btn-group-vertical {
          margin: 0!important;
      }
      .btn-group-newsletter{
          position: absolute;
          right: 30px;
          top: 20px;
      }
      .btn-group-newsletter i{
          cursor: pointer;
      }
      .bootstrap-tagsinput{
          width:100%!important;
      }
      .label-info {
          background: #0774f8;
          color: #fff;
      }
      .tag {
          font-size: 0.75rem;
          color: #25252a;
          border-radius: 3px;
          padding: 0 .5rem;
          line-height: 2em;
          display: -ms-inline-flexbox;
          display: inline-flex;
          cursor: default;
          font-weight: 400;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
          margin-top: 2px;
      }
      .image-item {
        padding: 10px;
        display: inline-block;
        margin-bottom: 10px;
        border: 1px solid transparent;
        border-radius: 6px;
        cursor: pointer;
      }
      .image-item img {
        max-width: 180px;
      }
      .image-item p {
        font-weight: 700;
        font-size: 14px;
        margin-top: 8px;
      }
      .image-item:hover {
        border-color: #999;
      }
      .active-item {
        border-color: #999;
      }
      .set-item {
        border-color: #4169e1;
      }
      .set-item p {
        color: #4169e1;
      }
    </style>
  </head>
  <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <?php $this->load->view('local/mobile_topmenu'); ?>
        <div class="d-flex flex-column flex-root">
            <div class="d-flex flex-row flex-column-fluid page">
                <?php $this->load->view('local/menu'); ?>
                <div class="d-flex flex-column flex-row-fluid wrapper pt-20" id="kt_wrapper">
                    <?php $this->load->view('local/topmenu'); ?>
                    <div class="content d-flex flex-column flex-column-fluid p-10">
              <div class = "row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header card-header-icon card-header-primary no-print">
                      <div class = 'row'>
                          <input type="hidden" id="chosen_newsletter_id" />
                          <div class = 'col-md-12 text-right'><span class = 'newsletter_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table" id="newsletter_tb">
                          <thead>
                            <th>Subject</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th class = "actionth">Action</th>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
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
  <!-- The Modal -->
	<div class="modal fade" id="newsletter_add_modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title ">Add Newsletter</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class = "row">
            <div class="col-md-6">
                <div class="form-group">
                    <h6>Subject (En)</h6>
                    <input name = 'newsletter_sub_en' id = 'newsletter_sub_en' class="form-control" type="text" required />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h6>Subject (Es)</h6>
                    <input name = 'newsletter_sub_es' id = 'newsletter_sub_es' class="form-control" type="text" required />
                </div>
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light-primary newsletteraddbtn" data-dismiss="modal">Done</button>
          <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
	</div>
  <!--- end modal -->
  <!-- The Modal -->
	<div class="modal fade" id="newsletter_email_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Send Newsletter Email</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input emaillangnewsletter" checked name="emaillangnewsletter" type="radio" value="1"> ENG
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input emaillangnewsletter" name="emaillangnewsletter" type="radio" value="2"> SPA
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check form-check-inline">
                              <label class="form-check-label">
                                  <input class="form-check-input newsletter_allpts" type="checkbox" value="1"> All Patients
                                  <span class="form-check-sign">
                                      <span class="check"></span>
                                  </span>
                              </label>
                            </div>
                            <div class="form-group" style="display:inline-block!important">
                                <label>Appointment Months</label>
                                <input name = 'newsletter_apt_month' id = 'newsletter_apt_month' class="form-control" type="number" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary submitemailbtn" data-dismiss="modal">Done</button>
                    <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
  <!-- The Modal -->
	<div class="modal fade" id="newsletter_phone_modal">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                      <h4 class="modal-title ">Send Newsletter SMS</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-check form-check-radio form-check-inline">
                              <label class="form-check-label">
                                  <input class="form-check-input phonelangnewsletter" checked name="phonelangnewsletter" type="radio" value="1"> ENG
                                  <span class="circle">
                                      <span class="check"></span>
                                  </span>
                              </label>
                          </div>
                          <div class="form-check form-check-radio form-check-inline">
                              <label class="form-check-label">
                                  <input class="form-check-input phonelangnewsletter" name="phonelangnewsletter" type="radio" value="2"> SPA
                                  <span class="circle">
                                      <span class="check"></span>
                                  </span>
                              </label>
                          </div>

                      </div>
                      <div class="col-md-12">
                          <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input allsmspts" type="checkbox" value="1" > All Patients
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                          </div>
                          <div class="form-group" style="display:inline-block!important">
                              <label>Appointment Months</label>
                              <input name = 'newsletter_sms_apt_month' id = 'newsletter_sms_apt_month' class="form-control" type="number" />
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                  <button type="button" class="btn btn-light-primary submitphonebtn" data-dismiss="modal">Done</button>
                  <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
</div>
  <!--- end modal -->
  <!-- The Modal -->
	<div class="modal fade" id="avatar_edit_modal">
    <div class="modal-dialog">
      <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
              <h4 class="modal-title ">Update Header Image</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body text-center">
            <?php for($i=0;$i<count($images);$i++): ?>
              <div class="image-item" id="<?php echo $images[$i]['id'] ?>">
                <img src="<?php echo base_url() ?>/assets/images/newsimg/<?php echo $images[$i]['img'] ?>" />
                <p><?php echo $images[$i]['name'] ?></p>
              </div>
            <?php endfor ?>
          </div>
          <!-- Modal footer -->
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-light-primary imgsubmitbtn" data-dismiss="modal">Done</button>
            <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
	</div>
  <!--- end modal -->
  <script>
    $(document).ready(function() {
      $('.allsmspts').prop('checked', true);
      $('.newsletter_allpts').prop('checked', true);
      $("#newsletter_apt_month").prop('disabled', true);
      $("#newsletter_sms_apt_month").prop('disabled', true);
      
      //$('#phone_list').tagsinput();
      let newslettertable = $('#newsletter_tb').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search newsletter",
        },
        "ajax": {
            "url": "<?php echo base_url() ?>local/Newsletter/getnewsletter",
            "type": "GET"
        },
        "columns": [
            { data: 'en_sub'},
            { data: 'author'},
            { data: 'published'},
            { data: 'status',
                render: function (data, type, row) {
                    return `
                    <div idkey="`+row.id+`">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input newsletterstatus" type="checkbox" ${row.status==1?"checked":""}>
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    `
                } 
            },
            { data: 'id',
                render: function (data, type, row) {
                    return `
                    <div idkey="`+row.id+`">
                    <span class="btn btn-icon btn-sm btn-light-primary newsimgbtn" imgid="`+row.img+`"><i class="fas fa-image"></i></span>
                    <span class="btn btn-icon btn-sm btn-light-primary sendsmsbtn"><i class="fa fa-mobile"></i></span>
                    <span class="btn btn-icon btn-sm btn-light-primary sendemailbtn"><i class="fa fa-envelope"></i></span>
                    <a href="<?php echo base_url() ?>local/newsletter/viewrenewsletter?id=" + row.id}" target="_blank"><span class="btn btn-icon btn-sm btn-light-warning newslettereditbtn"><i class="fa fa-eye"></i></span></a>
                    <span class="btn btn-icon btn-sm btn-light-danger  newsletterdeletebtn"><i class="fas fa-trash"></i></span>
                    </div>
                    `
                } 
            }
        ]
      });
      $(".newsletter_add").click(function(){
        $("#newsletter_add_modal").modal('show');
      });
      $(".newsletteraddbtn").click(function(){
        var fd = new FormData();
        fd.append('en_sub',$("#newsletter_sub_en").val());
        fd.append('es_sub',$("#newsletter_sub_es").val());
        fd.append('author',$("#newsletter_author").val());
        fd.append('date',$("#newsletter_date").val());
        $.ajax({
            url: '<?php echo base_url() ?>local/newsletter/addnewsletter',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            dataType: "text",
            success: function (data) {
              if(data == "ok"){
                setTimeout( function () {
                    newslettertable.ajax.reload();
                }, 1000 );
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
      });
      $(document).on("click",".newsletterstatus",function(){
          var tmpcheck = 0;
          if($(this).prop("checked")){
              tmpcheck = 1;
          }
          else{
              tmpcheck = 0;
          }
          $.ajax ({
              url: '<?php echo base_url() ?>local/newsletter/editnewsletterstatus',
              method: "POST",
              data: {id:$(this).parent().parent().parent().attr("idkey"),value:tmpcheck},
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
      });
      $(document).on("click",".newsletterdeletebtn",function(){
          $("#chosen_newsletter_id").val($(this).parent().attr("idkey"));
          var tmp = $(this).parent().parent().parent();
          Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  
                  
                  confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
              if (result.value) {
                  $.ajax ({
                      url: '<?php echo base_url() ?>local/newsletter/deletenewsletter',
                      method: "POST",
                      data: {id:$("#chosen_newsletter_id").val()},
                      dataType: "text",
                      success: function (data) {
                          if(data = "ok")
                              tmp.remove();
                      }
                  });
              }
          });
      });
      $(document).on("click",".sendemailbtn",function(){
          $("#chosen_newsletter_id").val($(this).parent().attr("idkey"));
          $("#newsletter_email_modal").modal("show");
      });
      $(".submitemailbtn").click(function(){
        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                
                
                confirmButtonText: 'Yes, send it!'
        }).then((result) => {
            if (result.value) {
              $.ajax ({
                  url: '<?php echo base_url() ?>local/newsletter/sendemail',
                  method: "POST",
                  data: {id:$("#chosen_newsletter_id").val(),
                        lang:$(".emaillangnewsletter:checked").val(),
                        all:$(".newsletter_allpts").is(':checked'),
                        apt_months:$("#newsletter_apt_month").val()
                      },
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
      })
      $(document).on("click",".newsimgbtn",function(){
          $("#chosen_newsletter_id").val($(this).parent().attr("idkey"));
          $(".image-item").removeClass("set-item");
          $(".image-item").removeClass("active-item");
          $(".image-item[id="+$(this).attr("imgid")+"]").addClass("set-item");
          $("#avatar_edit_modal").modal('show');
      });
      $(".image-item").click(function(){
        $(".image-item").removeClass('active-item');
        $(this).addClass('active-item');
      });
      $(".imgsubmitbtn").click(function(){
        $.ajax ({
            url: '<?php echo base_url() ?>local/newsletter/addimgtonews',
            method: "POST",
            data: {id:$("#chosen_newsletter_id").val(),img:$(".active-item").attr("id")},
            dataType: "text",
            success: function (data) {
                if(data == "ok"){
                  location.reload();
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
      $(document).on("click",".sendsmsbtn",function(){
          $("#chosen_newsletter_id").val($(this).parent().attr("idkey"));
          $("#newsletter_phone_modal").modal("show");
      });
      $(".newsletter_allpts").change(function(){
          if($(".newsletter_allpts").is(':checked'))
            $("#newsletter_apt_month").prop('disabled', true);
          else
            $("#newsletter_apt_month").prop('disabled', false);

      });

      $(".allsmspts").change(function(){
          if($(".allsmspts").is(':checked'))
            $("#newsletter_sms_apt_month").prop('disabled', true);
          else
            $("#newsletter_sms_apt_month").prop('disabled', false);

      });

      $(".submitphonebtn").click(function(){
            Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    
                    confirmButtonText: 'Yes, send it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax ({
                        url: '<?php echo base_url() ?>local/newsletter/sendsms',
                        method: "POST",
                        data: {id:$("#chosen_newsletter_id").val(),
                              lang:$(".phonelangnewsletter:checked").val(),
                              all:$(".allsmspts").is(':checked'),
                              apt_months:$("#newsletter_sms_apt_month").val()
                        },
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
        });
    });
  </script>
</html>
