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
			$email= "ahmad.mirza@sarana-jaya.co.id";
				$emailcc='';
				$msg ="<html><body><h2>TES MZVMS</h2></body></html>";
				$this->_sendEmail($email, $emailcc, 'ok', $msg);
    }

		public function __index()
    {
			$no='6281398081536';
			$msg='Ini Test ke duaPake php';

			$this->_sendWA($no, $msg);
    }

		function _sendWA($nohp, $msg)
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

			$response = curl_exec($curl);

			curl_close($curl);
			echo $response;
		}

		function _sendEmail($sendto, $emailcc, $status, $msg)
    {
        $is_cc = ($emailcc == '') ? false : true;
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
            $this->email->subject('MzVms Mantab');
            $this->email->message($msg);
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
