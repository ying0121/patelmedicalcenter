<?php
class Contacts_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function gettotals()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('f_com_contact');
		$query = $this->db->get();
		$total = $query->row_array();

		$this->db->select('COUNT(*) AS open');
		$this->db->from('f_com_contact');
		$this->db->where("status", 1);
		$query = $this->db->get();
		$open = $query->row_array();

		$this->db->select('COUNT(*) AS progress');
		$this->db->from('f_com_contact');
		$this->db->where("status", 2);
		$query = $this->db->get();
		$progress = $query->row_array();

		$this->db->select('COUNT(*) AS closed');
		$this->db->from('f_com_contact');
		$this->db->where("status", 3);
		$query = $this->db->get();
		$closed = $query->row_array();

		return array($total['total'], $open['open'], $progress['progress'], $closed['closed']);
	}
	function gettracks()
	{
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select('f_com_contact.*,trackcomments.id AS cid');
		$this->db->from('f_com_contact');
		$this->db->join("trackcomments", "trackcomments.trackid = f_com_contact.id", 'left');
		$this->db->group_by("f_com_contact.id");
		$this->db->order_by("f_com_contact.id", "desc");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function viewtrack($id)
	{
		$this->db->select('f_com_contact.*, staff.en_name AS staff_name, staff.email AS staff_email, staff.tel AS staff_tel, patient_list.language AS patient_lang, patient_list.gender AS patient_sex');
		$this->db->from('f_com_contact');
		$this->db->join('staff', 'staff.id = f_com_contact.assign', 'left');
		$this->db->join('patient_list', 'patient_list.id = f_com_contact.pt_emr_id', 'left');
		$this->db->where("f_com_contact.id", $id);
		$result = $this->db->get()->row_array();
		return $result;
	}
	function chosentrack($id)
	{
		$this->db->select('*');
		$this->db->from('f_com_contact');
		$this->db->where("id", $id);
		$result = $this->db->get()->row_array();
		return $result;
	}
	function deletetrack($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('f_com_contact');

		$this->db->where('trackid', $id);
		$result = $this->db->delete('trackcomments');

		return $result;
	}
	function deletetrackbycase($case_number)
	{
		$this->db->where('case_number', $case_number);
		$this->db->delete('f_com_contact');

		$this->db->where('case_number', $case_number);
		$result = $this->db->delete('communication_track');

		return $result;
	}
	function updatetrack($id, $assign, $priority, $status)
	{
		$data = array(
			'assign' => $assign,
			'priority' => $priority,
			'status' => $status,
		);
		$result = $this->db->update('f_com_contact', $data, 'id=' . $id);
		return $result;
	}
	function addcomments($id, $userid, $comment)
	{
		$data = array(
			'trackid' => $id,
			'userid' => $userid,
			'comment' => $comment,
			'created' => date("Y-m-d H:i:s"),
		);
		$result = $this->db->insert('trackcomments', $data);
		return $result;
	}
	function comments($ticketid)
	{
		$this->db->select('trackcomments.*,managers.fname,managers.lname');
		$this->db->from('trackcomments');
		$this->db->join('managers', 'managers.id = trackcomments.userid', 'left');
		$this->db->where('trackid', $ticketid);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	function get_track_counts($use_daterange, $startdate, $enddate)
	{
		$this->db->select('COUNT(*) AS closed');
		$this->db->from('f_com_contact');
		$this->db->where("status", 3);

		if ($use_daterange == 'true') {

			if ($startdate != "" && $enddate != "") {
				$where = "date <= STR_TO_DATE('" . $enddate . "', '%m/%d/%Y') AND date >= STR_TO_DATE('" . $startdate . "', '%m/%d/%Y')";
			} else if ($startdate != "") {
				$where = "date >= STR_TO_DATE('" . $startdate . "', '%m/%d/%Y')";
			} else if ($enddate != "") {
				$where = "date <= STR_TO_DATE('" . $enddate . "', '%m/%d/%Y')";
			} else
				return 0;
			$this->db->where($where);
		}

		$query = $this->db->get();
		$closed = $query->row_array();
		return $closed['closed'];
	}

	function get_track_email_sms_list($use_daterange, $startdate, $enddate)
	{
		$this->db->select('email, cel');
		$this->db->from('f_com_contact');
		$this->db->where("status", 3);

		if ($use_daterange == 'true') {

			if ($startdate != "" && $enddate != "") {
				$where = "date <= STR_TO_DATE('" . $enddate . "', '%m/%d/%Y') AND date >= STR_TO_DATE('" . $startdate . "', '%m/%d/%Y')";
			} else if ($startdate != "") {
				$where = "date >= STR_TO_DATE('" . $startdate . "', '%m/%d/%Y')";
			} else if ($enddate != "") {
				$where = "date <= STR_TO_DATE('" . $enddate . "', '%m/%d/%Y')";
			} else
				return ["email" => [], "sms" => []];
			$this->db->where($where);
		}

		$query = $this->db->get();
		$result = $query->result_array();
		$emailData = [];
		$smsData = [];
		for ($i = 0; $i < count($result); $i++) {
			if ($result[$i]["email"] != "")
				$emailData[] = $result[$i]["email"];
			if ($result[$i]["cel"] != "")
				$smsData[] = $result[$i]["cel"];
		}
		return ["email" => $emailData, "sms" => $smsData];
	}

	function addContact($data)
	{
		$contact = array(
			'type' => $data['type'],
			'reason' => $data['reason'],
			'name' => $data['name'],
			'sender' => $data['name'],
			'dob' => $data['dob'],
			'email' => $data['email'],
			'cel' => $data['cel'],
			'patient_type' => $data['patient_type'],
			'subject' => $data['subject'],
			'messgae' => $data['messgae'],
			'best_time' => $data['besttime'],
			'opt_status' => $data['opt_status'],
			'date' => date('Y-m-d H:i:s'),
			'sent' => date('Y-m-d H:i:s'),
			'lang' => $data['lang'],
			'priority' => 1,
			'status' => 1,
			'assign' => 'Nobody',
			'new_status' => 1
		);
		$result = $this->db->insert('f_com_contact', $contact);
		$id = $this->db->insert_id();

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
		$this->db->where('id', $id)->update('f_com_contact', $contact);

		return $result;
	}

	function addContactForSignUp($data)
	{
		$info = array(
			'name' => $data['fname'] . ' ' . $data['lname'],
			'sender' => $data['fname'] . ' ' . $data['lname'],
			'dob' => $data['dob'],
			'email' => $data['email'],
			'cel' => $data['phone'],
			'reason' => 'Account Request',
			'type' => 1,
			'pt_emr_id' => $data['patient_id'],
			'clinic_id' => $this->config->item('clinic_id'),
			'date' => date('Y-m-d H:i:s'),
			'sent' => date('Y-m-d H:i:s'),
			'lang' => 'en',
			'status' => 1,
			'priority' => 1,
			'assign' => $data['assign'] ? $data['assign'] : 'Nobody',
			'new_status' => 1
		);

		$this->db->insert('f_com_contact', $info);
		$id = $this->db->insert_id();

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
		$this->db->where('id', $id)->update('f_com_contact', $contact);

		return $case_number;
	}

	function addUpdatedContact($data)
	{
		// get old contact
		$old = $this->db->select('*')->from('f_com_contact')->where('id', $data['id'])->get()->result_array()[0];
		$new = array(
			'pt_emr_id' => $old['pt_emr_id'],
			'clinic_id' => $old['clinic_id'],
			'type' => $old['type'],
			'reason' => $old['reason'],
			'name' => $old['name'],
			'sender' => $old['name'],
			'dob' => $old['dob'],
			'email' => $old['email'],
			'cel' => $old['cel'],
			'patient_type' => $old['patient_type'] ?? '',
			'subject' => $old['subject'],
			'message' => $old['message'],
			'best_time' => $old['best_time'],
			'opt_status' => $old['opt_status'],
			'lang' => $old['lang'],
			'priority' => $data['priority'],
			'status' => $data['status'],
			'assign' => $data['assign'],
			'case_number' => $old['case_number'],
			'new_status' => 1,
			'date' => $data['date'],
			'sent' => $old['sent'],
			'msg_type' => $old['msg_type']
		);
		if ($data['status'] == 3) {
			$new['closed_date'] = $data['closed_date'];
		}
		$result = $this->db->insert('f_com_contact', $new);

		// update old contact as new_status is 0
		$status = array(
			'new_status' => 0
		);
		$result = $this->db->where('id', $data['id'])->update('f_com_contact', $status);
		return $result;
	}

	function getAllContacts()
	{
		$this->db->select('*');
		$this->db->from('f_com_contact');
		return $this->db->get()->result_array();
	}

	function getOnlyNewContacts($status, $reason, $assigned, $start_date, $end_date)
	{
		$this->db->select('f_com_contact.*, patient_list.fname AS patient_fname, patient_list.lname AS patient_lname, patient_list.dob AS patient_dob, patient_list.gender AS patient_sex, patient_list.language AS patient_lang, staff.en_name AS assigned_name');
		$this->db->from('f_com_contact');
		$this->db->join('patient_list', 'f_com_contact.pt_emr_id = patient_list.id', 'left');
		$this->db->join('staff', 'f_com_contact.assign = staff.id', 'left');
		$this->db->where('f_com_contact.clinic_id', $this->config->item('clinic_id'));
		$this->db->where('f_com_contact.new_status', 1);
		if ($status > 0) {
			$this->db->where('f_com_contact.status', $status);
		}
		if ($reason != "All Reason") {
			$this->db->where('f_com_contact.reason', $reason);
		}
		if ($assigned != "all") {
			$this->db->where('f_com_contact.assign', $assigned);
		}
		$this->db->where('f_com_contact.date >=', $start_date);
		$this->db->where('f_com_contact.date <=', $end_date);
		$this->db->order_by('f_com_contact.date', 'desc');
		return $this->db->get()->result_array();
	}

	function getTotalCount()
	{
		$this->db->select("COUNT(*) AS total");
		$this->db->from("f_com_contact");
		$this->db->where("new_status", 1);
		$result = $this->db->get()->row_array();
		return $result["total"];
	}

	function getOpenCount()
	{
		$this->db->select("COUNT(*) AS total");
		$this->db->from("f_com_contact");
		$this->db->where("status", 1);
		$this->db->where("new_status", 1);
		$result = $this->db->get()->row_array();
		return $result["total"];
	}

	function getInProgressCount()
	{
		$this->db->select("COUNT(*) AS total");
		$this->db->from("f_com_contact");
		$this->db->where("status", 2);
		$this->db->where("new_status", 1);
		$result = $this->db->get()->row_array();
		return $result["total"];
	}

	function getCloseCount()
	{
		$this->db->select("COUNT(*) AS total");
		$this->db->from("f_com_contact");
		$this->db->where("status", 3);
		$this->db->where("new_status", 1);
		$result = $this->db->get()->row_array();
		return $result["total"];
	}

	function getReports($dayType, $filter_year, $filter_month, $filter_date)
	{
		$requests = array("dayType" => "", "data" => array(), "staffs" => array(), "reasons" => array());

		$staffs = $this->db->select("id, en_name")->from("staff")->get()->result_array();
		array_unshift($staffs, array("id" => "Nobody", "en_name" => "Nobody"));
		$requests["staffs"] = $staffs;
		$reasons = ["Appointment Request", "Letter Request", "Prescription Refill Request", "Referral Request", "Test Results Request", "General Message"];
		$requests["reasons"] = $reasons;

		if ($dayType == 1) { // Monthly
			$requests["dayType"] = "monthly";
			for ($i = 1; $i <= 12; $i++) {
				$month_request = array();
				// All Assign
				if ($i < 10) {
					$start_date = new DateTime($filter_year . "-0" . $i . "-" . "01");
					$end_date = new DateTime($filter_year . "-0" . $i . "-" . "31");
				} else {
					$start_date = new DateTime($filter_year . "-" . $i . "-" . "01");
					$end_date = new DateTime($filter_year . "-" . $i . "-" . "31");
				}
				$start_date->setTime(0, 0, 1);
				$end_date->setTime(23, 59, 59);

				foreach ($staffs as $staff) {
					$staff_request = array();
					foreach ($reasons as $reason) {
						$this->db->select("COUNT(*) AS count")->from("f_com_contact");
						$this->db->where("assign", $staff["id"]);
						$this->db->where("reason", $reason);
						$this->db->where("date >=", $start_date->format("Y-m-d H:i:s"));
						$this->db->where("date <=", $end_date->format("Y-m-d H:i:s"));
						$this->db->where("new_status", 1);
						$r = $this->db->get()->row_array();

						$request = array(
							"reason" => $reason,
							"count" => $r["count"]
						);
						array_push($staff_request, $request);
					}
					array_push($month_request, array("assign" => $staff["id"], "data" => $staff_request));
				}
				array_push($requests["data"], $month_request);
			}
		} else if ($dayType == 2) { // Bi-Weekly
			$requests["dayType"] = "biweekly";

			// before
			$start_date = new DateTime($filter_year . "-" . $filter_month . "-01");
			$end_date = new DateTime($filter_year . "-" . $filter_month . "-15");
			$start_date->setTime(0, 0, 1);
			$end_date->setTime(23, 59, 59);

			$before_request = array();
			foreach ($staffs as $staff) {
				$staff_request = array();
				foreach ($reasons as $reason) {
					$this->db->select("COUNT(*) AS count")->from("f_com_contact");
					$this->db->where("assign", $staff["id"]);
					$this->db->where("reason", $reason);
					$this->db->where("date >=", $start_date->format("Y-m-d H:i:s"));
					$this->db->where("date <=", $end_date->format("Y-m-d H:i:s"));
					$this->db->where("new_status", 1);
					$r = $this->db->get()->row_array();

					$request = array(
						"reason" => $reason,
						"count" => $r["count"]
					);
					array_push($staff_request, $request);
				}
				array_push($before_request, array("assign" => $staff["id"], "data" => $staff_request));
			}
			array_push($requests["data"], $before_request);

			// after
			$start_date = new DateTime($filter_year . "-" . $filter_month . "-16");
			$end_date = new DateTime($filter_year . "-" . $filter_month . "-31");
			$start_date->setTime(0, 0, 1);
			$end_date->setTime(23, 59, 59);

			$after_request = array();
			foreach ($staffs as $staff) {
				$staff_request = array();
				foreach ($reasons as $reason) {
					$this->db->select("COUNT(*) AS count")->from("f_com_contact");
					$this->db->where("assign", $staff["id"]);
					$this->db->where("reason", $reason);
					$this->db->where("date >=", $start_date->format("Y-m-d H:i:s"));
					$this->db->where("date <=", $end_date->format("Y-m-d H:i:s"));
					$this->db->where("new_status", 1);
					$r = $this->db->get()->row_array();

					$request = array(
						"reason" => $reason,
						"count" => $r["count"]
					);
					array_push($staff_request, $request);
				}
				array_push($after_request, array("assign" => $staff["id"], "data" => $staff_request));
			}
			array_push($requests["data"], $after_request);
		} else if ($dayType == 3) { // Weekly
			$requests["dayType"] = "weekly";

			// Get the current month and year
			$year = $filter_year;
			$month = $filter_month;

			// Get the number of days in the month
			$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

			// Initialize an array to hold the weeks
			$weeks = [];

			// Loop through each day of the month
			for ($day = 1; $day <= $daysInMonth; $day++) {
				$currentDate = new DateTime("$year-$month-$day");

				// Check if it's the start of a week (Monday)
				if ($currentDate->format('N') == 1) {
					// Start of the week
					$startOfWeek = $currentDate->format('Y-m-d');

					// Calculate the end of the week (Sunday)
					$endOfWeek = (clone $currentDate)->modify('+6 days')->format('Y-m-d');

					// Add to the weeks array
					$weeks[] = [
						'start' => $startOfWeek . " 00:00:01",
						'end' => $endOfWeek . " 23:59:59"
					];
				}
			}

			foreach ($weeks as $week) {
				$week_request = array();
				foreach ($staffs as $staff) {
					$staff_request = array();
					foreach ($reasons as $reason) {
						$this->db->select("COUNT(*) AS count")->from("f_com_contact");
						$this->db->where("assign", $staff["id"]);
						$this->db->where("reason", $reason);
						$this->db->where("date >=", $week["start"]);
						$this->db->where("date <=", $week["end"]);
						$this->db->where("new_status", 1);
						$r = $this->db->get()->row_array();

						$request = array(
							"reason" => $reason,
							"count" => $r["count"]
						);
						array_push($staff_request, $request);
					}
					array_push($week_request, array("assign" => $staff["id"], "data" => $staff_request));
				}
				array_push($requests["data"], $week_request);
			}
		} else if ($dayType == 4) { // Daily
			$requests["dayType"] = "daily";

			$start_date = new DateTime($filter_date);
			$end_date = new DateTime($filter_date);
			$start_date->setTime(0, 0, 1);
			$end_date->setTime(23, 59, 59);

			foreach ($staffs as $staff) {
				$staff_request = array();
				foreach ($reasons as $reason) {
					$this->db->select("COUNT(*) AS count")->from("f_com_contact");
					$this->db->where("assign", $staff["id"]);
					$this->db->where("reason", $reason);
					$this->db->where("date >=", $start_date->format("Y-m-d H:i:s"));
					$this->db->where("date <=", $end_date->format("Y-m-d H:i:s"));
					$this->db->where("new_status", 1);
					$r = $this->db->get()->row_array();

					$request = array(
						"reason" => $reason,
						"count" => $r["count"]
					);
					array_push($staff_request, $request);
				}
				array_push($requests["data"], array("assign" => $staff["id"], "data" => $staff_request));
			}
		}
		return $requests;
	}
}
