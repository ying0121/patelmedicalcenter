<?php
class Settings_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	//cemail Area
	function getcemail()
	{
		$this->db->select('*');
		$this->db->from('cemails');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function addcemail($name, $email)
	{
		$data = array(
			'name' => $name,
			'email' => $email,
			'status' => 1,
		);
		$result = $this->db->insert('cemails', $data);
		return $result;
	}
	function chosencemail($id)
	{
		$this->db->select('*');
		$this->db->from('cemails');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	function editcemail($id, $name, $email)
	{
		$data = array(
			'name' => $name,
			'email' => $email
		);
		$result = $this->db->update('cemails', $data, 'id=' . $id);
		return $result;
	}
	function deletecemail($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('cemails');
		return $result;
	}
	//creason Area
	function getcreason()
	{
		$this->db->select('*');
		$this->db->from('creasons');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function addcreason($en, $es)
	{
		$data = array(
			'en_name' => $en,
			'es_name' => $es,
			'status' => 1,
		);
		$result = $this->db->insert('creasons', $data);
		return $result;
	}
	function chosencreason($id)
	{
		$this->db->select('*');
		$this->db->from('creasons');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	function editcreason($id, $en, $es)
	{
		$data = array(
			'en_name' => $en,
			'es_name' => $es
		);
		$result = $this->db->update('creasons', $data, 'id=' . $id);
		return $result;
	}
	function deletecreason($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('creasons');
		return $result;
	}
	//Page Image
	function getpageimg()
	{
		$this->db->select('pageimg.*,contents.en AS page');
		$this->db->from('pageimg');
		$this->db->join("contents", 'contents.id = pageimg.page', 'left');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function addpageimg($id, $desc, $img)
	{
		$data = array(
			'page' => $id,
			'desc' => $desc,
			'img' => $img,
		);
		$result = $this->db->insert('pageimg', $data);
		return $result;
	}
	function deletepageimg($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('pageimg');
		return $result;
	}
	function updatepageimg($id, $img)
	{
		$data = array(
			'img' => $img,
		);
		$result = $this->db->update('pageimg', $data, 'id=' . $id);
		return $result;
	}
	//quality category Area

	//survey category Area
	function getsurcat()
	{
		$this->db->select('*');
		$this->db->from('survey_cat');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function addsurcat($en, $es)
	{
		$data = array(
			'en_name' => $en,
			'es_name' => $es,
			'status' => 1,
		);
		$result = $this->db->insert('survey_cat', $data);
		return $result;
	}
	function chosensurcat($id)
	{
		$this->db->select('*');
		$this->db->from('survey_cat');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	function editsurcat($id, $en, $es)
	{
		$data = array(
			'en_name' => $en,
			'es_name' => $es
		);
		$result = $this->db->update('survey_cat', $data, 'id=' . $id);
		return $result;
	}
	function deletesurcat($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('survey_cat');
		return $result;
	}
	//survey question Area
	function getsurque()
	{
		$this->db->select('survey_question.*,survey_cat.en_name AS cat');
		$this->db->from('survey_question');
		$this->db->join("survey_cat", "survey_cat.id = survey_question.category", "left");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function addsurque($cat, $en, $es)
	{
		$data = array(
			'category' => $cat,
			'en_name' => $en,
			'es_name' => $es,
			'status' => 1,
		);
		$result = $this->db->insert('survey_question', $data);
		return $result;
	}
	function chosensurque($id)
	{
		$this->db->select('*');
		$this->db->from('survey_question');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	function editsurque($id, $cat, $en, $es)
	{
		$data = array(
			'category' => $cat,
			'en_name' => $en,
			'es_name' => $es
		);
		$result = $this->db->update('survey_question', $data, 'id=' . $id);
		return $result;
	}
	function deletesurque($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('survey_question');
		return $result;
	}
	//survey response Area
	function getsurres()
	{
		$this->db->select('*');
		$this->db->from('survey_res');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function addsurres($key)
	{
		$data = array(
			'key' => $key,
			'en_name' => "",
			'es_name' => "",
			'status' => 1,
		);
		$result = $this->db->insert('survey_res', $data);
		return $result;
	}
	function chosensurres($id)
	{
		$this->db->select('*');
		$this->db->from('survey_res');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	function editsurres($id, $key)
	{
		$data = array(
			'key' => $key,
		);
		$result = $this->db->update('survey_res', $data, 'id=' . $id);
		return $result;
	}
	function updatesurresen($id, $value)
	{
		$data = array(
			'en_name' => $value,
		);
		$result = $this->db->update('survey_res', $data, 'id=' . $id);
		return $result;
	}
	function updatesurreses($id, $value)
	{
		$data = array(
			'es_name' => $value,
		);
		$result = $this->db->update('survey_res', $data, 'id=' . $id);
		return $result;
	}
	function deletesurres($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('survey_res');
		return $result;
	}
	function getsurfooter()
	{
		$this->db->select('*');
		$this->db->from('survey_footer');
		$query = $this->db->get();
		$result = $query->row_array();

		return $result;
	}
	function updatesurveyfooter($en, $es)
	{
		$this->db->select('id');
		$this->db->from('survey_footer');
		$query = $this->db->get();
		$result = $query->row_array();
		if ($query->num_rows() == 0) {
			$data = array(
				'en' => $en,
				'es' => $es
			);
			$result = $this->db->insert('survey_footer', $data);
			return $result;
		} else {
			$data = array(
				'en' => $en,
				'es' => $es,
			);
			$result = $this->db->update('survey_footer', $data, 'id=' . $result['id']);
			return $result;
		}
	}
	function getnewsimg()
	{
		$this->db->select('*');
		$this->db->from('newsletterimg');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function updatenewsimg($name, $img)
	{
		$data = array(
			'img' => $img,
			'name' => $name,
			'status' => 1,
		);
		$result = $this->db->insert('newsletterimg', $data);
		return $result;
	}
	function deletenewsimg($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('newsletterimg');
		return $result;
	}

	//defined medical condition Area
	function getDefinedMedicalCondition()
	{
		$this->db->select('*');
		$this->db->from('medconditions');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function addDefinedMedicalCondition($name, $codes)
	{
		$data = array(
			'name' => $name,
			'codes' => $codes
		);
		$result = $this->db->insert('medconditions', $data);
		return $result;
	}
	function chosenDefinedMedicalCondition($id)
	{
		$this->db->select('*');
		$this->db->from('medconditions');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	function editDefinedMedicalCondition($id, $name, $codes)
	{
		$data = array(
			'name' => $name,
			'codes' => $codes
		);
		$result = $this->db->update('medconditions', $data, 'id=' . $id);
		return $result;
	}
	function deletedefinedMedicalCondition($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('medconditions');
		return $result;
	}

	function getLogoutRules()
	{
		$result = $this->db->select('*')
			->from('setting')
			->get()
			->result_array();
		return $result;
	}

	function getExpiredTime()
	{
		$result = $this->db->select('*')->from('setting')->where('type', 'session_timeout')->get()->row_array();
		return $result;
	}

	function getFailedLimit()
	{
		$result = $this->db->select('*')->from('setting')->where('type', 'failed_limit')->get()->row_array();
		return $result;
	}

	function updateSettingValue($type, $value)
	{
		$data = array(
			'value' => $value
		);
		$result = $this->db->where('type', $type)->update('setting', $data);
		return $result;
	}

	function readIcons($name)
	{
		return $this->db->select("*")->from("icons")->like("name", $name)->get()->result_array();
	}

	function addIcon($data)
	{
		// check if existed
		$result = $this->db->select("*")->from("icons")->where("name", $data['name'])->get()->row_array();
		if ($result) {
			return json_encode(array("status" => "existed"));
		} else {
			$result = $this->db->insert("icons", $data);
			if ($result) {
				return json_encode(array("status" => "ok"));
			} else {
				return json_encode(array("status" => "error"));
			}
		}
	}

	function updateIcon($data)
	{
		return $this->db->where("id", $data['id'])->update("icons", $data);
	}

	function deleteIcon($id)
	{
		return $this->db->where("id", $id)->delete("icons");
	}

	// stripe
	function readPaymentStripe()
	{
		return $this->db->select("*")->from("payment_stripe")->get()->result_array();
	}

	function addPaymentStripe($data)
	{
		return $this->db->insert("payment_stripe", $data);
	}

	function updatePaymentStripe($data)
	{
		return $this->db->where("id", $data['id'])->update("payment_stripe", $data);
	}

	function chosenPaymentStripe($id)
	{
		return $this->db->select("*")->from("payment_stripe")->where("id", $id)->get()->row_array();
	}

	function deletePaymentStripe($id)
	{
		return $this->db->where("id", $id)->delete("payment_stripe");
	}
}
