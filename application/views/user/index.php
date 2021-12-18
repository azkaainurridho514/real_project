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
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data barang</h3>
                <a href="<?= base_url() ?>user/insert_view" class="btn btn-primary ms-5">Insert new data</a>
                <?php if($this->session->flashdata('message')) : ?>
                  <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    <?= $this->session->flashdata('message'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php else: ?>
                <?php endif; ?>

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
                      <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $d['id_barang'] ?>" class="text-decoration-none">
                      <span class="badge rounded-pill bg-success">Edit</span>
                      </a>

                      <!-- modal edit -->
              <div class="modal fade" id="exampleModal<?= $d['id_barang'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    
                      <form action="<?= base_url() ?>user/update/<?= $d['id_barang'] ?>" method="post">
                        <input type="hidden" name="id" value="<?= $d['id_barang'] ?>">
                      <div class="row">
                        <div class="col">
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nama_barang" value="<?= $d['nama_barang'] ?>">
                          </div>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" name="satuan" value="<?= $d['satuan'] ?>">
                          </div>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" name="jumlah_pengadaan" value="<?= $d['jumlah_pengadaan'] ?>">
                          </div>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" name="jumlah_baik" value="<?= $d['jumlah_baik'] ?>">
                          </div>
                          
                        </div>
                        <div class="col">

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Kondisi buruk" name="jumlah_buruk" value="<?= $d['jumlah_buruk'] ?>">
                          </div>
                          <div class="input-group mb-3">
                            <?php
                              $query = "SELECT * FROM ruangan";
                              $select = $this->db->query($query)->result_array();
                            ?>
                            <select class="form-select" aria-label="Default select example" name="ruangan">
                              <option value="<?= $d['id_ruangan'] ?>"><?= $d['ruang'] ?> => ruangan saat ini</option>
                              <?php foreach($select as $s) : ?>
                              <option value="<?= $s['id_ruangan'] ?>"><?= $s['ruang'] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Keterangan" name="keterangan" value="<?= $d['keterangan'] ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
                      <!-- end modal edit -->

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
 


            



