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
                    <h4>List penjualan </h4>
                    <form action="<?= base_url('penjualan/change_date') ?>" method="POST">
                        <div class="row">
                            <div class="col-xl-2">
                                <label>Start Date</label>
                                <input type="date" class="form-control" value="<?= $this->session->userdata('date_penjualan') ?>" name="date" onchange="this.form.submit()">
                            </div>
                            <div class="col-xl-2">
                                <label>End Date</label>
                                <input type="date" class="form-control" value="<?= $this->session->userdata('date_penjualan2') ?>" name="date2" onchange="this.form.submit()">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xl-2">
                                <a href="<?= base_url('penjualan/excel') ?>" class="btn btn-primary btn-square">Export</a>
                            </div>
                        </div>
                    </form>
                  </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="t_barang">
                                <thead>
                                            <tr>
                                            <th width="400" scope="col">No Struk</th>
                                            <th width="280" scope="col">Pelanggan</th>
                                            <th width="280" scope="col">Jumlah Item</th>
                                            <th width="280" scope="col">Total</th>
                                            <th width="280" scope="col">Kasir</th>
                                            <th width="280" scope="col">Action</th>
                                            </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($penjualan as $x) {?>
                                            <tr>
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
                                                  <?php //if ($x->piutang == 1) {
                                                    echo "Rp." . number_format($x->total_transaksi, 0, '.', '.');
                                                  //} ?>
                                                </td>
                                                <td>
                                                    <?= $x->nama_kasir ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('pos/index/'). $x->id_transaksi .'/edit_transaksi' ?>" class="btn btn-primary btn-square"><i class="fa fa-edit"></i></a>
                                                    <a type="button" id="<?= $x->id_transaksi ?>" class="btn btn-square btn-danger delete_penjualan"><i class="fa fa-trash-o"></i></a>
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

        <script>
           $(document).on('click', '.delete_penjualan', function (e) {
                        e.preventDefault();
                        var pid = this.id;
                        swal({
                            title: "Delete",
                            text: "Apakah anda yakin ingin delete penjualan?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        }).then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                url : "<?= site_url('penjualan/delete_penjualan');?>",
                                method : "POST",
                                data : {id: pid},
                                async : true,
                                dataType : 'json',
                                    success: function(data){
                                        swal({
                                                                title: "Berhasil..!",
                                                                text: "penjualan berhasil didelete",
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