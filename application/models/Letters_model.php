<?php
class Letters_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    // letters
    function readLetters($filter)
    {
        $this->db->select('letters.*, letter_categories.name AS category_name, f_vs_languages.English AS language_name');
        $this->db->from('letters');
        $this->db->join("letter_categories", "letters.category = letter_categories.id");
        $this->db->join("f_vs_languages", "letters.language = f_vs_languages.id");

        if ($filter['category'] > 0) {
            $this->db->where('letters.category', $filter['category']);
        }
        if ($filter['language'] > 0) {
            $this->db->where('letters.language', $filter['language']);
        }

        return $this->db->get()->result_array();
    }

    function addLetters($data)
    {
        $record = array(
            'language' => $data['language'],
            'category' => $data['category'],
            'title' => $data['title'],
            'icon' => $data['icon'],
            'short_desc' => $data['short_desc'],
            'long_desc' => $data['long_desc'],
            'status' => $data['status'],
            'request_letter' => $data['request_letter'],
            'online_payment' => $_POST['online_payment'],
            'cost' => $_POST['cost']
        );
        $result = $this->db->insert('letters', $record);
        if ($result) return 1;
        return 0;
    }

    function chosenLetters($id)
    {
        $this->db->select('*');
        $this->db->from('letters');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }

    function updateLetters($data)
    {
        $record = array(
            'language' => $data['language'],
            'category' => $data['category'],
            'title' => $data['title'],
            'icon' => $data['icon'],
            'short_desc' => $data['short_desc'],
            'long_desc' => $data['long_desc'],
            'status' => $data['status'],
            'request_letter' => $data['request_letter'],
            'online_payment' => $_POST['online_payment'],
            'cost' => $_POST['cost']
        );
        $result = $this->db->where('id', $data['id'])->update('letters', $record);
        if ($result) return 1;
        return 0;
    }

    function deleteLetters($id)
    {
        return $this->db->where('id', $id)->delete('letters');
    }

    function getCostById($id)
    {
        return $this->db->select("cost")->from("letters")->where("id", $id)->get()->row_array();
    }

    // letter category
    function readLetterCategory($lang)
    {
        $this->db->select("letter_categories.*, f_vs_languages.English AS language")->from("letter_categories")->join('f_vs_languages', 'f_vs_languages.id = letter_categories.lang', 'left');
        if ($lang > 0) {
            $this->db->where('f_vs_languages.id', $lang);
        }
        return $this->db->get()->result_array();
    }

    function addLetterCategory($data)
    {
        return $this->db->insert("letter_categories", $data);
    }

    function editLetterCategory($data, $id)
    {
        return $this->db->where('id', $id)->update("letter_categories", $data);
    }

    function chosenLetterCategory($id)
    {
        return $this->db->select("*")->from("letter_categories")->where("id", $id)->get()->row_array();
    }

    function deleteLetterCategory($id)
    {
        return $this->db->where('id', $id)->delete("letter_categories");
    }


    function updateFileName($id, $filename, $file_type)
    {
        $data = array($file_type => $filename);
        $result = $this->db->where('id', $id)->update('letters', $data);
        return $result;
    }

    function getLetterDescription($lang)
    {
        $this->db->select('*');
        $this->db->from('letter_desc');
        if ($lang > 0) {
            $this->db->where('lang', $lang);
        }
        return $this->db->get()->row_array();
    }

    function updateLetterDescription($data)
    {
        // check if existed
        $this->db->select('*');
        $this->db->from('letter_desc');
        $this->db->where('lang', $data['lang']);
        $res = $this->db->get()->row_array();

        if ($res) {
            error_log(json_encode($data));
            $result = $this->db->where('lang', $data['lang'])->update('letter_desc', $data);
            if ($result) return 1;
        } else {
            $result = $this->db->insert('letter_desc', $data);
            if ($result) return 1;
        }

        return 0;
    }
}
