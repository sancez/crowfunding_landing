<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends CI_Model {

		public function __construct() {
	      	parent::__construct();
			$this->load->library("email");
	      	$this->load->database();
	    }

        public function Login($param, $func) {
			$args['email'] = $param['email'];
			$this->db->where("email", $args['email']);
			$get_user = $this->db->get("tb_user")->result();
			if(!empty($get_user)) {
			   	$return_data["IsError"] = false;
    			$return_data["Data"] = $get_user[0];

				$args_insert["email"] = $param["email"];
			    $args_insert["code"] = rand(pow(10, 6-1), pow(10, 6)-1);
			    $args_insert["created_at"] = date("Y-m-d H:i:s");
			    $args_insert["expired_at"] = date("Y-m-d H:i:s", strtotime("+5 min"));
				$this->db->insert("tb_otp", $args_insert);
				// SENDMAIL
				/*$config = [
				    'mailtype'  => 'html',
				    'charset'   => 'utf-8',
				    'protocol'  => 'smtp',
				    'smtp_host' => 'smtp.gmail.com',
				    'smtp_user' => 'windana.id@gmail.com',
				    'smtp_pass'   => 'Malang2020',
				    'smtp_crypto' => 'tls',
				    'smtp_port'   => 587,
				    'crlf'    => "\r\n",
				    'newline' => "\r\n"
				];
				$this->email->initialize($config);
		        $this->email->from('windana.id@gmail.com', "Obsido");
		        $this->email->to($param["email"]);
		        $this->email->subject("Obsido - Verification Code");
		        $this->email->message("Verification Code : ".$args_insert["code"]."<br>
		        	This code will expired in 5 minutes
		        ");
		        $this->email->send();*/
			} else {
				if($param['phone'] == ""){
	        		$return_data["IsError"] = true;
	        		$return_data["Data"] = "Login failed! Email is not registered";
				} else {
					$args['phone'] = "62".$param['phone'];
					$this->db->where("phone", $args['phone']);
					$get_user = $this->db->get("tb_user")->result();
					if(!empty($get_user)) {
					   	$return_data["IsError"] = false;
		    			$return_data["Data"] = $get_user[0];

						$args_insert["phone"] = $param["phone"];
					    $args_insert["code"] = rand(pow(10, 6-1), pow(10, 6)-1);
					    $args_insert["created_at"] = date("Y-m-d H:i:s");
					    $args_insert["expired_at"] = date("Y-m-d H:i:s", strtotime("+5 min"));
						$this->db->insert("tb_otp", $args_insert);
					} else {
		        		$return_data["IsError"] = true;
		        		$return_data["Data"] = "Login failed! Phone Number is not registered";
					}
				}
			}
			return $return_data;
		}

		public function LoginProcess($param, $func) {
			$UserData = $this->Login($param, $func);
			$IsError  = $UserData["IsError"];

			if($UserData["IsError"] == false) {
				$Data = $UserData["Data"];
				$rHtml = $param;
			} else {
				$IsError = true;
				$rHtml = "Login failed! Contact Adminstrator.";
				if(empty($UserData["Data"])) {
					$IsError = true;
					$rHtml = "Login failed! Email is not registered";
					goto returnData;
				} else {
					$IsError = true;
					$rHtml = $UserData["Data"];
					goto returnData;
				}
			}
			
			returnData:
			$ReturnData = ["IsError" => $IsError, "lsdt" => $rHtml];
			return json_encode($ReturnData);
		}

		public function VerifyEmailProcess($param, $email) {
			$this->db->where("status", 0);
			$this->db->where("code", str_replace(" ", "", $param["otp"]));
			$this->db->where("expired_at >=", date("Y-m-d H:i:s"));
  			$GetOTP = $this->db->get("tb_otp")->result();
	      	if(!empty($GetOTP)) {
	        	$id_otp = $GetOTP[0]->id;
             	$this->db->where("id", $id_otp);
		        $param_update_otp["status"] = 1;
				$this->db->update("tb_otp", $param_update_otp);

				$this->db->where("email", $email);
				$get_user = $this->db->get("tb_user")->result();
	        	if(empty($this->session->set_userdata)) {
					$this->session->set_userdata(["user" => $get_user[0]]);
				}
				else {
					$this->session->sess_destroy();
					$this->session->set_userdata(["user" => $get_user[0]]);
				}

				$ReturnData = ["IsError" => false];
				return json_encode($ReturnData);
	      	} else {
				$ReturnData = ["IsError" => true, "lsdt" => "Invalid Code Verification Code"];
				return json_encode($ReturnData);
		   	}
		}

		public function SignUpProcess($param) {
         	$this->db->where("email", $param["email"]);
			$GetUser = $this->db->get("tb_user")->result();
	      	if(!empty($GetUser)) {
				$ReturnData = ["IsError" => true, "lsdt" => "Email is registered"];
				return json_encode($ReturnData);
	      	} else {
				$this->db->insert("tb_user", $param);
				$args_insert["email"] = $param["email"];
			    $args_insert["code"] = rand(pow(10, 6-1), pow(10, 6)-1);
			    $args_insert["created_at"] = date("Y-m-d H:i:s");
			    $args_insert["expired_at"] = date("Y-m-d H:i:s", strtotime("+5 min"));
				$this->db->insert("tb_otp", $args_insert);
				// SENDMAIL
				/*$config = [
				    'mailtype'  => 'html',
				    'charset'   => 'utf-8',
				    'protocol'  => 'smtp',
				    'smtp_host' => 'smtp.gmail.com',
				    'smtp_user' => 'windana.id@gmail.com',
				    'smtp_pass'   => 'Malang2020',
				    'smtp_crypto' => 'tls',
				    'smtp_port'   => 587,
				    'crlf'    => "\r\n",
				    'newline' => "\r\n"
				];
				$this->email->initialize($config);
		        $this->email->from('windana.id@gmail.com', "Obsido");
		        $this->email->to($param["email"]);
		        $this->email->subject("Obsido - Verification Code");
		        $this->email->message("Verification Code : ".$args_insert["code"]."<br>
		        	This code will expired in 5 minutes
		        ");
		        $this->email->send();*/
				$ReturnData = ["IsError" => false, "lsdt" => $param];
				return json_encode($ReturnData);
		   	}
		}
	}