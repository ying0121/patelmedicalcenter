
<?php
class Communication_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function addMessage($data)
	{
		return $this->db->insert('communication_track', $data);
	}
}
