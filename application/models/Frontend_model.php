<?php
class Frontend_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getComponentTexts($siteLang)
    {
        $this->db->select('*');
        $this->db->from('contents');
        $query = $this->db->get();
        $table_data = $query->result_array();
        $result = array();
        for ($i = 0; $i < count($table_data); $i++)
            $result[$table_data[$i]['keyvalue']] = $table_data[$i][$siteLang];
        return $result;
    }
    function getContactInfo()
    {
        $this->db->select('*');
        $this->db->from('contactinfo');
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    function getMeta()
    {
        $this->db->select('*');
        $this->db->from('meta');
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    function getAreaToggle()
    {
        $this->db->select('*');
        $this->db->from('area_toggle');
        $query = $this->db->get();
        $table_data = $query->result_array();
        for ($i = 0; $i < count($table_data); $i++)
            $data[$table_data[$i]['area_id']] = $table_data[$i]['status'];
        return $data;
    }
    function getPageImages($page, $position, $siteLang)
    {
        if ($siteLang == 'en')
            $this->db->select('id, page, position, img, title_en AS title, desc_en AS desc');
        else
            $this->db->select('id, page, position, img, title_es AS title, desc_es AS desc');

        $this->db->from('pageimg');
        $this->db->where('page', $page);
        $this->db->where('position', $position);
        $this->db->where('status', 1);
        $this->db->order_by('page', 'asc');
        $this->db->order_by('id', 'asc');
        $query = $this->db->get();
        $table_data = $query->result_array();
        for ($i = 0; $i < count($table_data); $i++)
            $data[$i] = $table_data[$i];
        return $data;
    }
    function getPageDocuments($siteLang, $page)
    {
        if ($siteLang == "en")
            $this->db->select('id,en_title AS title,en_desc AS desc, en_doc AS document, en_size AS size');
        else
            $this->db->select('id,es_title AS title,es_desc AS desc, es_doc AS document, es_size AS size');
        $this->db->from('documents');
        $this->db->where('page', $page);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    ////////////Vault//////////////////
    function getVault($patient_id)
    {
        // get expired range
        $expired_range = $this->db->select("value")->from("setting")->where("type", "vault_doc_del_timeout")->get()->row_array();

        // delete expired vault documents
        $curr_date = date('Y-m-d');

        $this->db->select('*');
        $this->db->from('vault');
        $this->db->where('patient_id', $patient_id);
        $vaults = $this->db->get()->result_array();
        for ($i = 0; $i < count($vaults); $i++) {
            $date = new DateTime($vaults[$i]['submit_date']);
            $date->modify("+" . $expired_range['value'] . " Days");
            $expired_date = $date->format('Y-m-d');
            if ($curr_date > $expired_date) {
                $this->db->where("id", $vaults[$i]['id'])->delete("vault");
            }
        }

        $this->db->select('*');
        $this->db->from('vault');
        $this->db->where('patient_id', $patient_id);
        $this->db->order_by('submit_date', 'desc');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    ///////////////////////////////////
    ////////////Home///////////////////
    function getStaffs($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('id,en_name AS name,en_job AS job,en_desc AS desc, en_fdesc AS fdesc, email, tel, ext, email_tel_ext_toggle, img');
        else
            $this->db->select('id,es_name AS name,es_job AS job,es_desc AS desc, es_fdesc AS fdesc, email, tel, ext, email_tel_ext_toggle, img');
        $this->db->from('staff');
        $this->db->where("status", 1);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    function getPatientReviews($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('en_name AS name,en_desc AS desc,img');
        else
            $this->db->select('es_name AS name,es_desc AS desc,img');
        $this->db->from('patient_review');
        $this->db->where("status", 1);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    function getDoctors($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('id,en_name AS name,en_job AS job,en_desc AS desc, en_fdesc AS fdesc, email, tel, ext, send_message_toggle, email_tel_ext_toggle, npi, specialty, license, license_state, license_start, license_end, dea, dea_start, dea_end, img');
        else
            $this->db->select('id,es_name AS name,es_job AS job,es_desc AS desc, es_fdesc AS fdesc, email, tel, ext, send_message_toggle, email_tel_ext_toggle, npi, specialty, license, license_state, license_start, license_end, dea, dea_start, dea_end, img');
        $this->db->from('doctor');
        $this->db->where("status", 1);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    function readManagerEmails()
    {
        $this->db->select('email');
        $this->db->from('managers');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    ///////////////////////////////////
    ////////////The Clinic/////////////
    function getWorkingHours($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('en_name AS name,en_time AS time');
        else
            $this->db->select('es_name AS name,es_time AS time');
        $this->db->from('working_hour');
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    ///////////////////////////////////
    ////////////AboutUs////////////////
    function getAboutClinic($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('id,en_desc AS desc,en_fdesc AS fdesc');
        else
            $this->db->select('id,es_desc AS desc,es_fdesc AS fdesc');
        $this->db->from('aboutclinic');
        $query = $this->db->get();
        $result = $query->row_array();

        return $result;
    }
    function getMeasureValue($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('quality_cat.id,quality_cat.en_name AS catname,measures.measure_en AS measurename,measures.denominator,measures.numerator,measures.desc_en AS mdesc,measures.fdesc_en AS mfdesc, sdate, edate');
        else
            $this->db->select('quality_cat.id,quality_cat.es_name AS catname,measures.measure_es AS measurename,measures.denominator,measures.numerator,measures.desc_es AS mdesc,measures.fdesc_es AS mfdesc, sdate, edate');
        $this->db->from('quality_cat');
        $this->db->join('measures', 'measures.catid = quality_cat.id', 'left');
        $this->db->where("quality_cat.status", 1);
        $this->db->where("measures.status", 1);
        $this->db->order_by("measures.catid", "ASC");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    /////////////////////////////////
}
