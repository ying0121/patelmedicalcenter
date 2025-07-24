<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 d-flex d-flex align-items-center justify-content-end">
        <div class="mr-1">Show:</div>
        <div class="d-flex align-items-center"><input type="checkbox" id="desc_toggle" style="width:20px; height:20px;"></div>
    </div>
    <div class="col-12 mb-2">
        <h3>Clinic Description</h3>
    </div>
    <div class="col-6 mb-2">
        <div class="form-group">
            <h6>Description(En)</h6>
            <textarea class="form-control" id="desc_en" rows="5"><?php echo $component['t_location_desc']['en'] ?></textarea>
        </div>
    </div>
    <div class="col-6 mb-2">
        <div class="form-group">
            <h6>Description(Es)</h6>
            <textarea class="form-control" id="desc_es" rows="5"><?php echo $component['t_location_desc']['es'] ?></textarea>
        </div>
    </div>
    <div class="col-12 d-flex d-flex align-items-center justify-content-end mt-3">
        <div class="mr-1">Show:</div>
        <div class="d-flex align-items-center"><input type="checkbox" id="contact_info_toggle" style="width:20px; height:20px;"></div>
    </div>
    <div class="col-12 mb-2">
        <h3>Contact Info</h3>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-static">Name</label>
            <input type="text" class="form-control" id="name" required value="<?php echo $contact_info['name'] ?>">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="bmd-label-static">Address</label>
            <input type="text" class="form-control" id="address" required value="<?php echo $contact_info['address'] ?>">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="bmd-label-static">Acronym</label>
            <input type="text" class="form-control" id="acronym" required value="<?php echo $contact_info['acronym'] ?>">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="bmd-label-static">City</label>
            <input type="text" class="form-control" id="city" required value="<?php echo $contact_info['city'] ?>">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="bmd-label-static">State</label>
            <select name='state' id='state' class="form-control" style='height:36px;'>
                <optgroup label="Alaskan/Hawaiian Time Zone">
                    <option value="AK">Alaska</option>
                    <option value="HI">Hawaii</option>
                </optgroup>
                <optgroup label="Pacific Time Zone">
                    <option value="CA">California</option>
                    <option value="NV">Nevada</option>
                    <option value="OR">Oregon</option>
                    <option value="WA">Washington</option>
                </optgroup>
                <optgroup label="Mountain Time Zone">
                    <option value="AZ">Arizona</option>
                    <option value="CO">Colorado</option>
                    <option value="ID">Idaho</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NM">New Mexico</option>
                    <option value="ND">North Dakota</option>
                    <option value="UT">Utah</option>
                    <option value="WY">Wyoming</option>
                </optgroup>
                <optgroup label="Central Time Zone">
                    <option value="AL">Alabama</option>
                    <option value="AR">Arkansas</option>
                    <option value="IL">Illinois</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="OK">Oklahoma</option>
                    <option value="SD">South Dakota</option>
                    <option value="TX">Texas</option>
                    <option value="TN">Tennessee</option>
                    <option value="WI">Wisconsin</option>
                </optgroup>
                <optgroup label="Eastern Time Zone">
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="IN">Indiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NY" selected>New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="OH">Ohio</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WV">West Virginia</option>
                </optgroup>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="bmd-label-static">Zip Code</label>
            <input type="text" class="form-control" id="zip" required value="<?php echo $contact_info['zip'] ?>">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="bmd-label-static">Tel</label>
            <input type="text" class="form-control" id="tel" required value="<?php echo $contact_info['tel'] ?>">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="bmd-label-static">Fax</label>
            <input type="text" class="form-control" id="fax" value="<?php echo $contact_info['fax'] ?>">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="bmd-label-static">Email</label>
            <input type="email" class="form-control" id="email" value="<?php echo $contact_info['email'] ?>">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="bmd-label-static">Domain</label>
            <input type="url" class="form-control" id="domain" value="<?php echo $contact_info['domain'] ?>">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <div class="d-flex justify-content-start align-items-center">
                <label class="bmd-label-static mr-4">Portal</label>
                <div class="d-flex align-items-center justify-content-end mb-2">
                    <div class="d-flex align-items-center"><input type="checkbox" id="portal_show" style="width:20px; height:20px;" />&nbsp;&nbsp;Display</div>
                </div>
            </div>
            <input type="url" class="form-control" id="portal" value="<?php echo $contact_info['portal'] ?>">
        </div>
    </div>
    <div class="col-12 text-right">
        <button class="btn btn-light-primary pull-right" onclick="updateContactInfo()">Update</button>
    </div>
