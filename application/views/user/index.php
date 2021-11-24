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
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
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
                    <td></td>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php 
             $query = " SELECT * FROM `master_barang` WHERE id_barang IN (SELECT MAX(id_barang) FROM `master_barang`) ";
             $data = $this->db->query($query)->row_array();
            ?>
              <form method="post" action="<?= base_url() ?>user/insert">
              <input type="hidden" name="id" value="<?= $data['id_barang'] + 1 ?>">
                <div class="mb-3">
                  <label for="" class="form-label">Nama barang</label>
                  <input type="text" name="nama_barang" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Satuan</label>
                  <input type="text" name="satuan" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Seluruh barang</label>
                  <input type="text" name="jumlah_pengadaan" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Kondisi baik</label>
                  <input type="text" name="jumlah_baik" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Kondisi buruk</label>
                  <input type="text" name="jumlah_buruk" class="form-control">
                </div>
                <div class="mb-3">
                  


                <div class="btn-group dropend">
                  <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropright
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </div>


                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Keterangan</label>
                  <input type="text" name="keterangan" class="form-control">
                </div>
                  <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">RESET</button>
                 <button type="submit" class="btn btn-primary">SIMPAN</button>
              </form>
      </div>
    </div>
  </div>
</div>
          