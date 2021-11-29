        <?php 
            $query=" SELECT * FROM master_barang
             INNER JOIN pengadaan 
             ON master_barang.id_pengadaan = pengadaan.id_pengadaan
             INNER JOIN kondisi
             ON master_barang.id_kondisi = kondisi.id_kondisi
             INNER JOIN ruangan
             ON master_barang.id_ruangan = ruangan.id_ruangan ";

            $all = $this->db->query($query)->result_array();
             $i=1;
        
        ?>
       

       <?php if($this->session->flashdata('success') !== null): ?>
             <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('success') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
       <?php endif; ?>



        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Insert new data
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover text-center">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama barang</th>
                    <th>Satuan</th>
                    <th>Seluruh barang</th>
                    <th>Kondisi baik</th>
                    <th>Kondisi buruk</th>
                    <th>Ruang</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php foreach ($all as $d): ?>
                  <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $d['nama_barang'] ?></td>
                    <td><?= $d['satuan'] ?></td>
                    <td><?= $d['jumlah_pengadaan'] ?></td>
                    <td><?= $d['jumlah_baik'] ?></td>
                    <td><?= $d['jumlah_buruk'] ?></td>
                    <td><?= $d['ruang'] ?></td>
                    <td><?= $d['keterangan'] ?></td>
                    <td>
                      <a href="<?= base_url() ?>user/edit/<?= $d['id_barang'] ?>" class="text-decoration-none">
                      <span class="badge rounded-pill bg-success">Edit</span>
                      </a>
                      <a href="<?= base_url() ?>user/delete/<?= $d['id_barang'] ?>" onclick="return confirm('Anda yakin ingin menghapus?')" class="text-decoration-none">
                      <span class="badge rounded-pill bg-danger">Delete</span>
                      </a>
                    </td>
                  </tr>
                <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
 





        <!-- modal -->
        <!-- Button trigger modal -->


<!-- Modal -->
            <?php 
             $query = " SELECT * FROM `master_barang` WHERE id_barang IN (SELECT MAX(id_barang) FROM `master_barang`) ";
             $data = $this->db->query($query)->row_array();
            ?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>user/insert" method="post">
        <?php
         $first = 1;
        if(!$data) { ?>
        <input type="hidden" name="id" value="<?= $first ?>">
        <?php } else{ ?>
          <input type="hidden" name="id" value="<?= $data['id_barang'] + 1 ?>">
        <?php } ?>

        
        <div class="row">
          <div class="col">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Nama barang" name="nama_barang">
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Satuan" name="satuan">
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Seluruh barang" name="jumlah_pengadaan">
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Kondisi baik" name="jumlah_baik">
            </div>
            
          </div>
          <div class="col">

          <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Kondisi buruk" name="jumlah_buruk">
            </div>
            <div class="input-group mb-3">
              <?php
                 $query = "SELECT * FROM ruangan";
                 $select = $this->db->query($query)->result_array();
              ?>
              <select class="form-select" aria-label="Default select example">
                <option>Pilih ruangan</option>
                <?php foreach($select as $s) : ?>
                <option value="<?= $s['id_ruangan'] ?>"><?= $s['ruang'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Keterangan" name="keterangan">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Insert New Data</button>
      </div>
    </form>
    </div>
  </div>
</div>



