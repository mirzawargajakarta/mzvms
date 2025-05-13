<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invite extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Default_m');
        security();
    }

    public function index()
    {        
		$data['title'] = 'Event Invitation List';

		$this->load->view('templates/header', $data);
		$this->load->view('invite/index_invite', $data);
		$this->load->view('templates/foot', $data);
		
    }

	public function formadd()
    {        
		$data['title'] = 'Event Invitation Form';

		$this->load->view('templates/header', $data);
		$this->load->view('invite/invitationform', $data);
		$this->load->view('templates/foot', $data);
		
    }

	public function addproc()
	{
		$username			= $this->session->userdata('username');
		$id_user 			= $this->session->userdata('id_user');

		$submit				= $this->input->post('submit');
		$tanggalevent		= $this->input->post('tanggalevent');
		$eventname     		= $this->input->post('eventname');
		$msg				= $this->input->post('msg');
		$eventdescription	= $this->input->post('eventdescription');
		
	
		$datamaster	= array(
				'EventDate'		=> $tanggalevent,
				'EventName'		=> $eventname,
				'Description'	=> $eventdescription,
				'InvMsg'		=> $msg
		);
	
		$nama_arr	= $this->input->post('nama');
		$wa_arr		= $this->input->post('wa');
		$email_arr	= $this->input->post('email');
	
		if($submit) {
			$this->db->trans_start();//----------------------------trans start

			$this->db->insert('invitemst', $datamaster);

			$idmst = $this->_getLastInsertedID();

			for($i=0; $i<count($nama_arr); $i++) {

				$linkurl	= "url_link".$i;
				$qrcode		= "INVQRCODE".$i;

				$datadetail	= array(
						'InvitemstId'	=> $idmst,
						'VisitorName'	=> $nama_arr[$i],
						'VisitorWA'		=> $wa_arr[$i],
						'VisitorEmail'	=> $email_arr[$i],
						'QRCode'		=> $qrcode,
						'LinkUrl'		=> $linkurl,
				);
				$this->db->insert('invitedtl', $datadetail);
			}

			$this->db->trans_complete();//-------------------------trans complete
			$this->session->set_flashdata('flash', 'Event Invitation Added');
			redirect('invite','refresh');		
		}
	}
	

	function _getDataIndex()
	{
		$sql = "SELECT 
					d.Id, d.HostName, d.SourceCompany, d.IsInside, t.TargetVisitorType, p.PurposeVisit,
					v.Nama, v.PhoneNumber, s.SourceTypeName
				FROM visitortrans d, visitormst v, targettypemst t, purposemst p, sourcetypemst s
				WHERE d.VisitormstId=v.Id AND d.TargettypemstId=t.Id 
					AND d.PurposemstId=p.Id AND d.SourcetypemstId=s.Id
				ORDER BY d.IsInside DESC, d.CheckInTime DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	public function eventlist()
	{
		$columns = array( 
			0	=> 't.Id', 
			1	=> 't.EventDate',
			2	=> 't.EventName',
			3	=> 't.Description',
			4	=> 't.InvMsg',
			5	=> 't.Status'
		);

		$draw	= $_POST['draw']; // digunakan oleh DataTables untuk memastikan bahwa Ajax kembali dari permintaan pemrosesan sisi server. biasanya menggunakan nilai int, seperti 1 yang artinya mengembalikan permintaan
		$limit	= $_POST['length']; // jumlah baris yang ditampilkan.
		$start	= $_POST['start']; // index untuk awal data, baris pertama dimulai dari index 0.
		$order	= $columns[$_POST['order']['0']['column']]; // pengurutan berdasarkan kolom yang dipilih.
		$dir 	= $_POST['order']['0']['dir']; // pengurutan secara ascending atau descending.
		$search	= $_POST['search']['value']; // data pencarian.		

		$query	= "SELECT t.Id, t.EventDate, t.EventName, t.Description, t.InvMsg, t.Status
				FROM invitemst t ";

		$totalData	= $this->db->query($query)->num_rows();
		$totalFiltered	= $totalData;

		if($search != '') {
			$query	.= " WHERE t.EventDate LIKE '%$search%' OR t.EventName LIKE '%$search%' OR t.Description LIKE '%$search%' OR t.InvMsg LIKE '%$search%' ";
			$totalFiltered = $this->db->query($query)->num_rows();
		}
		$query .= "ORDER BY $order $dir LIMIT $limit OFFSET $start";

		$data_arr	= $this->db->query($query)->result_array();
		
		$datatables = array();
        if(!empty($data_arr))
        {
			$no = 0;
            foreach($data_arr as $data) :
				$no++;

				$action	= 
				   "<a href='#' class='get-detail btn btn-outline-info' data-id='".$data['Id']."' data-toggle='modal' data-target='#get-detail'>
						<i class='fas fa-eye pop' data-toggle='popover' data-placement='bottom' data-content='Detail'> </i>
					</a>
					<a href='".base_url('invite/edit/'. $data['Id'])."' class='btn btn-outline-warning'>
						<i class='fas fa-edit pop' data-toggle='popover' data-placement='bottom' data-content='EDIT'></i>
					</a>
					<a href='#' data-id='".$data['Id']."' class='to-delete btn btn-outline-danger'>
						<i class='fas fa-trash-alt pop' data-toggle='popover' data-placement='bottom' data-content='Delete'></i>
					</a>";	
				
				$isSent= ($data['Status']>0)?'Sent':'No';

				$nestedData['Action']			= $action;
                $nestedData['No']				= "<p align='right'>".$data['Id']."&nbsp;</p>";
                $nestedData['EventDate']		= $data['EventDate'];
                $nestedData['EventName']		= $data['EventName'];
				$nestedData['Description']		= $data['Description'];
				$nestedData['IsSent']			=  "<p align='center'>".$isSent."</p>";				

				$datatables[] = $nestedData;
			endforeach;
        }

		$json_data = array(
						"draw"            => intval($draw),  
						"recordsTotal"    => intval($totalData),  
						"recordsFiltered" => intval($totalFiltered), 
						"data"            => $datatables,
					);	 
		echo json_encode($json_data); 
	}

	function _getLastInsertedID() {
	    $sql    = "SELECT LAST_INSERT_ID() AS LastInsertedID";
	    $qry    = $this->db->query($sql);
	    $row    = $qry->result_array();
	    return $row[0]['LastInsertedID'];
	}

	public function hapus()
    {
		$encode	= $this->input->get('mzvms');
		$id	= urldecode($encode);
        $where = ['Id' => $id];
        $this->Default_m->delete('invitemst', $where);

		$wheredtl = ['InvitemstId' => $id];
		$this->Default_m->delete('invitedtl', $wheredtl);
        if ($this->db->affected_rows() > 0) {
            redirect('invite');
        }
    }

	public function detail($id)
	{
		$data['title']	= 'Detail=>'.$id;
		$data['dataM']	= $this->_getInvMaster($id);
		$data['dataD']	= $this->_getInvDetail($id);
		$this->load->view('invite/detail_v', $data);
	}

	function _getInvMaster($id)
	{
		$sql = "SELECT 	
				t.Id, t.EventDate, t.EventName, t.Description, t.InvMsg, t.Status
			FROM 
				invitemst t
			WHERE t.Id='$id'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result[0];
	}

	function _getInvDetail($id)
	{
		$sql = "SELECT 	
				t.Id, t.InvitemstId, t.VisitorName, t.VisitorWA, t.VisitorEmail, 
				t.StatusWA, t.StatusEmail, t.QRCode, t.LinkUrl
			FROM 
				invitedtl t
			WHERE t.InvitemstId='$id'
			ORDER BY t.Id";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

//----------------------------------------------- BELOM-----------
	public function edit($id)
	{
		$data['title'] = 'Visitment Data Edit';
		$data['data']	= $this->_getVisitorTransDetail($id);
		$data['hostdepartmentdata']	= $this->_getTargetType();
		$data['purposedata']		= $this->_getPurpose();
		$data['companytypedata']	= $this->_getSourceType();
		$data['notelpdata']			= $this->_getPhoneNumber();
		$this->load->view('templates/header', $data);
		$this->load->view('visiting/edit_v', $data);
		$this->load->view('templates/foot', $data);
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

	function _getPhoneNumber()
	{
		$sql = "SELECT Id, Nama, Gender, PhoneNumber, Email, Alamat, IDCard FROM visitormst ORDER BY Id";
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

	public function simpanedit()
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

    public function form($id_user = null)
    {
        if ($id_user) {
            $user = $this->Default_m->getWhere('tabel_user', ['id_user' => $id_user])->row();
            if ($user->username == $this->input->post('username')) {
                $this->form_validation->set_rules('username', 'username', 'required');
            } else {
                $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[tabel_user.username]');
            }
        } else {
            $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[tabel_user.username]');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[8]|matches[passconfirm]');
            $this->form_validation->set_rules('passconfirm', 'konfirmasi password', 'required|trim|min_length[8]|matches[password]');
        }

        $this->form_validation->set_rules('nama_user', 'nama lengkap', 'required|trim');
        $this->form_validation->set_rules('id_profil', 'profil', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() === FALSE) {

            $data['title'] = 'Form User';
            $data['profil'] = $this->Default_m->getAll('tabel_profil', 'id_profil')->result();

            if ($id_user) {
                $where = ['id_user' => $id_user];
                $data['ubah'] = $this->Default_m->getWhere('tabel_user', $where)->row();
            }

            $this->load->view('templates/header', $data);
            $this->load->view('user/form', $data);
            $this->load->view('templates/foot', $data);
        } else {
            $path = './assets/img/';
            $type = 'jpg|jpeg|png';
            $size = 500;
            $name = 'foto';
            $fotoLama = $this->input->post('foto_lama');

            if ($id_user) {
                $data = [
                    'username' => $this->input->post('username'),
                    'nama_user' => $this->input->post('nama_user'),
                    'telpon' => $this->input->post('telpon'),
                    'id_profil' => $this->input->post('id_profil'),
                    'aktif' => $this->input->post('aktif'),
                    'foto' => !empty($_FILES[$name]["name"]) ?  $this->Default_m->upload($path, $type, $size, $name) : $fotoLama
                ];
                $where = ['id_user' => $id_user];
                $this->Default_m->update('tabel_user', $where, $data);

                if (!empty($_FILES[$name]["name"])) {
                    unlink($path . $fotoLama);
                }

                $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            } else {
                $data = [
                    'username' => $this->input->post('username'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'nama_user' => $this->input->post('nama_user'),
                    'telpon' => $this->input->post('telpon'),
                    'id_profil' => $this->input->post('id_profil'),
                    'aktif' => $this->input->post('aktif'),
                    'foto' => !empty($_FILES[$name]["name"]) ?  $this->Default_m->upload($path, $type, $size, $name) : ''
                ];
                $this->Default_m->insert('tabel_user', $data);
                $this->session->set_flashdata('flash', 'Data Berhasil Ditambahkan');
            }
            redirect('user');
        }
    }

    
}
