<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

		public function index_() 
		{
			echo FCPATH;
		}

    public function _index()
    {
			echo password_hash('asdf', PASSWORD_DEFAULT);
    }

		public function index()
    {
			//=====BUAT QRCODE=============
		$this->load->library('ciqrcode');
		$qrcode = '001test';
		$qrfolder				= FCPATH."assets/uploads/qrcode/";
		$config['cacheable']    = true;
		$config['imagedir']     = $qrfolder;
		$config['quality']      = true;
		$config['size']         = '1024';
		$config['black']        = array(224, 255, 255);
		$config['white']        = array(70, 130, 180);
		$this->ciqrcode->initialize($config);

		$qrimage_name		= 'INV'.$qrcode.'.png';
		$params['data'] 	= $qrcode;
		$params['level'] 	= 'H'; //H=High Quality
		$params['size'] 	= 4;
		$params['savename'] = $qrfolder . $qrimage_name;
		$this->ciqrcode->generate($params);
		//======eo BUAT QRCODE...===========================
		$filepath	= $qrfolder . $qrimage_name;
		$urlimage= base_url('assets/uploads/qrcode/').$qrimage_name;

			$email= "ahmad.mirza@sarana-jaya.co.id";
				$emailcc='';
				$msg ="<html><body><h2>TES QRCODE kedua</h2></body></html>";
				
				$this->_sendEmail($email, $emailcc, 'ok', $msg, $filepath);

				$wamsg	= "Berikut test lagi qrcode\nbaris ke dua";
				$this->_sendWAwithFileAttch('6281398081536',$wamsg, $urlimage);
    }

		public function wadoang()
    {
			$no='6281398081536';
			$msg='Ini Test ke tigaPake php';

			$this->_sendWANoFile($no, $msg);
    }

		function _sendWAwithFileAttch($nohp, $msg, $urlimage)
		{
			$curl = curl_init();

			curl_setopt_array($curl, array(
					CURLOPT_URL 						=> 'https://app.saungwa.com/api/create-message',
					CURLOPT_RETURNTRANSFER 	=> true,
					CURLOPT_ENCODING 				=> '',
					CURLOPT_MAXREDIRS 			=> 10,
					CURLOPT_TIMEOUT 				=> 0,
					CURLOPT_FOLLOWLOCATION 	=> true,
					CURLOPT_HTTP_VERSION 		=> CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST 	=> 'POST',
					CURLOPT_POSTFIELDS 			=> array(
							'appkey' 	=> 'f1292ea6-5001-4a34-87e7-78dec18993df',
							'authkey' => 'QmxImxBV4tKMSOXx3cXbklueFh1gnjLI3jANxscthSOJoqOq2S',
							'to' 			=> $nohp,
							'message' => $msg,
							'file' 		=> $urlimage,
							'sandbox' => 'false'
						),
					)
			);

			// $response = curl_exec($curl);
			curl_exec($curl);
			curl_close($curl);
			// echo $response;
		}

		function _sendWANoFile($nohp, $msg)
		{
			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://app.saungwa.com/api/create-message',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array(
					'appkey' => 'f1292ea6-5001-4a34-87e7-78dec18993df',
					'authkey' => 'QmxImxBV4tKMSOXx3cXbklueFh1gnjLI3jANxscthSOJoqOq2S',
					'to' => $nohp,
					'message' => $msg,
					'sandbox' => 'false'
				),
			));

			// $response = curl_exec($curl);
			curl_exec($curl);
			curl_close($curl);
			// echo $response;
		}

		function _sendEmail($sendto, $emailcc, $status, $msg, $pathfile='')
    {
        $is_cc = ($emailcc == '') ? false : true;
				$is_attch = ($pathfile == '') ? false : true;
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

        $this->email->initialize($config);

        $this->email->from("no-reply@mzvms.online", "MzVMS");
        $this->email->to($sendto);
        if ($is_cc) {
            $emailcckoma   = str_replace(";",",",$emailcc);
            $this->email->cc($emailcckoma);
        }

        if ($status == 'ok') {
            $this->email->subject('MzVms inv QRCODE');
            $this->email->message($msg);
						if($is_attch){
							$this->email->attach($pathfile);
						}
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
