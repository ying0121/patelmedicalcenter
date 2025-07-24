<?php
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function getmenus($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('contents.id,contents.en AS plink,contents.module,contents.en AS plang');
        else
            $this->db->select('contents.id,contents.en AS plink,contents.module,contents.es AS plang');
        $this->db->from('contents');
        $this->db->where("contents.type", "menu");
        $this->db->where("contents.status", 1);
        $query = $this->db->get();
        $parent = $query->result_array();
        for ($i = 0; $i < count($parent); $i++) {
            if ($siteLang == "en")
                $this->db->select('contents.en AS slink,contents.en AS slang');
            else
                $this->db->select('contents.en AS slink,contents.es AS slang');
            $this->db->from('contents');
            $this->db->where("contents.parent", $parent[$i]['id']);
            $this->db->where("contents.type", "submenu");
            $this->db->where("contents.status", 1);
            $query = $this->db->get();
            $sub = $query->result_array();
            $parent[$i]['sub'] = $sub;
        }
        return $parent;
    }
    function getworkingtime($siteLang)
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
    function getbgimg($str)
    {
        $this->db->select('pageimg.desc,pageimg.img');
        $this->db->from('contents');
        $this->db->join("pageimg", "pageimg.page = contents.id", 'left');
        $this->db->where("contents.keyvalue", $str);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function getmsgs($siteLang)
    {
        $this->db->select('id');
        $this->db->from('sectors');
        $this->db->where("sectors.name", "POP UP MSG");
        $this->db->where("sectors.status", 1);
        $query = $this->db->get();
        $popupmsgid = $query->row_array();

        if ($siteLang == "en")
            $this->db->select('id,widget,header_en AS header,subheader_en AS subheader,desc_en AS desc,widgets.img');
        else
            $this->db->select('id,widget,header_es AS header,subheader_es AS subheader,desc_es AS desc,widgets.img');
        $this->db->from('widgets');
        $this->db->where("widgets.sector", $popupmsgid['id']);
        $this->db->where("widgets.status", 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function getptservices($siteLang)
    {
        $this->db->select('id');
        $this->db->from('sectors');
        $this->db->where("sectors.name", "PATIENT SERVICES");
        $this->db->where("sectors.status", 1);
        $query = $this->db->get();
        $ptservicesid = $query->row_array();

        if ($siteLang == "en")
            $this->db->select('id,widget,header_en AS header,subheader_en AS subheader,desc_en AS desc,widgets.img');
        else
            $this->db->select('id,widget,header_es AS header,subheader_es AS subheader,desc_es AS desc,widgets.img');
        $this->db->from('widgets');
        $this->db->where("widgets.sector", $ptservicesid['id']);
        $this->db->where("widgets.status", 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function getfeatures($siteLang)
    {
        $this->db->select('id');
        $this->db->from('sectors');
        $this->db->where("sectors.name", "Practice Features");
        $this->db->where("sectors.status", 1);
        $query = $this->db->get();
        $features = $query->row_array();

        if ($siteLang == "en")
            $this->db->select('widget,header_en AS header,subheader_en AS subheader,desc_en AS desc,widgets.img,widgets.icon');
        else
            $this->db->select('widget,header_es AS header,subheader_es AS subheader,desc_es AS desc,widgets.img,widgets.icon');
        $this->db->from('widgets');
        $this->db->where("widgets.sector", $features['id']);
        $this->db->where("widgets.status", 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function getquotes($siteLang)
    {
        $this->db->select('id');
        $this->db->from('sectors');
        $this->db->where("sectors.name", "Doctor Quote");
        $this->db->where("sectors.status", 1);
        $query = $this->db->get();
        $quote = $query->row_array();

        if ($siteLang == "en")
            $this->db->select('widget,header_en AS header,subheader_en AS subheader,desc_en AS desc,widgets.img,widgets.icon');
        else
            $this->db->select('widget,header_es AS header,subheader_es AS subheader,desc_es AS desc,widgets.img,widgets.icon');
        $this->db->from('widgets');
        $this->db->where("widgets.sector", $quote['id']);
        $this->db->where("widgets.status", 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function getpracteam($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('id,en_name AS name,en_job AS job,en_desc AS desc,img');
        else
            $this->db->select('id,es_name AS name,es_job AS job,es_desc AS desc,img');
        $this->db->from('staff');
        $this->db->where("status", 1);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    function getpatient_review($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('en_name AS name,en_job AS job,en_desc AS desc,img');
        else
            $this->db->select('es_name AS name,es_job AS job,es_desc AS desc,img');
        $this->db->from('patient_review');
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    function getdoctors($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('id,en_name AS name,en_job AS job,en_desc AS desc,img');
        else
            $this->db->select('id,es_name AS name,es_job AS job,es_desc AS desc,img');
        $this->db->from('doctor');
        $this->db->where("status", 1);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    function getcomponents($siteLang)
    { //Get components text by language: btn_send Send
        if ($siteLang == "en")
            $this->db->select('keyvalue,en AS lang');
        else
            $this->db->select('keyvalue,es AS lang');
        $this->db->from('contents');
        $this->db->where("contents.type", "component");
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    function getwidgets($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('widget,header_en AS header,subheader_en AS subheader,desc_en AS desc');
        else
            $this->db->select('widget,header_es AS header,subheader_es AS subheader,desc_es AS desc');
        $this->db->from('widgets');
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    function getchosenwidgets($id, $siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('widget,header_en AS header,subheader_en AS subheader,desc_en AS desc,fdesc_en AS fdesc');
        else
            $this->db->select('widget,header_es AS header,subheader_es AS subheader,desc_es AS desc,fdesc_es AS fdesc');
        $this->db->from('widgets');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();

        return $result;
    }
    function getchosendc($id, $siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('id,en_name AS name,en_job AS job,en_desc AS desc,en_fdesc AS fdesc');
        else
            $this->db->select('id,es_name AS name,es_job AS job,es_desc AS desc,es_fdesc AS fdesc');
        $this->db->from('doctor');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();

        return $result;
    }
    function getsymptom($siteLang)
    {
        $this->db->select('*');
        $this->db->from('symptom');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function addsubscriber($name, $email, $cel)
    {
        $data = array(
            'name' => $name,
            'email' => $email,
            'cel' => $cel
        );
        $result = $this->db->insert('subscribers', $data);
        return $result;
    }
    function getins()
    {
        $this->db->select('*');
        $this->db->from('insurances');
        $this->db->where("status", 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function getcreasons($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('en_name AS name');
        else
            $this->db->select('es_name AS name');
        $this->db->from('creasons');
        $this->db->where("status", 1);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    function getcemails()
    {
        $this->db->select('email');
        $this->db->from('cemails');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function addContacts($type, $reason, $pt_emr_id, $name, $email, $cel, $dob, $subject, $message, $lang, $besttime, $pttype, $opt_status, $assign, $msg_type)
    {
        $data = array(
            'type' => $type,
            'clinic_id' => $this->config->item('clinic_id'),
            'pt_emr_id' => $pt_emr_id,
            'patient_type' => $pttype,
            'reason' => $reason,
            'name' => $name,
            'email' => $email,
            'cel' => $cel,
            'dob' => $dob,
            'subject' => $subject,
            'opt_status' => $opt_status,
            'message' => $message,
            'date' => date("Y-m-d H:i:s"),
            'assign' => $assign ? $assign : "",
            'priority' => 1,
            'status' => 1,
            'lang' => $lang,
            'best_time' => $besttime,
            'msg_type' => $msg_type
        );
        $result = $this->db->insert('f_com_contact', $data);
        $last_id = $this->db->insert_id();

        // define case number
        $case_number = 0;
        $last_case_number = $this->db->select('case_number')->from('f_com_contact')->order_by('case_number', 'desc')->limit(1)->get()->result_array();
        if ($last_case_number[0]) {
            $case_number = $last_case_number[0]['case_number'] + 1;
        } else {
            $case_number = 1;
        }

        // update case number
        $contact = array(
            'case_number' => $case_number
        );
        $this->db->where('id', $last_id)->update('f_com_contact', $contact);

        return array("last_id" => $last_id, "case_number" => $case_number);
    }
    function getcoordination($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('widget,header_en AS header,subheader_en AS subheader,desc_en AS desc,fdesc_en AS fdesc');
        else
            $this->db->select('widget,header_es AS header,subheader_es AS subheader,desc_es AS desc,fdesc_es AS fdesc');
        $this->db->from('widgets');
        $this->db->where("widget", "Coordination");
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    function getyournextvisit($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('widget,header_en AS header,subheader_en AS subheader,desc_en AS desc,fdesc_en AS fdesc');
        else
            $this->db->select('widget,header_es AS header,subheader_es AS subheader,desc_es AS desc,fdesc_es AS fdesc');
        $this->db->from('widgets');
        $this->db->where("widget", "Your Next Visit");
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    function getpatientresponsibilities($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('widget,header_en AS header,subheader_en AS subheader,desc_en AS desc,fdesc_en AS fdesc');
        else
            $this->db->select('widget,header_es AS header,subheader_es AS subheader,desc_es AS desc,fdesc_es AS fdesc');
        $this->db->from('widgets');
        $this->db->where("widget", "Patient Responsibilities");
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    function getnewsletter($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('newsletterdata.id,en_sub AS header,en_desc AS desc,author,published,newsletterimg.img');
        else
            $this->db->select('newsletterdata.id,es_sub AS header,es_desc AS desc,author,published,newsletterimg.img');
        $this->db->from('newsletterdata');
        $this->db->join('newsletterimg', 'newsletterimg.id = newsletterdata.img', "left");
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    function getchosennewsletter($id, $siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('newsletterdata.id,en_sub AS header,en_desc AS desc,author,published,newsletterimg.img');
        else
            $this->db->select('newsletterdata.id,es_sub AS header,es_desc AS desc,author,published,newsletterimg.img');
        $this->db->from('newsletterdata');
        $this->db->join('newsletterimg', 'newsletterimg.id = newsletterdata.img', "left");
        $this->db->where("newsletterdata.id", $id);
        $query = $this->db->get();
        $result = $query->row_array();

        return $result;
    }
    function getpatientexpectations($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('widget,header_en AS header,subheader_en AS subheader,desc_en AS desc,fdesc_en AS fdesc');
        else
            $this->db->select('widget,header_es AS header,subheader_es AS subheader,desc_es AS desc,fdesc_es AS fdesc');
        $this->db->from('widgets');
        $this->db->where("widget", "Expectations");
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    function getprimarycare($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('widget,header_en AS header,subheader_en AS subheader,desc_en AS desc,fdesc_en AS fdesc');
        else
            $this->db->select('widget,header_es AS header,subheader_es AS subheader,desc_es AS desc,fdesc_es AS fdesc');
        $this->db->from('widgets');
        $this->db->where("widget", "PRIMARY CARE");
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    function getpreventivecare($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('widget,header_en AS header,subheader_en AS subheader,desc_en AS desc,fdesc_en AS fdesc');
        else
            $this->db->select('widget,header_es AS header,subheader_es AS subheader,desc_es AS desc,fdesc_es AS fdesc');
        $this->db->from('widgets');
        $this->db->where("widget", "PREVENTIVE CARE");
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    function getphysicals($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('widget,header_en AS header,subheader_en AS subheader,desc_en AS desc,fdesc_en AS fdesc');
        else
            $this->db->select('widget,header_es AS header,subheader_es AS subheader,desc_es AS desc,fdesc_es AS fdesc');
        $this->db->from('widgets');
        $this->db->where("widget", "PHYSICALS");
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    function getcardiacservices($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('widget,header_en AS header,subheader_en AS subheader,desc_en AS desc,fdesc_en AS fdesc');
        else
            $this->db->select('widget,header_es AS header,subheader_es AS subheader,desc_es AS desc,fdesc_es AS fdesc');
        $this->db->from('widgets');
        $this->db->where("widget", "PHYSICALS");
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    function getadultvaccination($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('widget,header_en AS header,subheader_en AS subheader,desc_en AS desc,fdesc_en AS fdesc');
        else
            $this->db->select('widget,header_es AS header,subheader_es AS subheader,desc_es AS desc,fdesc_es AS fdesc');
        $this->db->from('widgets');
        $this->db->where("widget", "VACCINATION");
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    function getvideos($siteLang, $education)
    {
        if ($siteLang == "en")
            $this->db->select('en AS name,id');
        else
            $this->db->select('es AS name,id');
        $this->db->from('contents');
        $this->db->like("contents.en", $education);
        $query = $this->db->get();
        $id = $query->row_array();

        if ($siteLang == "en")
            $this->db->select('en AS url');
        else
            $this->db->select('es AS url');
        $this->db->from('evideos');
        $this->db->where("evideos.title", $id['id']);
        $this->db->where("evideos.status", 1);
        if ($siteLang == "en") {
            $this->db->where("en !=", "");
            $this->db->where("en !=", null);
        } else {
            $this->db->where("es !=", "");
            $this->db->where("es !=", null);
        }
        $query = $this->db->get();
        $result = $query->result_array();
        return array($id['name'], $result);
    }
    function getdocs($siteLang, $education)
    {
        if ($siteLang == "en")
            $this->db->select('en AS name,id');
        else
            $this->db->select('es AS name,id');
        $this->db->from('contents');
        $this->db->like("contents.en", $education);
        $query = $this->db->get();
        $id = $query->row_array();

        if ($siteLang == "en")
            $this->db->select('en_name AS name,en_desc AS desc,en_doc AS doc');
        else
            $this->db->select('es_name AS name,es_desc AS desc,es_doc AS doc');
        $this->db->from('documents');
        $this->db->where("documents.page", $id['id']);
        $this->db->where("documents.status", 1);
        if ($siteLang == "en") {
            $this->db->where("en_doc !=", "");
            $this->db->where("en_doc !=", null);
        } else {
            $this->db->where("es_doc !=", "");
            $this->db->where("es_doc !=", null);
        }
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function getcommunity($siteLang, $community)
    {
        if ($siteLang == "en")
            $this->db->select('en AS name,id');
        else
            $this->db->select('es AS name,id');
        $this->db->from('contents');
        $this->db->like("contents.en", $community);
        $query = $this->db->get();
        $id = $query->row_array();

        if ($siteLang == "en")
            $this->db->select('en_desc AS desc');
        else
            $this->db->select('es_desc AS desc');
        $this->db->from('communities');
        $this->db->where("communities.page", $id['id']);
        $this->db->where("communities.status", 1);
        $query = $this->db->get();
        $result = $query->result_array();

        return array($id['name'], $result);
    }

    function getinfo()
    {
        $this->db->select('*');
        $this->db->from('contactinfo');
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    function getaboutus($siteLang)
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
    function getaboutusimg()
    {
        $this->db->select('*');
        $this->db->from('aboutusimg');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getMeasureValue($siteLang)
    {
        if ($siteLang == "en")
            $this->db->select('quality_cat.id,quality_cat.en_name AS catname,measures.measure_en AS measurename,measures.denominator,measures.numerator,measures.desc_en AS mdesc,measures.fdesc_en AS mfdesc');
        else
            $this->db->select('quality_cat.id,quality_cat.es_name AS catname,measures.measure_es AS measurename,measures.denominator,measures.numerator,measures.desc_es AS mdesc,measures.fdesc_es AS mfdesc');
        $this->db->from('quality_cat');
        $this->db->join('measures', 'measures.catid = quality_cat.id', 'left');
        $this->db->where("quality_cat.status", 1);
        $this->db->where("measures.status", 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
}
