<?php


function sortArrayByValuesArray(array &$array, array $orderArray, $strict = null)
{
	if (!empty($array) && !empty($orderArray)) {
		$ordered = [];
		foreach ($orderArray as $item) {
			$search = !is_null($strict) ? array_keys($array, $item, $strict) : array_keys(preg_grep('#' . $item . '#', $array));
			if (!empty($search)) {
				foreach ($search as $key) {
					$ordered[$key] = $array[$key];
					unset($array[$key]);
				}
			}
		}

		$array = array_merge($ordered, $array);
	}
}

class Survey_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function getquestions()
	{
		$this->db->select('survey_question.id,survey_question.category,survey_question.en_name AS question,survey_cat.en_name AS cat');
		$this->db->from('survey_question');
		$this->db->join("survey_cat", "survey_cat.id = survey_question.category", "left");
		$this->db->order_by("survey_cat.en_name");
		$query = $this->db->get();
		$result = $query->result_array();

		$tmpcat = "";
		$tmpresult = [];
		for ($i = 0; $i < count($result); $i++) {
			if ($tmpcat != $result[$i]['cat']) {
				$tmpcat = $result[$i]['cat'];
				$tmpresult[$tmpcat][] = array("id" => $result[$i]['id'], "catid" => $result[$i]['category'], "question" => $result[$i]['question']);
			} else {
				$tmpresult[$tmpcat][] = array("id" => $result[$i]['id'], "catid" => $result[$i]['category'], "question" => $result[$i]['question']);
			}
		}
		return $tmpresult;
	}
	function getreponses()
	{
		$this->db->select('survey_res.id,survey_res.en_name AS response');
		$this->db->from('survey_res');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function getsurvey()
	{
		$this->db->select('*');
		$this->db->from('surveydata');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function chosenresponse($id)
	{
		$this->db->select('survey_res.id,survey_res.en_name AS response');
		$this->db->from('survey_res');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	function addsurvey($en_sub, $es_sub, $en_desc, $es_desc)
	{
		$data = array(
			'en_sub' => $en_sub,
			'es_sub' => $es_sub,
			'en_desc' => $en_desc,
			'es_desc' => $es_desc,
			'created' => date("Y-m-d"),
			'status' => 1
		);
		$result = $this->db->insert('surveydata', $data);

		return $result;
	}
	function chosensurvey($id)
	{
		$this->db->select('*');
		$this->db->from('surveydata');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	function editsurvey($id, $en_sub, $es_sub, $en_desc, $es_desc)
	{
		$data = array(
			'en_sub' => $en_sub,
			'es_sub' => $es_sub,
			'en_desc' => $en_desc,
			'es_desc' => $es_desc,
		);
		$result = $this->db->update('surveydata', $data, 'id=' . $id);
		return $result;
	}
	function generatesurvey($id, $quiz, $res)
	{
		$data = array(
			'quiz' => json_encode($quiz),
			'res' => json_encode($res),
		);
		$result = $this->db->update('surveydata', $data, 'id=' . $id);
		return $result;
	}
	function updatesurveydate($id)
	{
		$data = array(
			'created' => date("Y-m-d"),
		);
		$result = $this->db->update('surveydata', $data, 'id=' . $id);
		return $result;
	}
	function addsurveyresult($id, $quiz, $res, $value)
	{
		$data = array(
			'surveyid' => $id,
			'quiz' => $quiz,
			'res' => $res,
			'value' => $value,
			'created' => date("Y-m-d"),
			'status' => 1
		);
		$result = $this->db->insert('surveyresult', $data);

		return $result;
	}
	function getsurveydata($id, $lang)
	{
		if ($lang == "en")
			$this->db->select('id,en_sub AS sub,en_desc AS desc,quiz,res,created');
		else
			$this->db->select('id,es_sub AS sub,es_desc AS desc,quiz,res,created');
		$this->db->from('surveydata');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();

		$tmpquiz = ($result['quiz'] == null ? [0] : json_decode($result['quiz']));
		$tmpres = ($result['res'] == null ? [0] : json_decode($result['res']));


		$tmpresult['id'] = $result['id'];
		$tmpresult['created'] = $result['created'];
		$tmpresult['sub'] = $result['sub'];
		$tmpresult['desc'] = $result['desc'];

		for ($i = 0; $i < count($tmpquiz); $i++) {
			if ($lang == "en")
				$this->db->select('survey_question.id,survey_question.en_name AS quiz,survey_cat.en_name AS catname');
			else
				$this->db->select('survey_question.id,survey_question.es_name AS quiz,survey_cat.es_name AS catname');
			$this->db->from('survey_question');
			$this->db->join('survey_cat', 'survey_cat.id = survey_question.category', 'left');
			$this->db->where("survey_question.id", $tmpquiz[$i]);
			$query = $this->db->get();
			$quiz = $query->row_array();

			$tmpresult['quiz'][] = $quiz;
		}
		for ($i = 0; $i < count($tmpres); $i++) {
			if ($lang == "en")
				$this->db->select('id,en_name AS res');
			else
				$this->db->select('id,es_name AS res');
			$this->db->from('survey_res');
			$this->db->where("id", $tmpres[$i]);
			$query = $this->db->get();
			$res = $query->row_array();

			$tmpresult['res'][] = $res;
		}
		return $tmpresult;
	}
	function getsurveyfooter($lang)
	{
		if ($lang == "en")
			$this->db->select('id,en AS desc');
		else
			$this->db->select('id,es AS desc');

		$this->db->from('survey_footer');
		$query = $this->db->get();
		$result = $query->row_array();

		return $result;
	}
	function deletesurvey($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('surveydata');
		return $result;
	}
	function viewresultsurvey($id)
	{

		$this->db->select('en_sub');
		$this->db->from('surveydata');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$survey_name = $query->row_array()["en_sub"];


		$this->db->select('*');
		$this->db->from('surveyresult');
		$this->db->where("surveyid", $id);
		$query = $this->db->get();
		$result = $query->result_array();

		if (count($result) == 0) {
			return array($survey_name, 0, array(), array());
		}

		$questions = json_decode($result[0]['quiz']);
		$responses = json_decode($result[0]['res']);
		$minDate = "9999-99-99";
		$maxDate = "0000-00-00";
		for ($i = 0; $i < count($result); $i++) {
			$tmpvalues[] = json_decode($result[$i]['value']);

			if ($minDate > $result[$i]['created'])
				$minDate = $result[$i]['created'];
			if ($maxDate < $result[$i]['created'])
				$maxDate = $result[$i]['created'];
		}
		for ($i = 0; $i < count($questions); $i++) {
			$this->db->select('en_name');
			$this->db->from('survey_question');
			$this->db->where("id", $questions[$i]);
			$query = $this->db->get();
			$tmpquiz = $query->row_array();

			$this->db->select('en_name');
			$this->db->from('survey_res');
			$this->db->where("id", $responses[$i]);
			$query = $this->db->get();
			$tmpres = $query->row_array();

			$items = explode(",", $tmpres['en_name']);
			for ($j = 0; $j < count($tmpvalues); $j++) {
				$tmp[$i][] = $tmpvalues[$j][$i];
			}

			$tmpvalueArr = array_count_values($tmp[$i]);
			$tmprate = [];
			foreach ($tmpvalueArr as $key => $tmp_array) {
				if ($items[$key] != null) {
					$tmprate[] = array(
						"name" => $items[$key],
						"counts" => $tmp_array
					);
				} else {
					$tmprate[] = array(
						"name" => $key,
						"counts" => $tmp_array
					);
				}
			}
			$tmpresult[] = array(
				"quiz" => $tmpquiz["en_name"],
				"result" => $tmprate
			);
		}
		// echo "<pre>";
		// var_dump($tmpresult);
		// echo "</pre>";exit;
		return array($survey_name, count($result), $tmpresult, array("maxDate" => $maxDate, "minDate" => $minDate));
	}
	function deletesurveydata($id)
	{
		$this->db->where('surveyid', $id);
		$result = $this->db->delete('surveyresult');
		return $result;
	}
	function getclinicemails()
	{
		$this->db->select('name,email');
		$this->db->from('cemails');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	function getusersbyemails()
	{
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select('name,email');
		$this->db->from('f_com_contact');
		$this->db->group_by("f_com_contact.email");
		$this->db->order_by("f_com_contact.name");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function getusersbyphones()
	{
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select('name,cel');
		$this->db->from('f_com_contact');
		$this->db->group_by("f_com_contact.cel");
		$this->db->order_by("f_com_contact.name");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
}
