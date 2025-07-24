
<div class = "row my-3 p-10 bg-white border rounded">
    <div class = "col-12 my-3"><h3>API Setting</h3></div>
    <div class = "row">
        <div class="col-md-12 bg-primary p-2 mb-2 text-white">
            <ul class="nav nav-tabs nav-pills" data-tabs="tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#api_conector" data-toggle="tab">
                        CONECTOR
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#api_twillio" data-toggle="tab">
                        Twillio
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="col-md-12">
            <div class="tab-content">
                <div class="tab-pane active" id="api_conector">
                    <?php include('api/conector.php') ?>
                </div>
                <div class="tab-pane" id="api_twillio">
                    <?php include('api/twillio.php') ?>
                </div>
            </div>
        </div>
    </div>
</div>
