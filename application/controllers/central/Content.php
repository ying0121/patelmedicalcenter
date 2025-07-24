<?php


defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

class Content extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // Load member model
        $this->load->model('Content_model');
        $this->load->helper('url');
    }
    public function index()
    {
        $data['sideitem'] = 'content';
        //        $data['menu'] = $this->Content_model->getmenu();
        //        $data['pages'] = $this->Content_model->getpages();
        //        $data['sectors'] = $this->Content_model->getsector();
        $this->load->view('central/content', $data);
    }
    //Menu Area
    public function getmenu()
    {
        $result = $this->Content_model->getmenu();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }
    public function addmenu()
    {
        $key = $this->input->post('key');
        $en = $this->input->post('en');
        $es = $this->input->post('es');
        $order = $this->input->post('order');
        $module = $this->input->post('module');
        $status = $this->input->post('status');
        $result = $this->Content_model->addmenu($key, $en, $es, $order, $module, $status);
        if ($result)
            echo "ok";
    }
    public function chosenmenu()
    {
        $id = $this->input->post('id');
        $result = $this->Content_model->chosenmenu($id);
        if ($result)
            echo json_encode($result);
    }
    public function editmenu()
    {
        $id = $this->input->post('id');
        $key = $this->input->post('key');
        $en = $this->input->post('en');
        $es = $this->input->post('es');
        $order = $this->input->post('order');
        $module = $this->input->post('module');
        $status = $this->input->post('status');
        $result = $this->Content_model->editmenu($id, $key, $en, $es, $order, $module, $status);
        if ($result)
            echo "ok";
    }
    public function deletemenu()
    {
        $id = $this->input->post('id');
        $result = $this->Content_model->deletemenu($id);
        if ($result)
            echo "ok";
    }
    public function editmenustatus()
    {
        $id = $this->input->post('id');
        $value = $this->input->post('value');
        $result = $this->Content_model->editmenustatus($id, $value);
        if ($result)
            echo "ok";
    }
    //Submenu Area
    public function getsubmenu()
    {
        $result = $this->Content_model->getsubmenu();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }
    public function addsubmenu()
    {
        $pmenu = $this->input->post('pmenu');
        $key = $this->input->post('key');
        $en = $this->input->post('en');
        $es = $this->input->post('es');
        $status = $this->input->post('status');
        $result = $this->Content_model->addsubmenu($pmenu, $key, $en, $es, $status);
        if ($result)
            echo "ok";
    }
    public function chosensubmenu()
    {
        $id = $this->input->post('id');
        $result = $this->Content_model->chosensubmenu($id);
        if ($result)
            echo json_encode($result);
    }
    public function editsubmenu()
    {
        $id = $this->input->post('id');
        $pmenu = $this->input->post('pmenu');
        $key = $this->input->post('key');
        $en = $this->input->post('en');
        $es = $this->input->post('es');
        $status = $this->input->post('status');
        $result = $this->Content_model->editsubmenu($id, $pmenu, $key, $en, $es, $status);
        if ($result)
            echo "ok";
    }
    public function deletesubmenu()
    {
        $id = $this->input->post('id');
        $result = $this->Content_model->deletesubmenu($id);
        if ($result)
            echo "ok";
    }
    public function editsubmenustatus()
    {
        $id = $this->input->post('id');
        $value = $this->input->post('value');
        $result = $this->Content_model->editmenustatus($id, $value);
        if ($result)
            echo "ok";
    }
    //Component Area
    public function getcomponent()
    {
        $result = $this->Content_model->getcomponent();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }
    public function addcomponent()
    {
        $key = $this->input->post('key');
        $en = $this->input->post('en');
        $es = $this->input->post('es');
        $result = $this->Content_model->addcomponent($key, $en, $es);
        if ($result)
            echo "ok";
    }
    public function chosencomponent()
    {
        $id = $this->input->post('id');
        $result = $this->Content_model->chooseComponent($id);
        if ($result)
            echo json_encode($result);
    }
    public function editcomponent()
    {
        $id = $this->input->post('id');
        $key = $this->input->post('key');
        $en = $this->input->post('en');
        $es = $this->input->post('es');
        $result = $this->Content_model->editcomponent($id, $key, $en, $es);
        if ($result)
            echo "ok";
    }
    public function deletecomponent()
    {
        $id = $this->input->post('id');
        $result = $this->Content_model->deletecomponent($id);
        if ($result)
            echo "ok";
    }
    //Symptom Area
    public function getsymptom()
    {
        $result = $this->Content_model->getsymptom();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }
    public function addsymptom()
    {
        $key = $this->input->post('key');
        $url = $this->input->post('url');
        $result = $this->Content_model->addsymptom($key, $url);
        if ($result)
            echo "ok";
    }
    public function chosensymptom()
    {
        $id = $this->input->post('id');
        $result = $this->Content_model->chosensymptom($id);
        if ($result)
            echo json_encode($result);
    }
    public function editsymptom()
    {
        $id = $this->input->post('id');
        $key = $this->input->post('key');
        $url = $this->input->post('url');
        $result = $this->Content_model->editsymptom($id, $key, $url);
        if ($result)
            echo "ok";
    }
    public function deletesymptom()
    {
        $id = $this->input->post('id');
        $result = $this->Content_model->deletesymptom($id);
        if ($result)
            echo "ok";
    }
    //Widget Area
    public function getwidget()
    {
        $result = $this->Content_model->getwidget();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }
    public function addwidget()
    {
        $pageid = $this->input->post('pageid');
        $sector = $this->input->post('sector');
        $key = $this->input->post('key');
        $result = $this->Content_model->addwidget($pageid, $sector, $key);
        if ($result)
            echo "ok";
    }
    public function chosenwidget()
    {
        $id = $this->input->post('id');
        $result = $this->Content_model->chosenwidget($id);
        if ($result)
            echo json_encode($result);
    }
    public function editwidget()
    {
        $id = $this->input->post('id');
        $pageid = $this->input->post('pageid');
        $sector = $this->input->post('sector');
        $key = $this->input->post('key');
        $status = $this->input->post('status');
        $result = $this->Content_model->editwidget($id, $pageid, $sector, $key, $status);
        if ($result)
            echo "ok";
    }
    public function deletewidget()
    {
        $id = $this->input->post('id');
        $result = $this->Content_model->deletewidget($id);
        if ($result)
            echo "ok";
    }
    public function widgetimgdelete()
    {
        $id = $this->input->post('id');
        $result = $this->Content_model->widgetimgdelete($id);
        if ($result)
            echo "ok";
    }
    public function widgetimg()
    {
        $id = $this->input->post('id');
        $filename1 = $id . "_" . generateRandomString(10);
        $config['upload_path']          = './assets/images/widgets/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 20480000;
        $config['file_name']             = $filename1;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (! $this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            echo "failed";
        } else {
            $data = array('upload_data' => $this->upload->data());
            $result = $this->Content_model->widgetimg($id, $data['upload_data']['orig_name']);
            if ($result)
                echo "ok";
        }
    }
    //Widget Detail Area
    public function widgetdetail()
    {
        $data['widget'] = $this->Content_model->chosenwidget($this->input->get('id'));
        $data['sideitem'] = 'content';
        $this->load->view('central/widget', $data);
    }
    public function updatewidgetitem()
    {
        $id = $this->input->post('id');
        $header_en = $this->input->post('header_en');
        $header_es = $this->input->post('header_es');
        $subheader_en = $this->input->post('subheader_en');
        $subheader_es = $this->input->post('subheader_es');
        $desc_en = $this->input->post('desc_en');
        $desc_es = $this->input->post('desc_es');
        $fdesc_en = $this->input->post('fdesc_en');
        $fdesc_es = $this->input->post('fdesc_es');
        $result = $this->Content_model->updatewidgetitem($id, $header_en, $header_es, $subheader_en, $subheader_es, $desc_en, $desc_es, $fdesc_en, $fdesc_es);
        if ($result)
            echo "ok";
    }
    //Education video
    public function getevideo()
    {
        $result = $this->Content_model->getevideo();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }
    public function addevideo()
    {
        $key = $this->input->post('key');
        $en = $this->input->post('en');
        $es = $this->input->post('es');
        $status = $this->input->post('status');
        $result = $this->Content_model->addevideo($key, $en, $es, $status);
        if ($result)
            echo "ok";
    }
    public function chosenevideo()
    {
        $id = $this->input->post('id');
        $result = $this->Content_model->chosenevideo($id);
        if ($result)
            echo json_encode($result);
    }
    public function editevideo()
    {
        $id = $this->input->post('id');
        $key = $this->input->post('key');
        $en = $this->input->post('en');
        $es = $this->input->post('es');
        $status = $this->input->post('status');
        $result = $this->Content_model->editevideo($id, $key, $en, $es, $status);
        if ($result)
            echo "ok";
    }
    public function deleteevideo()
    {
        $id = $this->input->post('id');
        $result = $this->Content_model->deleteevideo($id);
        if ($result)
            echo "ok";
    }
    public function editevideostatus()
    {
        $id = $this->input->post('id');
        $value = $this->input->post('value');
        $result = $this->Content_model->editevideostatus($id, $value);
        if ($result)
            echo "ok";
    }
    //Doc Area
    public function getdoc()
    {
        $result = $this->Content_model->getdoc();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }
    public function addDocument()
    {
        $page = $this->input->post('page');
        $entitle = $this->input->post('entitle');
        $estitle = $this->input->post('estitle');
        $endesc = $this->input->post('endesc');
        $esdesc = $this->input->post('esdesc');

        $filename1 = "en_" . generateRandomString(10);
        $config1['upload_path']          = './assets/documents/';
        $config1['allowed_types']        = '*';
        $config1['max_size']             = 20480000;
        $config1['file_name']             = $filename1;
        $this->load->library('upload', $config1);
        $this->upload->initialize($config1);
        $result1 = $this->upload->do_upload('enfile');
        $enfile = null;
        if ($result1) {
            $data = array('upload_data' => $this->upload->data());
            $enfile = $data['upload_data']['orig_name'];
        }

        $filename2 = "es_" . generateRandomString(10);
        $config2['upload_path']          = './assets/documents/';
        $config2['allowed_types']        = '*';
        $config2['max_size']             = 20480000;
        $config2['file_name']             = $filename2;
        $this->load->library('upload', $config2);
        $this->upload->initialize($config2);
        $result2 = $this->upload->do_upload('esfile');
        $esfile = null;
        if ($result2) {
            $data = array('upload_data' => $this->upload->data());
            $esfile = $data['upload_data']['orig_name'];
        }

        $result = $this->Content_model->addDocument($page, $entitle, $estitle, $endesc, $esdesc, $enfile, $esfile);
        if ($result)
            echo "ok";
    }
    public function chosendoc()
    {
        $id = $this->input->post('id');
        $result = $this->Content_model->chosendoc($id);
        if ($result)
            echo json_encode($result);
    }
    public function editDocument()
    {
        $id = $this->input->post('id');
        $page = $this->input->post('page');
        $entitle = $this->input->post('entitle');
        $estitle = $this->input->post('estitle');
        $endesc = $this->input->post('endesc');
        $esdesc = $this->input->post('esdesc');

        $filename1 = "en_" . generateRandomString(10);
        $config1['upload_path']          = './assets/documents/';
        $config1['allowed_types']        = '*';
        $config1['max_size']             = 20480000;
        $config1['file_name']             = $filename1;
        $this->load->library('upload', $config1);
        $this->upload->initialize($config1);
        $result1 = $this->upload->do_upload('enfile');
        $enfile = null;
        if ($result1) {
            $data = array('upload_data' => $this->upload->data());
            $enfile = $data['upload_data']['orig_name'];
        }

        $filename2 = "es_" . generateRandomString(10);
        $config2['upload_path']          = './assets/documents/';
        $config2['allowed_types']        = '*';
        $config2['max_size']             = 20480000;
        $config2['file_name']             = $filename2;
        $this->load->library('upload', $config2);
        $this->upload->initialize($config2);
        $result2 = $this->upload->do_upload('esfile');
        $esfile = null;
        if ($result2) {
            $data = array('upload_data' => $this->upload->data());
            $esfile = $data['upload_data']['orig_name'];
        }

        $result = $this->Content_model->editDocument($id, $page, $entitle, $estitle, $endesc, $esdesc, $enfile, $esfile);
        if ($result)
            echo "ok";
    }
    public function deletedoc()
    {
        $id = $this->input->post('id');
        $result = $this->Content_model->deletedoc($id);
        if ($result)
            echo "ok";
    }
    //Community Area
    public function getcommunity()
    {
        $result = $this->Content_model->getcommunity();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }
    public function addcommunity()
    {
        $page = $this->input->post('page');
        $en = $this->input->post('en');
        $es = $this->input->post('es');
        $result = $this->Content_model->addcommunity($page, $en, $es);
        if ($result)
            echo "ok";
    }
    public function chosencommunity()
    {
        $id = $this->input->post('id');
        $result = $this->Content_model->chosencommunity($id);
        if ($result)
            echo json_encode($result);
    }
    public function editcommunity()
    {
        $id = $this->input->post('id');
        $page = $this->input->post('page');
        $en = $this->input->post('en');
        $es = $this->input->post('es');
        $result = $this->Content_model->editcommunity($id, $page, $en, $es);
        if ($result)
            echo "ok";
    }
    public function deletecommunity()
    {
        $id = $this->input->post('id');
        $result = $this->Content_model->deletecommunity($id);
        if ($result)
            echo "ok";
    }
}
