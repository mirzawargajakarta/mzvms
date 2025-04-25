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

		public function __index()
    {
			$to ="mirzawargajakarta@gmail.com";
			$subject = "Test pertama";
			$msg ="Contoh body email baris pertama\nBaris Kedua";
			$headers = "From: anon@localhost.com\r\n";
			$headers .= "Reply-To: anon@localhost.com\r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

			$mailsent	= mail($to, $subject, $msg, $headers);
			if($mailsent) {
				echo "BERHASIL !!";
			} else {
				echo "GAGAL!!!";
			}

    }

		public function index()
    {
				$email= "ahmad.mirza@sarana-jaya.co.id";
				$emailcc='';
				$msg ="<html><body><h2>TES MZVMS</h2></body></html>";
				$this->_sendEmail($email, $emailcc, 'ok', $msg);
    }

		function _sendEmail($sendto, $emailcc, $status, $msg)
    {
        $is_cc = ($emailcc == '') ? false : true;
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.googlemail.com',
						'smtp_user' => 'infosjengat@sarana-jaya.co.id', //'saranajayaengat@gmail.com', 'programdpnolrupiah@gmail.com'
            'smtp_pass' => 'zmbm bgne bxmk cejy',//'Sj1982#2024@01',
            'smtp_port' => 465,
            'smtp_crypto' => 'ssl',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from("no-reply@mzvms.online", "Test MzVMS");
        $this->email->to($sendto);
        if ($is_cc) {
            $emailcckoma   = str_replace(";",",",$emailcc);
            $this->email->cc($emailcckoma);
        }

        if ($status == 'ok') {
            $this->email->subject('Test 4 MzVms');
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
