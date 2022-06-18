<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_Antar_Pemodal_Detail_Histori extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->foglobal->CheckSessionLogin();
	}

	public function Detail($id)
	{
		$data['getProperti'] =  $this->db->select('*')
			->where('status_projek','Tersedia')
			->where('id',$id)
			->get("tb_properti")->result();
		$this->load->view("transaksi/Transaksi_Antar_Pemodal_Detail_Histori",$data);
	}

	public function GetTb_Transaksi_Jual_Beli($id)
	{
		$data = $this->db->select("*")
			->where("id_properti",$id)
			->where("email",$this->session->userdata("user")->email)
			->order_by("create_date","desc")
			->get("Tb_Transaksi_Jual_Beli")
			->result();
		$dataTransaksi = [
			"dataTransaksi" => $data 
		];
		echo json_encode(["data" => $dataTransaksi]);
	}
	

}