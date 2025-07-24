<?php
class Education_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getVideos($lang, $tag)
    {
        return $this->db->select("id, title_" . $lang . " AS title, url_" . $lang . " AS url, status")->from("education_videos")->where("tag", $tag)->get()->result_array();
    }
    function getDocs($lang, $tag)
    {
        return $this->db->select("id, title_" . $lang . " AS title, desc_" . $lang . " AS desc, url_" . $lang . " AS url, status")->from("education_docs")->where("tag", $tag)->get()->result_array();
    }

    // video
    function readVideo($tag)
    {
        return $this->db->select("*")->from("education_videos")->where("tag", $tag)->get()->result_array();
    }
    function readVideoById($id)
    {
        return $this->db->select("*")->from("education_videos")->where("id", $id)->get()->row_array();
    }
    function addVideo($data)
    {
        return $this->db->insert("education_videos", $data);
    }
    function updateVideo($data, $id)
    {
        return $this->db->where("id", $id)->update("education_videos", $data);
    }
    function deleteVideo($id, $tag)
    {
        return $this->db->where("tag", $tag)->where("id", $id)->delete("education_videos");
    }

    // document
    function readDocument($tag)
    {
        return $this->db->select("*")->from("education_docs")->where("tag", $tag)->get()->result_array();
    }
    function readDocumentById($id)
    {
        return $this->db->select("*")->from("education_docs")->where("id", $id)->get()->row_array();
    }
    function addDocument($data)
    {
        return $this->db->insert("education_docs", $data);
    }
    function updateDocument($data, $id)
    {
        return $this->db->where("id", $id)->update("education_docs", $data);
    }
    function deleteDocument($id, $tag)
    {
        return $this->db->where("tag", $tag)->where("id", $id)->delete("education_docs");
    }

    // upload file
    function uploadFile($lang, $id, $name)
    {
        return $this->db->where("id", $id)->update("education_docs", ["url_" . $lang => $name]);
    }
}
