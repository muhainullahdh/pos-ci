<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
                <br><br>
              <div class="row">
                <div class="col-6">
                  <h4>pengguna</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                        <svg class="stroke-icon">
                          <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Default      </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <?php
          if ($this->session->flashdata('msg') == 'double_pengguna') { ?>
          <script>
            $(document).ready(function() {
                swal({
                        title: "Opss",
                        text: "Data <?= $this->session->flashdata('msg_val') ?> tidak boleh sama",
                        icon: "warning",
                    })
                })
          </script>
         <?php } ?>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>List pengguna</h4><br>
                    <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Add</button>
                    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                            <div class="modal-toggle-wrapper">
                                <?= $this->session->flashdata('msg') ?>
                                <form action="<?= base_url('user/pengguna') ?>" method="post">
                                    <div class="row">
                                            <div class="col-xl-4">
                                                <label>Nama</label>
                                                <input required type="text" name="nama" class="form-control">
                                            </div>
                                            <div class="col-xl-4">
                                                <label>username</label>
                                                <input required type="text" name="username" class="form-control">
                                            </div>
                                            <div class="col-xl-4">
                                                <label>Password</label>
                                                <input required type="text" name="password" class="form-control">
                                            </div>
                                            <div class="col-xl-4 mt-2">
                                                <label>Level</label>
                                               <select name="level" id="" class="form-control">
                                                    <option value="1">admin</option>
                                                    <option value="2">kasir</option>
                                               </select>
                                            </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-xl-8"></div>
                                        <div class="col-xl-2">
                                            <button class="btn bg-primary d-flex align-items-center gap-2 text-light ms-auto" type="submit">Submit</button>
                                        </div>
                                        <div class="col-xl-2">
                                            <button class="btn bg-secondary d-flex align-items-center gap-2 text-light ms-auto" type="button" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </form>
                              <!-- <h4>Up to <strong class="txt-danger">85% OFF</strong>, Hurry Up Online Shopping</h4> -->
                              <!-- <p class="text-sm-center">Our difficulty in finding regular clothes that was of great quality, comfortable, and didn't impact the environment given way to Creatures of Habit.</p> -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- <form action="<?= base_url('user/filter_penjualan') ?>" method="POST">
                        <div class="row mt-2">
                            <div class="col-xl-2">
                                <select name="filter_penjualan" class="form-control" onchange="this.form.submit()" id="">
                                    <option value="">Pilih Tipe penjualan</option>
                                    <option <?= $this->session->userdata('filter_penjualan') == 'retail' ? 'selected' : '' ?> value="retail">retail</option>
                                    <option <?= $this->session->userdata('filter_penjualan') == 'grosir' ? 'selected' : '' ?> value="grosir">grosir</option>
                                    <option <?= $this->session->userdata('filter_penjualan') == 'partai' ? 'selected' : '' ?> value="partai">partai</option>
                                    <option <?= $this->session->userdata('filter_penjualan') == 'promo' ? 'selected' : '' ?> value="promo">promo</option>
                                </select>
                            </div>
                        </div>
                    </form> -->
                  </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="t_barang">
                                <thead>
                                            <tr>
                                            <th width="400" scope="col">Username</th>
                                            <th width="400" scope="col">Nama</th>
                                            <th width="80" scope="col">Level</th>
                                            <th width="80" scope="col">Status</th>
                                            <th width="80" scope="col">Action</th>
                                            </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pengguna as $x) {  ?>
                                            <tr>
                                                <td>
                                                    <?= $x->username ?>
                                                </td>
                                                <td>
                                                    <?= $x->nama ?>
                                                </td>
                                                <td>
                                                    <?= $x->level ?>
                                                </td>
                                                <td>
                                                    <?= $x->status ?>
                                                </td>
                                                <td>
                                                 <button type="button" class="btn btn-primary btn-square" data-bs-toggle="modal" data-original-title="test" data-bs-target="#satua_edit<?= $x->id ?>"><i class="fa fa-edit"></i></button>
                                                    <button type="button" id="<?= $x->id ?>" class="btn btn-danger btn-square delete_pengguna"><i class="fa fa-trash-o"></i></button>
                                                </td>

                                            </tr>
                                            <div class="modal fade bd-example-modal-lg" id="satua_edit<?= $x->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                                              <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5>Edit pengguna</h5>
                                                  </div>
                                                  <div class="modal-body">
                                                    <div class="modal-toggle-wrapper">
                                                        <?= $this->session->flashdata('msg') ?>
                                                        <form action="<?= base_url('user/pengguna') ?>" method="post">
                                                        <div class="row">
                                                                    <div class="col-xl-4">
                                                                        <label>Nama</label>
                                                                        <input type="hidden" value="<?= $x->id ?>" name="id" class="form-control">
                                                                        <input type="hidden" value="edit" name="action" class="form-control">
                                                                        <input value="<?= $x->nama ?>" required type="text" name="nama" class="form-control">
                                                                    </div>
                                                                    <div class="col-xl-4">
                                                                        <label>username</label>
                                                                        <input required type="text" value="<?= $x->username ?>" name="username" class="form-control">
                                                                    </div>
                                                                    <div class="col-xl-4">
                                                                        <label>Password</label>
                                                                        <input required type="text" name="password" class="form-control">
                                                                    </div>
                                                                    <div class="col-xl-4 mt-2">
                                                                        <label>Level</label>
                                                                    <select name="level" id="" class="form-control">
                                                                            <option <?= $x->level == '1' ? 'selected' : '' ?> value="1">admin</option>
                                                                            <option <?= $x->level == '2' ? 'selected' : '' ?>  value="2">kasir</option>
                                                                    </select>
                                                                    </div>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-xl-8"></div>
                                                                <div class="col-xl-2">
                                                                    <button class="btn bg-primary d-flex align-items-center gap-2 text-light ms-auto" type="submit">Submit</button>
                                                                </div>
                                                                <div class="col-xl-2">
                                                                    <button class="btn bg-secondary d-flex align-items-center gap-2 text-light ms-auto" type="button" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                      <!-- <h4>Up to <strong class="txt-danger">85% OFF</strong>, Hurry Up Online Shopping</h4> -->
                                                      <!-- <p class="text-sm-center">Our difficulty in finding regular clothes that was of great quality, comfortable, and didn't impact the environment given way to Creatures of Habit.</p> -->
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <?php } ?>
                                </tbody>
                                </table>
                        </div>
                     </div>
                </div>
                <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                            <form enctype="multipart/form-data" action="<?= base_url('user/import') ?>" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Import Customer</label>
                                        <input type="file" class="form-control" required name="customer_imp">
                                        <br>
                                        <button type="submit" class="btn btn-primary">Import</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->

<script>
                    $(document).on('click', '.delete_pengguna', function (e) {
                    e.preventDefault();
                    var pid = this.id;
                    swal({
                        title: "Delete",
                        text: "Apakah anda yakin ingin delete pengguna?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                                $.ajax({
                                url : "<?= site_url('user/delete_pengguna');?>",
                                method : "POST",
                                data : {id: pid},
                                async : true,
                                dataType : 'json',
                                    success: function(data){
                                        swal({
                                                                title: "Berhasil..!",
                                                                text: "pengguna berhasil didelete",
                                                                icon: "success",
                                                                }).then((willDelete) => {
                                                                if (willDelete) {
                                                                    location.reload();
                                                                }
                                                            });
                                    }
                                })
                            }
                    });
                })
</script>
