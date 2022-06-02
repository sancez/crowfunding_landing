<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_Antar_Pemodal_Detail extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->foglobal->CheckSessionLogin();
	}

	public function Detail($id)
	{
		$this->load->view("transaksi/Transaksi_Antar_Pemodal_Detail");
	}

	public function GetTransaksiBeli()
	{
		$getData = $this->db->select('*')->get('tb_transaksi_jual_beli')->result();
		$data = [
			"dataBeli" => $getData,
		];
		echo json_encode(["getDataBeli" => $data]);
	}

}