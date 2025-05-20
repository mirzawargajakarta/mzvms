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
		$data['title']	= "Confirm Registration";
		$data			= $this->_getData($linkid);
		if(isset($data['Id'])) {
			$eventdate		= strtotime($data['EventDate']);
			$today			= strtotime($data['Today']);
			$isDateOk		= ($today<$eventdate)?true:false;
			if($isDateOk) {
				if(strlen($data['QRCode'])>6){
					echo "QR Ticket sudah di kirim via email dan WA";
				} else {
					$this->load->view('visitregis/index', $data);
				}				
			} else {
				echo "udah lewat";
			}			
		} else {
			echo "data ne ra ono";
		}
    }

	public function konfirmasisave()
	{
		$invdtlid			= $this->input->post('invdtlid');
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
		$now					= date("YmdHis");
		if(!is_null($notelepon)) {			
			//--- SIMPAN FILE GAMBAR di FOLDER			
			$folderPath		= FCPATH."assets/uploads/idcard/";	
			$image_parts	= explode(";base64,", $img);
			if(isset($image_parts[1])) {
				$image_base64	= base64_decode($image_parts[1]);
				$namaclean		= $this->_clean($fullname);
				$fileName		= 'id'.$now.'_'.$namaclean.'.png';	
				$file			= $folderPath . $fileName;
				file_put_contents($file, $image_base64);
			} else {
				$fileName		= '';
			}
			//-- eo SIMPAN FILE GAMBAR...
			$dataqr = 'INV'.$now.'_'.$namaclean;
			//-------------SIMPAN DATA --------------
			$this->db->trans_start(); //-START TRANSAKSI 

			$datavisitormaster	= array(
				'Nama'			=> $fullname,
				'Gender'		=> $gender,
				'PhoneNumber'	=> $notelepon,
				'Email'			=> $email,
				'IDCard'		=> $idcardno,
				'Alamat'		=> $address,
				'Negara'		=> $negara,
				'FileIDCard'	=> $fileName
			);
			if($isnewphonenumber) {
				$this->db->insert('visitormst', $datavisitormaster);
				$visitorid	= $this->_getLastInsertID();
			} else {
				$this->db->update('visitormst', $datavisitormaster, array('Id'	=> $visitorid));
			}

			$datavisitortrans	= array(			
									'IsInside'			=> 0, 
									'VisitormstId'		=> $visitorid, 
									'StatusVisit'		=> 'N', //N -> Undangan belum ada kunjungan, Y -> Undangan sudah ada kunjungan 
									'SourceCompany'		=> $company,
									'SourcetypemstId'	=> $companytype,
									'HostName'			=> $hostname,
									'TargettypemstId'	=> $hostdepartment,
									'PurposemstId'		=> $purpose,
									'PVDescription'		=> $notes,
									'TempBody'			=> '0.00',
									'IsInv'				=> 1,
									'QRCode'			=> $dataqr
								);
			$this->db->insert('visitortrans', $datavisitortrans);

			$datainvdtl	= array('QRCode' => $dataqr);
			$this->db->update('invitedtl', $datainvdtl, array('Id'	=> $invdtlid));

			$this->db->trans_complete(); //--END TRANSAKSI
			//---eo SIMPPAN DATA...-------------------

			$qrimagefilename = $this->_makeQR($dataqr);
			$this->_sendEmail($email, $qrimagefilename);
			$this->_sendWAwithFileAttch($notelepon, $qrimagefilename);

			echo json_encode(['status' => 'success', 'message' => 'Data Saved!', 'qrcode' => $dataqr]);
		} else {
			echo json_encode(['status' => 'failed', 'message' => 'Error on data process']);
		}

	}

	function _sendEmail($sendto, $qrimagefilename)
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.googlemail.com',
			'smtp_user' => 'admin@mzvms.online',
			'smtp_pass' => 'qdll enqr yyap xdnk',
			'smtp_port' => 465,
			'smtp_crypto' => 'ssl',
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];
		$linkurl = base_url('assets/uploads/qrcode/').$qrimagefilename;
		$pathfile = FCPATH."assets/uploads/qrcode/".$qrimagefilename;
		$msg = "<html><body><h2>QRCODE TICKET</h2><br><img src='".$linkurl."'><br><p>Disclaimer
				This registration is only valid for check in process at PETRONAS Security Post 3rd floor.
				You are still required to register at the Talavera Building Receptionist on the 2nd floor.
				</p></body></html>";

		$this->email->initialize($config);

		$this->email->from("no-reply@mzvms.online", "MzVMS");
		$this->email->to($sendto);

		$this->email->subject('QRCODE Ticket');
		$this->email->message($msg);
		$this->email->attach($pathfile);

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	function _sendWAwithFileAttch($nohp, $qrimagefilename)
	{
		$urlimage = base_url('assets/uploads/qrcode/').$qrimagefilename;
		$msg = "This is your QRTicket for check in process.\nDisclaimer :\nThis registration is only valid for check in process at PETRONAS Security Post 3rd floor.You are still required to register at the Talavera Building Receptionist on the 2nd floor.";
		$curl = curl_init();
		curl_setopt_array($curl, array(
				CURLOPT_URL 			=> 'https://app.saungwa.com/api/create-message',
				CURLOPT_RETURNTRANSFER 	=> true,
				CURLOPT_ENCODING 		=> '',
				CURLOPT_MAXREDIRS 		=> 10,
				CURLOPT_TIMEOUT 		=> 0,
				CURLOPT_FOLLOWLOCATION 	=> true,
				CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST 	=> 'POST',
				CURLOPT_POSTFIELDS 		=> array(
						'appkey'  => 'f1292ea6-5001-4a34-87e7-78dec18993df',
				        'authkey' => 'QmxImxBV4tKMSOXx3cXbklueFh1gnjLI3jANxscthSOJoqOq2S',
						'to' 	  => $nohp,
						'message' => $msg,
						'file' 	  => $urlimage,
						'sandbox' => 'false'
					),
				)
		);
		curl_exec($curl);
		curl_close($curl);
	}

	function _makeQR($dataqr)
	{
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

		$qrimage_name		= 'QR'.$dataqr.'.png';
		$params['data'] 	= $dataqr;
		$params['level'] 	= 'H'; //H=High Quality
		$params['size'] 	= 4;
		$params['savename'] = $qrfolder . $qrimage_name;
		$this->ciqrcode->generate($params);
		//======eo BUAT QRCODE...===========================
		return $qrimage_name;
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
					d.Id AS invdtlid, d.InvitemstId, d.VisitorName, d.VisitorWA, d.VisitorEmail, d.StatusWA, 
					d.StatusEmail, d.QRCode, d.LinkUrl
				FROM 
					invitemst i, invitedtl d
				WHERE 
					i.Id=d.InvitemstId AND d.LinkUrl='$linkid'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return isset($result[0])?$result[0]:'none';
	}

	function _getVisitorTransDetailByQR($qrcode)
	{
		$sql = "SELECT 	
				t.Id, t.CheckInTime, DATE_FORMAT(t.CheckInTime,'%e %b %Y %l:%i %p') AS CheckInTimeIndFmt,
				t.CheckOutTime, t.IsInside, t.VisitormstId, 
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
				t.VisitormstId=v.Id AND t.SourcetypemstId=s.Id AND t.PurposemstId=p.Id 
				AND t.TargettypemstId=r.Id AND t.QRCode='$qrcode'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result[0];
	}

	public function test()
	{
		$notelepon="6281398081536";
		$qrimagefilename = "QRINV20250520001712_mirzahasan5.png";
		$this->_sendWAwithFileAttch($notelepon, $qrimagefilename);
		echo 'ok 1';
	}

	function _clean($string) 
	{
		$string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
		$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
		$string = str_replace('-', '', $string);
		return strtolower($string); // Replaces multiple hyphens with single one.
	 }

	 function _getLastInsertID()
	 {
		 $sql	= "SELECT LAST_INSERT_ID() AS lii";
		 $query = $this->db->query($sql);
		 $result = $query->result_array();
		 return $result[0]['lii'];
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
