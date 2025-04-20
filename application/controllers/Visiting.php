<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visiting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Default_m');
        security();
    }

    public function index()
    {
        
		$data['title'] = 'Visitment';

		// $this->load->view('templates/header', $data);
		// $this->load->view('templates/jqueryadminlte_js', $data);
		// $this->load->view('templates/datatables_js', $data);
		// $this->load->view('visiting/index_server', $data);
		// $this->load->view('templates/foot', $data);

		$this->load->view('templates/header', $data);
		$this->load->view('visiting/index_server_footer', $data);
		$this->load->view('templates/foot', $data);
		
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

	public function serverside_datatables()
	{
		$columns = array( 
			0	=> 't.Id', 
			1	=> 't.HostName',
			2	=> 'r.TargetVisitorType',
			3	=> 'v.Nama',
			4	=> 't.SourceCompany',
			5	=> 's.SourceTypeName',
			6   => 'v.PhoneNumber',
			7	=> 'p.PurposeVisit',
			8	=> 't.IsInv'
		);

		$draw	= $_POST['draw']; // digunakan oleh DataTables untuk memastikan bahwa Ajax kembali dari permintaan pemrosesan sisi server. biasanya menggunakan nilai int, seperti 1 yang artinya mengembalikan permintaan
		$limit	= $_POST['length']; // jumlah baris yang ditampilkan.
		$start	= $_POST['start']; // index untuk awal data, baris pertama dimulai dari index 0.
		$order	= $columns[$_POST['order']['0']['column']]; // pengurutan berdasarkan kolom yang dipilih.
		$dir 	= $_POST['order']['0']['dir']; // pengurutan secara ascending atau descending.
		$search	= $_POST['search']['value']; // data pencarian.		

		$query	= "SELECT 
						t.Id, t.CheckInTime, t.CheckOutTime, t.IsInside, t.VisitormstId, 
					t.SourceCompany, t.SourcetypemstId, t.HostName, t.TargettypemstId, 
					t.PurposemstId, t.PVDescription, t.TempBody, t.AppointmentDate, 
					t.StatusVisit, t.IsInv, t.QRCode, t.FileCI, t.FileCO, t.InvBy,
					v.Nama, v.Gender, v.PhoneNumber, v.Email, 
					v.Alamat, v.IDCard, v.FileIDCard,
					p.PurposeVisit, s.SourceTypeName, r.TargetVisitorType
				FROM 
					visitortrans t, visitormst v, purposemst p, sourcetypemst s,
					targettypemst r
				WHERE t.VisitormstId=v.Id AND t.TargettypemstId=r.Id 
					AND t.PurposemstId=p.Id AND t.SourcetypemstId=s.Id ";

		$totalData	= $this->db->query($query)->num_rows();
		$totalFiltered	= $totalData;

		if($search != '') {
			$query	.= "AND (v.PhoneNumber LIKE '%$search%' OR t.HostName LIKE '%$search%' OR t.SourceCompany LIKE '%$search%') ";
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
					<a href='".base_url('visiting/edit/'. $data['Id'])."' class='btn btn-outline-warning'>
						<i class='fas fa-edit pop' data-toggle='popover' data-placement='bottom' data-content='EDIT'></i>
					</a>
					<a href='#' data-id='".$data['Id']."' class='to-delete btn btn-outline-danger'>
						<i class='fas fa-trash-alt pop' data-toggle='popover' data-placement='bottom' data-content='Delete'></i>
					</a>";	
				
				$invitation= ($data['IsInv']>0)?$data['InvBy']:'No';

                $nestedData['No']					= "<p align='right'>".$data['Id']."&nbsp;</p>";
                $nestedData['HostName']				= $data['HostName'];
                $nestedData['SourceCompany']		= $data['SourceCompany'];
				$nestedData['TargetVisitorType']	= "<p align='center'>".$data['TargetVisitorType']."</p>";
				$nestedData['PurposeVisit']			= $data['PurposeVisit'];
				$nestedData['Nama']					= $data['Nama'];
				$nestedData['PhoneNumber']			= $data['PhoneNumber'];
				$nestedData['SourceTypeName']		= $data['SourceTypeName'];
				$nestedData['Invitation']			=  "<p align='center'>".$invitation."</p>";
				$nestedData['Action']				= $action;

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

	public function detail($id)
	{
		$data['title']	= 'Detail=>'.$id;
		$data['data']	= $this->_getVisitorTransDetail($id);
		$this->load->view('visiting/detail_v', $data);
	}

	function _getVisitorTransDetail($idvistrans)
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
				t.VisitormstId=v.Id AND t.SourcetypemstId=s.Id AND t.PurposemstId=p.Id 
				AND t.TargettypemstId=r.Id AND t.Id='$idvistrans'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result[0];
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

    public function hapus()
    {
		$encode	= $this->input->get('mzvms');
		$id	= urldecode($encode);
        $where = ['Id' => $id];
        $vms = $this->Default_m->getWhere('visitortrans', $where)->row();
        unlink(FCPATH.'assets/uploads/checkin/' . $vms->FileCI);
		unlink(FCPATH.'assets/uploads/checkout/' . $vms->FileCO);
        $this->Default_m->delete('visitortrans', $where);
        if ($this->db->affected_rows() > 0) {
            redirect('visiting');
        }
    }

    function getWhere()
    {
        $where = ['id_user' => $this->uri->segment(3)];
        $on = 'tabel_profil.id_profil = tabel_user.id_profil';
        $data['user'] = $this->Default_m->getWhereTwoTable('tabel_user', 'tabel_profil', $on, $where)->row();
        $this->load->view('user/detail', $data);
    }
}
