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
		$data['getProperti'] =  $this->db->select('*')
			->where('status_projek','Tersedia')
			->where('id',$id)
			->get("tb_properti")->result();
		$this->load->view("transaksi/Transaksi_Antar_Pemodal_Detail",$data);
	}
	public function HargaWajar($id){
		/*$getSumHargaSaham = $this->db->select_sum('harga_saham')		
		->where('keterangan','beli')		
		->where('id_properti',$id)
		->get('v_transaksi_beli')->result();

		$getCountHargaSaham = count($this->db->select('*')		
		->where('keterangan','beli')		
		->where('id_properti',$id)
		->get('v_transaksi_beli')->result());
		*/
		$defaulHarga =  $this->db->select('harga_per_lembar')
		->where('id',$id)
		->get('tb_properti')->result();

		$dataTransaksi = [
			/*"harga_per_lembar" =>$getSumHargaSaham,
			"lembar_saham_beli" => $getCountHargaSaham,*/
			"defaulHarga" => $defaulHarga 
		];
		echo json_encode(["getHargaWajar" => $dataTransaksi]);

	}
	public function GetTransaksiBeli($id)
	{
		/*$getData = $this->db->query("select count('lembar_saham') as lembar_saham,jumlah_saham,harga_saham from v_transaksi_beli where keterangan = 'beli' group by id_properti ")->result();*/
		$getData = $this->db->select_sum('lembar_saham')
		->select_sum('order_saham')
		->select('harga_saham')
		->where('keterangan','beli')
		->where('id_properti',$id)
		->group_by('harga_saham')
		->get('v_transaksi_beli')->result();

		
		$data = [
			"dataBeli" => $getData,		
		];
		echo json_encode(["getDataBeli" => $data]);
	}

	public function GetVTransaksiJual($id)
	{
		/*$getData = $this->db->query("select count('lembar_saham') as lembar_saham,jumlah_saham,harga_saham from v_transaksi_beli where keterangan = 'beli' group by id_properti ")->result();*/
		$getData = $this->db->select_sum('lembar_saham')
		->select_sum('order_saham')
		->select('harga_saham')
		->where('id_properti',$id)
		->where('keterangan','jual')
		->group_by('harga_saham')
		->get('v_transaksi_jual')->result();
		$data = [
			"dataJual" => $getData
		];
		echo json_encode(["getDataJual" => $data]);
	}

	public function AddTransaksiJualBeli_beli()
	{
		date_default_timezone_set('asia/jakarta');
		$id =  $this->input->post('id');		
		$lembarSaham =  $this->input->post('lembarSaham');		
		$keterangan =  $this->input->post('keterangan');
		$hargaSaham =  $this->input->post('hargaSaham');

		$data = array(
			'id_properti' => $id,
			'email'=> $this->session->userdata("user")->email, 
			'lembar_saham' => $lembarSaham,
			'harga_saham' => $hargaSaham, 
			'order_saham' => 1, 
			'status' => "pending", 
			'keterangan' => $keterangan,
			'create_date' => date('Y-m-d H:i:s'),
			'modified_date' => date('Y-m-d H:i:s')

		);		
		$result = $this->db->insert('tb_transaksi_jual_beli',$data);
		echo json_encode(["data" => $result]);
	}
	public function AddTransaksiJualBeli_jual()
	{
		date_default_timezone_set('asia/jakarta');
		$id =  $this->input->post('id');		
		$lembarSahamJual =  $this->input->post('lembarSahamJual');		
		$keterangan =  $this->input->post('keterangan');
		$hargaSahamJual =  $this->input->post('hargaSahamJual');
		
		$data = array(
			'id_properti' => $id,
			'email'=> $this->session->userdata("user")->email, 
			'lembar_saham' => $lembarSahamJual,
			'harga_saham' => $hargaSahamJual, 
			'order_saham' => 1, 
			'status' => "Parsial Match", 
			'keterangan' => $keterangan,
			'create_date' => date('Y-m-d H:i:s'),
			'modified_date' => date('Y-m-d H:i:s') 
		);		
		$result = $this->db->insert('tb_transaksi_jual_beli',$data);
		echo json_encode(["data" => $result]);
	}
	public function totalInvestasiJual($id)
	{
		$email = $this->session->userdata('user')->email;
		//$getBeli = $this->db->select_sum('order_saham')
		////->where('email',$email)
		//->where('id_properti',$id)
		//->get('v_transaksi_beli')->result();
		$sahamYangSayaPunya = $this->db->select_sum('lembar_saham')
		->where('email',$email)
		->where('id_properti',$id)
		->get('v_transaksi_beli')->result();

		//$kurangi_total = $this->db->select_sum('order_saham')
		//->where('email',$email)
		//->where('id_properti',$id)
		//->get('v_transaksi_jual')->result();
		$kurangi_sahamsaya =  $this->db->select_sum('lembar_saham')
		->where('email',$email)
		->where('id_properti',$id)
		->get('v_transaksi_jual')->result();

		$result = [
			//"totalInvestasiFromViewBeli" => $getBeli,
			"sahamYangSayaPunya" => $sahamYangSayaPunya,
			//"kurangi_total" => $kurangi_total,
			"kurangi_sahamsaya" => $kurangi_sahamsaya 
		];
		echo json_encode(["totalInvestasi" => $result]);
	}

}