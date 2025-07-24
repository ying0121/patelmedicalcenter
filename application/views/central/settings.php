<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('header.php'); ?>
        <style>
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
            .btn-group, .btn-group-vertical {
                margin: 0!important;
            }
            .viewmeasurebtn{
                position: relative;
            }
            .viewmeasure{
                position: absolute;
                top: -7px;
                border: 1px solid #FFF;
                right: -5px;
                font-size: 9px;
                background: #f44336;
                color: #FFFFFF;
                min-width: 20px;
                padding: 0px 5px;
                height: 20px;
                border-radius: 10px;
                text-align: center;
                line-height: 19px;
                vertical-align: middle;
                display: block;
            }
        </style>
    </head>
    <body>
        <div class="wrapper ">
            <?php include('menu.php'); ?>
			<div class="main-panel">
                <div class = "loading-bg"><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>
                <div class="content">
                    <div class="container-fluid">
                        <?php include('topmenu.php'); ?>
                        <div class = "row">
                            <div class="col-md-12">
                                <div class="card card-nav-tabs card-plain">
                                    <div class="card-header card-header-primary">
                                        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                        <div class="nav-tabs-navigation">
                                            <div class="nav-tabs-wrapper">
                                                <ul class="nav nav-tabs" data-tabs="tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="#contactemail" data-toggle="tab">
                                                        <i class="material-icons">dashboard</i>Contact Emails
                                                        <div class="ripple-container"></div>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#contactreason" data-toggle="tab">
                                                        <i class="material-icons">dashboard</i>Contact Reasons
                                                        <div class="ripple-container"></div>
                                                        </a>
                                                    </li>


                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#imgarea" data-toggle="tab">
                                                        <i class="material-icons">dashboard</i>Some Area Images
                                                        <div class="ripple-container"></div>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#surcategory" data-toggle="tab">
                                                        <i class="material-icons">dashboard</i>Survey Categories
                                                        <div class="ripple-container"></div>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#surquestions" data-toggle="tab">
                                                        <i class="material-icons">dashboard</i>Survey Questions
                                                        <div class="ripple-container"></div>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#surresponse" data-toggle="tab">
                                                        <i class="material-icons">dashboard</i>Survey Response
                                                        <div class="ripple-container"></div>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#surfooter" data-toggle="tab">
                                                        <i class="material-icons">dashboard</i>Survey Footer
                                                        <div class="ripple-container"></div>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#newsimg" data-toggle="tab">
                                                        <i class="material-icons">dashboard</i>Newsletter Images
                                                        <div class="ripple-container"></div>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#defined_medical_conditions" data-toggle="tab">
                                                        <i class="material-icons">dashboard</i>Medical Conditions
                                                        <div class="ripple-container"></div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                        <div class="tab-content">

                                            <div class="tab-pane active" id="contactemail">
                                                <div class = "row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header card-header-icon card-header-primary no-print">
                                                                <div class = 'row'>
                                                                    <div class = 'col-md-12 text-right'><span class = 'cemail_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                                                                    <input type="hidden" id="chosen_cemail_id" />
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="cemail_tb">
                                                                        <thead>
                                                                            <th>Contact Name</th>
                                                                            <th>Email</th>
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

                                            <div class="tab-pane" id="contactreason">
                                                <div class = "row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header card-header-icon card-header-primary no-print">
                                                                <div class = 'row'>
                                                                    <div class = 'col-md-12 text-right'><span class = 'creason_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                                                                    <input type="hidden" id="chosen_creason_id" />
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="creason_tb">
                                                                        <thead>
                                                                            <th>English</th>
                                                                            <th>Español</th>
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

                                            <div class="tab-pane" id="imgarea">
                                                <div class = "row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header card-header-icon card-header-primary no-print">
                                                                <div class = 'row'>
                                                                    <div class = 'col-md-12 text-right'><span class = 'imgarea_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                                                                    <input type="hidden" id="chosen_pageimg_id" />
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="imgarea_tb">
                                                                        <thead>
                                                                            <th>Page</th>
                                                                            <th>Description</th>
                                                                            <th>Image</th>
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

                                            <div class="tab-pane" id="surcategory">
                                                <div class = "row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header card-header-icon card-header-primary no-print">
                                                                <div class = 'row'>
                                                                    <div class = 'col-md-12 text-right'><span class = 'surcat_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                                                                    <input type="hidden" id="chosen_surcat_id" />
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="surcat_tb">
                                                                        <thead>
                                                                            <th>English</th>
                                                                            <th>Español</th>
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

                                            <div class="tab-pane" id="surquestions">
                                                <div class = "row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header card-header-icon card-header-primary no-print">
                                                                <div class = 'row'>
                                                                    <div class = 'col-md-12 text-right'><span class = 'surque_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                                                                    <input type="hidden" id="chosen_surque_id" />
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="surque_tb">
                                                                        <thead>
                                                                            <th>Category</th>
                                                                            <th>English</th>
                                                                            <th>Español</th>
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

                                            <div class="tab-pane" id="surresponse">
                                                <div class = "row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header card-header-icon card-header-primary no-print">
                                                                <div class = 'row'>
                                                                    <div class = 'col-md-12 text-right'><span class = 'surres_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                                                                    <input type="hidden" id="chosen_surres_id" />
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="surres_tb">
                                                                        <thead>
                                                                            <th>Key</th>
                                                                            <th>English</th>
                                                                            <th>Español</th>
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

                                            <div class="tab-pane" id="surfooter">
                                                <div class = "row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <h6>Footer (En)</h6>
                                                                            <div name = 'survey_footer_en' id = 'survey_footer_en'></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <h6>Footer (Es)</h6>
                                                                            <div name = 'survey_footer_es' id = 'survey_footer_es'></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <button class="btn btn-light-primary submitsurveyfooterbtn">Update</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="newsimg">
                                                <div class = "row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header card-header-icon card-header-primary no-print">
                                                                <div class = 'row'>
                                                                    <div class = 'col-md-12 text-right'><span class = 'newsimg_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                                                                    <input name = 'chosen_newsimg_id' id = 'chosen_newsimg_id' type="hidden" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="newsimg_tb">
                                                                        <thead>
                                                                            <th>Image</th>
                                                                            <th>Name</th>
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

                                            <div class="tab-pane" id="defined_medical_conditions">
                                                <div class = "row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header card-header-icon card-header-primary no-print">
                                                                <div class = 'row'>
                                                                    <div class = 'col-md-12 text-right'><span class = 'defined_medical_condition_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                                                                    <input type="hidden" id="chosen_defined_medical_condition_id" />
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="defined_medical_condition_tb">
                                                                        <thead>
                                                                            <th>Condition Name</th>
                                                                            <th>ICDS Codes</th>
                                                                            <th class = "actionth"></th>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <!-- The Modal -->
	<div class="modal fade" id="cemail_add_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Add User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Full Name</h6>
                                <input name = 'cemail_name' id = 'cemail_name' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Email</h6>
                                <input name = 'cemail_email' id = 'cemail_email' class="form-control" type="email" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary cemailaddbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="cemail_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Edit User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Full Name</h6>
                                <input name = 'ecemail_name' id = 'ecemail_name' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Email</h6>
                                <input name = 'ecemail_email' id = 'ecemail_email' class="form-control" type="email" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary cemaileditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="creason_add_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Add Reason</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>English</h6>
                                <input name = 'en_creason' id = 'en_creason' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Español</h6>
                                <input name = 'es_creason' id = 'es_creason' class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary creasonaddbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="creason_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Edit Reason</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>English</h6>
                                <input name = 'een_creason' id = 'een_creason' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Español</h6>
                                <input name = 'ees_creason' id = 'ees_creason' class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary creasoneditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="imgarea_add_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Add Image</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class = "row">
                            <div class = "col-md-12">
                                <div class="form-group">
                                    <h6>Page</h6>
                                    <select name = 'pageimg' id = 'pageimg' class="form-control">
                                        <?php foreach($menu as $menu_array): ?>
                                            <option value="<?php echo $menu_array['id']; ?>"><?php echo $menu_array['en']; ?></option>
                                        <?php endforeach ?>
                                        <option value="101">The Clinic</option>
                                        <option value="102">Symptom Checker</option>
                                        <option value="103">Contact</option>
                                    </select>
                                </div>
                            </div>
                            <div class = 'col-md-12'>
                                <div class="form-group">
                                    <h6>Description</h6>
                                    <input name = 'pagedesc' id = 'pagedesc' class="form-control" type="text" />
                                </div>
                            </div>
                            <div class = 'col-md-12'>
                                <h6>Image ( 1900 * 420 )</h6>
                                <div class="custom-file form-group">
                                    <input type="file" class="custom-file-input" id="imgitem" name="imgitem">
                                    <label class="custom-file-label" for="imgitem">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary pageimgsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="imgarea_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Edit Image</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class = "row">
                            <div class = 'col-md-12'>
                                <h6>Image ( 1900 * 420 )</h6>
                                <div class="custom-file form-group">
                                    <input type="file" class="custom-file-input" id="eimgitem" name="eimgitem">
                                    <label class="custom-file-label" for="eimgitem">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary pageimgeditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
     <!-- The Modal -->
	<div class="modal fade" id="qcat_add_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Add Category</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>English</h6>
                                <input name = 'en_qcat' id = 'en_qcat' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Español</h6>
                                <input name = 'es_qcat' id = 'es_qcat' class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary qcataddbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="qcat_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Edit Category</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>English</h6>
                                <input name = 'een_qcat' id = 'een_qcat' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Español</h6>
                                <input name = 'ees_qcat' id = 'ees_qcat' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Status</h6>
                                <select class="form-control" name="eqcatstatus" id="eqcatstatus" style="height:36px;">
                                    <option value="1">Visible</option>
                                    <option value="0">Invisible</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary qcateditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
     <!-- The Modal -->
	<div class="modal fade" id="surcat_add_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Add Category</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>English</h6>
                                <input name = 'en_surcat' id = 'en_surcat' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Español</h6>
                                <input name = 'es_surcat' id = 'es_surcat' class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary surcataddbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="surcat_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Edit Category</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>English</h6>
                                <input name = 'een_surcat' id = 'een_surcat' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Español</h6>
                                <input name = 'ees_surcat' id = 'ees_surcat' class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary surcateditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="surque_add_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Add Question</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Cateogry</h6>
                                <select name = 'survey_cat' id = 'survey_cat' class="form-control">
                                    <?php foreach($surveycats as $surveycats_array): ?>
                                        <option value="<?php echo $surveycats_array['id']; ?>"><?php echo $surveycats_array['en_name']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>English</h6>
                                <input name = 'en_surque' id = 'en_surque' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Español</h6>
                                <input name = 'es_surque' id = 'es_surque' class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary surqueaddbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="surque_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Edit Question</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Cateogry</h6>
                                <select name = 'esurvey_cat' id = 'esurvey_cat' class="form-control">
                                    <?php foreach($surveycats as $surveycats_array): ?>
                                        <option value="<?php echo $surveycats_array['id']; ?>"><?php echo $surveycats_array['en_name']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>English</h6>
                                <input name = 'een_surque' id = 'een_surque' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Español</h6>
                                <input name = 'ees_surque' id = 'ees_surque' class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary surqueeditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="surres_add_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Add Response</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Key</h6>
                                <input name = 'survey_res' id = 'survey_res' class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary surresaddbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="surres_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Edit Response</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Key</h6>
                                <input name = 'esurvey_res' id = 'esurvey_res' class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary surreseditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="newsimg_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title ">Upload Image</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form id = "updatenewsimg" action="<?php echo base_url('central/settings/updatenewsimg'); ?>" method="post" enctype="multipart/form-data">
                        <div class = "row">
                            <div class = 'col-md-12'>
                                <div class="form-group">
                                    <label class="bmd-label-static">Newsletter Image Name</label>
                                    <input name = 'newsimg' id = 'newsimg' type="text" class="form-control">
                                </div>
                            </div>
                            <div class = 'col-md-12'>
                                <h6>newsimg Image ( 1600*434 )</h6>
                                <div class="custom-file form-group">
                                    <input type="file" class="custom-file-input" id="customFile" name="file">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary newsimgeditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
    <div class="modal fade" id="defined_medical_condition_add_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Add Medical Condition</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Condition Name</h6>
                                <input name = 'defined_medical_condition_add_modal_name' id = 'defined_medical_condition_add_modal_name' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>ICDS Codes</h6>
                                <textarea name = 'defined_medical_condition_add_modal_codes' id = 'defined_medical_condition_add_modal_codes' class="form-control" type="text" style="height:200px!important"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary defined_medical_condition_add_modal_addbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--- end modal -->
    <!-- The Modal -->
    <div class="modal fade" id="defined_medical_condition_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Edit Medical Condition</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Condition Name</h6>
                                <input name = 'defined_medical_condition_edit_modal_name' id = 'defined_medical_condition_edit_modal_name' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>ICDS Codes</h6>
                                <textarea name = 'defined_medical_condition_edit_modal_codes' id = 'defined_medical_condition_edit_modal_codes' class="form-control" type="text" style="height:200px!important" ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary defined_medical_condition_add_modal_editsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--- end modal -->
    <script>
        $(document).ready(function() {
            $('#survey_footer_en').summernote({
                tabsize: 1,
                height: 250,
            });
            $('#survey_footer_es').summernote({
                tabsize: 1,
                height: 250,
            });
            $("#survey_footer_en").summernote("code",`<?php echo $surveyfooter['en']; ?>`);
            $("#survey_footer_es").summernote("code",`<?php echo $surveyfooter['es']; ?>`);
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
            let cemailtable = $('#cemail_tb').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                },
                "ajax": {
                    "url": "<?php echo base_url() ?>central/Settings/getcemail",
                    "type": "GET"
                },
                "columns": [
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'id',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`">
                                <span class="btn btn-icon btn-sm btn-light-warning cemaileditbtn"><i class="fas fa-edit"></i></span><span class="btn btn-icon btn-sm btn-light-danger  cemaildeletebtn"><i class="fas fa-trash"></i></span>
                            </div>
                            `
                        } 
                    }
                ]
            });
            let creasontable = $('#creason_tb').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                },
                "ajax": {
                    "url": "<?php echo base_url() ?>central/Settings/getcreason",
                    "type": "GET"
                },
                "columns": [
                    { data: 'en_name' },
                    { data: 'es_name' },
                    { data: 'id',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`">
                                <span class="btn btn-icon btn-sm btn-light-warning creasoneditbtn"><i class="fas fa-edit"></i></span><span class="btn btn-icon btn-sm btn-light-danger  creasondeletebtn"><i class="fas fa-trash"></i></span>
                            </div>
                            `
                        } 
                    }
                ]
            });
            let imgareatable = $('#imgarea_tb').DataTable({
                "pagingType": "full_numbers",
                "order": [[ 2, 'asc' ]],
                "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                },
                "ajax": {
                    "url": "<?php echo base_url() ?>central/Settings/getpageimg",
                    "type": "GET"
                },
                "columns": [
                    { data: 'page'},
                    { data: 'desc'},
                    { data: 'img',
                        render: function (data, type, row) {
                            if(row.img != null)
                                return `
                                <img src=""<?php echo base_url() ?>assets/images/pageimg/"+row.img}" width="100" />
                                `
                            else
                                return ``
                        } 
                    },
                    { data: 'id',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`">
                                <span class="btn btn-icon btn-sm btn-light-warning pageimgeditbtn"><i class="fas fa-edit"></i></span><span class="btn btn-icon btn-sm btn-light-danger  pageimgdeletebtn"><i class="fas fa-trash"></i></span>
                            </div>
                            `
                        } 
                    }
                ]
            });
            let surcattable = $('#surcat_tb').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                },
                "ajax": {
                    "url": "<?php echo base_url() ?>central/Settings/getsurcat",
                    "type": "GET"
                },
                "columns": [
                    { data: 'en_name' },
                    { data: 'es_name' },
                    { data: 'id',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`">
                                <span class="btn btn-icon btn-sm btn-light-warning surcateditbtn"><i class="fas fa-edit"></i></span><span class="btn btn-icon btn-sm btn-light-danger  surcatdeletebtn"><i class="fas fa-trash"></i></span>
                            </div>
                            `
                        } 
                    }
                ]
            });
            let surquetable = $('#surque_tb').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                },
                "ajax": {
                    "url": "<?php echo base_url() ?>central/Settings/getsurque",
                    "type": "GET"
                },
                "columns": [
                    { data: 'cat' },
                    { data: 'en_name' },
                    { data: 'es_name' },
                    { data: 'id',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`">
                                <span class="btn btn-icon btn-sm btn-light-warning surqueeditbtn"><i class="fas fa-edit"></i></span><span class="btn btn-icon btn-sm btn-light-danger  surquedeletebtn"><i class="fas fa-trash"></i></span>
                            </div>
                            `
                        } 
                    }
                ]
            });
            let surrestable = $('#surres_tb').on('init.dt', function () {
                //$("#surres_tb input[id^=en]").tagsinput();
                //$("#surres_tb input[id^=es]").tagsinput();
            }).DataTable(
                {
                "ajax": {
                    "url": "<?php echo base_url() ?>central/Settings/getsurres",
                    "type": "GET",
                },
                "columns": [
                    { data: 'key' },
                    { data: 'en_name',
                        render: function (data, type, row) {
                            return '<input class="form-control tagsinputitem" type="text" data-role="tagsinput"  id="en' + row.id + '" onchange="changeAliasen(' + row.id + ')" value="' + data + '">';
                        } 
                    },
                    { data: 'es_name',
                        render: function (data, type, row) {
                            return '<input class="form-control tagsinputitem" type="text" data-role="tagsinput"  id="es' + row.id + '" onchange="changeAliases(' + row.id + ')" value="' + data + '">';
                        } 
                    },
                    { data: 'id',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`">
                                <span class="btn btn-icon btn-sm btn-light-warning surreseditbtn"><i class="fas fa-edit"></i></span><span class="btn btn-icon btn-sm btn-light-danger  surresdeletebtn"><i class="fas fa-trash"></i></span>
                            </div>
                            `;
                        } 
                    }
                ]
                }
            );
            let newsimgtable = $('#newsimg_tb').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                },
                "ajax": {
                    "url": "<?php echo base_url() ?>central/Settings/getnewsimg",
                    "type": "GET"
                },
                "columns": [
                    { data: 'img',
                        render: function (data, type, row) {
                            if(row.img != null)
                                return `
                                <img src="${"<?php echo base_url() ?>assets/images/newsimg/"+row.img}" width="50" />
                                `
                            else
                                return `
                                <img src="${"<?php echo base_url() ?>assets/images/newsimg/empty-img.jpg"}" width="50" />
                                `
                        } 
                    },
                    { data: 'name' },
                    { data: 'id',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`">
                                <span class="btn btn-icon btn-sm btn-light-danger  newsimgdeletebtn"><i class="fas fa-trash"></i></span>
                            </div>
                            `
                        } 
                    }
                ]
            });
            //defined medical condition
            let definedMedicalConditionTable = $('#defined_medical_condition_tb').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                },
                "ajax": {
                    "url": "<?php echo base_url() ?>central/Settings/getDefinedMedicalCondition",
                    "type": "GET"
                },
                "columns": [
                    { data: 'name' }, 
                    { data: 'codes',
                        render: function (data, type, row) {
                            return `
                            <div>
                                <span style='word-break:break-word'>`+row.codes+`</span>
                            </div>
                            `
                        } },
                    { data: 'id',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`">
                                <span class="btn btn-icon btn-sm btn-light-warning defined_medical_condition_editbtn"><i class="fas fa-edit"></i></span><span class="btn btn-icon btn-sm btn-light-danger  defined_medical_condition_deletebtn"><i class="fas fa-trash"></i></span>
                            </div>
                            `
                        } 
                    }
                ]
            });

            //Cemail Area 
            $(".cemail_add").click(function(){
                $("#cemail_add_modal").modal('show');
            });
            $(".cemailaddbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/addcemail',
                    method: "POST",
                    data: {name:$("#cemail_name").val(),email:$("#cemail_email").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                cemailtable.ajax.reload();
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
            $(document).on("click",".cemaileditbtn",function(){
                $("#chosen_cemail_id").val($(this).parent().attr("idkey"));
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/chosencemail',
                    method: "POST",
                    data: {id:$("#chosen_cemail_id").val()},
                    dataType: "json",
                    success: function (data) {
                        $("#ecemail_name").val(data['name']);
                        $("#ecemail_email").val(data['email']);
                        $("#cemail_edit_modal").modal('show');
                    }
                });
            });
            $(".cemaileditsubmitbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/editcemail',
                    method: "POST",
                    data: {id:$("#chosen_cemail_id").val(),name:$("#ecemail_name").val(),email:$("#ecemail_email").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                cemailtable.ajax.reload();
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
            $(document).on("click",".cemaildeletebtn",function(){
                $("#chosen_cemail_id").val($(this).parent().attr("idkey"));
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
                            url: '<?php echo base_url() ?>central/settings/deletecemail',
                            method: "POST",
                            data: {id:$("#chosen_cemail_id").val()},
                            dataType: "text",
                            success: function (data) {
                                if(data = "ok")
                                    tmp.remove();
                            }
                        });
                    }
                });
            });
            //Creason Area
            $(".creason_add").click(function(){
                $("#creason_add_modal").modal('show');
            });
            $(".creasonaddbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/addcreason',
                    method: "POST",
                    data: {en:$("#en_creason").val(),es:$("#es_creason").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                creasontable.ajax.reload();
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
            $(document).on("click",".creasoneditbtn",function(){
                $("#chosen_creason_id").val($(this).parent().attr("idkey"));
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/chosencreason',
                    method: "POST",
                    data: {id:$("#chosen_creason_id").val()},
                    dataType: "json",
                    success: function (data) {
                        $("#een_creason").val(data['en_name']);
                        $("#ees_creason").val(data['es_name']);
                        $("#creason_edit_modal").modal('show');
                    }
                });
            });
            $(".creasoneditsubmitbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/editcreason',
                    method: "POST",
                    data: {id:$("#chosen_creason_id").val(),en:$("#een_creason").val(),es:$("#ees_creason").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                creasontable.ajax.reload();
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
            $(document).on("click",".creasondeletebtn",function(){
                $("#chosen_creason_id").val($(this).parent().attr("idkey"));
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
                            url: '<?php echo base_url() ?>central/settings/deletecreason',
                            method: "POST",
                            data: {id:$("#chosen_creason_id").val()},
                            dataType: "text",
                            success: function (data) {
                                if(data = "ok")
                                    tmp.remove();
                            }
                        });
                    }
                });
            });
            $(".imgarea_add").click(function(){
                $("#imgarea_add_modal").modal('show');
            });
            $(".pageimgsubmitbtn").click(function(){
                var fd = new FormData();
                var img = $('#imgitem')[0].files;
                if(img.length > 0 ){
                    fd.append('img',img[0]);
                }
                fd.append('pageid',$("#pageimg").val());
                fd.append('desc',$("#pagedesc").val());
                $.ajax({
                    url: '<?php echo base_url() ?>central/settings/addimg',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                imgareatable.ajax.reload();
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
            })
            $(document).on("click",".pageimgdeletebtn",function(){
                $("#chosen_pageimg_id").val($(this).parent().attr("idkey"));
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
                            url: '<?php echo base_url() ?>central/settings/deletepageimg',
                            method: "POST",
                            data: {id:$("#chosen_pageimg_id").val()},
                            dataType: "text",
                            success: function (data) {
                                if(data = "ok")
                                    tmp.remove();
                            }
                        });
                    }
                });
            });
            $(document).on("click",".pageimgeditbtn",function(){
                $("#chosen_pageimg_id").val($(this).parent().attr("idkey"));
                $("#imgarea_edit_modal").modal('show');
            });
            $(document).on("click",".pageimgeditsubmitbtn",function(){
                var fd = new FormData();
                var img = $('#eimgitem')[0].files;
                if(img.length > 0 ){
                    fd.append('img',img[0]);
                }
                fd.append('id',$("#chosen_pageimg_id").val());
                $.ajax({
                    url: '<?php echo base_url() ?>central/settings/editimg',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                imgareatable.ajax.reload();
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
            $(".surcat_add").click(function(){
                $("#surcat_add_modal").modal('show');
            });
            $(".surcataddbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/addsurcat',
                    method: "POST",
                    data: {en:$("#en_surcat").val(),es:$("#es_surcat").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                surcattable.ajax.reload();
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
            $(document).on("click",".surcateditbtn",function(){
                $("#chosen_surcat_id").val($(this).parent().attr("idkey"));
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/chosensurcat',
                    method: "POST",
                    data: {id:$("#chosen_surcat_id").val()},
                    dataType: "json",
                    success: function (data) {
                        $("#een_surcat").val(data['en_name']);
                        $("#ees_surcat").val(data['es_name']);
                        $("#surcat_edit_modal").modal('show');
                    }
                });
            });
            $(".surcateditsubmitbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/editsurcat',
                    method: "POST",
                    data: {id:$("#chosen_surcat_id").val(),en:$("#een_surcat").val(),es:$("#ees_surcat").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                surcattable.ajax.reload();
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
            $(document).on("click",".surcatdeletebtn",function(){
                $("#chosen_surcat_id").val($(this).parent().attr("idkey"));
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
                            url: '<?php echo base_url() ?>central/settings/deletesurcat',
                            method: "POST",
                            data: {id:$("#chosen_surcat_id").val()},
                            dataType: "text",
                            success: function (data) {
                                if(data = "ok")
                                    tmp.remove();
                            }
                        });
                    }
                });
            });
            //Survey Question Area
            $(".surque_add").click(function(){
                $("#surque_add_modal").modal('show');
            });
            $(".surqueaddbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/addsurque',
                    method: "POST",
                    data: {cat:$("#survey_cat").val(),en:$("#en_surque").val(),es:$("#es_surque").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                surquetable.ajax.reload();
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
            $(document).on("click",".surqueeditbtn",function(){
                $("#chosen_surque_id").val($(this).parent().attr("idkey"));
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/chosensurque',
                    method: "POST",
                    data: {id:$("#chosen_surque_id").val()},
                    dataType: "json",
                    success: function (data) {
                        $("#esurvey_cat").val(data['category']);
                        $("#een_surque").val(data['en_name']);
                        $("#ees_surque").val(data['es_name']);
                        $("#surque_edit_modal").modal('show');
                    }
                });
            });
            $(".surqueeditsubmitbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/editsurque',
                    method: "POST",
                    data: {id:$("#chosen_surque_id").val(),cat:$("#esurvey_cat").val(),en:$("#een_surque").val(),es:$("#ees_surque").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                surquetable.ajax.reload();
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
            $(document).on("click",".surquedeletebtn",function(){
                $("#chosen_surque_id").val($(this).parent().attr("idkey"));
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
                            url: '<?php echo base_url() ?>central/settings/deletesurque',
                            method: "POST",
                            data: {id:$("#chosen_surque_id").val()},
                            dataType: "text",
                            success: function (data) {
                                if(data = "ok")
                                    tmp.remove();
                            }
                        });
                    }
                });
            });
            //Survey Response Area
            changeAliasen = (id) => {
                let value = document.getElementById('en' + id).value;
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/updatesurresen',
                    method: "POST",
                    data: { id: id, value: value },
                    dataType: "text",
                    success: function (data) {
                        
                    }
                });
            }
            changeAliases = (id) => {
                let value = document.getElementById('es' + id).value;
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/updatesurreses',
                    method: "POST",
                    data: { id: id, value: value },
                    dataType: "text",
                    success: function (data) {
                        
                    }
                });
            }
            $(".surres_add").click(function(){
                $("#surres_add_modal").modal('show');
            });
            $(".surresaddbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/addsurres',
                    method: "POST",
                    data: {key:$("#survey_res").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            surrestable.ajax.reload();
                            setTimeout( function () {
                                //$("#surres_tb input[id^=en]").tagsinput();
                                //$("#surres_tb input[id^=es]").tagsinput();
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
            $(document).on("click",".surreseditbtn",function(){
                $("#chosen_surres_id").val($(this).parent().attr("idkey"));
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/chosensurres',
                    method: "POST",
                    data: {id:$("#chosen_surres_id").val()},
                    dataType: "json",
                    success: function (data) {
                        $("#esurvey_res").val(data['key']);
                        $("#surres_edit_modal").modal('show');
                    }
                });
            });
            $(".surreseditsubmitbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/editsurres',
                    method: "POST",
                    data: {id:$("#chosen_surres_id").val(),key:$("#esurvey_res").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            surrestable.ajax.reload();
                            setTimeout( function () {
                                //$("#surres_tb input[id^=en]").tagsinput();
                                //$("#surres_tb input[id^=es]").tagsinput();
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
            $(document).on("click",".surresdeletebtn",function(){
                $("#chosen_surres_id").val($(this).parent().attr("idkey"));
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
                            url: '<?php echo base_url() ?>central/settings/deletesurres',
                            method: "POST",
                            data: {id:$("#chosen_surres_id").val()},
                            dataType: "text",
                            success: function (data) {
                                if(data = "ok")
                                    tmp.remove();
                            }
                        });
                    }
                });
            });
            $(".submitsurveyfooterbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/updatesurveyfooter',
                    method: "POST",
                    data: {en:$("#survey_footer_en").summernote("code"),es:$("#survey_footer_es").summernote("code")},
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
            $(document).on("click",".newsimg_add",function(){
                $("#newsimg_edit_modal").modal('show');
            });
            $(".newsimgeditsubmitbtn").click(function(){
                $("#updatenewsimg").submit();
            });
            $(document).on("click",".newsimgdeletebtn",function(){
                $("#chosen_newsimg_id").val($(this).parent().attr("idkey"));
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
                            url: '<?php echo base_url() ?>central/settings/deletenewsimg',
                            method: "POST",
                            data: {id:$("#chosen_newsimg_id").val()},
                            dataType: "text",
                            success: function (data) {
                                if(data = "ok")
                                    tmp.remove();
                            }
                        });
                    }
                });
            });
            //Defined Medical Condition Area
            $(".defined_medical_condition_add").click(function(){
                $("#defined_medical_condition_add_modal").modal('show');
            });
            $(".defined_medical_condition_add_modal_addbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/addDefinedMedicalCondition',
                    method: "POST",
                    data: {name:$("#defined_medical_condition_add_modal_name").val(),codes:$("#defined_medical_condition_add_modal_codes").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                definedMedicalConditionTable.ajax.reload();
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
            $(document).on("click",".defined_medical_condition_editbtn",function(){
                $("#chosen_defined_medical_condition_id").val($(this).parent().attr("idkey"));
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/chosenDefinedMedicalCondition',
                    method: "POST",
                    data: {id:$("#chosen_defined_medical_condition_id").val()},
                    dataType: "json",
                    success: function (data) {
                        $("#defined_medical_condition_edit_modal_name").val(data['name']);
                        $("#defined_medical_condition_edit_modal_codes").val(data['codes']);
                        $("#defined_medical_condition_edit_modal").modal('show');
                    }
                });
            });
            $(".defined_medical_condition_add_modal_editsubmitbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/settings/editDefinedMedicalCondition',
                    method: "POST",
                    data: {id:$("#chosen_defined_medical_condition_id").val(),name:$("#defined_medical_condition_edit_modal_name").val(),codes:$("#defined_medical_condition_edit_modal_codes").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                definedMedicalConditionTable.ajax.reload();
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
            $(document).on("click",".defined_medical_condition_deletebtn",function(){
                $("#chosen_defined_medical_condition_id").val($(this).parent().attr("idkey"));
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
                            url: '<?php echo base_url() ?>central/settings/deletedefinedMedicalCondition',
                            method: "POST",
                            data: {id:$("#chosen_defined_medical_condition_id").val()},
                            dataType: "text",
                            success: function (data) {
                                if(data = "ok")
                                    tmp.remove();
                            }
                        });
                    }
                });
            });

        });
    </script>
</html>
