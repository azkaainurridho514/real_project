<?php 
     $query = " SELECT * FROM `master_barang` WHERE id_barang IN (SELECT MAX(id_barang) FROM `master_barang`) ";
             $data = $this->db->query($query)->row_array();
?>

<div class="container">
    <div class="card col-lg-8">
      <div class="card-body">
        <a href="<?= base_url() ?>user" class="btn bg-primary">Back</a>
        <form action="<?= base_url() ?>user/insert_view" method="post">
          <div class="form-group">
            <?php 
            $first = 1;
            if(!$data) : ?>
              <input type="hidden" name="id" value="<?= $first ?>">
            <?php else: ?>
              <input type="hidden" name="id" value="<?= $data['id_barang'] + 1 ?>">
            <?php endif; ?>
            <label>Nama barang :</label>
            <input type="text" class="form-control" name="nama_barang" placeholder="">
            <?= form_error('nama_barang', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label>Satuan :</label>
            <input type="text" class="form-control" name="satuan" placeholder="">
            <?= form_error('satuan', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label>Jumlah seluruh barang :</label>
            <input type="text" class="form-control" name="jumlah_pengadaan" placeholder="">
            <?= form_error('jumlah_pengadaan', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label>Kondisi baik :</label>
            <input type="text" class="form-control" name="jumlah_baik" placeholder="">
            <?= form_error('jumlah_baik', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label>Kondisi buruk :</label>
            <input type="text" class="form-control" name="jumlah_buruk" placeholder="">
            <?= form_error('jumlah_buruk', '<small class="form-text text-danger">', '</small>'); ?>
          </div>

          <?php
           $ruangan = $this->db->get('ruangan')->result_array();
          ?>

          <div class="form-group">
            <label>Ruangan :</label>
            <select class="custom-select" name="ruangan">
              <?php foreach($ruangan as $r) : ?>
                <option value="<?= $r['id_ruangan'] ?>"><?= $r['ruang'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
              <label>Keterangan</label>
              <textarea class="form-control" name="keterangan"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" style="width:30%">Insert</button>
          </div>
        </form>
      </div>
    </div>
</div>