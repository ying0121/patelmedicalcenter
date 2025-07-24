<?php
class Metrics_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function readQualityCategories()
	{
		$this->db->select('quality_cat.*,COUNT(measures.id) AS cnt');
		$this->db->from('quality_cat');
		$this->db->join('measures', 'measures.catid = quality_cat.id', 'left');
		$this->db->group_by('quality_cat.id');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function createQualityCategory($en, $es)
	{
		$data = array(
			'en_name' => $en,
			'es_name' => $es,
			'status' => 1,
		);
		$result = $this->db->insert('quality_cat', $data);
		return $result;
	}
	function chooseQualityCategory($id)
	{
		$this->db->select('*');
		$this->db->from('quality_cat');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	function updateQualityCategory($id, $en, $es, $status)
	{
		$data = array(
			'en_name' => $en,
			'es_name' => $es,
			'status' => $status
		);
		$result = $this->db->update('quality_cat', $data, 'id=' . $id);
		return $result;
	}
	function deleteQualityCategory($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('quality_cat');
		return $result;
	}
	function createMeasure($id, $measure_en, $measure_es, $denominator, $numerator, $sdate, $edate, $desc_en, $desc_es, $fdesc_en, $fdesc_es)
	{
		$data = array(
			'catid' => $id,
			'measure_en' => $measure_en,
			'measure_es' => $measure_es,
			'denominator' => $denominator,
			'numerator' => $numerator,
			'sdate' => $sdate,
			'edate' => $edate,
			'desc_en' => $desc_en,
			'desc_es' => $desc_es,
			'fdesc_en' => $fdesc_en,
			'fdesc_es' => $fdesc_es,
			'status' => 1
		);
		$result = $this->db->insert('measures', $data);
		return $result;
	}
	function readMeasures($id)
	{
		$this->db->select('*');
		$this->db->from('measures');
		$this->db->where("catid", $id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function deleteMeasure($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('measures');
		return $result;
	}
	function chooseMeasure($id)
	{
		$this->db->select('*');
		$this->db->from('measures');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	function updateMeasure($id, $measure_en, $measure_es, $topic, $denominator, $numerator, $sdate, $edate, $desc_en, $desc_es, $fdesc_en, $fdesc_es, $status)
	{
		$data = array(
			'measure_en' => $measure_en,
			'measure_es' => $measure_es,
			'catid' => $topic,
			'denominator' => $denominator,
			'numerator' => $numerator,
			'sdate' => $sdate,
			'edate' => $edate,
			'desc_en' => $desc_en,
			'desc_es' => $desc_es,
			'fdesc_en' => $fdesc_en,
			'fdesc_es' => $fdesc_es,
			'status' => $status
		);
		$result = $this->db->update('measures', $data, 'id=' . $id);
		return $result;
	}
}
