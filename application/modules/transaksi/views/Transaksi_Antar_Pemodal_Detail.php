<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Obsido-Transaksi Detail</title>
        <link rel="icon" href="<?php echo base_url("assets/icons/favicon.png"); ?>" type="image/png" sizes="16x16" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="Obsido" />
        <meta name="keywords" content="Obsido Keywords">
        <meta name="author" content="Web-Izul" />
        <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" media="all" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/animate.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/owl.carousel.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/owl.theme.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/ionicons.min.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/@fortawesome/fontawesome-free/css/all.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/@line-awesome/css/line-awesome.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/select2/select2.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/select2/select2-bootstrap.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/ladda/ladda-themeless.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/toastr/toastr.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-datepicker.min.css"); ?>">
        <link href="<?php echo base_url("assets/css/style.css"); ?>" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css?n=").$this->config->item("tahun_assets"); ?>">
        <style>
            .contect-header{
                background-image: url('<?php echo base_url("/assets/images/xxx_xxx_xxx/city.jpg") ?>');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center center;
                min-height: 55vh;
                padding: 0px;
            }
            .contect-header-text{
                background-color: #ffffff38;
                max-width: 900px;
                margin: 200px 50px;
            }
            .contect-header-text h1{
                font-size: 45px;
                text-shadow: 1px 1px 7px black;
            }
            .contect-header-text p{
                max-width: 100%;
                font-size: 27px;
                line-height: 30px;
                text-shadow: 1px 1px 7px black;
            }

            @media only screen and (min-width: 1400px) {
                .contect-header{
                    min-height: 55vh;
                    height: 55vh;
                    padding: 0px;
                }
                .contect-header-text{
                    max-width: 60vw;
                    margin: 13vh 60px;
                }
                .contect-header-text h1{
                    font-size: 3vw;
                }
                .contect-header-text p{
                    font-size: 2vw;
                    line-height: 2.1vw;
                }
            }
                            
            @media only screen and (max-width: 700px) {
                .contect-header{
                    min-height: 60vh;
                    height: 60vh;
                    padding: 0px;
                }
                .contect-header-text{
                    max-width: 900px;
                    margin: 18vh 15px;
                }
                .contect-header-text h1{
                    font-size: 25px;
                }
                .contect-header-text p{
                    font-size: 15px;
                    line-height: 17px;
                }
            }


            .shadow{
                -webkit-box-shadow: 0px 0px 15px -2px #000000; 
                box-shadow: 0px 0px 15px -2px #000000;
            }


            /*td {
                vertical-align: top !important;
            }*/
            td {
                padding: 10px 5px !important;
                white-space: normal !important;
            }
            .transaksi{
            	margin-top:  100px;   	
            }
        </style>
    </head>
    <body>
        <style type="text/css">
            .active{
                border-bottom: 4px solid blue;
            }
        </style>
        <div class="wrapper">
            <?php $this->load->view("other/header_landing"); ?>
            <div id="main" class="main">
                <div class="home">
                     <div class="container container-custom">
                        <div class="row mb-4 ml-0 mr-0">                       	
                          
                        </div>
                    </div> 
                    <h1 class="transadksi mb-4" style="text-align: center;"></h1>
                    <div class="container">
                        <div class="row row-resize-item">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body filter collapse show font-default">
                                        <form id="FrmFilter" role="form"><!-- 160 -->
                                            <div class="row">                                            
                                                <div class="a" style="border: 1px solid ;margin-left: 2%;width:96%;height: 260px;background: ;">
                                                    <div class="a1" style="width: 100%;height: 160px;background: #eaeaea;padding-top: 9px;float: left;">
                                                        <div class="a11_image" style="width:250px;height: 140px;background: red;float: left;margin-left: 12px;">
                                                            
                                                        </div>
                                                        <div class="a12" style="float: left;width: 450px;height: 140px;background: #eaeaea;">
                                                            <p style="margin-left: 12px;margin-top: 4px;font-weight: bold;">Cafe Kemang Jakarta</p>
                                                            <p style="margin-left: 12px;margin-top: 3px;">Jl. Kemang Dalam IX No.25,Kemang South Jakarta</p>
                                                            <p style="margin-left: 12px;margin-top: -4px;">City 12730 </p>
                                                            <button class="btn btn-primary btn-sm" style="margin-left: 12px;margin-top: 24px;padding-left: 20px;padding-right: 20px;">Detail Properti</button>
                                                        </div>
                                                        <div class="a13" style="float: left;width: 322px;height: 140px;background: ;">
                                                            <p style="margin-top: 4px;">Harga saham awal : <span style="font-weight: bold;float:right;margin-right: 5px;">1.000</span></p>
                                                            <p style="margin-top: 3px;">Total saham awal : <span style="font-weight: bold;float:right;margin-right: 5px;">1.000.000</span></p>
                                                            <p style="margin-top: 3px;">Harga wajar saham : <span style="font-weight: bold;float:right;margin-right: 5px;color: #0084ff">500</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="a2 active" style="width:32%;height: 100px;background: ;float: left;">
                                                        <center><img style="margin-top: 15px;height: 45px;" src="<?php echo base_url("assets/icons/transaksiexchange%20Money.png") ?>"></center>
                                                        <center><p style="font-size: 13px;font-weight: bold;color:black;margin-top: 5px;">Transaksi Saham</p></center>
                                                    </div>
                                                    <div class="a2 " style="width:32%;height: 100px;background: ;float: left;border-left:1px solid black;border-right: 1px solid black">
                                                        <center><i class="las la-business-time" style="font-size: 45px;color: black;margin-top: 15px;"></i></center>
                                                        <center><p style="font-size: 13px;font-weight: bold;color:black;margin-top: 5px;">Transaksi Saham</p></center>
                                                    </div>
                                                    <div class="a2 " style="width:32%;height: 100px;background: ;float: left;">
                                                        <center><i class="las la-money-check" style="font-size: 45px;color: black;margin-top: 15px;"></i></center>
                                                        <center><p style="font-size: 13px;font-weight: bold;color:black;margin-top: 5px;">Transaksi Saham</p></center>
                                                    </div>
                                                </div>
                                                <div class="b" style="background: ; width: 96%; height: 800px;margin-left:2%;">
                                                    <div class="b1" style="background: ;width: 100%;height: 40px;margin-top:15px;margin-bottom: 5px;">
                                                        <div class="b11" style="width: 50%;height: 100%;background: ;float: left;">
                                                        <center>
                                                            <button class="btn btn-primary" style=";padding-right: 40px;padding-left: 40px;">Beli</button>
                                                            <button class="btn btn-primary ml-2 mr-2">Ralat Transaksi</button>
                                                            <button class="btn btn-primary">Batal Transaksi</button>
                                                        </center>
                                                        </div>
                                                        <div class="b11" style="width: 50%;height: 100%;background: ;float: left;">
                                                            <center>
                                                            <button class="btn btn-primary" style=";padding-right: 40px;padding-left: 40px;">Jual</button>
                                                            <button class="btn btn-primary ml-2 mr-2">Ralat Transaksi</button>
                                                            <button class="btn btn-primary">Batal Transaksi</button>
                                                        </center>
                                                        </div>
                                                    </div>                                                    
                                                    <style type="text/css">
                                                        
                                                        .b21 table, tr, td{
                                                            border: 2px solid #bbb6b6;                                                            
                                                            font-weight: bold;
                                                            font-size: 13px;
                                                            text-align: center;
                                                            color:black;
                                                        }
                                                        .b21 table tr:nth-child(even){
                                                            background-color:  #eaeaea;
                                                        }
                                                        .b22 table, tr, td{
                                                            border: 2px solid #bbb6b6;                                                            
                                                            font-weight: bold;
                                                            font-size: 13px;
                                                            text-align: center;
                                                            color:black;
                                                        }
                                                        .b22 table tr:nth-child(even){
                                                            background-color:  #eaeaea;
                                                        }
                                                    </style>
                                                    <div class="b2" style="background: ;width: 100%;height: 700px;">
                                                        <div class="b21" style="background: ;height: 100%;width: 50%;float: left;margin-top: 10px;">  
                                                        <center>    
                                                            <table width="81%">
                                                                <tr>
                                                                    <td colspan="3" style="text-align: center;">Transaksi Beli</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jumlah Order</td>
                                                                    <td>Jumlah Saham</td>
                                                                    <td>Harga Saham</td>
                                                                </tr>
                                                                <tbody id="transaksiBeli"></tbody>
                                                                
                                                            </table>
                                                            </center>
                                                        </div>
                                                        
                                                        <div class="b22" style="background: ;height: 100%;width: 50%;float: left;margin-top: 10px;">  
                                                        <center>    
                                                            <table width="81%">
                                                                <tr>
                                                                    <td colspan="3" style="text-align: center;">Transaksi Beli</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jumlah Order</td>
                                                                    <td>Jumlah Saham</td>
                                                                    <td>Harga Saham</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>500</td>
                                                                    <td>6000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>500</td>
                                                                    <td>6000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>500</td>
                                                                    <td>6000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>500</td>
                                                                    <td>6000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>500</td>
                                                                    <td>6000</td>
                                                                </tr>
                                                            </table>
                                                            </center>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row div-more-filter d-none">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <select style="width: 100%;" class="form-control select2 dropdown-lokasi">
                                                            <option value="">Lokasi</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <select style="width: 100%;" class="form-control select select-tipe-aset">
                                                            <option value="">Tipe Aset</option>
                                                            <option value="Hotel">Hotel</option>
                                                            <option value="Cafe/Restoran">Cafe/Restoran</option>
                                                            <option value="Tempat Usaha Komersil">Tempat Usaha Komersil</option>
                                                            <option value="Ruko">Ruko</option>
                                                            <option value="Vila/Pondok">Vila/Pondok</option>
                                                            <option value="Gedung Perkantoran">Gedung Perkantoran</option>
                                                            <option value="Apartemen">Apartemen</option>
                                                            <option value="Lainnya">Lainnya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <select style="width: 100%;" class="form-control select select-nilai-investasi">
                                                            <option value="">Nilai Investasi</option>
                                                            <option value="< 3M">< 3M</option>
                                                            <option value="3M - 6M">3M - 6M</option>
                                                            <option value="> 6M">> 6M</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <select style="width: 100%;" class="form-control select select-status-projek">
                                                            <option value="">Status Projek</option>
                                                            <option value="Tersedia">Tersedia</option>
                                                            <option value="Selesai">Selesai</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <select style="width: 100%;" class="form-control select select-dividen-period">
                                                            <option value="">Periode Dividen</option>
                                                            <option value="Kuartal">Kuartal</option>
                                                            <option value="Semester">Semester</option>
                                                            <option value="Tahunan">Tahunan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="bodyTransaksi">
                                   
                                    	
                                    	


                      					

                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer start-->
                <div class="footer-sm bg-primary" style="padding: 10px;">
    <div class="container">
        <div class="row ml-0 mr-0">
            <!-- <div class="col-md-4">
                <h6 class="ml-1">Follow Us</h6>
                <ul class="mt-2">
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                </ul>
            </div> -->
            <div class="offset-md-3 col-md-6 text-center pt-3">
		        <a href="#" class="bg-white" style="border-radius: 100px; padding: 5px;"><i style="width: 20px;" class="fab fa-facebook text-primary"></i></a>
		        <a href="#" class="bg-white" style="border-radius: 100px; padding: 5px;"><i style="width: 20px;" class="fab fa-twitter text-primary"></i></a>
		        <a href="#" class="bg-white" style="border-radius: 100px; padding: 5px;"><i style="width: 20px;" class="fab fa-instagram text-primary"></i></a>
		        <a href="#" class="bg-white" style="border-radius: 100px; padding: 5px;"><i style="width: 20px;" class="fab fa-whatsapp text-primary"></i></a>
		        <br>
            	<h6 class="text-white mt-3"><a class="text-white" href="">Kebijakan &amp; Privasi</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a class="text-white" href="">Syarat &amp; Ketentuan</a></h6><br>
                <h6 class="mt-3 text-white">© 2021 Obsido</h6>
                <br><br>
            </div>
            <!-- <div class="col-md-4 contact">
                <h6 class="bold text-white">Contact</h6><br>
                <h6>email@email.com&nbsp;<i class="la la-envelope"></i></h6><br>
                <h6>+6220000000&nbsp;<i class="la la-tty"></i></h6>
            </div> -->
        </div>
    </div>
