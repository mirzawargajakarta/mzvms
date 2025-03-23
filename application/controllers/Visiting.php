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
        
		$data['title'] = 'Visit';
		// $on = 'tabel_profil.id_profil = tabel_user.id_profil';
		// $data['user'] = $this->Default_m->getAllTwoTable('tabel_user', 'tabel_profil', $on, 'id_user')->result();
		// $data['num'] = $this->Default_m->getAll('tabel_user', 'id_user')->num_rows();
		$data['data'] = $this->_getDataIndex();
		$data['num'] = count($this->_getDataIndex());

		$this->load->view('templates/header', $data);
		$this->load->view('visiting/index_client', $data);
		$this->load->view('templates/foot', $data);
    }

	function _getDataIndex()
	{
		$sql = "SELECT 
					d.Id, d.HostName, d.HostCompany, d.IsInside, t.TargetVisitorType, p.PurposeVisit,
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
			0	=> 'u.id', 
			1	=> 'u.username',
			2	=> 'u.email',
			3	=> 'ug.usergroup_name',
			4	=> 'u.is_active',
		);

		$draw	= $_POST['draw']; // digunakan oleh DataTables untuk memastikan bahwa Ajax kembali dari permintaan pemrosesan sisi server. biasanya menggunakan nilai int, seperti 1 yang artinya mengembalikan permintaan
		$limit	= $_POST['length']; // jumlah baris yang ditampilkan.
		$start	= $_POST['start']; // index untuk awal data, baris pertama dimulai dari index 0.
		$order	= $columns[$_POST['order']['0']['column']]; // pengurutan berdasarkan kolom yang dipilih.
		$dir 	= $_POST['order']['0']['dir']; // pengurutan secara ascending atau descending.
		$search	= $_POST['search']['value']; // data pencarian.		
		
		$query	= "SELECT 
					u.id, u.username, u.email, ug.usergroup_name, u.is_active 
				FROM rolesuser u, rolesusergroup ug
				WHERE u.usergroup_id=ug.id ";

		$totalData	= $this->db->query($query)->num_rows();
		$totalFiltered	= $totalData;

		if($search != '') {
			$query	.= "AND (u.username LIKE '%$search%' OR u.email LIKE '%$search%' OR ug.usergroup_name LIKE '%$search%') ";
			$totalFiltered = $this->db->query($query)->num_rows();
		}
		$query .= "ORDER BY $order $dir LIMIT $limit OFFSET $start";

		$user_arr	= $this->db->query($query)->result_array();
		
		$datatables = array();
        if(!empty($user_arr))
        {
            foreach($user_arr as $user) :
				$is_aktif_badge = ($user['is_active']>0)?'badge-success':'badge-danger';
				$activestring	= ($user['is_active']>0)?'Aktif':'Suspend';
				$active			= '<div class="badge '.$is_aktif_badge.'">'.$activestring.'</div>';
				$action			= "<a href='".base_url()."user/detail/".$user['id']."' class='btn btn-secondary'>Detail</a>";

                $nestedData['id']				= $user['id'];
                $nestedData['username']			= $user['username'];
                $nestedData['email']			= $user['email'];
				$nestedData['usergroup_name']	= "<p align='center'>".$user['usergroup_name']."</p>";
				$nestedData['active']			= $active;
                $nestedData['action']			= $action;

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

    public function hapus($id_user)
    {
        $where = ['id_user' => $id_user];
        $user = $this->Default_m->getWhere('tabel_user', $where)->row();
        unlink('./assets/img/' . $user->foto);
        $this->Default_m->delete('tabel_user', $where);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
            redirect('user');
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
