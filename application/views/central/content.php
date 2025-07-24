<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('header.php'); ?>
        <style>
            .btn-group, .btn-group-vertical {
                margin: 0!important;
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
                                                        <a class="nav-link active" href="#menu" data-toggle="tab">
                                                        <i class="material-icons">dashboard</i>Menu
                                                        <div class="ripple-container"></div>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#submenu" data-toggle="tab">
                                                        <i class="material-icons">dashboard</i>Submenu
                                                        <div class="ripple-container"></div>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#widgets" data-toggle="tab">
                                                        <i class="material-icons">dashboard</i>Widgets
                                                        <div class="ripple-container"></div>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#components" data-toggle="tab">
                                                        <i class="material-icons">dashboard</i>Components
                                                        <div class="ripple-container"></div>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#symptom" data-toggle="tab">
                                                        <i class="material-icons">dashboard</i>Symptom Checker
                                                        <div class="ripple-container"></div>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#educationvideo" data-toggle="tab">
                                                        <i class="material-icons">dashboard</i>Videos
                                                        <div class="ripple-container"></div>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#documents" data-toggle="tab">
                                                        <i class="material-icons">dashboard</i>Documents
                                                        <div class="ripple-container"></div>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#community" data-toggle="tab">
                                                        <i class="material-icons">dashboard</i>Community Services
                                                        <div class="ripple-container"></div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                        <div class="tab-content">

                                            <div class="tab-pane active" id="menu">
                                                <div class = "row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header card-header-icon card-header-primary no-print">
                                                                <div class = 'row'>
                                                                    <div class = 'col-md-12 text-right'><span class = 'menu_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                                                                    <input type="hidden" id="chosen_menu_id" />
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="menu_tb">
                                                                        <thead>
                                                                            <th>Name Key</th>
                                                                            <th>English</th>
                                                                            <th>Español</th>
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

                                            <div class="tab-pane" id="submenu">
                                                <div class = "row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header card-header-icon card-header-primary no-print">
                                                                <div class = 'row'>
                                                                    <div class = 'col-md-12 text-right'><span class = 'submenu_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                                                                    <input type="hidden" id="chosen_submenu_id" />
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="submenu_tb">
                                                                        <thead>
                                                                            <th>Parent Menu</th>
                                                                            <th>Name Key</th>
                                                                            <th>English</th>
                                                                            <th>Español</th>
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

                                            <div class="tab-pane" id="widgets">
                                                <div class = "row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header card-header-icon card-header-primary no-print">
                                                                <div class = 'row'>
                                                                    <div class = 'col-md-12 text-right'><span class = 'widget_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                                                                    <input type="hidden" id="chosen_widget_id" />
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="widget_tb">
                                                                        <thead>
                                                                            <th>Page</th>
                                                                            <th>Image</th>
                                                                            <th>Sector</th>
                                                                            <th>Widgets</th>
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

                                            <div class="tab-pane" id="components">
                                                <div class = "row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header card-header-icon card-header-primary no-print">
                                                                <div class = 'row'>
                                                                    <div class = 'col-md-12 text-right'><span class = 'component_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                                                                    <input type="hidden" id="chosen_component_id" />
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="component_tb">
                                                                        <thead>
                                                                            <th>Name Key</th>
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

                                            <div class="tab-pane" id="symptom">
                                                <div class = "row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header card-header-icon card-header-primary no-print">
                                                                <div class = 'row'>
                                                                    <div class = 'col-md-12 text-right'><span class = 'symptom_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                                                                    <input type="hidden" id="chosen_symptom_id" />
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="symptom_tb">
                                                                        <thead>
                                                                            <th>Title</th>
                                                                            <th>Url</th>
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

                                            <div class="tab-pane" id="educationvideo">
                                                <div class = "row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header card-header-icon card-header-primary no-print">
                                                                <div class = 'row'>
                                                                    <div class = 'col-md-12 text-right'><span class = 'evideo_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                                                                    <input type="hidden" id="chosen_evideo_id" />
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="evideo_tb">
                                                                        <thead>
                                                                            <th>Title</th>
                                                                            <th>English</th>
                                                                            <th>Español</th>
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

                                            <div class="tab-pane" id="documents">
                                                <div class = "row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header card-header-icon card-header-primary no-print">
                                                                <div class = 'row'>
                                                                    <div class = 'col-md-12 text-right'><span class = 'doc_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                                                                    <input type="hidden" id="chosen_doc_id" />
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="doc_tb">
                                                                        <thead>
                                                                            <th>Page</th>
                                                                            <th>English</th>
                                                                            <th>Español</th>
                                                                            <th>English Doc</th>
                                                                            <th>Español Doc</th>
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

                                            <div class="tab-pane" id="community">
                                                <div class = "row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header card-header-icon card-header-primary no-print">
                                                                <div class = 'row'>
                                                                    <div class = 'col-md-12 text-right'><span class = 'community_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                                                                    <input type="hidden" id="chosen_community_id" />
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="community_tb">
                                                                        <thead>
                                                                            <th>Page</th>
                                                                            <th>Description</th>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <!-- The Modal -->
	<div class="modal fade" id="menu_add_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Add Menu</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Menu Key</h6>
                                <input name = 'menu_key' id = 'menu_key' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>English</h6>
                                <input name = 'menu_en' id = 'menu_en' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Español</h6>
                                <input name = 'menu_es' id = 'menu_es' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Order</h6>
                                <input name = 'menu_order' id = 'menu_order' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Module</h6>
                                <select class="form-control" name="menu_module" id="menu_module" style="height:36px;">
                                    <option value="1">Redirect Page</option>
                                    <option value="2">Parent Menu</option>
                                </select>
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Status</h6>
                                <select class="form-control" name="menu_status" id="menu_status" style="height:36px;">
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
                        <button type="button" class="btn btn-light-primary menuaddbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="menu_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Edit Menu</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Menu Key</h6>
                                <input name = 'emenu_key' id = 'emenu_key' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>English</h6>
                                <input name = 'emenu_en' id = 'emenu_en' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Español</h6>
                                <input name = 'emenu_es' id = 'emenu_es' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Order</h6>
                                <input name = 'emenu_order' id = 'emenu_order' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Module</h6>
                                <select class="form-control" name="emenu_module" id="emenu_module" style="height:36px;">
                                    <option value="1">Redirect Page</option>
                                    <option value="2">Parent Menu</option>
                                </select>
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Status</h6>
                                <select class="form-control" name="emenu_status" id="emenu_status" style="height:36px;">
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
                        <button type="button" class="btn btn-light-primary menueditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="submenu_add_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Add Submenu</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Parent Menu</h6>
                                <select name = 'parent_menu' id = 'parent_menu' class="form-control">
                                    <?php foreach($menu as $menu_array): ?>
                                        <option value="<?php echo $menu_array['id']; ?>"><?php echo $menu_array['en']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Menu Key</h6>
                                <input name = 'submenu_key' id = 'submenu_key' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>English</h6>
                                <input name = 'submenu_en' id = 'submenu_en' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Español</h6>
                                <input name = 'submenu_es' id = 'submenu_es' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Status</h6>
                                <select class="form-control" name="submenu_status" id="submenu_status" style="height:36px;">
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
                        <button type="button" class="btn btn-light-primary submenuaddbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="submenu_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Edit Menu</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Parent Menu</h6>
                                <select name = 'eparent_menu' id = 'eparent_menu' class="form-control">
                                    <?php foreach($menu as $menu_array): ?>
                                        <option value="<?php echo $menu_array['id']; ?>"><?php echo $menu_array['en']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Menu Key</h6>
                                <input name = 'esubmenu_key' id = 'esubmenu_key' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>English</h6>
                                <input name = 'esubmenu_en' id = 'esubmenu_en' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Español</h6>
                                <input name = 'esubmenu_es' id = 'esubmenu_es' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Status</h6>
                                <select class="form-control" name="esubmenu_status" id="esubmenu_status" style="height:36px;">
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
                        <button type="button" class="btn btn-light-primary submenueditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="component_add_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Add Component</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Component Key</h6>
                                <input name = 'component_key' id = 'component_key' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>English</h6>
                                <input name = 'component_en' id = 'component_en' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Español</h6>
                                <input name = 'component_es' id = 'component_es' class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary componentaddbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="component_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Edit Component</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Component Key</h6>
                                <input name = 'ecomponent_key' id = 'ecomponent_key' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>English</h6>
                                <input name = 'ecomponent_en' id = 'ecomponent_en' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Español</h6>
                                <input name = 'ecomponent_es' id = 'ecomponent_es' class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary componenteditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="symptom_add_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Add Item</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Title</h6>
                                <input name = 'symptom_key' id = 'symptom_key' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Url</h6>
                                <textarea name = 'symptom_url' id = 'symptom_url' class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary symptomaddbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="symptom_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Edit Item</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Title</h6>
                                <input name = 'esymptom_key' id = 'esymptom_key' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Url</h6>
                                <textarea name = 'esymptom_url' id = 'esymptom_url' class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary symptomeditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="widget_add_modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Add Widget</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Page</h6>
                                <select class="form-control" name = 'widgetpage' id = "widgetpage" style = 'height:36px;'>
                                    <?php for($i=0;$i<count($pages);$i++): ?>
                                        <?php if(count($pages[$i]['sub']) == 0):?>
                                            <option value="<?php echo $pages[$i]['id'] ?>"><?php echo $pages[$i]['plink'] ?></option>
                                        <?php else: ?>
                                            <optgroup label="<?php echo $pages[$i]['plink'] ?>">
                                                <?php for($j=0;$j<count($pages[$i]['sub']);$j++): ?>
                                                    <option value="<?php echo $pages[$i]['sub'][$j]['sid'] ?>"><?php echo $pages[$i]['sub'][$j]['slink'] ?></option>
                                                <?php endfor ?>
                                            </optgroup>
                                        <?php endif ?>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Sector</h6>
                                <select class="form-control" name = 'widgetsector' id = "widgetsector" style = 'height:36px;'>
                                    <?php for($i=0;$i<count($sectors);$i++): ?>
                                        <?php if($sectors[$i]['status'] == 1):?>
                                        <option value="<?php echo $sectors[$i]['id'] ?>"><?php echo $sectors[$i]['name'] ?></option>
                                        <?php endif ?>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Widget</h6>
                                <input name = 'widget' id = 'widget' class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary widgetaddbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="widget_edit_modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Edit Widget</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Page</h6>
                                <select class="form-control" name = 'ewidgetpage' id = "ewidgetpage" style = 'height:36px;'>
                                    <?php for($i=0;$i<count($pages);$i++): ?>
                                        <?php if(count($pages[$i]['sub']) == 0):?>
                                            <option value="<?php echo $pages[$i]['id'] ?>"><?php echo $pages[$i]['plink'] ?></option>
                                        <?php else: ?>
                                            <optgroup label="<?php echo $pages[$i]['plink'] ?>">
                                                <?php for($j=0;$j<count($pages[$i]['sub']);$j++): ?>
                                                    <option value="<?php echo $pages[$i]['sub'][$j]['sid'] ?>"><?php echo $pages[$i]['sub'][$j]['slink'] ?></option>
                                                <?php endfor ?>
                                            </optgroup>
                                        <?php endif ?>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Sector</h6>
                                <select class="form-control" name = 'ewidgetsector' id = "ewidgetsector" style = 'height:36px;'>
                                    <?php for($i=0;$i<count($sectors);$i++): ?>
                                        <?php if($sectors[$i]['status'] == 1):?>
                                        <option value="<?php echo $sectors[$i]['id'] ?>"><?php echo $sectors[$i]['name'] ?></option>
                                        <?php endif ?>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Widget</h6>
                                <input name = 'ewidget' id = 'ewidget' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Widget</h6>
                                <select name = 'ewidgetstatus' id = 'ewidgetstatus' class="form-control" style = 'height:36px;'>
                                    <option value = "1">Active</option>
                                    <option value = "0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary widgeteditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="widget_img_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Update Image</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form id = "widgetupdateimgfrom" action="" method="post" enctype="multipart/form-data">
                        <div class = "row">
                            <div class = 'col-md-12'>
                                <h6>Image <span id="widget_img_size"></span></h6>
                                <div class="custom-file form-group">
                                    <input type="file" class="custom-file-input" id="widget_img" name="widget_img">
                                    <label class="custom-file-label" for="widget_img">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-info widgetimgdeletesubmitbtn" data-dismiss="modal">Delete</button>
                        <button type="button" class="btn btn-light-primary widgetimgeditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="evideo_add_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Add Video Url</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Title</h6>
                                <select name = 'evideo_title' id = 'evideo_title' class="form-control">
                                <?php for($i=0;$i<count($pages);$i++): ?>
                                        <?php if(count($pages[$i]['sub']) == 0):?>
                                            <option value="<?php echo $pages[$i]['id'] ?>"><?php echo $pages[$i]['plink'] ?></option>
                                        <?php else: ?>
                                            <optgroup label="<?php echo $pages[$i]['plink'] ?>">
                                                <?php for($j=0;$j<count($pages[$i]['sub']);$j++): ?>
                                                    <option value="<?php echo $pages[$i]['sub'][$j]['sid'] ?>"><?php echo $pages[$i]['sub'][$j]['slink'] ?></option>
                                                <?php endfor ?>
                                            </optgroup>
                                        <?php endif ?>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>English</h6>
                                <input name = 'evideo_en' id = 'evideo_en' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Español</h6>
                                <input name = 'evideo_es' id = 'evideo_es' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Status</h6>
                                <select class="form-control" name="evideo_status" id="evideo_status" style="height:36px;">
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
                        <button type="button" class="btn btn-light-primary evideoaddbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="evideo_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Edit Video Url</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Title</h6>
                                <select name = 'eevideo_title' id = 'eevideo_title' class="form-control">
                                    <?php for($i=0;$i<count($pages);$i++): ?>
                                        <?php if(count($pages[$i]['sub']) == 0):?>
                                            <option value="<?php echo $pages[$i]['id'] ?>"><?php echo $pages[$i]['plink'] ?></option>
                                        <?php else: ?>
                                            <optgroup label="<?php echo $pages[$i]['plink'] ?>">
                                                <?php for($j=0;$j<count($pages[$i]['sub']);$j++): ?>
                                                    <option value="<?php echo $pages[$i]['sub'][$j]['sid'] ?>"><?php echo $pages[$i]['sub'][$j]['slink'] ?></option>
                                                <?php endfor ?>
                                            </optgroup>
                                        <?php endif ?>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>English</h6>
                                <input name = 'eevideo_en' id = 'eevideo_en' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Español</h6>
                                <input name = 'eevideo_es' id = 'eevideo_es' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Status</h6>
                                <select class="form-control" name="eevideo_status" id="eevideo_status" style="height:36px;">
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
                        <button type="button" class="btn btn-light-primary evideoeditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="doc_add_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Add Document</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class = "row">
                            <div class = "col-md-12">
                                <div class="form-group">
                                    <h6>Page</h6>
                                    <select class="form-control" name = 'doc_page' id = "doc_page" style = 'height:36px;'>
                                        <?php for($i=0;$i<count($pages);$i++): ?>
                                            <?php if(count($pages[$i]['sub']) == 0):?>
                                                <option value="<?php echo $pages[$i]['id'] ?>"><?php echo $pages[$i]['plink'] ?></option>
                                            <?php else: ?>
                                                <optgroup label="<?php echo $pages[$i]['plink'] ?>">
                                                    <?php for($j=0;$j<count($pages[$i]['sub']);$j++): ?>
                                                        <option value="<?php echo $pages[$i]['sub'][$j]['sid'] ?>"><?php echo $pages[$i]['sub'][$j]['slink'] ?></option>
                                                    <?php endfor ?>
                                                </optgroup>
                                            <?php endif ?>
                                        <?php endfor ?>
                                    </select>
                                </div>
                            </div>
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <h6>Title (English)</h6>
                                    <input name = 'doc_en_title' id = 'doc_en_title' class="form-control" type="text" />
                                </div>
                            </div>
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <h6>Title (Español)</h6>
                                    <input name = 'doc_es_title' id = 'doc_es_title' class="form-control" type="text" />
                                </div>
                            </div>
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <h6>Desc (English)</h6>
                                    <textarea name = 'doc_en_desc' id = 'doc_en_desc' class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <h6>Desc (Español)</h6>
                                    <textarea name = 'doc_es_desc' id = 'doc_es_desc' class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <h6>File (English)</h6>
                                    <div class="custom-file form-group">
                                        <input type="file" class="custom-file-input" id="doc_en_file" name="doc_en_file">
                                        <label class="custom-file-label" for="doc_en_file">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <h6>File (Español)</h6>
                                    <div class="custom-file form-group">
                                        <input type="file" class="custom-file-input" id="doc_es_file" name="doc_es_file">
                                        <label class="custom-file-label" for="doc_es_file">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary docaddbtn" data-dismiss="modal">Done</button>
                    <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="doc_edit_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Edit Document</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class = "row">
                            <div class = "col-md-12">
                                <div class="form-group">
                                    <h6>Page</h6>
                                    <select class="form-control" name = 'edoc_page' id = "edoc_page" style = 'height:36px;'>
                                        <?php for($i=0;$i<count($pages);$i++): ?>
                                            <?php if(count($pages[$i]['sub']) == 0):?>
                                                <option value="<?php echo $pages[$i]['id'] ?>"><?php echo $pages[$i]['plink'] ?></option>
                                            <?php else: ?>
                                                <optgroup label="<?php echo $pages[$i]['plink'] ?>">
                                                    <?php for($j=0;$j<count($pages[$i]['sub']);$j++): ?>
                                                        <option value="<?php echo $pages[$i]['sub'][$j]['sid'] ?>"><?php echo $pages[$i]['sub'][$j]['slink'] ?></option>
                                                    <?php endfor ?>
                                                </optgroup>
                                            <?php endif ?>
                                        <?php endfor ?>
                                    </select>
                                </div>
                            </div>
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <h6>Title (English)</h6>
                                    <input name = 'edoc_en_title' id = 'edoc_en_title' class="form-control" type="text" />
                                </div>
                            </div>
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <h6>Title (Español)</h6>
                                    <input name = 'edoc_es_title' id = 'edoc_es_title' class="form-control" type="text" />
                                </div>
                            </div>
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <h6>Desc (English)</h6>
                                    <textarea name = 'edoc_en_desc' id = 'edoc_en_desc' class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <h6>Desc (Español)</h6>
                                    <textarea name = 'edoc_es_desc' id = 'edoc_es_desc' class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <h6>File (English)</h6>
                                    <div class="custom-file form-group">
                                        <input type="file" class="custom-file-input" id="edoc_en_file" name="edoc_en_file">
                                        <label class="custom-file-label" for="edoc_en_file">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <h6>File (Español)</h6>
                                    <div class="custom-file form-group">
                                        <input type="file" class="custom-file-input" id="edoc_es_file" name="edoc_es_file">
                                        <label class="custom-file-label" for="edoc_es_file">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary doceditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="community_add_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Add Community Services</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Page</h6>
                                <select class="form-control" name = 'community_page' id = "community_page" style = 'height:36px;'>
                                    <?php for($i=0;$i<count($pages);$i++): ?>
                                        <?php if(count($pages[$i]['sub']) == 0):?>
                                            <option value="<?php echo $pages[$i]['id'] ?>"><?php echo $pages[$i]['plink'] ?></option>
                                        <?php else: ?>
                                            <optgroup label="<?php echo $pages[$i]['plink'] ?>">
                                                <?php for($j=0;$j<count($pages[$i]['sub']);$j++): ?>
                                                    <option value="<?php echo $pages[$i]['sub'][$j]['sid'] ?>"><?php echo $pages[$i]['sub'][$j]['slink'] ?></option>
                                                <?php endfor ?>
                                            </optgroup>
                                        <?php endif ?>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Desc (English)</h6>
                                <div id="community_en"></div>
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Desc (Español)</h6>
                                <div id="community_es"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary communityaddbtn" data-dismiss="modal">Done</button>
                    <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="community_edit_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Edit Community Services</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class = "row">
                            <div class = "col-md-12">
                                <div class="form-group">
                                    <h6>Page</h6>
                                    <select class="form-control" name = 'ecommunity_page' id = "ecommunity_page" style = 'height:36px;'>
                                        <?php for($i=0;$i<count($pages);$i++): ?>
                                            <?php if(count($pages[$i]['sub']) == 0):?>
                                                <option value="<?php echo $pages[$i]['id'] ?>"><?php echo $pages[$i]['plink'] ?></option>
                                            <?php else: ?>
                                                <optgroup label="<?php echo $pages[$i]['plink'] ?>">
                                                    <?php for($j=0;$j<count($pages[$i]['sub']);$j++): ?>
                                                        <option value="<?php echo $pages[$i]['sub'][$j]['sid'] ?>"><?php echo $pages[$i]['sub'][$j]['slink'] ?></option>
                                                    <?php endfor ?>
                                                </optgroup>
                                            <?php endif ?>
                                        <?php endfor ?>
                                    </select>
                                </div>
                            </div>
                            <div class = "col-md-12">
                                <div class="form-group">
                                    <h6>Desc (English)</h6>
                                    <div id="ecommunity_en"></div>
                                </div>
                            </div>
                            <div class = "col-md-12">
                                <div class="form-group">
                                    <h6>Desc (Español)</h6>
                                    <div id="ecommunity_es"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary communityeditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <script>
        $(document).ready(function() {
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
            $('#community_en').summernote({
                tabsize: 1,
                height: 200
            });
            $('#community_es').summernote({
                tabsize: 1,
                height: 200
            });
            $('#ecommunity_en').summernote({
                tabsize: 1,
                height: 200
            });
            $('#ecommunity_es').summernote({
                tabsize: 1,
                height: 200
            });
            let menutable = $('#menu_tb').DataTable({
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
                    "url": "<?php echo base_url() ?>central/Content/getmenu",
                    "type": "GET"
                },
                "columns": [
                    { data: 'keyvalue' },
                    { data: 'en' },
                    { data: 'es' },
                    { data: 'status',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input menustatus" type="checkbox" ${row.status==1?"checked":""}>
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
                                <span class="btn btn-icon btn-sm btn-light-warning menueditbtn"><i class="fas fa-edit"></i></span><span class="btn btn-icon btn-sm btn-light-danger  menudeletebtn"><i class="fas fa-trash"></i></span>
                            </div>
                            `
                        } 
                    }
                ]
            });
            let submenutable = $('#submenu_tb').DataTable({
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
                    "url": "<?php echo base_url() ?>central/Content/getsubmenu",
                    "type": "GET"
                },
                "columns": [
                    { data: 'pmenu'},
                    { data: 'keyvalue' },
                    { data: 'en' },
                    { data: 'es' },
                    { data: 'status',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input submenustatus" type="checkbox" ${row.status==1?"checked":""}>
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
                                <span class="btn btn-icon btn-sm btn-light-warning submenueditbtn"><i class="fas fa-edit"></i></span><span class="btn btn-icon btn-sm btn-light-danger  submenudeletebtn"><i class="fas fa-trash"></i></span>
                            </div>
                            `
                        } 
                    }
                ]
            });
            let componenttable = $('#component_tb').DataTable({
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
                    "url": "<?php echo base_url() ?>central/Content/getcomponent",
                    "type": "GET"
                },
                "columns": [
                    { data: 'keyvalue' },
                    { data: 'en' },
                    { data: 'es' },
                    { data: 'id',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`">
                                <span class="btn btn-icon btn-sm btn-light-warning componenteditbtn"><i class="fas fa-edit"></i></span><span class="btn btn-icon btn-sm btn-light-danger  componentdeletebtn"><i class="fas fa-trash"></i></span>
                            </div>
                            `
                        }
                    }
                ]
            });
            let symptomtable = $('#symptom_tb').DataTable({
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
                    "url": "<?php echo base_url() ?>central/Content/getsymptom",
                    "type": "GET"
                },
                "columns": [
                    { data: 'name' },
                    { data: 'link' },
                    { data: 'id',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`">
                                <span class="btn btn-icon btn-sm btn-light-warning symptomeditbtn"><i class="fas fa-edit"></i></span><span class="btn btn-icon btn-sm btn-light-danger  symptomdeletebtn"><i class="fas fa-trash"></i></span>
                            </div>
                            `
                        } 
                    }
                ]
            });
            let widgettable = $('#widget_tb').DataTable({
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
                    "url": "<?php echo base_url() ?>central/Content/getwidget",
                    "type": "GET"
                },
                "columns": [
                    { data: 'page'},
                    { data: 'img',
                        render: function (data, type, row) {
                            if(row.img != null)
                                return `
                                <img src=""<?php echo base_url() ?>assets/images/widgets/"+row.img}" width="100" />
                                `
                            else
                                return ``
                        } 
                    },
                    { data: 'sector'},
                    { data: 'widget', 
                        render: function (data, type, row) {
                            return `
                            <a href="${'<?php echo base_url() ?>central/content/widgetdetail?id='+row.id}">${row.widget}</a>
                            `
                        } 
                    },
                    { data: 'id',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`" sectorid="`+row.sectorid+`">
                                <span class="btn btn-icon btn-sm btn-light-primary widgetimgbtn"><i class="fas fa-image"></i></span><span class="btn btn-icon btn-sm btn-light-warning widgeteditbtn"><i class="fas fa-edit"></i></span><span class="btn btn-icon btn-sm btn-light-danger  widgetdeletebtn"><i class="fas fa-trash"></i></span>
                            </div>
                            `
                        } 
                    }
                ]
            });
            let evideotable = $('#evideo_tb').DataTable({
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
                    "url": "<?php echo base_url() ?>central/Content/getevideo",
                    "type": "GET"
                },
                "columns": [
                    { data: 'etitle'},
                    { data: 'en',
                        render: function (data, type, row) {
                            return `
                            <a href="${row.en}" target="_blank">${row.en}</a>
                            `
                        } 
                    },
                    { data: 'es',
                        render: function (data, type, row) {
                            return `
                            <a href="${row.es}" target="_blank">${row.es}</a>
                            `
                        } 
                    },
                    { data: 'status',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input evideostatus" type="checkbox" ${row.status==1?"checked":""}>
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
                                <span class="btn btn-icon btn-sm btn-light-warning evideoeditbtn"><i class="fas fa-edit"></i></span><span class="btn btn-icon btn-sm btn-light-danger  evideodeletebtn"><i class="fas fa-trash"></i></span>
                            </div>
                            `
                        } 
                    }
                ]
            });
            let doctable = $('#doc_tb').DataTable({
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
                    "url": "<?php echo base_url() ?>central/Content/getdoc",
                    "type": "GET"
                },
                "columns": [
                    { data: 'page' },
                    { data: 'en_name' },
                    { data: 'es_name'},
                    { data: 'en_doc',
                        render: function (data, type, row) {
                            if(row.en_doc != null)
                            return `
                            <a href=""<?php echo base_url() ?>assets/documents/${row.en_doc}" target="_blank">${row.en_doc}</a>
                            `
                            else
                            return "";
                        } 
                    },
                    { data: 'es_doc',
                        render: function (data, type, row) {
                            if(row.es_doc != null)
                            return `
                            <a href=""<?php echo base_url() ?>assets/documents/${row.es_doc}" target="_blank">${row.es_doc}</a>
                            `
                            else
                            return "";
                        } 
                    },
                    { data: 'id',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`">
                                <span class="btn btn-icon btn-sm btn-light-warning doceditbtn"><i class="fas fa-edit"></i></span><span class="btn btn-icon btn-sm btn-light-danger  docdeletebtn"><i class="fas fa-trash"></i></span>
                            </div>
                            `
                        } 
                    }
                ]
            });
            let communitytable = $('#community_tb').DataTable({
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
                    "url": "<?php echo base_url() ?>central/Content/getcommunity",
                    "type": "GET"
                },
                "columns": [
                    { data: 'pagename' },
                    { data: 'en_desc' },
                    { data: 'id',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`">
                                <span class="btn btn-icon btn-sm btn-light-warning communityeditbtn"><i class="fas fa-edit"></i></span><span class="btn btn-icon btn-sm btn-light-danger  communitydeletebtn"><i class="fas fa-trash"></i></span>
                            </div>
                            `
                        } 
                    }
                ]
            });
            //Menu Area
            $(".menu_add").click(function(){
                $("#menu_add_modal").modal('show');
            });
            $(".menuaddbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/addmenu',
                    method: "POST",
                    data: {key:$("#menu_key").val(),en:$("#menu_en").val(),es:$("#menu_es").val(),order:$("#menu_order").val(),module:$("#menu_module").val(),status:$("#menu_status").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                menutable.ajax.reload();
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
            $(document).on("click",".menueditbtn",function(){
                $("#chosen_menu_id").val($(this).parent().attr("idkey"));
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/chosenmenu',
                    method: "POST",
                    data: {id:$("#chosen_menu_id").val()},
                    dataType: "json",
                    success: function (data) {
                        $("#emenu_key").val(data['keyvalue']);
                        $("#emenu_en").val(data['en']);
                        $("#emenu_es").val(data['es']);
                        $("#emenu_order").val(data['order']);
                        $("#emenu_module").val(data['module']);
                        $("#emenu_status").val(data['status']);
                        $("#menu_edit_modal").modal('show');
                    }
                });
            });
            $(".menueditsubmitbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/editmenu',
                    method: "POST",
                    data: {id:$("#chosen_menu_id").val(),key:$("#emenu_key").val(),en:$("#emenu_en").val(),es:$("#emenu_es").val(),order:$("#emenu_order").val(),module:$("#emenu_module").val(),status:$("#emenu_status").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                menutable.ajax.reload();
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
            $(document).on("click",".menudeletebtn",function(){
                $("#chosen_menu_id").val($(this).parent().attr("idkey"));
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
                            url: '<?php echo base_url() ?>central/content/deletemenu',
                            method: "POST",
                            data: {id:$("#chosen_menu_id").val()},
                            dataType: "text",
                            success: function (data) {
                                if(data = "ok")
                                    tmp.remove();
                            }
                        });
                    }
                });
            });
            $(document).on("click",".menustatus",function(){
                var tmpcheck = 0;
                if($(this).prop("checked")){
                    tmpcheck = 1;
                }
                else{
                    tmpcheck = 0;
                }
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/editmenustatus',
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
            //Submenu Area
            $(".submenu_add").click(function(){
                $("#submenu_add_modal").modal('show');
            });
            $(".submenuaddbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/addsubmenu',
                    method: "POST",
                    data: {pmenu:$("#parent_menu").val(),key:$("#submenu_key").val(),en:$("#submenu_en").val(),es:$("#submenu_es").val(),status:$("#submenu_status").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                submenutable.ajax.reload();
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
            $(document).on("click",".submenueditbtn",function(){
                $("#chosen_submenu_id").val($(this).parent().attr("idkey"));
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/chosensubmenu',
                    method: "POST",
                    data: {id:$("#chosen_submenu_id").val()},
                    dataType: "json",
                    success: function (data) {
                        $("#eparent_menu").val(data['parent']);
                        $("#esubmenu_key").val(data['keyvalue']);
                        $("#esubmenu_en").val(data['en']);
                        $("#esubmenu_es").val(data['es']);
                        $("#esubmenu_status").val(data['status']);
                        $("#submenu_edit_modal").modal('show');
                    }
                });
            });
            $(".submenueditsubmitbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/editsubmenu',
                    method: "POST",
                    data: {id:$("#chosen_submenu_id").val(),pmenu:$("#eparent_menu").val(),key:$("#esubmenu_key").val(),en:$("#esubmenu_en").val(),es:$("#esubmenu_es").val(),status:$("#esubmenu_status").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                submenutable.ajax.reload();
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
            $(document).on("click",".submenudeletebtn",function(){
                $("#chosen_submenu_id").val($(this).parent().attr("idkey"));
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
                            url: '<?php echo base_url() ?>central/content/deletesubmenu',
                            method: "POST",
                            data: {id:$("#chosen_submenu_id").val()},
                            dataType: "text",
                            success: function (data) {
                                if(data = "ok")
                                    tmp.remove();
                            }
                        });
                    }
                });
            });
            $(document).on("click",".submenustatus",function(){
                var tmpcheck = 0;
                if($(this).prop("checked")){
                    tmpcheck = 1;
                }
                else{
                    tmpcheck = 0;
                }
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/editsubmenustatus',
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
            //Component Area
            $(".component_add").click(function(){
                $("#component_add_modal").modal('show');
            });
            $(".componentaddbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/addcomponent',
                    method: "POST",
                    data: {key:$("#component_key").val(),en:$("#component_en").val(),es:$("#component_es").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                componenttable.ajax.reload();
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
            $(document).on("click",".componenteditbtn",function(){
                $("#chosen_component_id").val($(this).parent().attr("idkey"));
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/chosencomponent',
                    method: "POST",
                    data: {id:$("#chosen_component_id").val()},
                    dataType: "json",
                    success: function (data) {
                        $("#ecomponent_key").val(data['keyvalue']);
                        $("#ecomponent_en").val(data['en']);
                        $("#ecomponent_es").val(data['es']);
                        $("#component_edit_modal").modal('show');
                    }
                });
            });
            $(".componenteditsubmitbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/editcomponent',
                    method: "POST",
                    data: {id:$("#chosen_component_id").val(),key:$("#ecomponent_key").val(),en:$("#ecomponent_en").val(),es:$("#ecomponent_es").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                componenttable.ajax.reload();
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
            $(document).on("click",".componentdeletebtn",function(){
                $("#chosen_component_id").val($(this).parent().attr("idkey"));
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
                            url: '<?php echo base_url() ?>central/content/deletecomponent',
                            method: "POST",
                            data: {id:$("#chosen_component_id").val()},
                            dataType: "text",
                            success: function (data) {
                                if(data = "ok")
                                    tmp.remove();
                            }
                        });
                    }
                });
            });
            //Symptom Area
            $(".symptom_add").click(function(){
                $("#symptom_add_modal").modal('show');
            });
            $(".symptomaddbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/addsymptom',
                    method: "POST",
                    data: {key:$("#symptom_key").val(),url:$("#symptom_url").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                symptomtable.ajax.reload();
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
            $(document).on("click",".symptomeditbtn",function(){
                $("#chosen_symptom_id").val($(this).parent().attr("idkey"));
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/chosensymptom',
                    method: "POST",
                    data: {id:$("#chosen_symptom_id").val()},
                    dataType: "json",
                    success: function (data) {
                        $("#esymptom_key").val(data['name']);
                        $("#esymptom_url").val(data['link']);
                        $("#symptom_edit_modal").modal('show');
                    }
                });
            });
            $(".symptomeditsubmitbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/editsymptom',
                    method: "POST",
                    data: {id:$("#chosen_symptom_id").val(),key:$("#esymptom_key").val(),url:$("#esymptom_url").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                symptomtable.ajax.reload();
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
            $(document).on("click",".symptomdeletebtn",function(){
                $("#chosen_symptom_id").val($(this).parent().attr("idkey"));
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
                            url: '<?php echo base_url() ?>central/content/deletesymptom',
                            method: "POST",
                            data: {id:$("#chosen_symptom_id").val()},
                            dataType: "text",
                            success: function (data) {
                                if(data = "ok")
                                    tmp.remove();
                            }
                        });
                    }
                });
            });
            //Widget Area
            $(".widget_add").click(function(){
                $("#widget_add_modal").modal('show');
            });
            $(".widgetaddbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/addwidget',
                    method: "POST",
                    data: {pageid:$("#widgetpage").val(),sector:$("#widgetsector").val(),key:$("#widget").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                widgettable.ajax.reload();
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
            $(document).on("click",".widgeteditbtn",function(){
                $("#chosen_widget_id").val($(this).parent().attr("idkey"));
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/chosenwidget',
                    method: "POST",
                    data: {id:$("#chosen_widget_id").val()},
                    dataType: "json",
                    success: function (data) {
                        $("#ewidget").val(data['widget']);
                        $("#ewidgetpage").val(data['pageid']);
                        $("#ewidgetsector").val(data['sector']);
                        $("#ewidgetstatus").val(data['status']);
                        $("#widget_edit_modal").modal('show');
                    }
                });
            });
            $(".widgeteditsubmitbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/editwidget',
                    method: "POST",
                    data: {id:$("#chosen_widget_id").val(),pageid:$("#ewidgetpage").val(),sector:$("#ewidgetsector").val(),key:$("#ewidget").val(),status:$("#ewidgetstatus").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                widgettable.ajax.reload();
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
            $(document).on("click",".widgetdeletebtn",function(){
                $("#chosen_widget_id").val($(this).parent().attr("idkey"));
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
                            url: '<?php echo base_url() ?>central/content/deletewidget',
                            method: "POST",
                            data: {id:$("#chosen_widget_id").val()},
                            dataType: "text",
                            success: function (data) {
                                if(data = "ok")
                                    tmp.remove();
                            }
                        });
                    }
                });
            });
            $(document).on("click",".widgetimgbtn",function(){
                $("#chosen_widget_id").val($(this).parent().attr("idkey"));
                if($(this).parent().attr("sectorid") == 1){
                    $("#widget_img_size").html("1900 * 748");
                }
                else{
                    $("#widget_img_size").html("1094 * 816");
                }
                $("#widget_img_modal").modal("show");
            });
            $(".widgetimgdeletesubmitbtn").click(function(){
                $.ajax({
                    url: '<?php echo base_url() ?>central/content/widgetimgdelete',
                    method: 'POST',
                    data: {id:$("#chosen_widget_id").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                widgettable.ajax.reload();
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
            $(".widgetimgeditsubmitbtn").click(function(){
                var fd = new FormData();
                var enfile = $('#widget_img')[0].files;
                if(enfile.length > 0 ){
                    fd.append('image',enfile[0]);
                }
                fd.append('id',$("#chosen_widget_id").val());
                $.ajax({
                    url: '<?php echo base_url() ?>central/content/widgetimg',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                widgettable.ajax.reload();
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
            //Education Video Area
            $(".evideo_add").click(function(){
                $("#evideo_add_modal").modal('show');
            });
            $(".evideoaddbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/addevideo',
                    method: "POST",
                    data: {key:$("#evideo_title").val(),en:$("#evideo_en").val(),es:$("#evideo_es").val(),status:$("#evideo_status").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                evideotable.ajax.reload();
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
            $(document).on("click",".evideoeditbtn",function(){
                $("#chosen_evideo_id").val($(this).parent().attr("idkey"));
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/chosenevideo',
                    method: "POST",
                    data: {id:$("#chosen_evideo_id").val()},
                    dataType: "json",
                    success: function (data) {
                        $("#eevideo_title").val(data['title']);
                        $("#eevideo_en").val(data['en']);
                        $("#eevideo_es").val(data['es']);
                        $("#eevideo_status").val(data['status']);
                        $("#evideo_edit_modal").modal('show');
                    }
                });
            });
            $(".evideoeditsubmitbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/editevideo',
                    method: "POST",
                    data: {id:$("#chosen_evideo_id").val(),key:$("#eevideo_title").val(),en:$("#eevideo_en").val(),es:$("#eevideo_es").val(),status:$("#eevideo_status").val()},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                evideotable.ajax.reload();
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
            $(document).on("click",".evideodeletebtn",function(){
                $("#chosen_evideo_id").val($(this).parent().attr("idkey"));
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
                            url: '<?php echo base_url() ?>central/content/deleteevideo',
                            method: "POST",
                            data: {id:$("#chosen_evideo_id").val()},
                            dataType: "text",
                            success: function (data) {
                                if(data = "ok")
                                    tmp.remove();
                            }
                        });
                    }
                });
            });
            $(document).on("click",".evideostatus",function(){
                var tmpcheck = 0;
                if($(this).prop("checked")){
                    tmpcheck = 1;
                }
                else{
                    tmpcheck = 0;
                }
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/editevideostatus',
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
            //Document Area
            $(".doc_add").click(function(){
                $("#doc_add_modal").modal("show");
            });
            $(".docaddbtn").click(function(){
                var fd = new FormData();
                var enfile = $('#doc_en_file')[0].files;
                var esfile = $('#doc_es_file')[0].files;
                if(enfile.length > 0 ){
                    fd.append('enfile',enfile[0]);
                }
                if(esfile.length > 0 ){
                    fd.append('esfile',esfile[0]);
                }
                fd.append('page',$("#doc_page").val());
                fd.append('entitle',$("#doc_en_title").val());
                fd.append('estitle',$("#doc_es_title").val());
                fd.append('endesc',$("#doc_en_desc").val());
                fd.append('esdesc',$("#doc_es_desc").val());
                $('.loading-bg').show();
                $.ajax({
                    url: '<?php echo base_url() ?>central/content/addDocument',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function (data) {
                        $('.loading-bg').hide();
                        if(data == "ok"){
                            setTimeout( function () {
                                doctable.ajax.reload();
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
                    },
                    error: function(data){
                        $('.loading-bg').hide();
                    }
                });
            });
            $(document).on("click",".doceditbtn",function(){
                $("#chosen_doc_id").val($(this).parent().attr("idkey"));
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/chosendoc',
                    method: "POST",
                    data: {id:$("#chosen_doc_id").val()},
                    dataType: "json",
                    success: function (data) {
                        $("#edoc_page").val(data['page']);
                        $("#edoc_en_title").val(data['en_name']);
                        $("#edoc_es_title").val(data['es_name']);
                        $("#edoc_en_desc").val(data['en_desc']);
                        $("#edoc_es_desc").val(data['es_desc']);
                        $("#doc_edit_modal").modal('show');
                    }
                });
            });
            $(".doceditsubmitbtn").click(function(){
                var fd = new FormData();
                var enfile = $('#edoc_en_file')[0].files;
                var esfile = $('#edoc_es_file')[0].files;
                if(enfile.length > 0 ){
                    fd.append('enfile',enfile[0]);
                }
                if(esfile.length > 0 ){
                    fd.append('esfile',esfile[0]);
                }
                fd.append('id',$("#chosen_doc_id").val());
                fd.append('page',$("#edoc_page").val());
                fd.append('entitle',$("#edoc_en_title").val());
                fd.append('estitle',$("#edoc_es_title").val());
                fd.append('endesc',$("#edoc_en_desc").val());
                fd.append('esdesc',$("#edoc_es_desc").val());
                $('.loading-bg').show();
                $.ajax({
                    url: '<?php echo base_url() ?>central/content/editDocument',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function (data) {
                        $('.loading-bg').hide();
                        if(data == "ok"){
                            setTimeout( function () {
                                doctable.ajax.reload();
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
                    },
                    error: function (data){
                        $('.loading-bg').hide();
                    }
                });
            });
            $(document).on("click",".docdeletebtn",function(){
                $("#chosen_doc_id").val($(this).parent().attr("idkey"));
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
                            url: '<?php echo base_url() ?>central/content/deletedoc',
                            method: "POST",
                            data: {id:$("#chosen_doc_id").val()},
                            dataType: "text",
                            success: function (data) {
                                if(data = "ok")
                                    tmp.remove();
                            }
                        });
                    }
                });
            });
            //Commnuity Area
            $(".community_add").click(function(){
                $("#community_add_modal").modal('show');
            });
            $(".communityaddbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/addcommunity',
                    method: "POST",
                    data: {page:$("#community_page").val(),en:$("#community_en").summernote("code"),es:$("#community_es").summernote("code")},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                communitytable.ajax.reload();
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
            $(document).on("click",".communityeditbtn",function(){
                $("#chosen_community_id").val($(this).parent().attr("idkey"));
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/chosencommunity',
                    method: "POST",
                    data: {id:$("#chosen_community_id").val()},
                    dataType: "json",
                    success: function (data) {
                        $("#ecommunity_page").val(data['page']);
                        $("#ecommunity_en").summernote("code",data['en_desc']);
                        $("#ecommunity_es").summernote("code",data['es_desc']);
                        $("#community_edit_modal").modal('show');
                    }
                });
            });
            $(".communityeditsubmitbtn").click(function(){
                $.ajax ({
                    url: '<?php echo base_url() ?>central/content/editcommunity',
                    method: "POST",
                    data: {id:$("#chosen_community_id").val(),page:$("#ecommunity_page").val(),en:$("#ecommunity_en").summernote("code"),es:$("#ecommunity_es").summernote("code")},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                communitytable.ajax.reload();
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
            $(document).on("click",".communitydeletebtn",function(){
                $("#chosen_community_id").val($(this).parent().attr("idkey"));
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
                            url: '<?php echo base_url() ?>central/content/deletecommunity',
                            method: "POST",
                            data: {id:$("#chosen_community_id").val()},
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
