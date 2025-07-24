<?php
class SocialMedia_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function read()
    {
        $this->db->select('*');
        $this->db->from('social_media');
        $this->db->order_by('id');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function create($url)
    {
        $data = array(
            'img' => 'default.jpg',
            'url' => $url,
            'status' => 1,
        );
        $result = $this->db->insert('social_media', $data);
        return $result;
    }
    function update($id, $url, $status)
    {
        $data = array(
            'url' => $url,
            'status' => $status
        );
        $result = $this->db->update('social_media', $data, 'id=' . $id);
        return $result;
    }

    function upload($id, $img)
    {
        $data = array(
            'img' => $img
        );
        $result = $this->db->update('social_media', $data, 'id=' . $id);
        return $result;
    }
    function delete($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete('social_media');
        return $result;
    }
    function choose($id)
    {
        $this->db->select('*');
        $this->db->from('social_media');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
}
