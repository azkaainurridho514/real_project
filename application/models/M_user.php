<?php
class M_user extends CI_Model
{
    function getTabaleMaster(){
        $this->db->get('master_barang')->result_array();
    }

    function insert(){
        $id               = $this->input->post('id');
        $nama_barang      = $this->input->post('nama_barang');
        $satuan           = $this->input->post('satuan');
        $keterangan       = $this->input->post('keterangan');
        $jumlah_pengadaan = $this->input->post('jumlah_pengadaan');
        $jumlah_baik      = $this->input->post('jumlah_baik');
        $jumlah_buruk     = $this->input->post('jumlah_buruk');
        $ruangan          = $this->input->post('ruangan');

        $master_barang = [
            'id_barang' => $id,
            'id_pengadaan' => $id,
            'id_kondisi' => $id,
            'id_ruangan' => 2,
            'nama_barang' => $nama_barang,
            'satuan' => $satuan,
            'keterangan' => $keterangan,
            'gambar' => 'gambar'
        ];

        $this->db->insert('master_barang', $master_barang);

        $pengadaan = [
            'id_pengadaan' => $id,
            'jumlah_pengadaan' => $jumlah_pengadaan
          
        ];

        $this->db->insert('pengadaan', $pengadaan);

        $kondisi = [
            'id_kondisi' => $id,
            'id_barang' => $id,
            'jumlah_baik' => $jumlah_baik,
            'jumlah_buruk' => $jumlah_buruk
        ];

        $this->db->insert('kondisi', $kondisi);
        
        $this->session->set_flashdata('success', 'Data berhasil di tambahkan');
    }

    function delete($id){

        $this->db->where('id_barang', $id);
        $this->db->delete('master_barang');

        $this->db->where('id_pengadaan', $id);
        $this->db->delete('pengadaan');

        $this->db->where('id_kondisi', $id);
        $this->db->delete('kondisi');

        $this->session->set_flashdata('success', 'Data berhasil di hapus');
    }

    function update($id){
        $nama_barang = $this->input->post('nama_barang');
        $satuan    = $this->input->post('satuan');
        $jumlah_pengadaan = $this->input->post('jumlah_pengadaan');
        $jumlah_baik  = $this->input->post('jumlah_baik');
        $jumlah_buruk= $this->input->post('jumlah_buruk');
        $ruang= $this->input->post('ruang');
        $keterangan= $this->input->post('keterangan');
        $gambar= "gambar";

    $master_barang = "UPDATE master_barang SET id_barang='$id' , id_pengadaan='$id' , id_kondisi='$id' , id_ruangan='$ruang' ,nama_barang='$nama_barang', satuan='$satuan' , keterangan='$keterangan' , gambar='$gambar' WHERE id_barang='$id '";
    $this->db->query($master_barang);

    $pengadaan = "UPDATE pengadaan SET id_pengadaan='$id' , jumlah_pengadaan='$jumlah_pengadaan' WHERE id_pengadaan='$id '";
    $this->db->query($pengadaan);

    $kondisi = "UPDATE kondisi SET id_kondisi='$id' , id_barang = '$id' , jumlah_baik='$jumlah_baik' , jumlah_buruk = '$jumlah_buruk' WHERE id_kondisi='$id '";
    $this->db->query($kondisi);

    $ruangan = "UPDATE ruangan SET id_ruangan='$ruang' WHERE id_ruangan='$ruang '";
    $this->db->query($ruangan);
}
}