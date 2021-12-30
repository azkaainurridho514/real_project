<h1 class="text-center"> Welcome to dashboard admin </h1>
              <?php if($this->session->flashdata('message')) : ?>
                  <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    <?= $this->session->flashdata('message'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php else: ?>
                <?php endif; ?>
<div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">List seluruh user</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="myTable" class="table table-bordered table-hover text-center display nowrap">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>username</th>
                    <th>email</th>
                    <th>role id</th>
                    <th>is active</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                $i=1;
                foreach ($user as $u): ?>
                  <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $u['username'] ?></td>
                    <td><?= $u['email'] ?></td>
                    <td><?= $u['role'] ?></td>
                    <td>
                      <?php if($u['is_active']): ?>
                      <input class="form-check-input" type="checkbox" checked="checked" data-active="<?= $u['is_active'] ?>" data-id="<?= $u['id_user'] ?>">
                      <?php else: ?>
                        <input class="form-check-input" type="checkbox" data-active="<?= $u['is_active'] ?>" data-id="<?= $u['id_user'] ?>">
                        <?php endif; ?>
                      </td>
                    <td>
                      <a href="<?=$u['id_user']?>" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $u['id_user']?>" class="text-decoration-none">
                      <span class="badge rounded-pill bg-success">Update</span>
                    </a>
                    <a href="<?= base_url() ?>admin/delete/<?= $u['id_user'] ?>" onclick="return confirm('Anda yakin ingin menghapus?')" class="text-decoration-none">
                    <span class="badge rounded-pill bg-danger">Delete</span>
                  </a>


                  <!-- modal -->
                      <div class="modal fade" id="exampleModal<?= $u['id_user']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start">
                            <form action="<?= base_url() ?>admin/update/<?= $u['id_user']?>" method="post">
                              <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control"  name="username" value="<?= $u['username'] ?>">
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control"  name="email" value="<?= $u['email']?>">
                                <input type="hidden" class="form-control" name="pass" value="<?= $u['password']?>">
                              </div>
                              <div class="mb-3">
                              <label class="form-label">Role</label>
                              <?php 
                              $select = $this->db->get('user_role')->result_array();
                              ?>
                              <select class="form-select" aria-label="Default select example" name="role_id">
                              <option value="<?= $u['role_id'] ?>"><?= $u['role'] ?> => Role saat ini</option>
                                <?php foreach($select as $s) : ?>
                                <option value="<?= $s['id'] ?>"><?= $s['role'] ?></option>
                                <?php endforeach; ?>
                              </select>
                              </div>
                                  
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>
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

       