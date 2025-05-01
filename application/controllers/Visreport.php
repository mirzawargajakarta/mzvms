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
		$data['title'] = 'Report Visitment';

		$from='2023-01-01 00:00:00'; 
		$to='2023-02-01 00:00:00';

		$data['hostdept'] = $this->_getDataByHostDepartment($from, $to);

        $this->load->view('templates/header', $data);
        $this->load->view('report/index_pertamna_v', $data);
        $this->load->view('templates/foot', $data);
		
    }

	function _getDataByHostDepartment($from, $to)
	{
		$sql = "SELECT t.TargetVisitorType, COUNT(r.TargettypemstId) AS Jumlah
		FROM visitortrans r, visitormst v, purposemst p, targettypemst t, sourcetypemst s
		WHERE r.PurposemstId=p.Id AND r.VisitormstId=v.Id AND r.SourcetypemstId=s.Id AND r.TargettypemstId=t.Id
			AND r.IsInside=0
			AND r.CheckInTime BETWEEN '$from' AND '$to'
		GROUP BY r.TargettypemstId 
		ORDER BY t.TargetVisitorType";

		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}

	function _getDataByCompanyType($from, $to)
	{
		$sql = "SELECT s.SourceTypeName, COUNT(r.SourcetypemstId) AS Jumlah
		FROM visitortrans r, visitormst v, purposemst p, targettypemst t, sourcetypemst s
		WHERE r.PurposemstId=p.Id AND r.VisitormstId=v.Id AND r.SourcetypemstId=s.Id AND r.TargettypemstId=t.Id
			AND r.IsInside=0
			AND r.CheckInTime BETWEEN '$from' AND '$to'
		GROUP BY r.SourcetypemstId 
		ORDER BY s.SourceTypeName";

		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	function _getDataByPurpose($from, $to)
	{
		$sql = "SELECT p.PurposeVisit, COUNT(r.PurposemstId) AS Jumlah
		FROM visitortrans r, visitormst v, purposemst p, targettypemst t, sourcetypemst s
		WHERE r.PurposemstId=p.Id AND r.VisitormstId=v.Id AND r.SourcetypemstId=s.Id AND r.TargettypemstId=t.Id
			AND r.IsInside=0
			AND r.CheckInTime BETWEEN '$from' AND '$to'
		GROUP BY r.PurposemstId ORDER BY p.PurposeVisit";

		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
}
