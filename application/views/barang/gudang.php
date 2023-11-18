<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
                <br><br>
              <div class="row">
                <div class="col-6">
                  <h4>gudang</h4>
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
          if ($this->session->flashdata('msg') == 'double_gudang') { ?>
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
                    <h4>List gudang</h4><br>
                    <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Add</button>
                    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Tambah gudang</h5>
                            <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="modal-toggle-wrapper">
                                <?= $this->session->flashdata('msg') ?>
                                <form action="<?= base_url('barang/gudang') ?>" method="post">
                                    <div class="row">
                                            <div class="col-xl-4">
                                                <h6>Nama gudang</h6>
                                                <!-- <input type="hidden" name="kd_gudang" value="<?= $kd_gudang ?>"> -->
                                                <input required type="text" placeholder="" name="nama" class="form-control">
                                            </div>
                                            <div class="col-xl-4">
                                                <h6>Kode</h6>
                                                <input required type="text" placeholder="" name="kode" class="form-control">
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
                  </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="t_barang">
                                <thead>
                                            <tr>
                                            <th width="400" scope="col">Nama</th>
                                            <th width="400" scope="col">Kode</th>
                                            <th width="80" scope="col">Action</th>
                                            </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($gudang as $x) {  ?>
                                            <tr>
                                                <td>
                                                    <?= $x->nama ?>
                                                </td>
                                                <td>
                                                    <?= $x->kode ?>
                                                </td>
                                                <td>
                                                 <button type="button" class="btn btn-primary btn-square" data-bs-toggle="modal" data-original-title="test" data-bs-target="#satua_edit<?= $x->id ?>"><i class="fa fa-edit"></i></button>
                                                    <button type="button" id="<?= $x->id ?>" class="btn btn-danger btn-square delete_gudangs"><i class="fa fa-trash-o"></i></button>
                                                </td>

                                            </tr>
                                            <div class="modal fade bd-example-modal-lg" id="satua_edit<?= $x->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                                              <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5>Edit gudang</h5>
                                                  </div>
                                                  <div class="modal-body">
                                                    <div class="modal-toggle-wrapper">
                                                        <?= $this->session->flashdata('msg') ?>
                                                        <form action="<?= base_url('barang/gudang') ?>" method="post">
                                                        <?php $eksp = $this->db->get_where('gudang',['id' => $x->id])->row_array(); ?>
                                                        <div class="row">
                                                                    <div class="col-xl-4">
                                                                        <h6>Nama</h6>
                                                                        <input type="hidden" name="kd_gudang" value="<?= $x->id ?>">
                                                                        <input required type="text" placeholder="" value="<?= $x->nama ?>" name="nama" class="form-control">
                                                                    </div>
                                                                    <div class="col-xl-4">
                                                                        <h6>Kode</h6>
                                                                        <input required type="text" placeholder="" value="<?= $x->kode ?>" name="kode" class="form-control">
                                                                    </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col-xl-2">
                                                                    <button class="btn bg-primary d-flex align-items-center gap-2 text-light ms-auto" type="submit">Update</button>
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
                <!-- <div class="col-xl-4">
                    <div class="card">
                    <div class="card-body">
                            <form enctype="multipart/form-data" action="<?= base_url('user/import_gudang') ?>" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Import gudang</label>
                                        <input type="file" class="form-control" required name="gudang_imp">
                                        <br>
                                        <button type="submit" class="btn btn-primary">Import</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> -->
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->

<script>
                    $(document).on('click', '.delete_gudang', function (e) {
                    e.preventDefault();
                    var pid = this.id;
                    swal({
                        title: "Delete",
                        text: "Apakah anda yakin ingin delete gudang?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                                $.ajax({
                                url : "<?= site_url('barang/delete_gudang');?>",
                                method : "POST",
                                data : {id: pid},
                                async : true,
                                dataType : 'json',
                                    success: function(data){
                                        swal({
                                                                title: "Berhasil..!",
                                                                text: "gudang berhasil didelete",
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
