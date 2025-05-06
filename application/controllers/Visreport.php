<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visreport extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Default_m');
        security();
    }

    public function index()
    { 
		$submit	= $this->input->post('submit');
		if($submit) {
			$month	= $this->input->post('month');
			$month_str = $this->_monthstr($month);
			$year	= $this->input->post('year');
		} else {
			$datadate	= $this->_getLastData();
			$month	= $datadate['Bulan'];
			$month_str = $datadate['BulanStr'];
			$year	= $datadate['Tahun'];
		}
		$data['title'] = 'Report Visitment '.$month_str.' '.$year;
		$data['month']	= $month;
		$data['month_str']	= $month_str;
		$data['year']		= $year;
		$data['data']		= $this->_getData($month, $year);
		$data['hostdept']	= $this->_getDataByHostDepartment($month, $year);
		$data['purpose']	= $this->_getDataByPurpose($month, $year);
		$data['company']	= $this->_getDataByCompanyType($month, $year);

        $this->load->view('templates/header', $data);
        $this->load->view('report/index_pertamna_v', $data);
        $this->load->view('templates/foot', $data);
		
    }
	
	function _monthstr($month)
	{
		$month_arr = array('','January','February','March','April','May','June','July','August','September','October','November','December');
		return $month_arr[$month];
	}

	function _getLastData()
	{
		$sql = "SELECT 	
				t.Id, t.CheckInTime, t.CheckOutTime,
				DATE_FORMAT(t.CheckInTime,'%Y') AS Tahun,
				DATE_FORMAT(t.CheckOutTime,'%m') AS Bulan,
				DATE_FORMAT(t.CheckOutTime,'%M') AS BulanStr
			FROM 
				visitortrans t, visitormst v, purposemst p, sourcetypemst s,
				targettypemst r
			WHERE 
				t.VisitormstId=v.Id AND t.SourcetypemstId=s.Id AND t.PurposemstId=p.Id AND t.TargettypemstId=r.Id
				AND t.IsInside=0
			ORDER BY t.CheckInTime DESC LIMIT 1";

		$query = $this->db->query($sql);
		$result = $query->result_array();
		return isset($result[0])?$result[0]:array('Tahun'=>0,'Bulan'=>0,'BulanStr'=>'');
	}

	function _getData($month, $year)
	{
		$sql = "SELECT 	
				t.Id, t.CheckInTime, t.CheckOutTime, t.IsInside, t.VisitormstId, 
				DATE_FORMAT(t.CheckInTime,'%e %b %Y %l:%i %p') AS CheckInTimeIndFmt,
				DATE_FORMAT(t.CheckOutTime,'%e %b %Y %l:%i %p') AS CheckOutTimeIndFmt,
				t.SourceCompany, t.SourcetypemstId, t.HostName, t.TargettypemstId, 
				t.PurposemstId, t.PVDescription, t.TempBody, t.AppointmentDate, 
				t.StatusVisit, t.IsInv, t.QRCode, t.FileCI, t.FileCO,
				v.Nama, v.Gender, v.PhoneNumber, v.Email, 
				v.Alamat, v.IDCard, v.FileIDCard,
				p.PurposeVisit, s.SourceTypeName, r.TargetVisitorType
			FROM 
				visitortrans t, visitormst v, purposemst p, sourcetypemst s,
				targettypemst r
			WHERE 
				t.VisitormstId=v.Id AND t.SourcetypemstId=s.Id AND t.PurposemstId=p.Id AND t.TargettypemstId=r.Id
				AND t.IsInside=0
				AND MONTH(t.CheckInTime)='$month' AND YEAR(t.CheckInTime)='$year'
			ORDER BY t.CheckInTime";

		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	function _getDataByHostDepartment($month, $year)
	{
		$sql = "SELECT t.TargetVisitorType, COUNT(r.TargettypemstId) AS Jumlah
		FROM visitortrans r, visitormst v, purposemst p, targettypemst t, sourcetypemst s
		WHERE r.PurposemstId=p.Id AND r.VisitormstId=v.Id AND r.SourcetypemstId=s.Id AND r.TargettypemstId=t.Id
			AND r.IsInside=0
			AND MONTH(r.CheckInTime)='$month' AND YEAR(r.CheckInTime)='$year'
		GROUP BY r.TargettypemstId 
		ORDER BY t.TargetVisitorType";

		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}

	function _getDataByCompanyType($month, $year)
	{
		$sql = "SELECT s.SourceTypeName, COUNT(r.SourcetypemstId) AS Jumlah
		FROM visitortrans r, visitormst v, purposemst p, targettypemst t, sourcetypemst s
		WHERE r.PurposemstId=p.Id AND r.VisitormstId=v.Id AND r.SourcetypemstId=s.Id AND r.TargettypemstId=t.Id
			AND r.IsInside=0
			AND MONTH(r.CheckInTime)='$month' AND YEAR(r.CheckInTime)='$year'
		GROUP BY r.SourcetypemstId 
		ORDER BY s.SourceTypeName";

		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}

	function _getDataByPurpose($month, $year)
	{
		$sql = "SELECT p.PurposeVisit, COUNT(r.PurposemstId) AS Jumlah
		FROM visitortrans r, visitormst v, purposemst p, targettypemst t, sourcetypemst s
		WHERE r.PurposemstId=p.Id AND r.VisitormstId=v.Id AND r.SourcetypemstId=s.Id AND r.TargettypemstId=t.Id
			AND r.IsInside=0
			AND MONTH(r.CheckInTime)='$month' AND YEAR(r.CheckInTime)='$year'
		GROUP BY r.PurposemstId ORDER BY p.PurposeVisit";

		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}
}
