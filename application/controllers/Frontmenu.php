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

	public function checkin()
	{
		$submit				= $this->input->post('submit');
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
		// $asdf	= $this->input->post('');

		//--- SIMPAN FILE GAMBAR di FOLDER
		$folderPath		= FCPATH."assets/uploads/checkin/";	
		$image_parts	= explode(";base64,", $img);
		if(isset($image_parts[1])) {
			$image_base64	= base64_decode($image_parts[1]);
			$now			= date("Ymd_His");
			$fileName		= 'IN'.$now.'_'.$notelepon.'.png';	
			$file			= $folderPath . $fileName;
			file_put_contents($file, $image_base64);
		} else {
			$fileName		= '';
		}
		//-- eo SIMPAN FILE GAMBAR...
//==============================
		$nim = 'VS20250403_010203_081398081536';
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE
		$qrfolder				= FCPATH."assets/uploads/qrcode/";
		$config['cacheable']    = true; //boolean, the default is true
		$config['imagedir']     = $qrfolder; //direktori penyimpanan qr code
		$config['quality']      = true; //boolean, the default is true
		$config['size']         = '1024'; //interger, the default is 1024
		$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
		$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$qrimage_name = 'QR20250403_010203.png';
		$params['data'] = $nim; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 4;
		$params['savename'] = $qrfolder . $qrimage_name; //simpan image QR CODE ke folder publicfolder/qrcode/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
//=================================
		
		$data['nama']		= $fullname;
		$data['gender']		= $gender;
		$data['notelp']		= $notelepon;
		$data['qrimage']	= base_url('assets/uploads/qrcode/').$qrimage_name;
		$this->load->view('frontmenu/printqr_v', $data);

		// if($submit) {
		// 	echo "ok";
		// } else {
		// 	echo "haah";
		// }


	}

	public function getVisitorDetail()
	{
		$notelp	= $this->input->post('notelp');
		$sql = "SELECT Id, Nama, Gender, PhoneNumber, Email, Alamat, IDCard FROM visitormst WHERE PhoneNumber='$notelp'";
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
		}
		echo json_encode($retval);

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
}