</div>
<!-- footer end -->
            </div>
        </div>
        <script type="text/javascript">
        $(document).ready(function(){
            getTransaksiBeli();
        });
        setInterval(getTransaksiBeli,7000);
        function getTransaksiBeli(){
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/transaksi/Transaksi_Antar_Pemodal_Detail/GetTransaksiBeli')?>",
                dataType : "JSON",
                cache:false,
                success: function(response){
                    console.log(response.getDataBeli.dataBeli[0]);
                       var htmlBeli ="";
                       for(i=0;i<response.getDataBeli.dataBeli.length;i++){
                       var data = response.getDataBeli.dataBeli[i];
                       htmlBeli += `<tr>`;
                       htmlBeli += `<td>6000</td>`;
                       htmlBeli += `<td>6000</td>`;
                       htmlBeli += `<td>${data.harga_saham}</td>`;
                       htmlBeli += `</tr>`;
                       }     
                       $("#transaksiBeli").html(htmlBeli) 
                },
                error :function(){
                    alert("Error");
                }
            });
        }

        </script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/moment.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-2.1.1.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/popper.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.validate.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/plugins.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/custom.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap-datepicker.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/validate/jquery.validate.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/select2/select2.full.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/toastr/toastr.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/ladda/spin.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/ladda/ladda.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/ladda/ladda.jquery.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/Inputmask-5.x/dist/jquery.inputmask.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/proses.js?n=").$this->config->item("tahun_assets"); ?>"></script>
        <script>
            GetDropdownLokasi();
            var array_id = [];
            var request_properti  = {"filter": {"kywd": ""}};
            request_properti["Sort"] = "id desc";
            request_properti["filter"]["kywd"] = "";
            request_properti["filter"]["id_lokasi"] = $("#FrmFilter").find(".dropdown-lokasi").val();
            request_properti["filter"]["tipe_aset"] = $("#FrmFilter").find(".select-tipe-aset").val();
            request_properti["filter"]["nilai_investasi"] = $("#FrmFilter").find(".select-nilai-investasi").val();
            request_properti["filter"]["status_projek"] = $("#FrmFilter").find(".select-status-projek").val();
            request_properti["filter"]["dividen_period"] = $("#FrmFilter").find(".select-dividen-period").val();
            $.ajax({
                type: "POST",
                url: base_url + "/properti/ajax_properti",
                data: {act:"listdatahtml", req:request_properti},
                dataType: "JSON",
                tryCount: 0,
                retryLimit: 3,
                success: function(resp){
                    array_id = resp.array_id;
                    if(resp.paging.IsNext == true){
                        $(".btn-lihat-lebih-banyak").removeClass("d-none");
                    } else {
                        $(".btn-lihat-lebih-banyak").addClass("d-none");
                    }
                    $(".datatable-properti tbody").html(resp.lsdt);
                },
                error: function(xhr, textstatus, errorthrown) {
                    $(".datatable-properti tbody").html("<tr><td style='padding: 20px !important;' colspan='5' class='text-center'><span class='badge badge-pill badge-warning'>Check your internet connection again</span></td></tr>");
                }
            });

            $(".btn-lihat-lebih-banyak").click(function(){
                $(".btn-lihat-lebih-banyak").addClass("disabled")
                var request_properti  = {"filter": {"kywd": ""}};
                request_properti["Sort"] = "id desc";
                request_properti["filter"]["kywd"] = "";
                request_properti["filter"]["id_lokasi"] = $("#FrmFilter").find(".dropdown-lokasi").val();
                request_properti["filter"]["tipe_aset"] = $("#FrmFilter").find(".select-tipe-aset").val();
                request_properti["filter"]["nilai_investasi"] = $("#FrmFilter").find(".select-nilai-investasi").val();
                request_properti["filter"]["status_projek"] = $("#FrmFilter").find(".select-status-projek").val();
                request_properti["filter"]["dividen_period"] = $("#FrmFilter").find(".select-dividen-period").val();
                request_properti["filter"]["array_id"] = array_id;
                $.ajax({
                    type: "POST",
                    url: base_url + "/properti/ajax_properti",
                    data: {act:"listdatahtml", req:request_properti},
                    dataType: "JSON",
                    tryCount: 0,
                    retryLimit: 3,
                    success: function(resp){
                        array_id = resp.array_id;
                        if(resp.paging.IsNext == true){
                            $(".btn-lihat-lebih-banyak").removeClass("d-none");
                        } else {
                            $(".btn-lihat-lebih-banyak").addClass("d-none");
                        }
                        $(".datatable-properti tbody").append(resp.lsdt);
                        $(".btn-lihat-lebih-banyak").removeClass("disabled");
                    },
                    error: function(xhr, textstatus, errorthrown) {
                        $(".btn-lihat-lebih-banyak").removeClass("disabled");
                    }
                });
            });

            function GetDataTable(){
                $(".datatable-properti tbody").html("<tr><td colspan='5' style='padding: 20px !important;' class='text-center'><center><img class='loading-gif-image' src='<?php echo base_url("assets/images/loading-data.gif") ?>' alt='Loading ...'></center></td></tr>");
                array_id = [];
                request_properti  = {"filter": {"kywd": ""}};
                request_properti["Sort"] = "id desc";
                request_properti["Search"] = $("#FrmFilter").find(".kywd").val();
                request_properti["filter"]["id_lokasi"] = $("#FrmFilter").find(".dropdown-lokasi").val();
                request_properti["filter"]["tipe_aset"] = $("#FrmFilter").find(".select-tipe-aset").val();
                request_properti["filter"]["nilai_investasi"] = $("#FrmFilter").find(".select-nilai-investasi").val();
                request_properti["filter"]["status_projek"] = $("#FrmFilter").find(".select-status-projek").val();
                request_properti["filter"]["dividen_period"] = $("#FrmFilter").find(".select-dividen-period").val();
                $.ajax({
                    type: "POST",
                    url: base_url + "/properti/ajax_properti",
                    data: {act:"listdatahtml", req:request_properti},
                    dataType: "JSON",
                    tryCount: 0,
                    retryLimit: 3,
                    success: function(resp){
                        array_id = resp.array_id;
                        if(resp.paging.IsNext == true){
                            $(".btn-lihat-lebih-banyak").removeClass("d-none");
                        } else {
                            $(".btn-lihat-lebih-banyak").addClass("d-none");
                        }
                        $(".datatable-properti tbody").html(resp.lsdt);
                    },
                    error: function(xhr, textstatus, errorthrown) {
                        $(".datatable-properti tbody").html("<tr><td style='padding: 20px !important;' colspan='5' class='text-center'><span class='badge badge-pill badge-warning'>Check your internet connection again</span></td></tr>");
                    }
                });
            }

            $("#FrmFilter").find("select").change(function(){
                GetDataTable();
            });

            /*$(window).scroll(function(){
                console.log($(document).scrollTop());
            });*/

            $(".btn-more-filter").click(function(){
                $(".btn-more-filter").addClass("d-none");
                $(".div-more-filter").removeClass("d-none");
            });

            $("#FrmFilter").submit(function() {
                GetDataTable();
                return false;
            });


            $(".datatable-properti").on("click", ".add-bookmark", function() {
                var data_id = $(this).attr("data-id");
                var data_element = $(this);
                $.ajax({
                    type: "POST",
                    url: base_url + "/pemodal/ajax_pemodal",
                    data: {act:"insert_bookmark", req:data_id},
                    dataType: "JSON",
                    tryCount: 0,
                    retryLimit: 3,
                    beforeSend: function() {
                        data_element.html("<i class='fa fa-spin fa-sync-alt'></i> Tandai");
                    },
                    success: function(resp){
                        if(resp == 1){
                            data_element.html("<i class='fas fa-star'></i> Tandai");
                        } else {
                            data_element.html("<i class='far fa-star'></i> Tandai");
                        }
                    },
                    error: function(xhr, textstatus, errorthrown) {
                        toastrshow("warning", "Periksa koneksi internet anda kembali", "Warning");
                    }
                });
            });
        </script>
    </body>
</html>
