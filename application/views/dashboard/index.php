<h1 class="text-center"> Welcome to dashboard admin </h1>
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
                    <td><?= $u['role_id'] ?></td>
                    <td>
                      <?php if($u['is_active']): ?>
                      <input class="form-check-input" type="checkbox" checked="checked" data-active="<?= $u['is_active'] ?>" data-id="<?= $u['id'] ?>">
                      <?php else: ?>
                        <input class="form-check-input" type="checkbox" data-active="<?= $u['is_active'] ?>" data-id="<?= $u['id'] ?>">
                      <?php endif; ?>
                    </td>
                    <td>
                      <a href="<?=$u['id']?>" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $u['id']?>" class="text-decoration-none">
                      <span class="badge rounded-pill bg-success">Edit</span>
                    </a>
                    <a href="<?= base_url() ?>admin/delete/<?= $u['id'] ?>" onclick="return confirm('Anda yakin ingin menghapus?')" class="text-decoration-none">
                    <span class="badge rounded-pill bg-danger">Delete</span>
                  </a>
                  <!-- modal -->
                      <div class="modal fade" id="exampleModal<?= $u['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="<?= base_url() ?>admin/update/<?= $u['id']?>" method="post">
                                  <div class="input-group mb-3"> 
                                    <label>Username</label>
                                    <input type="text" class="form-control"  name="username" value="<?= $u['username'] ?>">
                                  </div>
                                  <div class="input-group mb-3">
                                    <label>email</label>
                                    <input type="text" class="form-control" name="email" value="<?= $u['email']?>">
                                    <input type="hidden" class="form-control" name="pass" value="<?= $u['password']?>">
                                  </div>
                                  <div class="input-group mb-3">
                                    <label>Role</label>
                                    <input type="text" class="form-control" name="role_id" value="<?= $u['role_id']?>">
                                  </div>
                                  <div class="input-group mb-3">
                                    <label>Active</label>
                                    <input type="text" class="form-control" name="is_active" value="<?= $u['is_active']?>">
                                  </div>
                                  
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Edit</button>
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

       