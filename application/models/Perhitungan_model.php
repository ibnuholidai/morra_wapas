<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Perhitungan_model extends CI_Model {

        public function get_kriteria()
        {
            $query = $this->db->get('kriteria');
            return $query->result();
        }
        public function get_alternatif()
        {
            $query = $this->db->get('alternatif');
            return $query->result();
        }
		
		public function data_nilai($id_alternatif,$id_kriteria)
		{
			$query = $this->db->query("SELECT * FROM penilaian JOIN sub_kriteria WHERE penilaian.nilai=sub_kriteria.id_sub_kriteria AND penilaian.id_alternatif='$id_alternatif' AND penilaian.id_kriteria='$id_kriteria';");
			return $query->row_array();
		}

		public function get_max_min($id_kriteria)
		{
			$query = $this->db->query("SELECT max(sub_kriteria.nilai) as max, min(sub_kriteria.nilai) as min, sub_kriteria.nilai as nilai, 
			kriteria.jenis FROM `penilaian` 
			JOIN sub_kriteria ON penilaian.nilai=sub_kriteria.id_sub_kriteria 
			JOIN kriteria ON penilaian.id_kriteria=kriteria.id_kriteria 
			WHERE penilaian.id_kriteria='$id_kriteria';");
			return $query->row_array();
		}
		
		public function get_hasil_moora()
        {
			$query = $this->db->query("SELECT * FROM hasil_moora ORDER BY nilai DESC;");
            return $query->result();
        }
		
		public function get_hasil_waspas()
        {
			$query = $this->db->query("SELECT * FROM hasil_waspas ORDER BY nilai DESC;");
            return $query->result();
        }
		
		public function get_hasil_alternatif($id_alternatif)
		{
			$query = $this->db->query("SELECT * FROM alternatif WHERE id_alternatif='$id_alternatif';");
			return $query->row_array();		
		}
		
		public function insert_hasil_waspas($hasil_akhir = [])
        {
            $result = $this->db->insert('hasil_waspas', $hasil_akhir);
            return $result;
        }
		
		public function hapus_hasil_waspas()
        {
            $query = $this->db->query("TRUNCATE TABLE hasil_waspas;");
			return $query;
        }
		public function insert_hasil_moora($hasil_akhir = [])
        {
            $result = $this->db->insert('hasil_moora', $hasil_akhir);
            return $result;
        }
		
		public function hapus_hasil_moora()
        {
            $query = $this->db->query("TRUNCATE TABLE hasil_moora;");
			return $query;
        }
		
		public function insert_nilai_pangkat($nilai_pangkat = [])
        {
            $result = $this->db->insert('nilai_pangkat', $nilai_pangkat);
            return $result;
        }
		
		public function hapus_pangkat()
        {
            $query = $this->db->query("TRUNCATE TABLE nilai_pangkat;");
			return $query;
        }
		
		public function insert_normalisasi_terbobot($normalisasi_terbobot = [])
        {
            $result = $this->db->insert('normalisasi_terbobot', $normalisasi_terbobot);
            return $result;
        }
		
		public function hapus_normalisasi_terbobot()
        {
            $query = $this->db->query("TRUNCATE TABLE normalisasi_terbobot;");
			return $query;
        }
		
		public function get_total_pangkat($id_kriteria)
		{
			$query = $this->db->query("SELECT SUM(nilai) as nilai FROM `nilai_pangkat` WHERE id_kriteria='$id_kriteria';");
			return $query->row_array();
		}

		public function data_max($id_alternatif)
		{
			$query = $this->db->query("SELECT SUM(nilai) as nilai FROM `normalisasi_terbobot` WHERE id_alternatif='$id_alternatif' AND jenis='Benefit'");
			return $query->row_array();
		}
		
		public function data_min($id_alternatif)
		{
			$query = $this->db->query("SELECT SUM(nilai) as nilai FROM `normalisasi_terbobot` WHERE id_alternatif='$id_alternatif' AND jenis='Cost'");
			return $query->row_array();
		}
		
		public function get_max()
		{
			$query = $this->db->query("SELECT * FROM kriteria WHERE jenis='Benefit';");
			return $query->result();
		}
		
		public function get_min()
		{
			$query = $this->db->query("SELECT * FROM kriteria WHERE jenis='Cost';");
			return $query->result();
		}
    }
    