 <?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
?>

<style>
  .table-jadwal-detail tr td {
    font-size: 14px;
    color: #0615A7;
    font-weight: bold;
  }

  
</style>

<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Penjadwalan</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('pengajuanjadwal')) ?>">Penjadwalan</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">



        <div class="row">
          <div class="col-md-12">
            <div class="card" id="cardcontent">
              <div class="card-body">

                  <div class="col-md-12">
                    <?php 
                      $pesan = $this->session->flashdata("pesan");
                      if (!empty($pesan)) {
                        echo $pesan;
                      }
                    ?>
                  </div> 


                  
                  <input type="hidden" name="idjadwalevent" id="idjadwalevent">
                  <div class="row">

                    <div class="col-12">
                      
                      <div id="smartwizard">
                        <ul class="nav">
                           <li>
                               <a class="nav-link" href="#step-1">
                                  Jenis Jadwal
                               </a>
                           </li>
                           <li>
                               <a class="nav-link" href="#step-2">
                                  Informasi Jadwal
                               </a>
                           </li>
                           <li>
                               <a class="nav-link" href="#step-3">
                                  Waktu dan Tempat
                               </a>
                           </li>
                           <li>
                               <a class="nav-link" href="#step-4">
                                  Kelengkapan Jadwal
                               </a>
                           </li>

                           <li>
                               <a class="nav-link" href="#step-5">
                                  Pengaturan Lainnya
                               </a>
                           </li>
                        </ul>
                     
                        <div class="tab-content">

                          <!-- 
                            ##########################################################################################
                                                                  STEP 1 
                            ########################################################################################## 
                          -->
                           <div id="step-1" class="tab-pane" role="tabpanel">
                              <div class="card">
                                <div class="card-body">
                                  

                                  <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 text-lg">
                                      
                                      <div class="card">
                                        <div class="card-body" id="cardJenisJadwal">
                                          
                                          <div class="form-check mt-3">
                                            <input class="form-check-input" type="radio" name="jenisjadwal" id="exampleRadios1" value="Disciple Community" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                              Disciple Community
                                            </label>
                                          </div>
                                          <div class="form-check mt-3">
                                            <input class="form-check-input" type="radio" name="jenisjadwal" id="exampleRadios2" value="Doa Bersama">
                                            <label class="form-check-label" for="exampleRadios2">
                                              Doa Bersama
                                            </label>
                                          </div>
                                          <div class="form-check mt-3">
                                            <input class="form-check-input" type="radio" name="jenisjadwal" id="exampleRadios3" value="Ibadah Jemaat">
                                            <label class="form-check-label" for="exampleRadios3">
                                              Ibadah Jemaat
                                            </label>
                                          </div>
                                          <div class="form-check mt-3">
                                            <input class="form-check-input" type="radio" name="jenisjadwal" id="exampleRadios4" value="Kelas Next Step">
                                            <label class="form-check-label" for="exampleRadios4">
                                              Kelas
                                            </label>
                                          </div>
                                          <div class="form-check mt-3">
                                            <input class="form-check-input" type="radio" name="jenisjadwal" id="exampleRadios5" value="Latihan Acara/Musik">
                                            <label class="form-check-label" for="exampleRadios5">
                                              Latihan Acara/Musik
                                            </label>
                                          </div>
                                          <div class="form-check mt-3">
                                            <input class="form-check-input" type="radio" name="jenisjadwal" id="exampleRadios6" value="Meeting">
                                            <label class="form-check-label" for="exampleRadios6">
                                              Meeting
                                            </label>
                                          </div>
                                          <div class="form-check mt-3">
                                            <input class="form-check-input" type="radio" name="jenisjadwal" id="exampleRadios7" value="Pelayanan Jemaat">
                                            <label class="form-check-label" for="exampleRadios7">
                                              Pelayanan Jemaat
                                            </label>
                                          </div>
                                          <div class="form-check mt-3">
                                            <input class="form-check-input" type="radio" name="jenisjadwal" id="exampleRadios8" value="Team Night/Fellowship">
                                            <label class="form-check-label" for="exampleRadios8">
                                              Team Night/Fellowship
                                            </label>
                                          </div>
                                          <div class="form-check mt-3">
                                            <input class="form-check-input" type="radio" name="jenisjadwal" id="exampleRadios9" value="Filming">
                                            <label class="form-check-label" for="exampleRadios9">
                                              Filming
                                            </label>
                                          </div>

                                        </div>
                                      </div>

                                    </div>

                                  </div>

                                </div>
                              </div>
                            </div>


                            <!-- 
                            ##########################################################################################
                                                                  STEP 2 
                            ########################################################################################## 
                          -->
                           <div id="step-2" class="tab-pane" role="tabpanel">
                              <div class="card">
                                <div class="card-body">
                                  

                                  <div class="row">
                                    

                                    <div class="col-12">
                                           
                                      <div class="card">
                                        <div class="card-body">
                                          
                                          <div class="form-group row required">
                                            <label for="" class="col-md-3 col-form-label">Judul/ Nama Event</label>
                                            <div class="col-md-9">
                                              <textarea name="namaevent" id="namaevent" class="form-control" rows="2" placeholder="Nama Event"></textarea>
                                            </div>
                                          </div>      

                                          <div class="form-group row required" id="divkelas">
                                            <label for="" class="col-md-3 col-form-label">Nama Kelas</label>
                                            <div class="col-md-9">
                                              <select name="idkelas" id="idkelas" class="form-control select2">
                                                <option value="">Pilih nama kelas next step...</option>
                                                <?php  
                                                  $rskelas = $this->db->query("
                                                      select * from kelas where statusaktif='Aktif' order by idkelas
                                                    ");
                                                  if ($rskelas->num_rows()>0) {
                                                    foreach ($rskelas->result() as $row) {
                                                        echo '
                                                          <option value="'.$row->idkelas.'">'.$row->namakelas.'</option>
                                                        ';
                                                      }  
                                                  }
                                                ?>
                                              </select>
                                            </div>
                                          </div>          

                                          <div class="form-group row" id="divtema">
                                            <label for="" class="col-md-3 col-form-label">Tema</label>
                                            <div class="col-md-9">
                                              <textarea name="tema" id="tema" class="form-control" rows="2" placeholder="Tema"></textarea>
                                            </div>
                                          </div>           

                                          <div class="form-group row" id="divsubtema">
                                            <label for="" class="col-md-3 col-form-label">Sub Tema</label>
                                            <div class="col-md-9">
                                              <textarea name="subtema" id="subtema" class="form-control" rows="2" placeholder="Sub Tema"></textarea>
                                            </div>
                                          </div>                       

                                          <div class="form-group row required" id="divdepartemen">
                                            <label for="" class="col-md-3 col-form-label">Departemen Pelaksana</label>
                                            <div class="col-md-9">
                                              <select name="iddepartement" id="iddepartement" class="form-control select2">
                                                <option value="">Pilih nama departemen...</option>
                                                <?php 
                                                  $rsDepartement = $this->Departement_model->get_all();
                                                  if ($rsDepartement->num_rows()>0) {
                                                    foreach ($rsDepartement->result() as $row) {
                                                      echo '
                                                        <option value="'.$row->iddepartement.'">'.$row->namadepartement.'</option>
                                                      ';
                                                    }
                                                  }
                                                ?>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group row required" id="divpengkhotbah">
                                            <label for="" class="col-md-3 col-form-label">Pengkhotbah / Pembicara</label>
                                            <div class="col-md-9">
                                              <select name="idpengkhotbah" id="idpengkhotbah" class="form-control select2">
                                                <option value="">Pilih nama pengkhotbah...</option>
                                                <?php 
                                                  $rsPengkhotbah = $this->App->getPengkhotbah();
                                                  if ($rsPengkhotbah->num_rows()>0) {
                                                    foreach ($rsPengkhotbah->result() as $row) {
                                                      echo '
                                                        <option value="'.$row->idpengkhotbah.'">'.$row->namalengkap.'</option>
                                                      ';
                                                    }
                                                  }
                                                ?>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group row required" id="divpenanggungjawab">
                                            <label for="" class="col-md-3 col-form-label">Nama Penanggung Jawab</label>
                                            <div class="col-md-9">
                                              <select name="namapenanggungjawab" id="namapenanggungjawab" class="form-control select2">
                                                <option value="">Pilih nama penanggung jawab...</option>

                                                <?php 
                                                  $rsDepartement = $this->App->getDepartement();
                                                  if ($rsDepartement->num_rows()>0) {
                                                    foreach ($rsDepartement->result() as $row) {
                                                      echo '
                                                        <option value="'.$row->namahead.'">'.$row->namahead.'</option>
                                                      ';
                                                    }
                                                  }
                                                ?>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group row">
                                            <label for="" class="col-md-3 col-form-label">Jumlah Volunteer</label>
                                            <div class="col-md-9">
                                              <input type="number" name="jumlahvolunteer" id="jumlahvolunteer" class="form-control" min="0" placeholder="0">
                                            </div>
                                          </div>

                                          <div class="form-group row">
                                            <label for="" class="col-md-3 col-form-label">Jumlah Jemaat/ Anggot</label>
                                            <div class="col-md-9">
                                              <input type="number" name="jumlahjemaat" id="jumlahjemaat" class="form-control" min="0" placeholder="0">
                                            </div>
                                          </div>

                                          

                                          <div class="form-group row">
                                            <label for="" class="col-md-3 col-form-label">Tipe Pengadaan Acara</label>
                                            <div class="col-md-9">
                                              <div class="row">
                                                <div class="col-12">
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="onsiteOptions" id="onsite1" value="Ya" checked="">
                                                    <label class="form-check-label" for="onsite1">Onsite</label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="onsiteOptions" id="onsite2" value="Tidak">
                                                    <label class="form-check-label" for="onsite2">Online</label>
                                                  </div>
                                                </div>

                                                <div class="col-12 mt-3 shadow" id="divAplikasiDigunakan">
                                                  <div class="form-group row">
                                                    <label for="" class="col-md-3 col-form-label font-weight-bold">Aplikasi Yang di Gunakan <small class="text-danger"><i> *wajib</i></small></label>
                                                    <div class="col-md-9">
                                                      <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="aplikasiDigunakanOptions" id="aplikasiDigunakan1" value="Zoom" checked="">
                                                        <label class="form-check-label" for="aplikasiDigunakan1">Zoom (Live Streaming)</label>
                                                      </div>
                                                      <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="aplikasiDigunakanOptions" id="aplikasiDigunakan2" value="Youtube">
                                                        <label class="form-check-label" for="aplikasiDigunakan2">Youtube (Silahkan Upload Video di Pengaturan Lainnya)</label>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>

                                              </div>
                                            </div>
                                          </div>

                                        </div>
                                      </div>

                                    </div>
                                  </div>

                                </div>
                              </div>
                            </div>



                            <!-- 
                            ##########################################################################################
                                                                  STEP 3 
                            ########################################################################################## 
                          -->
                            <div id="step-3" class="tab-pane" role="tabpanel">

                              

                                <div class="row">
                                  <div class="col-12">
                                    <h4 class="text-gray">Tempat dan Tanggal Pelaksanaan Event <a href="#" class="ml-3" id="btnWaktuDanTempat"><i class="fa fa-plus-circle"></i></a></h4><hr>
                                  </div>

                                  
                                  <div class="col-12 mt-3">
                                    <div class="table-responsive">
                                      <table id="table" class="display" style="width: 100%;">
                                          <thead>
                                              <tr>
                                                  <th style="width: 5%; text-align: center;">No</th>
                                                  <th>idjadwaleventdetail</th>
                                                  <th>tgljadwaleventmulai</th>
                                                  <th>tgljadwaleventselesai</th>
                                                  <th>jammulai</th>
                                                  <th>jamselesai</th>
                                                  <th style="">Tanggal Event</th>
                                                  <th style="">Jam Event</th>
                                                  <th style="">Lokasi Event</th>
                                                  <th style="width: 10%; text-align: center;">Diulang Mingguan</th>
                                                  <th style="width: 5%; text-align: center;">Hapus</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                          </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>


                           </div>




                           <!-- 
                            ##########################################################################################
                                                                  STEP 4 
                            ########################################################################################## 
                          -->
                           <div id="step-4" class="tab-pane" role="tabpanel">
                              <div class="row">
                                <div class="col-12">
                                  <div class="card">
                                    <div class="card-body">
                                      
                                      <div class="row">
                                        
                                        <div class="col-md-4">
                                          <div class="form-group row">
                                            <label for="" class="col-12">Apakah AC Diperlukan?</label>
                                            <div class="col-12">
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="kebutuhanac" id="kebutuhanac1" value="Ya" checked="">
                                                <label class="form-check-label" for="kebutuhanac1">Ya</label>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="kebutuhanac" id="kebutuhanac2" value="Tidak">
                                                <label class="form-check-label" for="kebutuhanac2">Tidak</label>
                                              </div>
                                              
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-md-4">
                                          <div class="form-group row">
                                            <label for="" class="col-12">Apakah Butuh Tikar?</label>
                                            <div class="col-12">
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="kebutuhantikar" id="kebutuhantikar1" value="Ya">
                                                <label class="form-check-label" for="kebutuhantikar1">Ya</label>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="kebutuhantikar" id="kebutuhantikar2" value="Tidak" checked="">
                                                <label class="form-check-label" for="kebutuhantikar2">Tidak</label>
                                              </div>
                                              
                                            </div>
                                          </div>
                                        </div>


                                        <div class="col-md-6">
                                          <div class="row">

                                            <div class="col-12 mt-3">
                                              <div class="card">
                                                <div class="card-body shadow-sm">
                                                  <div class="row">
                                                    <div class="col-12">
                                                      <h5><i class="fas fa-chevron-right"></i> Pelayanan Yang Diperlukan? <a href="#" class="ml-3" id="btnPelayananYangDiperlukan"><i class="fa fa-plus-circle"></i></a></h5>
                                                    </div>
                                                    <div class="col-12">
                                                      <table class="table table-jadwal-detail" id="tablePelayanan">
                                                        <tbody>
                                                        </tbody>
                                                      </table>

                                                    </div>
                                                    <!-- <div class="col-12">
                                                      <span>Tidak ada.</span>
                                                    </div> -->
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                            <div class="col-12 mt-3">
                                              <div class="card">
                                                <div class="card-body shadow-sm">
                                                  <div class="row">
                                                    <div class="col-12">
                                                      <h5><i class="fas fa-chevron-right"></i> Apakah Ada Kebutuhan Inventaris? <a href="#" class="ml-3" id="btnInventarisYangDiperlukan"><i class="fa fa-plus-circle"></i></a></h5>
                                                    </div>
                                                    <div class="col-12">
                                                      <table class="table table-jadwal-detail" id="tableInventaris">
                                                        <tbody>
                                                        </tbody>
                                                      </table>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                          </div>
                                        </div>

                                        <div class="col-md-6">
                                          <div class="row">
                                            
                                            <div class="col-12 mt-3">
                                              <div class="card">
                                                <div class="card-body shadow-sm">
                                                  <div class="row">
                                                    <div class="col-12">
                                                      <h5><i class="fas fa-chevron-right"></i> Apakah Ruangan Yang Lain Diperlukan? <a href="#" class="ml-3" id="btnRuanganYangDiperlukan"><i class="fa fa-plus-circle"></i></a></h5>
                                                    </div>
                                                    <div class="col-12">
                                                      <table class="table table-jadwal-detail" id="tableRuangan">
                                                        <tbody>
                                                        </tbody>
                                                      </table>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                            <div class="col-12 mt-3">
                                              <div class="card">
                                                <div class="card-body shadow-sm">
                                                  <div class="row">
                                                    <div class="col-12">
                                                      <h5><i class="fas fa-chevron-right"></i> Apakah Membutuhkan Parkiran <a href="#" class="ml-3" id="btnParkiranYangDiperlukan"><i class="fa fa-plus-circle"></i></a></h5>
                                                    </div>
                                                    <div class="col-12" id="">
                                                      <table class="table table-jadwal-detail" id="tableParkiran">
                                                        <tbody>
                                                        </tbody>
                                                      </table>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                          </div>
                                        </div>


                                        



                                      </div>


                                    </div>
                                  </div>
                                </div>
                              </div>
                           </div>




                           <!-- 
                            ##########################################################################################
                                                                  STEP 5 
                            ########################################################################################## 
                          -->
                           
                           <div id="step-5" class="tab-pane" role="tabpanel">
                              <div class="row">
                                <div class="col-12">
                                  <div class="card">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-12">
                                          
                                          <div class="form-group row">
                                            <label for="" class="col-md-3 col-form-label">Youtube Streming Embed</label>
                                            <div class="col-md-9">
                                              <input type="text" name="streamingurl" id="streamingurl" class="form-control" placeholder="https://www.youtube.com/embed/oOAojpLlwkA">
                                            </div>
                                          </div> 

                                          <div class="form-group row">
                                            <label for="" class="col-md-3 col-form-label">Diumumkan Ke Jemaat</label>
                                            <div class="col-md-9">
                                              <div class="row">
                                                <div class="col-12">
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="diumumkanKeJemaatOptions" id="diumumkanKeJemaat1" value="Ya">
                                                    <label class="form-check-label" for="diumumkanKeJemaat1">Ya</label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="diumumkanKeJemaatOptions" id="diumumkanKeJemaat2" value="Tidak" checked="">
                                                    <label class="form-check-label" for="diumumkanKeJemaat2">Tidak</label>
                                                  </div>
                                                </div>
                                                <div class="col-12 shadow mt-3" id="divpengumumandetail">
                                                  <div class="row">
                                                    
                                                    <div class="col-12">
                                                      <div class="form-group row">
                                                        <label for="" class="col-md-5 col-form-label">Tgl Acara Mulai Diumumkan</label>
                                                        <div class="col-md-7">
                                                          <input type="date" name="tglmulaidiumumkan" id="tglmulaidiumumkan" class="form-control">
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-12">
                                                      <div class="form-group row">
                                                        <label for="" class="col-md-5 col-form-label">Tgl Acara Selesai Diumumkan</label>
                                                        <div class="col-md-7">
                                                          <input type="date" name="tglselesaidiumumkan" id="tglselesaidiumumkan" class="form-control">
                                                        </div>
                                                      </div>
                                                    </div>

                                                    <div class="col-12">
                                                      <div class="form-group row">
                                                        <label for="" class="col-md-5 col-form-label">Pengumuman Disampaikan Melalui</label>
                                                        <div class="col-md-7">
                                                          <?php  
                                                            $rsPengumuman = $this->App->getJenisPengumuman();
                                                            if ($rsPengumuman->num_rows()>0) {

                                                              foreach ($rsPengumuman->result() as $rowPengumuman) {

                                                                echo '
                                                                  <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="idjenispengumuman" id="idjenispengumuman'.$rowPengumuman->idjenispengumuman.'" value="'.$rowPengumuman->idjenispengumuman.'">
                                                                    <label class="form-check-label" for="idjenispengumuman'.$rowPengumuman->idjenispengumuman.'">'.$rowPengumuman->namajenispengumuman.'</label>
                                                                  </div>
                                                                ';
                                                              }
                                                            }
                                                          ?>
                                                        </div>
                                                      </div>
                                                    </div>

                                                    <!--<div class="col-12">
                                                      <div class="form-group row">
                                                        <label for="" class="col-md-5 col-form-label">Pengumuman Disampaikan Melalui</label>
                                                        <div class="col-md-7">
                                                          <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pengumumanDisampaikanMelaluiOptions" id="pengumumanDisampaikanMelalui1" value="Via ESC News" checked="">
                                                            <label class="form-check-label" for="pengumumanDisampaikanMelalui1">Via ESC News</label>
                                                          </div>
                                                          <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pengumumanDisampaikanMelaluiOptions" id="pengumumanDisampaikanMelalui2" value="Via Instagram">
                                                            <label class="form-check-label" for="pengumumanDisampaikanMelalui2">Via Instagram</label>
                                                          </div>
                                                          <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pengumumanDisampaikanMelaluiOptions" id="pengumumanDisampaikanMelalui3" value="Via Live di ibadah minggu melalui MC">
                                                            <label class="form-check-label" for="pengumumanDisampaikanMelalui3">Via Live di ibadah minggu melalui MC</label>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div> -->

                                                    <div class="col-12">
                                                      <div class="form-group row">
                                                        <label for="" class="col-md-5 col-form-label">Konsep Pengumuman</label>
                                                        <div class="col-md-7">
                                                          <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="konsepPengumumanOptions" id="konsepPengumuman1" value="Slide" checked="">
                                                            <label class="form-check-label" for="konsepPengumuman1">Slide</label>
                                                          </div>
                                                          <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="konsepPengumumanOptions" id="konsepPengumuman2" value="Slide + Audio">
                                                            <label class="form-check-label" for="konsepPengumuman2">Slide + Audio</label>
                                                          </div>
                                                          <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="konsepPengumumanOptions" id="konsepPengumuman3" value="Filming">
                                                            <label class="form-check-label" for="konsepPengumuman3">Filming</label>
                                                          </div>
                                                          <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="konsepPengumumanOptions" id="konsepPengumuman4" value="Flyer">
                                                            <label class="form-check-label" for="konsepPengumuman4">Flyer</label>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>

                                                    <div class="col-12">
                                                      <div class="form-group row">
                                                        <label for="" class="col-md-5 col-form-label">Detail Konsep Pengumuman</label>
                                                        <div class="col-md-7">
                                                          <textarea name="detailKonsepPengumuman" id="detailKonsepPengumuman" rows="4" class="form-control" placeholder="Detail konsep pengumuman"></textarea>
                                                        </div>
                                                      </div>
                                                    </div>

                                                  </div>
                                                </div>

                                              </div>
                                            </div>
                                          </div>

                                          <div class="form-group row" >
                                            <label for="" class="col-md-3 col-form-label">Tampilkan di Website Gereja</label>
                                            <div class="col-md-9">
                                              <div class="col-12">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="tampilkanDiWebsiteOptions" id="tampilkanDiWebsite1" value="Ya">
                                                  <label class="form-check-label" for="tampilkanDiWebsite1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="tampilkanDiWebsiteOptions" id="tampilkanDiWebsite2" value="Tidak" checked="">
                                                  <label class="form-check-label" for="tampilkanDiWebsite2">Tidak</label>
                                                </div>
                                              </div>

                                              <div class="col-12 mt-3 shadow" id="divtampildifront">
                                                <div class="row">
                                                  
                                                  <div class="col-12">
                                                    <div class="form-group row required">
                                                      <label for="" class="col-md-3 col-form-label">Gambar Sampul</label>
                                                      <div class="col-md-9">
                                                        <input type="file" name="foto" id="foto" value="foto"><br>
                                                        <a href="" id="foto_link" target="_blank"></a>
                                                        <input type="hidden" name="foto_lama" id="foto_lama" value="foto_lama">
                                                      </div>
                                                    </div> 
                                                  </div>

                                                  <div class="col-12">
                                                    <div class="form-group row required">
                                                      <label for="" class="col-md-3 col-form-label">Deskripsi Event</label>
                                                      <div class="col-md-9">
                                                        <div class="row">
                                                          <div class="col-12">
                                                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" placeholder="Berikan deskripsi Jadwal"></textarea>
                                                          </div>
                                                          <div class="col-12 text-sm text-info">
                                                            *Deskripsi ini tampil di halaman website jemaat dan pengunjung
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>

                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="form-group row">
                                            <label for="" class="col-md-3 col-form-label">Tampilkan Form Pendaftaran Untuk Jemaat</label>
                                            <div class="col-md-9">
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jemaatPendaftaranOptions" id="jemaatPendaftaran1" value="Ya">
                                                <label class="form-check-label" for="jemaatPendaftaran1">Ya</label>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jemaatPendaftaranOptions" id="jemaatPendaftaran2" value="Tidak" checked="">
                                                <label class="form-check-label" for="jemaatPendaftaran2">Tidak</label>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="form-group row">
                                            <label for="" class="col-md-3 col-form-label">Apakah Ada Hal Lain Yang Ingin Disampaikan Kepada Team Even?</label>
                                            <div class="col-md-9">
                                              <textarea name="halYangDisampaian" id="halYangDisampaian" class="form-control" rows="5" placeholder="Masukkan hal yang ingin disampaikan kepada team even disini"></textarea>
                                            </div>

                                          </div>

                                          <div class="form-group row">
                                            <label for="" class="col-md-3 col-form-label">Run Down</label>
                                            <div class="col-md-9">
                                              <textarea name="rundown" id="rundown" class="form-control" rows="4" class="form-control" placeholder="Tolong formatnya disamakan. 06.00 - 06.05 : Doa Pembuka."></textarea>
                                            </div>
                                          </div>

                                          


                                        </div>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                           </div>


                        </div>
                      </div>

                    </div>
                    
                    
                  </div> <!-- row -->

                  




              </div> <!-- ./card-body -->

              <!-- <div class="card-footer">
                <button type="button" class="btn btn-primary float-right" id="btnSimpan"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo(site_url('pengajuanjadwal')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
              </div> -->
            </div> <!-- /.card -->
          </div> <!-- /.col -->

          <div class="col-md-4">
            

          </div>
        </div>





    </div>
  </div> <!-- /.row -->
  <!-- Main row -->




<?php $this->load->view("template/footer") ?>


<?php $this->load->view('pengajuanjadwal/modalkelengkapan'); ?>
<?php $this->load->view('pengajuanjadwal/modalwaktudantempat'); ?>


 <!-- CSS -->
<link href="<?php echo base_url('assets/smartwizard/') ?>smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
 <!-- JavaScript -->
<script src="<?php echo base_url('assets/smartwizard/') ?>jquery.smartWizard.min.js" type="text/javascript"></script>


<script type="text/javascript">
  
  var idjadwalevent = "<?php echo($idjadwalevent) ?>";


  //smart wizard configurations                             
    $('#smartwizard').smartWizard({
      selected: 0, // Initial selected step, 0 = first step
      theme: 'arrows', // theme for the wizard, related css need to include for other than default theme
      justified: true, // Nav menu justification. true/false
      autoAdjustHeight: false, // Automatically adjust content height
      backButtonSupport: true, // Enable the back button support
      enableUrlHash: false, // Enable selection of the step based on url hash
      transition: {
          animation: 'slideSwing', // Animation effect on navigation, none|fade|slideHorizontal|slideVertical|slideSwing|css(Animation CSS class also need to specify)
          speed: '400', // Animation speed. Not used if animation is 'css'
          easing: '', // Animation easing. Not supported without a jQuery easing plugin. Not used if animation is 'css'
          prefixCss: '', // Only used if animation is 'css'. Animation CSS prefix
          fwdShowCss: '', // Only used if animation is 'css'. Step show Animation CSS on forward direction
          fwdHideCss: '', // Only used if animation is 'css'. Step hide Animation CSS on forward direction
          bckShowCss: '', // Only used if animation is 'css'. Step show Animation CSS on backward direction
          bckHideCss: '', // Only used if animation is 'css'. Step hide Animation CSS on backward direction
      },
      toolbar: {
          position: 'bottom', // none|top|bottom|both
          showNextButton: true, // show/hide a Next button
          showPreviousButton: true, // show/hide a Previous button
          extraHtml: `<button class="btn btn-secondary" onclick="onCancel()">Batal</button>
          <button class="btn btn-success btnSelesai" onclick="onFinish()">Selesai</button>` // Extra html to show on toolbar
      },
      anchor: {
          enableNavigation: true, // Enable/Disable anchor navigation 
          enableNavigationAlways: false, // Activates all anchors clickable always
          enableDoneState: true, // Add done state on visited steps
          markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
          unDoneOnBackNavigation: false, // While navigate back, done state will be cleared
          enableDoneStateNavigation: true // Enable/Disable the done state navigation
      },
      keyboard: {
          keyNavigation: true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
          keyLeft: [37], // Left key code
          keyRight: [39] // Right key code
      },
      lang: { // Language variables for button
          next: 'Berikutnya',
          previous: 'Sebelumnya'
      },
      disabledSteps: [], // Array Steps disabled
      errorSteps: [], // Array Steps error
      warningSteps: [], // Array Steps warning
      hiddenSteps: [], // Hidden steps
      getContent: null // Callback function for content loading
    });

  $(document).ready(function() {

    $('.select2').select2();
    // $('#divpengumumandetail').hide();
      $('#divpengumumandetail').fadeOut();
      $('#divtampildifront').fadeOut();
      $('#divpengkhotbah').fadeOut();
      $('#divAplikasiDigunakan').fadeOut();
$('input[type=radio][name=jenisjadwal]').change();

    //---------------------------------------------------------> JIKA EDIT DATA
    if ( idjadwalevent != "" ) {  //edit (ada isi idjadwalevent)

          $.ajax({
              type        : 'POST', 
              url         : '<?php echo site_url("pengajuanjadwal/get_edit_data") ?>', 
              data        : {'idjadwalevent': idjadwalevent}, 
              dataType    : 'json', 
              encode      : true
          })      
          .done(function(result) {
            console.log(result);
            $("#idjadwalevent").val(result.idjadwalevent).trigger('change');

            var els = document.getElementsByName("jenisjadwal");
            for (var i = 0; i < els.length; i++){
              var ovalue = els[i].value;
              var oid = els[i].id;
              if (ovalue==result.jenisjadwal) {
                  $('#'+oid).prop('checked', true);
                  $('#'+oid).trigger('change');
              }
            }
                  
            $('#namaevent').val(result.namaevent);
            $('#deskripsi').val(result.deskripsi);
            $('#namapenanggungjawab').val(result.namapenanggungjawab).trigger('change');
            $('#foto_lama').val(result.gambarsampul);
            $('#foto_link').html(result.gambarsampul);
            $('#foto_link').attr('href', "<?php echo base_url('uploads/pengajuanjadwal/') ?>"+result.gambarsampul);
            $('#iddepartement').val(result.iddepartement).trigger('change');
            $('#idpengkhotbah').val(result.idpengkhotbah).trigger('change');
            $('#streamingurl').val(result.streamingurl);
            $('#tema').val(result.tema);
            $('#subtema').val(result.subtema);

            if (result.harusdaftar=='1') {
              $('#jemaatPendaftaran1').prop("checked", true);
            }else{
              $('#jemaatPendaftaran2').prop("checked", true);
            }
            $('#jumlahvolunteer').val(result.jumlahvolunteer);
            $('#jumlahjemaat').val(result.jumlahjemaat);
            
            if (result.onsitestatus=='Ya') {
              $('#onsite1').prop('checked', true);
            }else{
              $('#onsite2').prop('checked', true);
            }

            if (result.aplikasidigunakan=='Zoom') {
              $('#aplikasiDigunakan1').prop('checked', true);
            }else{
              $('#aplikasiDigunakan2').prop('checked', true);
            }

            if (result.diumumkankejemaat=='Ya') {
              $('#diumumkanKeJemaat1').prop('checked', true).trigger('change');
            }else{
              $('#diumumkanKeJemaat2').prop('checked', true).trigger('change');
            }

            if (result.tglmulaidiumumkan!='' && result.tglmulaidiumumkan!=null) {
              $('#tglmulaidiumumkan').val(tglymd(result.tglmulaidiumumkan));
            }

            if (result.tglselesaidiumumkan!='' && result.tglselesaidiumumkan!=null) {
              $('#tglselesaidiumumkan').val(tglymd(result.tglselesaidiumumkan));
            }

            switch(result.konseppengumuman) {
              case 'Slide + Audio':
                $('#konsepPengumuman2').prop('checked', true);
                break;
              case 'Filming':
                $('#konsepPengumuman3').prop('checked', true);
                break
              case 'Flyer':
                $('#konsepPengumuman4').prop('checked', true);
                break;
              default:
                $('#konsepPengumuman1').prop('checked', true);
            }   

            $('#detailKonsepPengumuman').val(result.detailkonseppengumuman);

            if (result.tampilkandiwebsite=='Ya') {
              $('#tampilkanDiWebsite1').prop('checked', true).trigger('change');
            }else{
              $('#tampilkanDiWebsite2').prop('checked', true).trigger('change');
            }
            $('#halYangDisampaian').val(result.halyangdisampaian);
            $('#rundown').val(result.rundown);
            $('#idkelas').val(result.idkelas).trigger('change');            


            if (result.rsPelayanan.length>0) {
              $('#tablePelayanan tbody').empty();
              var nomor = 1;
              for (var i = 0; i < result.rsPelayanan.length; i++) {

                var addText = `<tr>
                        <td style="width: 5%; text-align: center;"><a href="#" class="btnmodal-removepelayanan"><i class="fa fa-trash text-danger"></i></a></td>
                        <td style="width: 5%; text-align: left;">`+nomor+`.</td>
                        <td style="width: 5%; text-align: left; display: none;">`+result.rsPelayanan[i]['idpelayanan']+`</td>
                        <td><input type="hidden" id="textIdPelayanan`+nomor+`" value="`+result.rsPelayanan[i]['idpelayanan']+`">`+result.rsPelayanan[i]['namapelayanan']+`</td>
                      </tr>`;
        
                $('#tablePelayanan tbody').append(addText);
                nomor++;
              }
            }


            if (result.rsRuangan.length>0) {
              $('#tableRuangan tbody').empty();
              var nomor = 1;
              for (var i = 0; i < result.rsRuangan.length; i++) {

                var addText = `<tr>
                    <td style="width: 5%; text-align: center;"><a href="#" class="btnmodal-removeruangan"><i class="fa fa-trash text-danger"></i></a></td>
                    <td style="width: 5%; text-align: left;">`+nomor+`.</td>
                    <td style="display: none;">`+result.rsRuangan[i]['idruangan']+`</td>
                    <td><input type="hidden" id="textidruangan`+nomor+`" value="`+result.rsRuangan[i]['idruangan']+`">`+result.rsRuangan[i]['namaruangan']+`</td>
                  </tr>`;
    
                $('#tableRuangan tbody').append(addText);
                nomor++;
              }
            }


            if (result.rsInventaris.length>0) {
              $('#tableInventaris tbody').empty();
              var nomor = 1;
              for (var i = 0; i < result.rsInventaris.length; i++) {

                
                var addText = `<tr>
                    <td style="width: 5%; text-align: center;"><a href="#" class="btnmodal-removeinventaris"><i class="fa fa-trash text-danger"></i></a></td>
                    <td style="width: 5%; text-align: left;">
                      <input type="hidden" id="textqtyinventaris`+nomor+`" value="`+result.rsInventaris[i]['qty']+`">
                      `+nomor+`.
                    </td>
                    <td style="display: none;">`+result.rsInventaris[i]['idinventaris']+`</td>
                    <td style="display: none;">`+result.rsInventaris[i]['qty']+`</td>
                    <td>
                        <input type="hidden" id="textidinventaris`+nomor+`" value="`+result.rsInventaris[i]['idinventaris']+`">
                        `+result.rsInventaris[i]['namainventaris']+` (`+result.rsInventaris[i]['qty']+` `+result.rsInventaris[i]['satuan']+`)
                    </td>
                  </tr>`;
    
                $('#tableInventaris tbody').append(addText);

                nomor++;
              }
            }

            if (result.rsParkiran.length>0) {
              $('#tableParkiran tbody').empty();
              var nomor = 1;
              for (var i = 0; i < result.rsParkiran.length; i++) {

                
                var addText = `<tr>
                        <td style="width: 5%; text-align: center;"><a href="#" class="btnmodal-removeparkiran"><i class="fa fa-trash text-danger"></i></a></td>
                        <td style="width: 5%; text-align: left;">`+nomor+`.</td>
                        <td style="display: none;">`+result.rsParkiran[i]['idparkiran']+`</td>
                        <td><input type="hidden" class="textidparkiran" id="textidparkiran`+nomor+`" value="`+result.rsParkiran[i]['idparkiran']+`">`+result.rsParkiran[i]['namaparkiran']+`</td>
                      </tr>`;
        
                $('#tableParkiran tbody').append(addText);
                nomor++;
              }
            }


            if (result.rsJenisPengumuman.length>0) {
              for (var i = 0; i < result.rsJenisPengumuman.length; i++) {
                $('#idjenispengumuman'+result.rsJenisPengumuman[i]['idjenispengumuman']).prop('checked', true);
              }
            }


            


          }); 


          $("#lblactive").html("Edit Jadwal Event");
      

    }else{
          // $('#jenisjadwal').val('Event').trigger('change');
          $("#lblactive").html("Tambah Jadwal Event");
    }     




    
    


    table = $('#table').DataTable({ 
        "select": true,
        "processing": true, 
        "ordering": false,
        "bPaginate": false,      
        "searching": false,  
        "bInfo" : false, 
         "ajax"  : {
                  "url": "<?php echo site_url('pengajuanjadwal/datatablejadwalevendetail')?>",
                  "dataType": "json",
                  "type": "POST",
                  "data": {"idjadwalevent": '<?php echo($idjadwalevent) ?>'}
              },
        "columnDefs": [
        { "targets": [ 0 ], "className": 'dt-body-center',},
        { "targets": [ 1 ], "className": 'dt-body-left', "visible": false},
        { "targets": [ 2 ], "className": 'dt-body-left', "visible": false},
        { "targets": [ 3 ], "className": 'dt-body-left', "visible": false},
        { "targets": [ 4 ], "className": 'dt-body-left', "visible": false},
        { "targets": [ 5 ], "className": 'dt-body-left', "visible": false},
        { "targets": [ 6 ], "className": 'dt-body-left'},
        { "targets": [ 7 ], "className": 'dt-body-left'},
        { "targets": [ 8 ], "className": 'dt-body-left'},
        { "targets": [ 9 ], "className": 'dt-body-center'},
        { "targets": [ 10 ], "orderable": false, "className": 'dt-body-center'},
        ],
 
    });

    $('#table tbody').on( 'click', 'span', function () {
        table
            .row( $(this).parents('tr') )
            .remove()
            .draw();
    });


    cekTablePelayanan();
    cekTableRuangan();
    cekTableInventaris();
    cekTableParkiran();

    $("form").attr('autocomplete', 'off');
    $("#rtrw").mask("000/000", {placeholder:"000/000"});
  }); //end (document).ready
  

  $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {

      var form_data = $("#form"+ stepNumber).serialize();
      // console.log(stepNumber);
      // console.log(stepDirection);

      if (stepNumber==0) {
        return true;
      }

      if (stepNumber==1) {
        if (stepDirection==2) {         
          var namaevent = $('#namaevent').val();
          var iddepartement = $('#iddepartement').val();
          var namapenanggungjawab = $('#namapenanggungjawab').val();
          var onsitestatus = $('input[type=radio][name=onsiteOptions]').val();
          var aplikasiDigunakanOptions = $('input[type=radio][name=aplikasiDigunakanOptions]').val();

          if (namaevent=="") {
          swal("Informasi", "Nama event tidak boleh kosong!", "info")
          .then(function(){
            $('#namaevent').focus();
          });
          return false;
          } 

          if (iddepartement=="") {
          swal("Informasi", "Nama departemen tidak boleh kosong!", "info")
          .then(function(){
            $('#iddepartement').focus();
          });;
          return false;
          } 

          if (namapenanggungjawab=="") {
          swal("Informasi", "Nama penanggungjawab event tidak boleh kosong!", "info")
          .then(function(){
            $('#namapenanggungjawab').focus();
          });;
          return false;
          } 

          if (onsitestatus=="Tidak") {

            if (aplikasiDigunakanOptions=="") {
              swal("Informasi", "Aplikasi yang digunakan tidak boleh kosong!", "info");
              return false;
              }
          } 

          return true;
        }else{
          return true;
        }
      }



      if (stepNumber==2) {
        if (stepDirection==3) {  
          if ( ! table.data().count() ) {
              swal("Detail Tempat dan Tanggal!", "Detail tempat dan tanggal belum ada.", "info");
              return false;
          }
        }
        return true;
      }

      if (stepNumber==3) {
        return true;
      }

      if (stepNumber==4) {
        return true;        
      }

      return false;

    });

  function onFinish() {
    
    var idjadwalevent       = $("#idjadwalevent").val();

    //---------------> step-1
    var jenisjadwal = $('input[type=radio][name=jenisjadwal]:checked').val();

    //---------------> step-2
    var namaevent       = $("#namaevent").val();
    var tema = $('#tema').val();
    var subtema = $('#subtema').val();
    var idkelas       = $("#idkelas").val();
    var iddepartement       = $("#iddepartement").val();
    var idpengkhotbah = $('#idpengkhotbah').val();
    var namapenanggungjawab       = $("#namapenanggungjawab").val();
    var jumlahvolunteer = $('#jumlahvolunteer').val();
    var jumlahjemaat = $('#jumlahjemaat').val();
    var onsitestatus = $('input[type=radio][name=onsiteOptions]').val();
    var aplikasiDigunakanOptions = $('input[type=radio][name=aplikasiDigunakanOptions]:checked').val();


    //---------------> step-3
    var isidatatable = table.data().toArray();
    

    //---------------> step-4
    if ( $('#tablePelayanan tbody tr').length==1 && $('#textIdPelayanan1').val()==undefined ) {
      $('#tablePelayanan tbody tr').remove();
    }
    if ( $('#tableInventaris tbody tr').length==1 && $('#textidinventaris1').val()==undefined ) {
      $('#tableInventaris tbody tr').remove();
    }
    if ( $('#tableRuangan tbody tr').length==1 && $('#textidruangan1').val()==undefined ) {
      $('#tableRuangan tbody tr').remove();
    }
    if ( $('#tableParkiran tbody tr').length==1 && $('#textidparkiran1').val()==undefined ) {
      $('#tableParkiran tbody tr').remove();
    }

    var kebutuhanac = $('input[type=radio][name=kebutuhanac]:checked').val();
    var kebutuhantikar = $('input[type=radio][name=kebutuhantikar]:checked').val();
    var tablePelayanan = Array.prototype.map.call(document.querySelectorAll('#tablePelayanan tr'), function(tr){
    return Array.prototype.map.call(tr.querySelectorAll('td'), function(td){
      return td.innerHTML;
      });
    });
    var tableInventaris = Array.prototype.map.call(document.querySelectorAll('#tableInventaris tr'), function(tr){
    return Array.prototype.map.call(tr.querySelectorAll('td'), function(td){
      return td.innerHTML;
      });
    });
    var tableRuangan = Array.prototype.map.call(document.querySelectorAll('#tableRuangan tr'), function(tr){
    return Array.prototype.map.call(tr.querySelectorAll('td'), function(td){
      return td.innerHTML;
      });
    });
    var tableParkiran = Array.prototype.map.call(document.querySelectorAll('#tableParkiran tr'), function(tr){
    return Array.prototype.map.call(tr.querySelectorAll('td'), function(td){
      return td.innerHTML;
      });
    });

    

    //---------------> step-5
    var streamingurl = $('#streamingurl').val();
    var diumumkanKeJemaatOptions       = $('input[type=radio][name=diumumkanKeJemaatOptions]:checked').val();
    var tglmulaidiumumkan = $('#tglmulaidiumumkan').val();
    var tglselesaidiumumkan = $('#tglselesaidiumumkan').val();
    // var pengumumanDisampaikanMelaluiOptions       = $('input[type=radio][name=pengumumanDisampaikanMelaluiOptions]:checked').val();
    var pengumumanDisampaikanMelaluiOptions = '';
    var konsepPengumumanOptions       = $('input[type=radio][name=konsepPengumumanOptions]:checked').val();
    var detailKonsepPengumuman = $('#detailKonsepPengumuman').val();
    var tampilkanDiWebsiteOptions       = $('input[type=radio][name=tampilkanDiWebsiteOptions]:checked').val();
    var foto = $('#foto').val();
    var foto_lama = $('#foto_lama').val();
    var deskripsi = $('#deskripsi').val();
    var jemaatPendaftaranOptions       = $('input[type=radio][name=jemaatPendaftaranOptions]:checked').val();
    var halYangDisampaian = $('#halYangDisampaian').val();
    var rundown = $('#rundown').val();

    var jenisPengumuman = [];
    $("input:checkbox[name=idjenispengumuman]:checked").each(function(){
      jenisPengumuman.push($(this).val());
    });

    if (diumumkanKeJemaatOptions=='Ya') {
      var tglmulaidiumumkan = $('#tglmulaidiumumkan').val();
      var tglselesaidiumumkan = $('#tglselesaidiumumkan').val();
      if (tglmulaidiumumkan=="") {
        swal("Tgl Mulai Dimumumkan!", "Tanggal mulai diumumkan belum ada.", "info");
        return false;
      }
      if (tglselesaidiumumkan=="") {
        swal("Tgl Selesai Dimumumkan!", "Tanggal selesai diumumkan belum ada.", "info");
        return false;
      }
      if (jenisPengumuman.length==0) {
        swal("Pengumuman Disampaikan Melalui!", "Pengumuman disampaikan melalui belum dipilih.", "info");
        return false; 
      }
    }

    if (tampilkanDiWebsiteOptions=='Ya') {
      if (foto=="" && foto_lama=="") {
        swal("Gambar Sampul!", "Gambar sampul belum ada.", "info");
        return false;
      }
      if (deskripsi=="") {
        swal("Deskripsi Event!", "Deskripsi event belum ada.", "info");
        return false;
      }
    }

    if (jemaatPendaftaranOptions=='Ya') {
      var harusdaftar = 1;
    }else{
      var harusdaftar = 0;
    }

    var formData = {
            "idjadwalevent"       : idjadwalevent,
            "jenisjadwal"       : jenisjadwal,
            "idkelas"       : idkelas,
            "namaevent"       : namaevent,
            "tema"       : tema,
            "subtema"       : subtema,
            "iddepartement"       : iddepartement,
            "idpengkhotbah"       : idpengkhotbah,
            "namapenanggungjawab"       : namapenanggungjawab,
            "jumlahvolunteer"       : jumlahvolunteer,
            "jumlahjemaat"       : jumlahjemaat,
            "onsitestatus"       : onsitestatus,
            "aplikasiDigunakanOptions"       : aplikasiDigunakanOptions,
            "isidatatable"    : isidatatable,
            "tableRuangan"    : tableRuangan,
            "tableInventaris"    : tableInventaris,
            "tableParkiran"    : tableParkiran,
            "tablePelayanan"    : tablePelayanan,
            "streamingurl"       : streamingurl,
            "diumumkanKeJemaatOptions"       : diumumkanKeJemaatOptions,
            "tglmulaidiumumkan"       : tglmulaidiumumkan,
            "tglselesaidiumumkan"       : tglselesaidiumumkan,
            "pengumumanDisampaikanMelaluiOptions"       : pengumumanDisampaikanMelaluiOptions,
            "jenisPengumuman"       : jenisPengumuman,
            "konsepPengumumanOptions"       : konsepPengumumanOptions,
            "detailKonsepPengumuman"       : detailKonsepPengumuman,
            "tampilkanDiWebsiteOptions"       : tampilkanDiWebsiteOptions,
            "foto"       : foto,
            "deskripsi"       : deskripsi,
            "harusdaftar"       : harusdaftar,
            "halYangDisampaian"       : halYangDisampaian,
            "rundown"       : rundown,
        };


      $.ajax({
                type        : 'POST', 
                url         : '<?php echo site_url("pengajuanjadwal/simpanjadwalevent") ?>', 
                data        : formData, 
                dataType    : 'json', 
                encode      : true,
            })
            .done(function(simpanjadwaleventResult){

                console.log(simpanjadwaleventResult);

                if (simpanjadwaleventResult.success) {
                    swal({
                      title: "Simpan Berhasil?",
                      text: "Data berhasil disimpan",
                      icon: "success",
                    })
                    .then((willDelete) => {
                      window.location.href = "<?php echo(site_url('pengajuanjadwal')) ?>";
                    });
                    
                }else{
                  console.log(simpanjadwaleventResult.msg);
                  // swal("Gagal Simpan!", "Data gagal disimpan.", "info");
                }
            })
            .fail(function(){
                swal("Gagal!", "Script erorr.", "info");
            });

  }


  $('input[type=radio][name=jenisjadwal]').change(function(e) {
    e.preventDefault();
    jenisjadwal = $('input[type=radio][name=jenisjadwal]:checked').val();
    // jenisjadwal = $(this).val();
    console.log(jenisjadwal);

    $('#divkelas').hide();


    if (jenisjadwal=='Jadwal Ibadah') {
      $('#divtema').show();
      $('#divsubtema').show();
      $('#divpengkhotbah').show();
      $('#divpenanggungjawab').hide();
      $('#divharusdaftar').hide();
      $('#divdepartemen').hide();
    }

    if (jenisjadwal=='Event') {
      $('#divtema').hide();
      $('#divsubtema').hide();
      $('#divpengkhotbah').hide();
      $('#divpenanggungjawab').show();
      $('#divharusdaftar').show();
      $('#divdepartemen').show();
    }

    if (jenisjadwal=='Kelas Next Step') {
      $('#divtema').hide();
      $('#divsubtema').hide();
      $('#divpengkhotbah').hide();
      $('#divpenanggungjawab').show();
      $('#divharusdaftar').show();
      $('#divdepartemen').show();
      $('#divkelas').show();
    }


  });

  $('#btnPelayananYangDiperlukan').click(function(e) {
    e.preventDefault();
    $('#modalkelengkapan').modal('show');
    loadDataKelengkapan('Pelayanan');
  });

  $('#btnRuanganYangDiperlukan').click(function(e) {
    e.preventDefault();
    $('#modalkelengkapan').modal('show');
    loadDataKelengkapan('Ruangan');
  });

  $('#btnInventarisYangDiperlukan').click(function(e) {
    e.preventDefault();
    $('#modalkelengkapan').modal('show');
    loadDataKelengkapan('Inventaris');
  });

  $('#btnParkiranYangDiperlukan').click(function(e) {
    e.preventDefault();
    $('#modalkelengkapan').modal('show');
    loadDataKelengkapan('Parkiran');
  });

  $('#btnWaktuDanTempat').click(function(e) {
    e.preventDefault();
    $('#modalwaktudantempat').modal('show');
    loadDataWaktuDanTempat();
  });


  


  $(document).on("click", ".btnmodal-removepelayanan", function(e) {
    e.preventDefault();
    $(this).parent().parent().remove();
    cekTablePelayanan();
  }); 

  $(document).on("click", ".btnmodal-removeruangan", function(e) {
    e.preventDefault();
    $(this).parent().parent().remove();
    cekTableRuangan();
  });  

  $(document).on("click", ".btnmodal-removeinventaris", function(e) {
    e.preventDefault();
    $(this).parent().parent().remove();
    cekTableInventaris();
  });  

  $(document).on("click", ".btnmodal-removeparkiran", function(e) {
    e.preventDefault();
    $(this).parent().parent().remove();
    cekTableParkiran();
  });  

  function cekTablePelayanan() {
    if ($('#tablePelayanan tbody tr').length==0) {
      var addText = `<tr>
                    <td style="width: 100%; text-align: left; font-size: 12px; color: #000000; font-weight: normal;" colspan="3"><i>Tidak ada</i></td>
                  </tr>`;  
      $('#tablePelayanan tbody').append(addText);
    }
  }

  function cekTableRuangan() {
    if ($('#tableRuangan tbody tr').length==0) {
      var addText = `<tr>
                    <td style="width: 100%; text-align: left; font-size: 12px; color: #000000; font-weight: normal;" colspan="3"><i>Tidak ada</i></td>
                  </tr>`;  
      $('#tableRuangan tbody').append(addText);
    }
  }

  function cekTableInventaris() {
    // console.log('cekTableInventaris');
    // console.log($('#tableInventaris tbody tr').length);

    if ($('#tableInventaris tbody tr').length==0) {
      var addText = `<tr>
                    <td style="width: 100%; text-align: left; font-size: 12px; color: #000000; font-weight: normal;" colspan="3"><i>Tidak ada</i></td>
                  </tr>`;  
      $('#tableInventaris tbody').append(addText);
    }
  }


  function cekTableParkiran() {

    if ($('#tableParkiran tbody tr').length==0) {
      var addText = `<tr>
                    <td style="width: 100%; text-align: left; font-size: 12px; color: #000000; font-weight: normal;" colspan="3"><i>Tidak ada</i></td>
                  </tr>`;  
      $('#tableParkiran tbody').append(addText);
    }
  }


  $('#diumumkanKeJemaat1').change(function(e) {
    if ($(this).prop('checked')) {
      diumumkanKeJemaat('Ya');
    }else{
      diumumkanKeJemaat('Tidak');
    }
  });
  $('#diumumkanKeJemaat2').change(function(e) {
    if ($(this).prop('checked')) {
      diumumkanKeJemaat('Tidak');
    }else{
      diumumkanKeJemaat('Ya');
    }
  });

  function diumumkanKeJemaat(vardiumumkankejemaat)
  {
    if (vardiumumkankejemaat=='Ya') {
      $('#divpengumumandetail').fadeIn('slow');
    }else{
      $('#divpengumumandetail').fadeOut();
    }
  }


  $('#tampilkanDiWebsite1').change(function(e) {
    if ($(this).prop('checked')) {
      tampilkanDiWebSite('Ya');
    }else{
      tampilkanDiWebSite('Tidak');
    }
  });

  $('#tampilkanDiWebsite2').change(function(e) {
    if ($(this).prop('checked')) {
      tampilkanDiWebSite('Tidak');
    }else{
      tampilkanDiWebSite('Ya');
    }
  });


  function tampilkanDiWebSite(vartampilkan)
  {
    console.log(vartampilkan);
    if (vartampilkan=='Ya') {
      $('#divtampildifront').fadeIn('slow');
    }else{
      $('#divtampildifront').fadeOut('slow');
    }
  }


  $('input[type=radio][name=jenisjadwal]').change(function() {
      var vString = this.value;
      if (vString=='Doa Bersama' || vString=='Meeting' || vString=='Ibadah Jemaat') {
        $('#divpengkhotbah').fadeIn();
      }else{
        $('#divpengkhotbah').fadeOut();
      }

  });

  $('input[type=radio][name=onsiteOptions]').change(function() {
      var vString = this.value;
      if (vString=='Ya') {
        $('#divAplikasiDigunakan').fadeOut();
      }else{
        $('#divAplikasiDigunakan').fadeIn();
      }

  });

  

</script>


</body>
</html>
