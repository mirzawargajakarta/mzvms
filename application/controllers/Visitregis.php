<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visitregis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($linkid)
    {
		$data['title']	= "Regist";
		$data			= $this->_getData($linkid);
		if(isset($data['Id'])) {
			$eventdate		= strtotime($data['EventDate']);
			$today			= strtotime($data['Today']);
			$isDateOk		= ($today<$eventdate)?true:false;
			if($isDateOk) {
				echo "date OK";
			} else {
				echo "udah lewat";
			}
			//$this->load->view('visitregis/index', $data);
		} else {
			echo "data ne ra ono";
		}
    }

	public function test()
	{
		$eventdate	= strtotime("2025-06-29");
		$today	= strtotime("2025-04-12");
		echo $eventdate."<==>".$today;
	}

	function _getData($linkid)
	{
		$sql = "SELECT 	
					i.Id, i.EventDate, DATE(NOW()) AS Today, i.EventName, i.Description, i.InvMsg, i.Status,
					d.Id, d.InvitemstId, d.VisitorName, d.VisitorWA, d.VisitorEmail, d.StatusWA, 
					d.StatusEmail, d.QRCode, d.LinkUrl
				FROM 
					invitemst i, invitedtl d
				WHERE 
					i.Id=d.InvitemstId AND d.LinkUrl='$linkid'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return isset($result[0])?$result[0]:'none';
	}

	public function registration()
	{
		$data['title'] 				= "Form Kontak Registrasi";
		$data['hostdepartmentdata']	= $this->_getTargetType();
		$data['purposedata']		= $this->_getPurpose();
		$data['companytypedata']	= $this->_getSourceType();
		$data['notelpdata']			= $this->_getPhoneNumber();
		$this->load->view('frontmenu/registration_v', $data);
	}

}
