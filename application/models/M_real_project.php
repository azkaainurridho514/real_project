<?php
    class M_real_project extends CI_Model{
        public function getAll(){
            $query=" SELECT * FROM master_barang
             INNER JOIN pengadaan 
             ON master_barang.id_pengadaan = pengadaan.id_pengadaan
             INNER JOIN kondisi
             ON master_barang.id_kondisi = kondisi.id_kondisi 
             INNER JOIN ruangan
             ON master_barang.id_ruangan = ruangan.id_ruangan ";

            $data=$this->db->query($query)->result_array();
            return $data ;
        }
    }
?>