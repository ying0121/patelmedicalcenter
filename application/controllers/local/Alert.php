<?php


defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

include('utilities.php');

class Alert extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model("Alert_model");
        $this->load->model("AreaToggle_model");
        $this->load->model("ContactInfo_model");

        if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
            redirect('admin', 'refresh');
    }

    public function index()
    {
        $data['sideitem'] = 'alert';
        $data['area_toggle'] = $this->AreaToggle_model->read();
        $data['contact_info'] = $this->ContactInfo_model->read();

        $this->load->view("local/alert", $data);
    }

    public function read()
    {
        $alerts = $this->Alert_model->read();
        echo json_encode(array("data" => $alerts));
    }

    public function chosen()
    {
        $id = $_POST["id"];
        $result = $this->Alert_model->chosenById($id);
        echo json_encode($result);
    }

    public function add()
    {
        $data["title"] = $_POST["title"];
        $data["message"] = $_POST["message"];
        $data["description"] = $_POST["description"];
        $data["title_es"] = $_POST["title_es"];
        $data["message_es"] = $_POST["message_es"];
        $data["description_es"] = $_POST["description_es"];
        $data["start"] = $_POST["start"];
        $data["end"] = $_POST["end"];
        $data["status"] = $_POST["status"];
        $data["type"] = $_POST["type"];
        $data["created_by"] = $_POST["created_by"];
        $data["image_actived"] = $_POST["image_actived"] == "true" ? 1 : 0;
        $img_length = $_POST["img_length"];

        $result = $this->Alert_model->add($data);
        if ($result > 0) {
            if ($data["image_actived"] == 1 && $img_length > 0) {
                $result = $this->uploadImage($result);
                echo json_encode(array("status" => $result));
            } else {
                echo json_encode(array("status" => "success"));
            }
        } else {
            echo json_encode(array("status" => "error"));
        }
    }

    public function update()
    {
        $id = $_POST["id"];
        $data["title"] = $_POST["title"];
        $data["message"] = $_POST["message"];
        $data["description"] = $_POST["description"];
        $data["title_es"] = $_POST["title_es"];
        $data["message_es"] = $_POST["message_es"];
        $data["description_es"] = $_POST["description_es"];
        $data["start"] = $_POST["start"];
        $data["end"] = $_POST["end"];
        $data["status"] = $_POST["status"];
        $data["type"] = $_POST["type"];
        $data["created_by"] = $_POST["created_by"];
        $data["image_actived"] = $_POST["image_actived"] == "true" ? 1 : 0;
        $img_length = $_POST["img_length"];

        $res = $this->Alert_model->update($data, $id);
        if ($res) {
            if ($data["image_actived"] == 1 && $img_length > 0) {
                $result = $this->uploadImage($id);
                echo json_encode(array("status" => $result));
            } else {
                if ($data["image_actived"] == 0) {
                    // delete image
                    $chosen = $this->Alert_model->chosenById($id);
                    unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/images/alerts/" . $chosen['image']);
                    $this->Alert_model->upload($id, "");
                }
                echo json_encode(array("status" => "success"));
            }
        } else {
            echo json_encode(array("status" => "error"));
        }
    }

    public function delete()
    {
        $id = $_POST['id'];
        $chosen = $this->Alert_model->chosenById($id);
        unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/images/alerts/" . $chosen['image']);
        $result = $this->Alert_model->deleteById($id);
        if ($result) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "error"));
        }
    }

    private function uploadImage($id)
    {
        $filename = generateRandomString(10);
        $config['upload_path']          = './assets/images/alerts/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 20480000;
        $config['file_name']             = $filename;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('img')) {
            array('error' => $this->upload->display_errors());
            return "failed";
        } else {
            $data = array('upload_data' => $this->upload->data());
            $chosen = $this->Alert_model->chosenById($id);
            unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/images/alerts/" . $chosen['image']);
            $result = $this->Alert_model->upload($id, $data['upload_data']['orig_name']);
            if ($result) {
                return "success";
            } else {
                return "error";
            }
        }
    }
}
