<?php
class Content_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getComponentTexts()
    {
        $this->db->select('*');
        $this->db->from('contents');
        $query = $this->db->get();
        $table_data = $query->result_array();
        $result = array();
        for ($i = 0; $i < count($table_data); $i++) {
            $result[$table_data[$i]['keyvalue']]['en'] = $table_data[$i]['en'];
            $result[$table_data[$i]['keyvalue']]['es'] = $table_data[$i]['es'];
        }
        return $result;
    }
    function getLanguage()
    {
        $this->db->select('*');
        $this->db->from('contents');
        $this->db->where('type !=', 'template');
        $this->db->order_by('keyvalue');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function updateComponent($key, $en, $es)
    {
        $data = array(
            'en' => $en,
            'es' => $es
        );
        $result = $this->db->where('keyvalue', $key)->update('contents', $data);
        return $result;
    }
    function chooseComponent($id)
    {
        $this->db->select('*');
        $this->db->from('contents');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    function updateHomeText($data)
    {
        // Home Header
        $header = array(
            'en' => $data['header_en'],
            'es' => $data['header_es']
        );
        $result = $this->db->where('keyvalue', "t_home_header")->update('contents', $header);

        // Home Footer
        $footer = array(
            'en' => $data['footer_en'],
            'es' => $data['footer_es']
        );
        $result = $this->db->where('keyvalue', "t_home_footer")->update('contents', $footer);

        return $result;
    }


    function getpages()
    {
        $this->db->select('contents.id,contents.en AS plink,contents.module');
        $this->db->from('contents');
        $this->db->where("contents.type", "menu");
        $this->db->where("contents.status", 1);
        $query = $this->db->get();
        $parent = $query->result_array();
        for ($i = 0; $i < count($parent); $i++) {
            $this->db->select('contents.id AS sid,contents.en AS slink');
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
    function getsector()
    {
        $this->db->select('*');
        $this->db->from('sectors');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    //Menu Area
    function getmenu()
    {
        $this->db->select('*');
        $this->db->from('contents');
        $this->db->where("type", "menu");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function addmenu($key, $en, $es, $order, $module, $status)
    {
        $data = array(
            'type' => 'menu',
            'keyvalue' => $key,
            'en' => $en,
            'es' => $es,
            'order' => $order,
            'module' => $module,
            'status' => $status,
        );
        $result = $this->db->insert('contents', $data);
        return $result;
    }
    function chosenmenu($id)
    {
        $this->db->select('*');
        $this->db->from('contents');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    function editmenu($id, $key, $en, $es, $order, $module, $status)
    {
        $data = array(
            'keyvalue' => $key,
            'en' => $en,
            'es' => $es,
            'order' => $order,
            'module' => $module,
            'status' => $status,
        );
        $result = $this->db->update('contents', $data, 'id=' . $id);
        return $result;
    }
    function deletemenu($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete('contents');
        return $result;
    }
    function editmenustatus($id, $value)
    {
        $data = array(
            'status' => $value,
        );
        $result = $this->db->update('contents', $data, 'id=' . $id);
        return $result;
    }
    //Submenu Area
    function getsubmenu()
    {
        $this->db->select('contents.*,t1.en AS pmenu');
        $this->db->from('contents');
        $this->db->join('contents AS t1', "t1.id = contents.parent", "left");
        $this->db->where("contents.type", "submenu");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function addsubmenu($pmenu, $key, $en, $es, $status)
    {
        $data = array(
            'type' => 'submenu',
            'parent' => $pmenu,
            'keyvalue' => $key,
            'en' => $en,
            'es' => $es,
            'status' => $status,
        );
        $result = $this->db->insert('contents', $data);
        return $result;
    }
    function chosensubmenu($id)
    {
        $this->db->select('*');
        $this->db->from('contents');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    function editsubmenu($id, $pmenu, $key, $en, $es, $status)
    {
        $data = array(
            'parent' => $pmenu,
            'keyvalue' => $key,
            'en' => $en,
            'es' => $es,
            'status' => $status
        );
        $result = $this->db->update('contents', $data, 'id=' . $id);
        return $result;
    }
    function deletesubmenu($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete('contents');
        return $result;
    }
    function editsubmenustatus($id, $value)
    {
        $data = array(
            'status' => $value,
        );
        $result = $this->db->update('contents', $data, 'id=' . $id);
        return $result;
    }
    //Component Area
    function getcomponent()
    {
        $this->db->select('*');
        $this->db->from('contents');
        $this->db->where("type", "component");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function addcomponent($key, $en, $es)
    {
        $data = array(
            'type' => 'component',
            'keyvalue' => $key,
            'en' => $en,
            'es' => $es,
            'status' => 1,
        );
        $result = $this->db->insert('contents', $data);
        return $result;
    }
    function choose($id)
    {
        $this->db->select('*');
        $this->db->from('contents');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    function editcomponent($id, $key, $en, $es)
    {
        $data = array(
            'keyvalue' => $key,
            'en' => $en,
            'es' => $es
        );
        $result = $this->db->update('contents', $data, 'id=' . $id);
        return $result;
    }
    function deletecomponent($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete('contents');
        return $result;
    }
    //Symptom Area
    function getsymptom()
    {
        $this->db->select('*');
        $this->db->from('symptom');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function addsymptom($key, $url)
    {
        $data = array(
            'name' => $key,
            'link' => $url,
            'status' => 1,
        );
        $result = $this->db->insert('symptom', $data);
        return $result;
    }
    function chosensymptom($id)
    {
        $this->db->select('*');
        $this->db->from('symptom');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    function editsymptom($id, $key, $url)
    {
        $data = array(
            'name' => $key,
            'link' => $url,
        );
        $result = $this->db->update('symptom', $data, 'id=' . $id);
        return $result;
    }
    function deletesymptom($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete('symptom');
        return $result;
    }
    //Widget Area
    function getwidget()
    {
        $this->db->select('widgets.id,widgets.pageid,widgets.widget,widgets.status,contents.en AS page,sectors.name AS sector,widgets.img,widgets.sector AS sectorid');
        $this->db->from('widgets');
        $this->db->join('contents', 'contents.id = widgets.pageid', 'left');
        $this->db->join('sectors', 'sectors.id = widgets.sector', 'left');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function addwidget($pageid, $sector, $key)
    {
        $data = array(
            'pageid' => $pageid,
            'sector' => $sector,
            'widget' => $key,
            'status' => 1,
        );
        $result = $this->db->insert('widgets', $data);
        return $result;
    }
    function chosenwidget($id)
    {
        $this->db->select('*');
        $this->db->from('widgets');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    function editwidget($id, $pageid, $sector, $key, $status)
    {
        $data = array(
            'pageid' => $pageid,
            'sector' => $sector,
            'widget' => $key,
            'status' => $status
        );
        $result = $this->db->update('widgets', $data, 'id=' . $id);
        return $result;
    }
    function deletewidget($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete('widgets');
        return $result;
    }
    function widgetimgdelete($id)
    {
        $data = array(
            'img' => null,
        );
        $result = $this->db->update('widgets', $data, 'id=' . $id);
        return $result;
    }
    function widgetimg($id, $img)
    {
        $data = array(
            'img' => $img,
        );
        $result = $this->db->update('widgets', $data, 'id=' . $id);
        return $result;
    }
    //Widget Item Area
    function updatewidgetitem($id, $header_en, $header_es, $subheader_en, $subheader_es, $desc_en, $desc_es, $fdesc_en, $fdesc_es)
    {
        $data = array(
            'header_en' => $header_en,
            'header_es' => $header_es,
            'subheader_en' => $subheader_en,
            'subheader_es' => $subheader_es,
            'desc_en' => $desc_en,
            'desc_es' => $desc_es,
            'fdesc_en' => $fdesc_en,
            'fdesc_es' => $fdesc_es
        );
        $result = $this->db->update('widgets', $data, 'id=' . $id);
        return $result;
    }
    //Eudcation Video Area
    function getevideo()
    {
        $this->db->select('evideos.*,contents.en AS etitle');
        $this->db->from('evideos');
        $this->db->join("contents", "contents.id = evideos.title", "left");
        $this->db->order_by("contents.en");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function addevideo($key, $en, $es, $status)
    {
        $data = array(
            'title' => $key,
            'en' => $en,
            'es' => $es,
            'status' => $status,
        );
        $result = $this->db->insert('evideos', $data);
        return $result;
    }
    function chosenevideo($id)
    {
        $this->db->select('*');
        $this->db->from('evideos');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    function editevideo($id, $key, $en, $es, $status)
    {
        $data = array(
            'title' => $key,
            'en' => $en,
            'es' => $es,
            'status' => $status,
        );
        $result = $this->db->update('evideos', $data, 'id=' . $id);
        return $result;
    }
    function deleteevideo($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete('evideos');
        return $result;
    }
    function editevideostatus($id, $value)
    {
        $data = array(
            'status' => $value,
        );
        $result = $this->db->update('evideos', $data, 'id=' . $id);
        return $result;
    }
    //Doc Area
    function getdoc()
    {
        $this->db->select('documents.*,contents.en AS page');
        $this->db->from('documents');
        $this->db->join("contents", "contents.id = documents.page", "left");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function addDocument($page, $entitle, $estitle, $endesc, $esdesc, $enfile, $esfile)
    {
        $data = array(
            'page' => $page,
            'en_name' => $entitle,
            'es_name' => $estitle,
            'en_desc' => $endesc,
            'es_desc' => $esdesc,
            'en_doc' => $enfile,
            'es_doc' => $esfile,
            'status' => 1,
        );
        $result = $this->db->insert('documents', $data);
        return $result;
    }
    function chosendoc($id)
    {
        $this->db->select('*');
        $this->db->from('documents');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    function editDocument($id, $page, $entitle, $estitle, $endesc, $esdesc, $enfile, $esfile)
    {
        if ($enfile != null && $esfile != null)
            $data = array(
                'page' => $page,
                'en_name' => $entitle,
                'es_name' => $estitle,
                'en_desc' => $endesc,
                'es_desc' => $esdesc,
                'en_doc' => $enfile,
                'es_doc' => $esfile,
            );
        elseif ($enfile == null && $esfile != null) {
            $data = array(
                'page' => $page,
                'en_name' => $entitle,
                'es_name' => $estitle,
                'en_desc' => $endesc,
                'es_desc' => $esdesc,
                'es_doc' => $esfile,
            );
        } elseif ($enfile != null && $esfile == null) {
            $data = array(
                'page' => $page,
                'en_name' => $entitle,
                'es_name' => $estitle,
                'en_desc' => $endesc,
                'es_desc' => $esdesc,
                'en_doc' => $enfile,
            );
        } else {
            $data = array(
                'page' => $page,
                'en_name' => $entitle,
                'es_name' => $estitle,
                'en_desc' => $endesc,
                'es_desc' => $esdesc
            );
        }
        $result = $this->db->update('documents', $data, 'id=' . $id);
        return $result;
    }
    function deletedoc($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete('documents');
        return $result;
    }
    //Community Area
    function getcommunity()
    {
        $this->db->select('communities.*,contents.en AS pagename');
        $this->db->from('communities');
        $this->db->join("contents", "contents.id = communities.page", "left");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function addcommunity($page, $en, $es)
    {
        $data = array(
            'page' => $page,
            'en_desc' => $en,
            'es_desc' => $es,
            'status' => 1,
        );
        $result = $this->db->insert('communities', $data);
        return $result;
    }
    function chosencommunity($id)
    {
        $this->db->select('*');
        $this->db->from('communities');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    function editcommunity($id, $page, $en, $es)
    {
        $data = array(
            'page' => $page,
            'en_desc' => $en,
            'es_desc' => $es
        );
        $result = $this->db->update('communities', $data, 'id=' . $id);
        return $result;
    }
    function deletecommunity($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete('communities');
        return $result;
    }
    function getTemplate()
    {
        $this->db->select('en', 'es');
        $this->db->from('contents');
        $this->db->where('type', 'template');

        $table_data = $this->db->get()->result_array();

        for ($i = 0; $i < count($table_data); $i++) {
            $result[$table_data[$i]['keyvalue']]['en'] = $table_data[$i]['en'];
            $result[$table_data[$i]['keyvalue']]['es'] = $table_data[$i]['es'];
        }
        return $result;
    }


    function readSignInContent()
    {
        $result = $this->db->select('*')
            ->from('contents')
            ->where('type', 'template')
            ->like('keyvalue', 't_pa_si_', 'after')
            ->get()
            ->result_array();

        $data = array('en' => array(), 'es' => array());
        foreach ($result as $key => $row) {
            $data['en'][$row['keyvalue']] = $row['en'];
            $data['es'][$row['keyvalue']] = $row['es'];
        }
        return $data;
    }

    function readSignUpContent()
    {
        $result = $this->db->select('*')
            ->from('contents')
            ->where('type', 'template')
            ->like('keyvalue', 't_pa_su_', 'after')
            ->get()
            ->result_array();

        $data = array('en' => array(), 'es' => array());
        foreach ($result as $key => $row) {
            $data['en'][$row['keyvalue']] = $row['en'];
            $data['es'][$row['keyvalue']] = $row['es'];
        }
        return $data;
    }

    function readLoginFailedContent()
    {
        $result = $this->db->select('*')
            ->from('contents')
            ->where('type', 'template')
            ->like('keyvalue', 't_pa_lf_', 'after')
            ->get()
            ->result_array();

        $data = array('en' => array(), 'es' => array());
        foreach ($result as $key => $row) {
            $data['en'][$row['keyvalue']] = $row['en'];
            $data['es'][$row['keyvalue']] = $row['es'];
        }
        return $data;
    }

    function readPromptsContent()
    {
        $result = $this->db->select('*')
            ->from('contents')
            ->where('type', 'template')
            ->like('keyvalue', 't_pa_pr_', 'after')
            ->get()
            ->result_array();

        $data = array('en' => array(), 'es' => array());
        foreach ($result as $key => $row) {
            $data['en'][$row['keyvalue']] = $row['en'];
            $data['es'][$row['keyvalue']] = $row['es'];
        }
        return $data;
    }

    function readNeedHelpContent()
    {
        $result = $this->db->select('*')
            ->from('contents')
            ->where('type', 'template')
            ->like('keyvalue', 't_pa_ah_', 'after')
            ->get()
            ->result_array();

        $data = array('en' => array(), 'es' => array());
        foreach ($result as $key => $row) {
            $data['en'][$row['keyvalue']] = $row['en'];
            $data['es'][$row['keyvalue']] = $row['es'];
        }
        return $data;
    }

    function readEmailAccountContent()
    {
        $result = $this->db->select('*')
            ->from('contents')
            ->where('type', 'template')
            ->like('keyvalue', 't_pa_ea_', 'after')
            ->get()
            ->result_array();

        $data = array('en' => array(), 'es' => array());
        foreach ($result as $key => $row) {
            $data['en'][$row['keyvalue']] = $row['en'];
            $data['es'][$row['keyvalue']] = $row['es'];
        }
        return $data;
    }

    function readEmailPasswordContent()
    {
        $result = $this->db->select('*')
            ->from('contents')
            ->where('type', 'template')
            ->like('keyvalue', 't_pa_ep_', 'after')
            ->get()
            ->result_array();

        $data = array('en' => array(), 'es' => array());
        foreach ($result as $key => $row) {
            $data['en'][$row['keyvalue']] = $row['en'];
            $data['es'][$row['keyvalue']] = $row['es'];
        }
        return $data;
    }

    function readVaultContent()
    {
        $result = $this->db->select('*')
            ->from('contents')
            ->where('type', 'template')
            ->like('keyvalue', 't_pa_v_', 'after')
            ->get()
            ->result_array();

        $data = array('en' => array(), 'es' => array());
        foreach ($result as $key => $row) {
            $data['en'][$row['keyvalue']] = $row['en'];
            $data['es'][$row['keyvalue']] = $row['es'];
        }
        return $data;
    }

    function readEmailUpdateContent()
    {
        $result = $this->db->select('*')
            ->from('contents')
            ->where('type', 'template')
            ->like('keyvalue', 't_pa_eu_', 'after')
            ->get()
            ->result_array();

        $data = array('en' => array(), 'es' => array());
        foreach ($result as $key => $row) {
            $data['en'][$row['keyvalue']] = $row['en'];
            $data['es'][$row['keyvalue']] = $row['es'];
        }
        return $data;
    }

    function readEmailCloseContent()
    {
        $result = $this->db->select('*')
            ->from('contents')
            ->where('type', 'template')
            ->like('keyvalue', 't_pa_ec_', 'after')
            ->get()
            ->result_array();

        $data = array('en' => array(), 'es' => array());
        foreach ($result as $key => $row) {
            $data['en'][$row['keyvalue']] = $row['en'];
            $data['es'][$row['keyvalue']] = $row['es'];
        }
        return $data;
    }



    function updateSignInContent($data)
    {
        // Welcome
        $record = array(
            'en' => $data['pa_si_welcome_en'],
            'es' => $data['pa_si_welcome_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_si_welcome')->update('contents', $record);
        if (!$result) return 0;

        // Sign In
        $record = array(
            'en' => $data['pa_si_signin_en'],
            'es' => $data['pa_si_signin_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_si_signin')->update('contents', $record);
        if (!$result) return 0;

        // Form Text
        $record = array(
            'en' => $data['pa_si_formtext_en'],
            'es' => $data['pa_si_formtext_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_si_formtext')->update('contents', $record);
        if (!$result) return 0;

        return 1;
    }

    function updateSignUpContent($data)
    {
        // Active Account
        $record = array(
            'en' => $data['pa_su_account_en'],
            'es' => $data['pa_su_account_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_su_account')->update('contents', $record);
        if (!$result) return 0;

        // Sign Up
        $record = array(
            'en' => $data['pa_su_signup_en'],
            'es' => $data['pa_su_signup_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_su_signup')->update('contents', $record);
        if (!$result) return 0;

        // Send
        $record = array(
            'en' => $data['pa_su_send_en'],
            'es' => $data['pa_su_send_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_su_send')->update('contents', $record);
        if (!$result) return 0;

        // Email Footer
        $record = array(
            'en' => $data['pa_su_eheader_en'],
            'es' => $data['pa_su_eheader_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_su_eheader')->update('contents', $record);
        if (!$result) return 0;

        // Success Alert
        $record = array(
            'en' => $data['pa_su_alert_success_en'],
            'es' => $data['pa_su_alert_success_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_su_alert_success')->update('contents', $record);
        if (!$result) return 0;

        // Failed Alert
        $record = array(
            'en' => $data['pa_su_alert_failed_en'],
            'es' => $data['pa_su_alert_failed_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_su_alert_failed')->update('contents', $record);
        if (!$result) return 0;

        // Existed Alert
        $record = array(
            'en' => $data['pa_su_alert_exist_en'],
            'es' => $data['pa_su_alert_exist_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_su_alert_exist')->update('contents', $record);
        if (!$result) return 0;

        return 1;
    }

    function updateLoginFailedContent($data)
    {
        // Invalid
        $record = array(
            'en' => $data['pa_lf_invalid_en'],
            'es' => $data['pa_lf_invalid_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_lf_invalid')->update('contents', $record);
        if (!$result) return 0;

        // Login Failed
        $record = array(
            'en' => $data['pa_lf_failed_en'],
            'es' => $data['pa_lf_failed_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_lf_failed')->update('contents', $record);
        if (!$result) return 0;

        // Text
        $record = array(
            'en' => $data['pa_lf_text_en'],
            'es' => $data['pa_lf_text_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_lf_text')->update('contents', $record);
        if (!$result) return 0;

        // Inactive
        $record = array(
            'en' => $data['pa_lf_inactive_en'],
            'es' => $data['pa_lf_inactive_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_lf_inactive')->update('contents', $record);
        if (!$result) return 0;

        return 1;
    }

    function updatePromptsContent($data)
    {
        // Logout Footer
        $record = array(
            'en' => $data['pa_pr_footer_en'],
            'es' => $data['pa_pr_footer_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_pr_footer')->update('contents', $record);
        if (!$result) return 0;

        // Security Question
        $record = array(
            'en' => $data['pa_pr_security_en'],
            'es' => $data['pa_pr_security_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_pr_security')->update('contents', $record);
        if (!$result) return 0;

        // Sign In Help
        $record = array(
            'en' => $data['pa_pr_sihelp_en'],
            'es' => $data['pa_pr_sihelp_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_pr_sihelp')->update('contents', $record);
        if (!$result) return 0;

        return 1;
    }

    function updateNeedHelpContent($data)
    {
        // Invalid
        $record = array(
            'en' => $data['pa_ah_invalid_en'],
            'es' => $data['pa_ah_invalid_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ah_invalid')->update('contents', $record);
        if (!$result) return 0;

        // Need Help
        $record = array(
            'en' => $data['pa_ah_help_en'],
            'es' => $data['pa_ah_help_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ah_help')->update('contents', $record);
        if (!$result) return 0;

        // Header Question
        $record = array(
            'en' => $data['pa_ah_hques_en'],
            'es' => $data['pa_ah_hques_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ah_hques')->update('contents', $record);
        if (!$result) return 0;

        // Forgot Account
        $record = array(
            'en' => $data['pa_ah_facc_en'],
            'es' => $data['pa_ah_facc_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ah_facc')->update('contents', $record);
        if (!$result) return 0;

        // Forgot Password
        $record = array(
            'en' => $data['pa_ah_fpwd_en'],
            'es' => $data['pa_ah_fpwd_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ah_fpwd')->update('contents', $record);
        if (!$result) return 0;

        // Description
        $record = array(
            'en' => $data['pa_ah_desc_en'],
            'es' => $data['pa_ah_desc_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ah_desc')->update('contents', $record);
        if (!$result) return 0;

        // Repassword Header
        $record = array(
            'en' => $data['pa_ah_rpheader_en'],
            'es' => $data['pa_ah_rpheader_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ah_rpheader')->update('contents', $record);
        if (!$result) return 0;

        // Footer Question
        $record = array(
            'en' => $data['pa_ah_ques_en'],
            'es' => $data['pa_ah_ques_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ah_ques')->update('contents', $record);
        if (!$result) return 0;

        // Success Alert
        $record = array(
            'en' => $data['pa_ah_alert_success_en'],
            'es' => $data['pa_ah_alert_success_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ah_alert_success')->update('contents', $record);
        if (!$result) return 0;

        // Failed Alert
        $record = array(
            'en' => $data['pa_ah_alert_failed_en'],
            'es' => $data['pa_ah_alert_failed_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ah_alert_failed')->update('contents', $record);
        if (!$result) return 0;

        // Not Existed Alert
        $record = array(
            'en' => $data['pa_ah_alert_notexisted_en'],
            'es' => $data['pa_ah_alert_notexisted_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ah_alert_notexisted')->update('contents', $record);
        if (!$result) return 0;

        return 1;
    }

    function updateEmailAccountContent($data)
    {
        // Subject
        $record = array(
            'en' => $data['pa_ea_subject_en'],
            'es' => $data['pa_ea_subject_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ea_subject')->update('contents', $record);
        if (!$result) return 0;

        // Email Text
        $record = array(
            'en' => $data['pa_ea_email_text_en'],
            'es' => $data['pa_ea_email_text_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ea_email_text')->update('contents', $record);
        if (!$result) return 0;

        // Link
        $record = array(
            'en' => $data['pa_ea_link_en'],
            'es' => $data['pa_ea_link_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ea_link')->update('contents', $record);
        if (!$result) return 0;

        // Disclaimer
        $record = array(
            'en' => $data['pa_ea_disclaimer_en'],
            'es' => $data['pa_ea_disclaimer_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ea_disclaimer')->update('contents', $record);
        if (!$result) return 0;

        return 1;
    }

    function updateEmailPasswordContent($data)
    {
        // Subject
        $record = array(
            'en' => $data['pa_ep_subject_en'],
            'es' => $data['pa_ep_subject_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ep_subject')->update('contents', $record);
        if (!$result) return 0;

        // Email Text
        $record = array(
            'en' => $data['pa_ep_emailtext_en'],
            'es' => $data['pa_ep_emailtext_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ep_emailtext')->update('contents', $record);
        if (!$result) return 0;

        // Link Time
        $record = array(
            'en' => $data['pa_ep_linktime_en'],
            'es' => $data['pa_ep_linktime_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ep_linktime')->update('contents', $record);
        if (!$result) return 0;

        // Not Existed
        $record = array(
            'en' => $data['pa_ep_notexisted_en'],
            'es' => $data['pa_ep_notexisted_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ep_notexisted')->update('contents', $record);
        if (!$result) return 0;

        // Alert Success
        $record = array(
            'en' => $data['pa_ep_alert_success_en'],
            'es' => $data['pa_ep_alert_success_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ep_alert_success')->update('contents', $record);
        if (!$result) return 0;

        return 1;
    }

    function updateVaultContent($data)
    {
        // Welcome
        $record = array(
            'en' => $data['pa_v_welcome_en'],
            'es' => $data['pa_v_welcome_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_v_welcome')->update('contents', $record);
        if (!$result) return 0;

        // Description
        $record = array(
            'en' => $data['pa_v_desc_en'],
            'es' => $data['pa_v_desc_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_v_desc')->update('contents', $record);
        if (!$result) return 0;

        // Header Text
        $record = array(
            'en' => $data['pa_v_htext_en'],
            'es' => $data['pa_v_htext_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_v_htext')->update('contents', $record);
        if (!$result) return 0;

        // Alert Success
        $record = array(
            'en' => $data['pa_v_alert_success_en'],
            'es' => $data['pa_v_alert_success_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_v_alert_success')->update('contents', $record);
        if (!$result) return 0;

        // Alert Failed
        $record = array(
            'en' => $data['pa_v_alert_failed_en'],
            'es' => $data['pa_v_alert_failed_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_v_alert_failed')->update('contents', $record);
        if (!$result) return 0;

        return 1;
    }

    function updateEmailUpdateContent($data)
    {
        // Subject
        $record = array(
            'en' => $data['pa_eu_subject_en'],
            'es' => $data['pa_eu_subject_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_eu_subject')->update('contents', $record);
        if (!$result) return 0;

        // Updated Text
        $record = array(
            'en' => $data['pa_eu_etext_en'],
            'es' => $data['pa_eu_etext_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_eu_etext')->update('contents', $record);
        if (!$result) return 0;

        return 1;
    }

    function updateEmailCloseContent($data)
    {
        // Subject
        $record = array(
            'en' => $data['pa_ec_subject_en'],
            'es' => $data['pa_ec_subject_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ec_subject')->update('contents', $record);
        if (!$result) return 0;

        // Updated Text
        $record = array(
            'en' => $data['pa_ec_etext_en'],
            'es' => $data['pa_ec_etext_sp']
        );
        $result = $this->db->where('keyvalue', 't_pa_ec_etext')->update('contents', $record);
        if (!$result) return 0;

        return 1;
    }

    // update insurance
    function updateInsuranceContent($data)
    {
        $result = $this->db->where('keyvalue', 't_ins_title')->update('contents', $data['title']);
        if (!$result) return 0;
        $result = $this->db->where('keyvalue', 't_ins_desc')->update('contents', $data['desc']);
        if (!$result) return 0;

        return 1;
    }

    // send to friend
    function readSendToFriend()
    {
        $result = $this->db->select('*')
            ->from('contents')
            ->where('type', 'template')
            ->like('keyvalue', 't_sf_', 'after')
            ->get()
            ->result_array();

        $data = array('en' => array(), 'es' => array());
        foreach ($result as $key => $row) {
            $data['en'][$row['keyvalue']] = $row['en'];
            $data['es'][$row['keyvalue']] = $row['es'];
        }
        return $data;
    }

    function updateSendToFriend($data)
    {
        // Subject
        $record = array(
            'en' => $data['sf_subject_en'],
            'es' => $data['sf_subject_es']
        );
        $result = $this->db->where('keyvalue', 't_sf_subject')->update('contents', $record);
        if (!$result) return 0;

        // Updated Text
        $record = array(
            'en' => $data['sf_updated_text_en'],
            'es' => $data['sf_updated_text_es']
        );
        $result = $this->db->where('keyvalue', 't_sf_updated_text')->update('contents', $record);
        if (!$result) return 0;

        return 1;
    }
}
