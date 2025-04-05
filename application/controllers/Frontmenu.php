<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontmenu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
		$data['title'] = "MzVMS";
		$this->load->view('frontmenu/index', $data);
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

	public function scanproc()
	{
		$qr					= $this->input->get('qrcode');
		$qrcode 			= urldecode($qr);
		// $qrcode	= '123456';

		$visitransdata		= $this->_getVisittransData($qrcode);
		$idvistrans			= $visitransdata['Id'];
		$isInvitation		= $visitransdata['IsInv'];
		$statusVisitedInv   = $visitransdata['StatusVisit'];
		$isInside			= $visitransdata['IsInside'];
		
		if(!is_null($idvistrans)) {
			//undangan
			if($isInvitation==1 AND $isInside==0 AND $statusVisitedInv=='N') {
				// invitation_checkin_page
				echo "invitation_checkin_page";
			}

			if($isInvitation==1 AND $isInside==1 AND $statusVisitedInv=='Y') {
				// checkout_page
				$this->_checkoutpage($idvistrans);
			}

			if($isInvitation==1 AND $isInside==0 AND $statusVisitedInv=='Y') {
				// tiket / undangan sudah di checkout
				echo "tiket / undangan sudah di checkout";
			}

			//non undangan
			if($isInvitation==0 AND $isInside==1) {
				// checkout_page
				$this->_checkoutpage($idvistrans);
			}

			if($isInvitation==0 AND $isInside==0) {
				// tiket / undangan sudah di checkout
				echo "tiket / undangan sudah di checkout";
			}
		} else {
			//data tidak ditemukan
			echo "data tidak ditemukan".$qrcode;
		}
	}

	function _checkoutpage($idvistrans)
	{
		$datadtl	= $this->_getVisitorTransDetail($idvistrans);
		$data['fullname']	= $datadtl['Nama'];
		$data['phone']	= $datadtl['PhoneNumber'];
		$data['ciimg']	= $datadtl['FileCI'];
		
		$this->load->view('frontmenu/checkout_v', $data);
	}

	function _getVisitorTransDetail($idvistrans)
	{
		$sql = "SELECT 	
				t.Id, t.CheckInTime, t.CheckOutTime, t.IsInside, t.VisitormstId, 
				t.SourceCompany, t.SourcetypemstId, t.HostName, t.TargettypemstId, 
				t.PurposemstId, t.PVDescription, t.TempBody, t.AppointmentDate, 
				t.StatusVisit, t.IsInv, t.QRCode, t.FileCI,
				v.Nama, v.Gender, v.PhoneNumber, v.Email, 
				v.Alamat, v.IDCard, v.FileIDCard,
				p.PurposeVisit, s.SourceTypeName, r.TargetVisitorType
			FROM 
				visitortrans t, visitormst v, purposemst p, sourcetypemst s,
				targettypemst r
			WHERE 
				t.VisitormstId=v.Id AND t.SourcetypemstId=s.Id AND t.PurposemstId=p.Id 
				AND t.TargettypemstId=r.Id AND t.Id='$idvistrans'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result[0];
	}

	function _getVisittransData($qrcode)
	{
		$sql = "SELECT Id, IsInside, StatusVisit, IsInv FROM visitortrans WHERE QRCode='$qrcode'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		if(isset($result[0])) {
			$retval = $result[0];
		} else {
			$retval['Id'] = null;
			$retval['IsInside'] = null;
			$retval['StatusVisit'] = null;
			$retval['IsInv'] = null;
		}
		return $retval;
	}

	public function test()
	{
		$purpose = 2;
		$hostdepartment = 3;

		$purposeNhostdepartment	= $this->_getPurposeNHostDept($purpose, $hostdepartment);
			$purpose_str			= $purposeNhostdepartment['PurposeVisit'];
			$hostdept_str			= $purposeNhostdepartment['TargetVisitorType'];
			$checkintime_indformat	= date("j M Y H:i:s");
			$qrimage_name			= 'QR20250403_162505_85795194565.png';
			
			$data['nama']		= 'Ahmadun Testdoang';
			$data['gender']		=  'M';
			$data['notelp']		= '81398081536';
			$data['alamat']		= 'Jalan Bango Cilandak';
			$data['noidcard']	= '5172341231234.1230';
			$data['company']	= 'PT. ABc Defgh';
			$data['hostname']	= 'Sendi Komplek';
			$data['target']		= $hostdept_str;
			$data['purpose']	= $purpose_str;
			$data['checkintime_indformat']	= $checkintime_indformat;
			$data['qrimage']	= base_url('assets/uploads/qrcode/').$qrimage_name;
			$this->load->view('frontmenu/printqr_v', $data);
	}

	public function checkin()
	{
		$submit				= $this->input->post('submit');
		$visitorid			= $this->input->post('visitorid');
		$isnewphonenumber	= $this->input->post('newphonenumber');
		$notelepon			= $this->input->post('notelepon');
		$fullname			= $this->input->post('fullname');
		$idcardno			= $this->input->post('idcardno');
		$gender				= $this->input->post('gender');
		$email				= $this->input->post('email');
		$address			= $this->input->post('address');
		$negara				= $this->input->post('negara');
		$company			= $this->input->post('company');
		$companytype		= $this->input->post('companytype');
		$hostname			= $this->input->post('hostname');
		$hostdepartment		= $this->input->post('hostdepartment');
		$purpose			= $this->input->post('purpose');
		$notes				= $this->input->post('notes');
		$img				= $this->input->post('image');

		$checkintime			= date("Y-m-d H:i:s");
		$checkintime_indformat	= date("j M Y H:i:s");
		$now					= date("Ymd_His");
		if($submit) {			
			//--- SIMPAN FILE GAMBAR di FOLDER			
			$folderPath		= FCPATH."assets/uploads/checkin/";	
			$image_parts	= explode(";base64,", $img);
			if(isset($image_parts[1])) {
				$image_base64	= base64_decode($image_parts[1]);			
				$fileName		= 'CI'.$now.'_'.$notelepon.'.png';	
				$file			= $folderPath . $fileName;
				file_put_contents($file, $image_base64);
			} else {
				$fileName		= '';
			}
			//-- eo SIMPAN FILE GAMBAR...
			//=====BUAT QRCODE=============
			$dataqr = 'VS'.$now.'_'.$notelepon;
			$this->load->library('ciqrcode');
			$qrfolder				= FCPATH."assets/uploads/qrcode/";
			$config['cacheable']    = true;
			$config['imagedir']     = $qrfolder;
			$config['quality']      = true;
			$config['size']         = '1024';
			$config['black']        = array(224, 255, 255);
			$config['white']        = array(70, 130, 180);
			$this->ciqrcode->initialize($config);

			$qrimage_name		= 'QR'.$now.'_'.$notelepon.'.png';
			$params['data'] 	= $dataqr;
			$params['level'] 	= 'H'; //H=High Quality
			$params['size'] 	= 4;
			$params['savename'] = $qrfolder . $qrimage_name;
			$this->ciqrcode->generate($params);
			//======eo BUAT QRCODE...===========================
			
			//-------------SIMPAN DATA --------------
			$this->db->trans_start(); //-START TRANSAKSI 

			$datavisitormaster	= array(
				'Nama'			=> $fullname,
				'Gender'		=> $gender,
				'PhoneNumber'	=> $notelepon,
				'Email'			=> $email,
				'IDCard'		=> $idcardno,
				'Alamat'		=> $address,
				'Negara'		=> $negara
			);
			if($isnewphonenumber) {
				$this->db->insert('visitormst', $datavisitormaster);
				$visitorid	= $this->_getLastInsertID();
			} else {
				$this->db->update('visitormst', $datavisitormaster, array('Id'	=> $visitorid));
			}

			$datavisitortrans	= array(
									'CheckInTime'	=> $checkintime, 
									'IsInside'		=> 1, 
									'VisitormstId'	=> $visitorid, 
									'StatusVisit'	=> 'N', //N -> Undangan belum ada kunjungan, Y -> Undangan sudah ada kunjungan 
									'SourceCompany'	=> $company, 
									'SourcetypemstId'=> $companytype, 
									'HostName'		=> $hostname, 
									'TargettypemstId'=> $hostdepartment, 
									'PurposemstId'	=> $purpose, 
									'PVDescription'	=> $notes, 
									'TempBody'		=> '0.00', 
									'IsInv'			=> 0, 
									'QRCode'		=> $dataqr,
									'FileCI'		=> $fileName
								);
			$this->db->insert('visitortrans', $datavisitortrans);			

			$this->db->trans_complete(); //--END TRANSAKSI
			//---eo SIMPPAN DATA...-------------------
			$purposeNhostdepartment	= $this->_getPurposeNHostDept($purpose, $hostdepartment);
			$purpose_str			= $purposeNhostdepartment['PurposeVisit'];
			$hostdept_str			= $purposeNhostdepartment['TargetVisitorType'];
			
			$data['nama']		= $fullname;
			$data['gender']		= $gender;
			$data['notelp']		= $notelepon;
			$data['alamat']		= $address;
			$data['noidcard']	= $idcardno;
			$data['company']	= $company;
			$data['hostname']	= $hostname;
			$data['target']		= $hostdept_str;
			$data['purpose']	= $purpose_str;
			$data['checkintime_indformat']	= $checkintime_indformat;
			$data['qrimage']	= base_url('assets/uploads/qrcode/').$qrimage_name;
			$this->load->view('frontmenu/printqr_v', $data);
		} else {
			echo "ERROR PADA PROSES SIMPAN DATA... DATA TIDAK DAPAT DISIMPAN";
		}

	}

	public function getVisitorDetail()
	{
		$notelp	= $this->input->post('notelp');
		$sql = "SELECT Id, Nama, Gender, PhoneNumber, Email, Alamat, IDCard, Negara FROM visitormst WHERE PhoneNumber='$notelp'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		if(isset($result[0])) {
			$retval = $result[0];
			$retval['isNew'] = 0;
		} else {
			$retval['isNew'] = 1;
			$retval['Id'] = null;
			$retval['Nama'] = null;
			$retval['Gender'] = null;
			$retval['PhoneNumber'] = null;
			$retval['Email'] = null;
			$retval['Alamat'] = null;
			$retval['IDCard'] = null;
			$retval['Negara'] = null;
		}
		echo json_encode($retval);

	}

	function _getPurposeNHostDept($purpose, $hostdepartment)
	{
		$sql = "SELECT t.TargetVisitorType, p.PurposeVisit FROM purposemst p, targettypemst t WHERE t.Id='$hostdepartment' AND p.Id='$purpose'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result[0];
	}

	function _getPhoneNumber()
	{
		$sql = "SELECT Id, Nama, Gender, PhoneNumber, Email, Alamat, IDCard FROM visitormst ORDER BY Id";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	function _getTargetType()
	{
		$sql = "SELECT Id, TargetVisitorType, TargetVisitorDesc FROM targettypemst ORDER BY TargetVisitorType";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	function _getPurpose()
	{
		$sql = "SELECT Id, PurposeVisit, PurposeDesc FROM purposemst ORDER BY PurposeVisit";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	function _getSourceType()
	{
		$sql = "SELECT Id, SourceTypeName, SourceTypeDesc FROM sourcetypemst ORDER BY SourceTypeName";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	public function scanqrcode()
	{
		$data['title'] = "Scan QRcode";
		$this->load->view('frontmenu/qrcodereader_v', $data);
	}

	function _getLastInsertID()
	{
		$sql	= "SELECT LAST_INSERT_ID() AS lii";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result[0]['lii'];
	}
}
