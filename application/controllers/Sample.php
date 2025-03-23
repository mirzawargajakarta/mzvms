<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sample extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function __index() //client-side datatables
	{
		$data['title'] = "USER";
		$data['libjs'] = array('sidebar','modules_datatables');
		$data['currentmenuid'] = MENU_ID;

		$query = "SELECT u.id, u.username, u.email, ug.usergroup_name, u.is_active FROM rolesuser u, rolesusergroup ug
        WHERE u.usergroup_id=ug.id ORDER BY u.username";
		$data['user_arr'] = $this->db->query($query)->result_array();

		$this->load->view('user_clientside_index', $data);//client-side datatables
	}

	public function index() // server-side datatables
	{
		$data['title'] = "USER";
		$data['libjs'] = array('sidebar','modules_datatables');
		$data['currentmenuid'] = MENU_ID;		

		$this->load->view('sample/index_sample', $data);
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

	public function testdua()
	{		
		printarray(getRoles(MENU_ID));	
	}

}
