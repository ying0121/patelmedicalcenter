<?php
class Service_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    // clinic service
    function getClinicService($filter)
    {
        $this->db->select('clinic_services.*, service_category.name AS category_name');
        $this->db->from('clinic_services');
        $this->db->join("service_category", "clinic_services.category = service_category.id");

        if ($filter['category'] > 0) {
            $this->db->where('clinic_services.category', $filter['category']);
        }
        if ($filter['language'] > 0) {
            $this->db->where('clinic_services.language', $filter['language']);
        }

        return $this->db->get()->result_array();
    }

    function getClinicServiceOnlyHomePage($lang)
    {
        return $this->db->select("*")->from("clinic_services")->where("home_page", 1)->where("language", $lang)->get()->result_array();
    }

    function addClinicService($data)
    {
        $record = array(
            'language' => $data['language'],
            'category' => $data['category'],
            'title' => $data['title'],
            'short_desc' => $data['short_desc'],
            'long_desc' => $data['long_desc'],
            'status' => $data['status'],
            'request_service' => $data['request_service'],
            'online_payment' => $data['online_payment'],
            'home_page' => $data['home_page'],
            'cost' => $data['cost']
        );
        $result = $this->db->insert('clinic_services', $record);
        if ($result) return 1;
        return 0;
    }

    function chosenClinicService($id)
    {
        $this->db->select('*');
        $this->db->from('clinic_services');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }

    function updateClinicService($data)
    {
        $record = array(
            'language' => $data['language'],
            'category' => $data['category'],
            'title' => $data['title'],
            'short_desc' => $data['short_desc'],
            'long_desc' => $data['long_desc'],
            'status' => $data['status'],
            'request_service' => $data['request_service'],
            'online_payment' => $data['online_payment'],
            'home_page' => $data['home_page'],
            'cost' => $data['cost']
        );
        $result = $this->db->where('id', $data['id'])->update('clinic_services', $record);
        if ($result) return 1;
        return 0;
    }

    function deleteClinicService($id)
    {
        return $this->db->where('id', $id)->delete('clinic_services');
    }

    function getCostById($id)
    {
        return $this->db->select("cost")->from("clinic_services")->where("id", $id)->get()->row_array();
    }

    // service category
    function getServiceCategory()
    {
        $this->db->select('*');
        $this->db->from('service_category');
        return $this->db->get()->result_array();
    }

    function addServiceCategory($data)
    {
        $record = array(
            'name' => $data['name'],
            'desc' => $data['desc'],
            'status' => $data['status']
        );
        $result = $this->db->insert('service_category', $record);
        if ($result) return 1;
        return 0;
    }

    function chosenServiceCategory($id)
    {
        $this->db->select('*');
        $this->db->from('service_category');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }

    function updateServiceCategory($data)
    {
        $record = array(
            'name' => $data['name'],
            'desc' => $data['desc'],
            'status' => $data['status']
        );
        $result = $this->db->where('id', $data['id'])->update('service_category', $record);
        if ($result) return 1;
        return 0;
    }

    function deleteServiceCategory($id)
    {
        return $this->db->where('id', $id)->delete('service_category');
    }

    function updateFileName($id, $filename, $file_type)
    {
        $data = array($file_type => $filename);
        $result = $this->db->where('id', $id)->update('clinic_services', $data);
        return $result;
    }

    function getDesc()
    {
        $this->db->select('*');
        $this->db->from('contents');
        $this->db->where('keyvalue', 't_service_desc');
        return $this->db->get()->row_array();
    }

    function updateDesc($data)
    {
        $result = $this->db->where('keyvalue', "t_service_desc")->update('contents', $data);
        if ($result) return 1;
        return 0;
    }
}
