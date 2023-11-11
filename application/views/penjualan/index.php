<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <!-- <div class="row">
                <div class="col-6">
                  <h4>penjualan</h4>
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
              </div> -->
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>List penjualan</h4>
                  </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="t_barang">
                                <thead>
                                            <tr>
                                            <th width="20">No</th>
                                            <th width="400" scope="col">No Struk</th>
                                            <th width="280" scope="col">Pelanggan</th>
                                            <th width="280" scope="col">Jumlah Item</th>
                                            <th width="280" scope="col">Kasir</th>
                                            <th width="280" scope="col">Action</th>
                                            </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($penjualan as $x) {?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td>
                                                    <?= $x->no_struk ?>
                                                </td>
                                                <td>
                                                    <?= $x->nama_toko ?>
                                                </td>
                                                <td>
                                                    <?= $x->jumlah_item ?>
                                                </td>
                                                <td>
                                                    <?= $x->nama ?>
                                                </td>
                                                <td>
                                                    <button type="button" id="<?= $x->id ?>" class="btn btn-primary btn-square penjualan_v"><i class="fa fa-eye"></i></button>
                                                    <!-- <button type="button" id="<?= $x->id ?>" class="btn btn-danger btn-square delete_penjualan"><i class="fa fa-trash-o"></i></button> -->
                                                </td>
                                            </tr>
                                    <?php } ?>
                                </tbody>
                                </table>
                        </div>
                     </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
