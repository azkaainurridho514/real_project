
    <!-- <table>
        <tr>
           <td>NO</td>
           <td>NAMA</td>
           <td>KETERANGAN</td>
           <td>SATUAN</td>
           <td>JUMLAH</td>
           <td>KONDISI</td>
        </tr>
        <?php 
            $query=" SELECT * FROM master_barang
             INNER JOIN pengadaan 
             ON master_barang.id_pengadaan = pengadaan.id_pengadaan
             INNER JOIN kondisi
             ON master_barang.id_kondisi = kondisi.id_kondisi ";

            $data=$this->db->query($query)->result_array();
             $i=1;
            foreach ($data as $d):

        ?>
        <tr>
           <td><?= $i++ ?></td>
           <td><?= $d['nama_barang'] ?></td>
           <td><?= $d['keterangan'] ?></td>
           <td><?= $d['satuan'] ?></td>
           <td><?= $d['jumlah'] ?></td>
           <td><?= $d['kondisi'] ?></td>
        </tr>
        <?php endforeach ;?>
      
    </table> --><!-- <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">30 done</span> this month
                  </p> -->

    <div class="row mb-4">
        <div class="col-lg col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>List barang</h6>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="bi bi-plus-square me-1"  style="font-size: 15px;"></i> Tambah data barang
              </button>
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama barang</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Satuan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Seluruh barang</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kondisi baik</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kondisi buruk</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ruangan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
            
             $i=1;
            foreach ($all as $d):

        ?>
                    <tr class="">
                      <td>
                        <div class="d-flex px-2 py-1 justify-content-center">
                          <div class="d-flex flex-column">
                            <h6 class="mb-0 text-sm"><?= $i++ ;?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1 justify-content-center">
                          <div class="d-flex flex-column">
                            <h6 class="mb-0 text-sm"><?= $d['nama_barang'] ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1 justify-content-center">
                          <div class="d-flex flex-column">
                            <h6 class="mb-0 text-sm"><?= $d['satuan'] ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1 justify-content-center">
                          <div class="d-flex flex-column">
                            <h6 class="mb-0 text-sm"><?= $d['jumlah_pengadaan'] ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1 justify-content-center">
                          <div class="d-flex flex-column">
                            <h6 class="mb-0 text-sm"><?= $d['jumlah_baik'] ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1 justify-content-center">
                          <div class="d-flex flex-column">
                            <h6 class="mb-0 text-sm"><?= $d['jumlah_buruk'] ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1 justify-content-center">
                          <div class="d-flex flex-column">
                            <h6 class="mb-0 text-sm"><?= $d['ruang'] ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1 justify-content-center">
                          <div class="d-flex flex-column">
                            <h6 class="mb-0 text-sm"><?= $d['keterangan'] ?></h6>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <?php endforeach ;?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>

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
          