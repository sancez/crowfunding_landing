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
		$getData = $this->db->select_sum('order_saham')
		->select_sum('convert_lembar_saham')
		->select('harga_saham')
		->where('status !=','match')
		->where('convert_lembar_saham !=',0)
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
		$getData = $this->db->select_sum('order_saham')
		->select_sum('convert_lembar_saham')
		->select('harga_saham')
		->where('status !=','match')
		->where('convert_lembar_saham !=',0)
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
			'status' => "Pending", 
			'keterangan' => $keterangan,
			'create_date' => date('Y-m-d H:i:s'),
			'modified_date' => date('Y-m-d H:i:s'),
			'convert_lembar_saham' => $lembarSaham

		);		
		$result = $this->db->insert('tb_transaksi_jual_beli',$data);
		echo json_encode(["data" => $result]);
	}
	public function ConvertBuy()
	{
		$email = $this->session->userdata('user')->email;
		$jual = $this->db->select('*')
		->select("id")
		->select("convert_lembar_saham")
		->where('keterangan','jual')
		->where('status !=','Match')
		->where('convert_lembar_saham !=',0)
		->where('email !=',$email)
		->order_by("create_date","asc")	
		->get('v_transaksi_jual')
		->result();

		$result = [
			"jual" => $jual			
		];
		echo json_encode(["ConvertBuy" => $result]);
	}
	//Waktu Press Beli dan update tb jual(status)
	public function UpdateJual()
	{
		$email = $this->session->userdata('user')->email;
		$id = $this->input->post("Id");
		$convert_lembar_saham = $this->input->post("convert_lembar_saham");

		$query = $this->db->query("update tb_transaksi_jual_beli set status = 'Pending',convert_lembar_saham = '$convert_lembar_saham' where id = '$id' and email != '$email'");
		if($convert_lembar_saham == 0){
			$this->db->query("update tb_transaksi_jual_beli set status = 'Match' where id = '$id' and email != '$email'");
		}
		if($convert_lembar_saham != 0){
			$this->db->query("update tb_transaksi_jual_beli set status = 'Partial Match' where id = '$id' and email != '$email'");
		}
		$result = [
			"email" => $email,
			"id" => $id,
			"convert_lembar_saham" => $convert_lembar_saham,
			"query" => $query
		];
		echo json_encode(["ConvertSell" => $result]);
	}
	public function AddTransaksiJualBeli_jual()
	{
		date_default_timezone_set('asia/jakarta');
		$email = $this->session->userdata('user')->email;
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
			'status' => "Pending", 
			'keterangan' => $keterangan,
			'create_date' => date('Y-m-d H:i:s'),
			'modified_date' => date('Y-m-d H:i:s'),
			'convert_lembar_saham' => $lembarSahamJual 
		);

		$result = $this->db->insert('tb_transaksi_jual_beli',$data);
		echo json_encode(["data" => $result]);
	}
	public function ConvertSell()
	{
		$email = $this->session->userdata('user')->email;
		$beli = $this->db->select('*')
		->select("id")
		->select("convert_lembar_saham")
		->where('keterangan','beli')
		->where('status !=','Match')
		->where('convert_lembar_saham !=',0)
		->where('email',$email)
		->order_by("harga_saham","asc")	
		->get('v_transaksi_beli')
		->result();

		$result = [
			"beli" => $beli			
		];
		echo json_encode(["ConvertSell" => $result]);
	}
	//waktu press jual dan update tb beli(status)
	public function UpdateBeli()
	{
		$email = $this->session->userdata('user')->email;
		$id = $this->input->post("Id");
		$convert_lembar_saham = $this->input->post("convert_lembar_saham");

		$query = $this->db->query("update tb_transaksi_jual_beli set status = 'Pending',convert_lembar_saham = '$convert_lembar_saham' where id = '$id' and email = '$email'");
		if($convert_lembar_saham == 0){
			$this->db->query("update tb_transaksi_jual_beli set status = 'Match' where id = '$id' and email = '$email'");
		}
		if($convert_lembar_saham != 0){
			$this->db->query("update tb_transaksi_jual_beli set status = 'Partial Match' where id = '$id' and email = '$email'");
		}
		$result = [
			"email" => $email,
			"id" => $id,
			"convert_lembar_saham" => $convert_lembar_saham,
			"query" => $query
		];
		echo json_encode(["ConvertSell" => $result]);
	}
	
	public function totalInvestasiJual($id)
	{
		$email = $this->session->userdata('user')->email;
	
		$sumBeli = $this->db->select_sum('convert_lembar_saham')
		->where('email',$email)
		->where('id_properti',$id)
		->get('v_transaksi_beli')->result();


		/*$kurangi_sahamsaya =  $this->db->select_sum('convert_lembar_saham')
		->where('email',$email)
		->where('id_properti',$id)
		->get('v_transaksi_jual')->result();*/

		$result = [
			"sumBeli" => $sumBeli
		];
		echo json_encode(["totalInvestasi" => $result]);
	}

	
	/*public function UpdateConvertSell()
	{
		$email = $this->session->userdata('user')->email;
		$id_tb_transaksi_jual_beli = $this->input->post("Id");
		$this->db->query("update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy =  where id = '$id_tb_transaksi_jual_beli' and email == '$email'");
		$result = $this->db->query("select * from tb_transaksi_jual_beli where status = 'Match' and id = '$id_tb_transaksi_jual_beli' and email != '$email' ")->result();
		$result = count($result);
		if($result == 0){
			$result = "Update Failed";			
		}else{
			$result = "Update Success";
		}

		echo json_encode(["UpdateConvertBuySell" => $result]);			
	}*/


}