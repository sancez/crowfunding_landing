<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Properti extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->foglobal->CheckSessionLogin();
	}
	public function index(){
		$this->db->where("name", "Untuk di Perhatikan");
		$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
		$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
        $this->load->view("properti/properti", array(
            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
        ));
	}
	public function detail(){
		$GetBookmark = [];
		if($this->session->userdata("user")){
			$this->db->where("id_pemodal", $this->session->userdata("user")->id);
			$this->db->where("id_properti", $_GET["id"]);
			$GetBookmark = $this->db->get("tb_bookmark")->result();
		}
		$this->db->where("id_properti", $_GET["id"]);
		$GetDokumen = $this->db->get("tb_properti_dokumen")->result();

		$this->db->where("id_properti", $_GET["id"]);
		$GetProgress = $this->db->get("tb_properti_progres")->result();

		$this->db->where("id_properti", $_GET["id"]);
		$GetKelolaDana = $this->db->get("v_kelola_dana")->result();

		$this->db->where("id", $_GET["id"]);
		$GetProperti = $this->db->get("v_properti")->result();
     	$this->db->where("id", $_GET["id"]);
     	$param["total_view"] = (int)$GetProperti[0]->total_view + 1;
	    $this->db->update("tb_properti", $param);


		$this->db->where("name", "Untuk di Perhatikan");
		$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
		$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
        $this->load->view("properti/detail", array(
            "properti" => $GetProperti[0],
            "bookmark" => $GetBookmark,
            "dokumen" => $GetDokumen,
            "progress" => $GetProgress,
            "kelola_dana" => $GetKelolaDana,
            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
        ));       
	}

 	function AddSaham(){
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
		$result = $this->db->insert('tb_saham',$data);
		echo json_encode(["data" => $result]); 		
 	}
    
}