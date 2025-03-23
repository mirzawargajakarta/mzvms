<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datamigrate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
		echo "test ok datamigrate";
    }

	public function viewlist()
	{
		$sql = "SELECT 
					d.Id, d.HostName, d.HostCompany, t.TargetVisitorType, p.PurposeVisit,
					v.Nama, v.PhoneNumber, s.SourceTypeName
				FROM visitortrans d, visitormst v, targettypemst t, purposemst p, sourcetypemst s
				WHERE d.VisitormstId=v.Id AND d.TargettypemstId=t.Id 
					AND d.PurposemstId=p.Id AND d.SourcetypemstId=s.Id";

	}

    public function datatgl()
    {
		$sql	= "SELECT 	
						nomor, checkindate,checkintime, checkoutdate, checkouttime, 
						nama,gender, phone, alamat, idcard,companyname, companytype, 
						hostname,hostdepartment,purposevisit, purposedesc, bodytemp	 
					FROM 
						dataws";
		$query = $this->db->query($sql);
		$view_data = $query->result_array();

		for($a=0; $a<count($view_data); $a++) {
			// $asdf	= $view_data[$a][''];
			$nomor	= $view_data[$a]['nomor'];
			$cekindate	= $view_data[$a]['checkintime'];
			if($cekindate != "-") {
				$cekindatearr = explode(":",$cekindate);
				$tahuncekin	= ($cekindatearr[2]=="00 AM")?$cekindatearr[0]:($cekindatearr[0]+12);
				if($tahuncekin=='24') $tahuncekin = '12';
				$newcekindate = $tahuncekin.':'.$cekindatearr[1].':00';				 
			} else {
				$newcekindate = null;
			}
			$datamaster	= array(
				'checkintime'			=> $newcekindate
			);
			$this->db->update('dataws', $datamaster, array('nomor'	=> $nomor));
		}
		echo "OK datatgl";
	}
}
