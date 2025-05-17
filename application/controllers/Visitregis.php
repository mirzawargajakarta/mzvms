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
				$this->load->view('visitregis/index', $data);
			} else {
				echo "udah lewat";
			}			
		} else {
			echo "data ne ra ono";
		}
    }

	public function checkin()
	{
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
		if(!is_null($notelepon)) {			
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
			$dataqr = 'VS'.$now.'_'.$notelepon;			
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
			echo json_encode(['status' => 'success', 'message' => 'Data Saved!', 'qrcode' => $dataqr]);
		} else {
			echo json_encode(['status' => 'failed', 'message' => 'Error on data process']);
		}

	}

	public function printQR()
	{
		$qr					= $this->input->get('qrcode');
		$qrcode 			= urldecode($qr);
		//=====BUAT QRCODE=============
		$this->load->library('ciqrcode');
		$qrfolder				= FCPATH."assets/uploads/qrcode/";
		$config['cacheable']    = true;
		$config['imagedir']     = $qrfolder;
		$config['quality']      = true;
		$config['size']         = '1024';
		$config['black']        = array(224, 255, 255);
		$config['white']        = array(70, 130, 180);
		$this->ciqrcode->initialize($config);

		$qrimage_name		= 'QR'.$qrcode.'.png';
		$params['data'] 	= $qrcode;
		$params['level'] 	= 'H'; //H=High Quality
		$params['size'] 	= 4;
		$params['savename'] = $qrfolder . $qrimage_name;
		$this->ciqrcode->generate($params);
		//======eo BUAT QRCODE...===========================
		
		$visitransdata		= $this->_getVisitorTransDetailByQR($qrcode);
		$checkintime_indformat = $visitransdata['CheckInTimeIndFmt'];
		
		$data['nama']		= $visitransdata['Nama'];
		$data['gender']		= $visitransdata['Gender'];
		$data['notelp']		= $visitransdata['PhoneNumber'];
		$data['alamat']		= $visitransdata['Alamat'];
		$data['noidcard']	= $visitransdata['IDCard'];
		$data['company']	= $visitransdata['SourceCompany'];
		$data['hostname']	= $visitransdata['HostName'];
		$data['target']		= $visitransdata['TargetVisitorType'];
		$data['purpose']	= $visitransdata['PurposeVisit'];
		$data['checkintime_indformat']	= $checkintime_indformat;
		$data['qrimage']	= base_url('assets/uploads/qrcode/').$qrimage_name;
		$this->load->view('visitregis/thankyou', $data);
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

	public function test()
	{
		$eventdate	= strtotime("2025-06-29");
		$today	= strtotime("2025-04-12");
		echo $eventdate."<==>".$today;
	}
// -lom
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
