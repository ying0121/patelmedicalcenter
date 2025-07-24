<?php

class Newsletter_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function getnewsletter()
	{
		$this->db->select('*');
		$this->db->from('newsletterdata');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function getchosennewsletter($id, $lang)
	{
		if ($lang == "en")
			$this->db->select('en_sub AS header,en_desc AS desc,author,published,newsletterimg.img');
		else
			$this->db->select('es_sub AS header,es_desc AS desc,author,published,newsletterimg.img');
		$this->db->from('newsletterdata');
		$this->db->join('newsletterimg', 'newsletterimg.id = newsletterdata.img');
		$this->db->where('newsletterdata.id', $id);
		$query = $this->db->get();
		$result = $query->row_array();

		return $result;
	}
	function addnewsletter($en_sub, $es_sub, $author, $date)
	{
		$data = array(
			'en_sub' => $en_sub,
			'es_sub' => $es_sub,
			'author' => $author,
			'published' => $date,
			'created' => date("Y-m-d"),
			'status' => 1
		);
		$result = $this->db->insert('newsletterdata', $data);

		return $result;
	}
	function editnewsletterstatus($id, $value)
	{
		$data = array(
			'status' => $value,
		);
		$result = $this->db->update('newsletterdata', $data, 'id=' . $id);
		return $result;
	}
	function deletenewsletter($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('newsletterdata');
		return $result;
	}
	function viewrenewsletter($id)
	{
		$this->db->select('*');
		$this->db->from('newsletterdata');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();

		return $result;
	}
	function updatenewsletter($id, $en_sub, $es_sub, $en_desc, $es_desc, $author, $date, $med_cond, $education_material, $gender, $age_all, $age_from, $age_to)
	{
		$data = array(
			'en_sub' => $en_sub,
			'es_sub' => $es_sub,
			'en_desc' => $en_desc,
			'es_desc' => $es_desc,
			'author' => $author,
			'published' => $date,
			'med_cond' => $med_cond,
			'edu_material' => $education_material,
			'gender' => intval($gender),
			'age_all' => $age_all == "true" ? true : false,
			'age_from' => intval($age_from),
			'age_to' => intval($age_to),

		);
		$result = $this->db->update('newsletterdata', $data, 'id=' . $id);
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
	function getallpts()
	{
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select('EMAIL');
		$this->db->from('patient_list');
		$this->db->where('EMAIL !=', '');
		$this->db->where('EMAIL !=', null);
		$this->db->group_by("EMAIL");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function getallptsphone()
	{
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select('MOBILE');
		$this->db->from('patient_list');
		$this->db->where('MOBILE !=', '');
		$this->db->where('MOBILE !=', null);
		$this->db->group_by("MOBILE");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function getimages()
	{
		$this->db->select('*');
		$this->db->from('newsletterimg');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function addimgtonews($id, $img)
	{
		$data = array(
			'img' => $img,
		);
		$result = $this->db->update('newsletterdata', $data, 'id=' . $id);
		return $result;
	}
	function getMedicationConditions()
	{
		$this->db->select('id, name');
		$this->db->from('medconditions');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function getPatientEmailsWithMedCond($all, $apt_months, $newsletter_id)
	{
		//TODO
		if ($all == "true") {
			$this->db->select('med_cond, gender, age_all, age_from, age_to');
			$this->db->where("id", $newsletter_id);
			$this->db->from('newsletterdata');
			$query = $this->db->get();
			$result = $query->result_array();
			$medCondArrayString =  $result[0]["med_cond"];
			$gender =  $result[0]["gender"];
			$ageAll =  $result[0]["age_all"];
			$ageFrom =  $result[0]["age_from"];
			$ageTo =  $result[0]["age_to"];

			$medCondIDArray = json_decode($medCondArrayString);

			$medCondData = "";
			for ($i = 0; $i < count($medCondIDArray); $i++) {
				$this->db->select('id, codes');
				$this->db->from('medconditions');
				$this->db->where("id", $medCondIDArray[$i]);
				$query = $this->db->get();
				$result = $query->result_array();
				$medCondData = $medCondData . "," . $result[0]["codes"];
			}

			$gender_condition = "";
			if ($gender == 1)
				$gender_condition = " AND gender='Male'";
			else if ($gender == 2)
				$gender_condition = " AND gender='Female'";

			$age_condition = "";
			if ($ageAll == 0) {
				$endDate = "" . (intval(date("Y")) - $ageFrom + 1) . "-01-01";
				$startDate = "" . (intval(date("Y")) - $ageTo) . "-01-01";
				$age_condition = " AND dob >='{$startDate}' AND dob < '{$endDate}'";
			}
			if ($medCondData == "") {
				$query_string = "SELECT 
					  patient_id, 
					  email
					FROM
					    patient_list 
					WHERE 
					  email <> '' {$gender_condition} {$age_condition}
					";
			} else {
				$query_string = "SELECT 
					  patient_id, 
					  email
					FROM 
					  (
					    SELECT 
					      patient_list.patient_id, patient_list.email, patient_list.gender, patient_list.dob,
					      asmtlog.asmtId, 
					      icdlog.icd_id, 
					      INSTR(
					        '{$medCondData}', 
					        icdlog.icd_id
					      ) AS found
					    FROM 
					      patient_list 
					      INNER JOIN asmtlog ON patient_list.patient_id = asmtlog.patientId 
					      INNER JOIN icdlog ON asmtlog.asmtId = icdlog.asmtId
					  ) AS b 
					WHERE 
					  b.found <> 0 AND email <> '' {$gender_condition} {$age_condition}
					GROUP BY 
					  patient_id
					";
			}
			$query = $this->db->query($query_string);
			$result = $query->result_array();
			return $result;
		} else {
			//use $apt_months
		}
	}
	function getPatientSmsesWithMedCond($all, $apt_months, $newsletter_id)
	{
		//TODO
		if ($all == "true") {
			$this->db->select('med_cond');
			$this->db->where("id", $newsletter_id);
			$this->db->from('newsletterdata');
			$query = $this->db->get();
			$result = $query->result_array();
			$medCondArrayString =  $result[0]["med_cond"];
			$medCondIDArray = json_decode($medCondArrayString);

			$medCondData = "";
			for ($i = 0; $i < count($medCondIDArray); $i++) {
				$this->db->select('id, codes');
				$this->db->from('medconditions');
				$this->db->where("id", $medCondIDArray[$i]);
				$query = $this->db->get();
				$result = $query->result_array();
				$medCondData = $medCondData . "," . $result[0]["codes"];
			}
			if ($medCondData == "") {
				$query_string = "SELECT 
					  patient_id, 
					  mobile
					FROM
					    patient_list 
					WHERE 
					  mobile <> ''
					";
			} else {
				$query_string = "SELECT 
					  patient_id, 
					  mobile
					FROM 
					  (
					    SELECT 
					      patient_list.patient_id, patient_list.email,
					      asmtlog.asmtId, 
					      icdlog.icd_id, 
					      INSTR(
					        '{$medCondData}', 
					        icdlog.icd_id
					      ) AS found
					    FROM 
					      patient_list 
					      INNER JOIN asmtlog ON patient_list.patient_id = asmtlog.patientId 
					      INNER JOIN icdlog ON asmtlog.asmtId = icdlog.asmtId
					  ) AS b 
					WHERE 
					  b.found <> 0 AND mobile <> ''
					GROUP BY 
					  patient_id
					";
			}
			$query = $this->db->query($query_string);
			$result = $query->result_array();
			return $result;
		} else {
			//use $apt_months
		}
	}

	function getEducationMaterial($med_cond)
	{
		$medCondIDArray = json_decode($med_cond);

		$resultData = [];
		for ($i = 0; $i < count($medCondIDArray); $i++) {
			$this->db->select('id, name');
			$this->db->from('medconditions');
			$this->db->where("id", $medCondIDArray[$i]);
			$query = $this->db->get();
			$result = $query->result_array();
			$medCondName = $result[0]["name"];

			$this->db->select('id');
			$this->db->from('contents');
			$this->db->where("contents.en", $medCondName);
			$query = $this->db->get();
			$contentsId = $query->row_array();

			//documents
			$this->db->select('id, en_name AS name,en_desc AS desc,en_doc AS doc');
			$this->db->from('documents');
			$this->db->where("documents.page", $contentsId['id']);
			$this->db->where("documents.status", 1);
			$this->db->where("en_doc !=", null);
			$this->db->where("es_doc !=", null);
			$query = $this->db->get();
			$result = $query->result_array();
			for ($j = 0; $j < count($result); $j++) {
				$resultData[] = [
					"value" => "doc_" . $result[$j]["id"],
					"text" => $medCondName . "-" . "Doc" . "-" . $result[$j]["name"]
				];
			}

			//videos
			$this->db->select('id, en AS url');
			$this->db->from('evideos');
			$this->db->where("evideos.title", $contentsId['id']);
			$this->db->where("evideos.status", 1);
			$this->db->where("en !=", null);
			$this->db->where("es !=", null);

			$query = $this->db->get();
			$result = $query->result_array();
			for ($j = 0; $j < count($result); $j++) {
				$resultData[] = [
					"value" => "video_" . $result[$j]["id"],
					"text" => $medCondName . "-" . "Video" . "-" . $result[$j]["url"]
				];
			}
		}
		return $resultData;
	}
	function getEducationMaterialUrlsFromNewsLetter($newsletter_id, $lang)
	{
		$docResultData = [];
		$videoResultData = [];


		$this->db->select('edu_material');
		$this->db->where("id", $newsletter_id);
		$this->db->from('newsletterdata');
		$query = $this->db->get();
		$result = $query->result_array();
		$eduMatArrayString =  $result[0]["edu_material"];
		if ($eduMatArrayString != NULL) {
			$eduMatIDArray = json_decode($eduMatArrayString);
			for ($i = 0; $i < count($eduMatIDArray); $i++) {
				$tokens = explode("_", $eduMatIDArray[$i]);
				if ($tokens[0] == "doc") {
					if ($lang == "en")
						$this->db->select('id,en_name AS name,en_desc AS desc,en_doc AS doc');
					else
						$this->db->select('id,es_name AS name,es_desc AS desc,es_doc AS doc');
					$this->db->from('documents');
					$this->db->where("id", $tokens[1]);

					$query = $this->db->get();
					$result = $query->result_array();
					for ($j = 0; $j < count($result); $j++) {
						$docResultData[] = [
							"name" => $result[$j]["name"],
							"desc" => $result[$j]["desc"],
							"url" => $result[$j]["doc"],
						];
					}
				} else if ($tokens[0] == "video") {
					if ($lang == "en")
						$this->db->select('en AS url');
					else
						$this->db->select('es AS url');
					$this->db->from('evideos');
					$this->db->where("id", $tokens[1]);
					$query = $this->db->get();
					$result = $query->result_array();
					for ($j = 0; $j < count($result); $j++) {
						$videoResultData[] = [
							"url" => $result[$j]["url"],
						];
					}
				}
			}
		}

		return [
			"docs" => $docResultData,
			"videos" => $videoResultData
		];
	}
}
