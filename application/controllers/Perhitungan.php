<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Perhitungan extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Perhitungan_model');
        }

        public function index()
        {
            if ($this->session->userdata('id_user_level') != "1") {
            ?>
				<script type="text/javascript">
                    alert('Anda tidak berhak mengakses halaman ini!');
                    window.location='<?php echo base_url("Login/home"); ?>'
                </script>
            <?php
			}
			
			if (isset($_POST['hitung'])) {
				if($_POST['metode'] == "moora") {
					$alternatif = $this->Perhitungan_model->get_alternatif();
					$kriteria = $this->Perhitungan_model->get_kriteria();
					
					$this->Perhitungan_model->hapus_pangkat();
					foreach ($alternatif as $keys) {
						foreach ($kriteria as $key){
							$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif,$key->id_kriteria);
							$pangkat = $data_pencocokan['nilai']*$data_pencocokan['nilai'];
							$nilai_pangkat = [
								'id_kriteria' => $key->id_kriteria,
								'nilai' => $pangkat
							];
							$result = $this->Perhitungan_model->insert_nilai_pangkat($nilai_pangkat);
						}
					}
					
					$this->Perhitungan_model->hapus_normalisasi_terbobot();
					foreach ($alternatif as $keys) {
						foreach ($kriteria as $key){
							$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif,$key->id_kriteria);
							$data_pangkat = $this->Perhitungan_model->get_total_pangkat($key->id_kriteria);
							$bobot = $key->bobot;
							
							$hs = $bobot*($data_pencocokan['nilai']/sqrt($data_pangkat['nilai']));
							$hsl = round($hs,4);
							$normalisasi_terbobot = [
								'id_alternatif' => $keys->id_alternatif,
								'jenis' => $key->jenis,
								'nilai' => $hsl
							];
							$result = $this->Perhitungan_model->insert_normalisasi_terbobot($normalisasi_terbobot);
						}
					}
				}
			}
			
			
			$data = [
                'page' => "Perhitungan",
                'kriteria'=> $this->Perhitungan_model->get_kriteria(),
                'alternatif'=> $this->Perhitungan_model->get_alternatif(),
				'maximum'=> $this->Perhitungan_model->get_max(),
				'minimum'=> $this->Perhitungan_model->get_min(),
            ];
			
            $this->load->view('Perhitungan/perhitungan', $data);
        }
		
		public function hasil()
        {
            $data = [
                'page' => "Hasil",
				'hasil_moora'=> $this->Perhitungan_model->get_hasil_moora(),
				'hasil_waspas'=> $this->Perhitungan_model->get_hasil_waspas()
            ];
			
            $this->load->view('Perhitungan/hasil', $data);
        }
    
    }
    
    