</div>
<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 d-flex justify-content-between">
        <div>
            <h3>Google Map</h3>
            <h4>(Automatically shows the clinic address)</h4>
        </div>
        <div class="d-flex d-flex align-items-center">
            <div class="mr-1">Show:</div>
            <div class="d-flex align-items-center"><input type="checkbox" id="map_toggle" style="width:20px; height:20px;"></div>
        </div>
    </div>
    <iframe
        id="preview"
        width="100%"
        height="450"
        style="border:none;"
        loading="lazy"
        allowfullscreen
        src="https://www.google.com/maps/embed/v1/place?key=<?php echo $this->config->item('google_api_key') ?>&q=<?php echo $contact_info['address']; ?> <?php echo $contact_info['city']; ?> <?php echo $contact_info['state']; ?> <?php echo $contact_info['zip']; ?>">
    </iframe>
</div>
<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 mb-5">
        <h3>Logo | Favicon | Domain QR Code</h3>
    </div>
    <div class="col-12 d-flex align-items-center">
        <div class="col-4 text-center d-flex flex-column align-items-center">
            <img src="<?php echo base_url(), 'assets/images/logo.png'; ?>" width="100%" style="max-width:240px;">
            <span class="btn btn-light-primary mt-5" onclick="window.filename = 'logo.png'; $('#logo_upload_modal').modal('show');">Upload Logo Image</span>
        </div>
        <div class="col-4 text-center d-flex flex-column align-items-center">
            <img src="<?php echo base_url(), 'assets/images/favicon.png'; ?>" width="100%" style="max-width:100px;">
            <span class="btn btn-light-primary mt-5" onclick="window.filename = 'favicon.png'; $('#logo_upload_modal').modal('show');">Upload Favicon Image</span>
        </div>
        <div class="col-4 text-center d-flex flex-column align-items-center">
            <img src="<?php echo base_url(), 'assets/images/qrcode.png'; ?>" width="100%" style="max-width:120px;" class="mb-2">
            <div class="d-flex justify-content-center align-items-center">
                <a class="btn btn-link btn-light-primary mr-3" href="<?php echo base_url() . 'local/TheClinic/getQRCode?filetype=png' ?>" target="_blank">PNG</a>|
                <a class="btn btn-link btn-light-primary ml-3" href="<?php echo base_url() . 'local/TheClinic/getQRCode?filetype=pdf' ?>" target="_blank">PDF</a>
            </div>
        </div>
    </div>
</div>

<?php include('logo_upload_modal.php'); ?>

<script>
    $(document).ready(function() {
        // Portal Show Check Box
        const portal_show = "<?php echo $contact_info["portal_show"]; ?>"
        if (portal_show == 0) {
            $("#portal_show").prop("checked", false)
        } else {
            $("#portal_show").prop("checked", true)
        }

        <?php if ($contact_info['state'] != ""): ?>
            $("#state").val("<?php echo $contact_info['state'] ?>");
        <?php endif ?>
        handleAreaToggleBox('#contact_info_toggle', 'clinic_contact');
        handleAreaToggleBox('#desc_toggle', 'clinic_desc');
        handleAreaToggleBox('#map_toggle', 'clinic_map');
    });

    function updateContactInfo() {
        var data = {
            name: $("#name").val(),
            address: $("#address").val(),
            acronym: $('#acronym').val(),
            city: $("#city").val(),
            state: $("#state").val(),
            zip: $("#zip").val(),
            tel: $("#tel").val(),
            fax: $("#fax").val(),
            email: $("#email").val(),
            domain: $("#domain").val(),
            portal: $("#portal").val(),
            desc_en: $("#desc_en").val(),
            desc_es: $("#desc_es").val(),
            portal_show: $("#portal_show").prop("checked") === true ? 1 : 0
        };

        $.ajax({
            url: '<?php echo base_url() ?>local/TheClinic/updateContactInfo',
            method: "POST",
            data: data,
            dataType: "json",
            success: function(data) {
                if (data == 'fail')
                    mynotify('fail', 'Update Fail');
                else {
                    $("#preview").attr('src', "https://www.google.com/maps/embed/v1/place?key=<?php echo $this->config->item('google_api_key') ?>&q=" + data.address + " " + data.city + " " + data.state + " " + data.zip);
                    mynotify('success', 'Update Success.');
                }
            }
        });
    }
</script>