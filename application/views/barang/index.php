<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
                <br><br>
              <div class="row">
                <div class="col-6">
                  <h4>Barang</h4>
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
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>List Barang</h4>
                  </div>
                    <div class="card-body">
                        <div class="table-responsive" style="height: 450px;">
                            <table class="display" id="t_barang">
                                <thead>
                                            <tr>
                                            <th width="400" scope="col">Nama Barang</th>
                                            <th width="80" scope="col">Qty</th>
                                            <th width="180" scope="col">Satuan</th>
                                            <th width="180" scope="col">Harga Satuan</th>
                                            <th width="280" scope="col">Jumlah</th>
                                            <th width="280" scope="col">Stock</th>
                                            </tr>
                                </thead>
                                <tbody>
                                            <tr>
                                                <td>
                                                    adawwa
                                                </td>
                                                <td>
                                                    <!-- <b class="text-primary" style="cursor: pointer;"><i data-feather="plus-circle"></i></b> -->
                                                    <input id="qty1" type="number" style="width: 40px;text-align:center;" value="1" class="form-control">
                                                    <!-- &nbsp;<b style="cursor: pointer;" class="text-danger"><i data-feather="minus-circle"></i></b> -->
                                                </td>

                                                <td>
                                                    <!-- <p class="satuan"></p> -->
                                                    <select id="satuan" class="form-control select2x" style="cursor: text;">
                                                        <option value="">Pilih satuan</option>
                                                        <option value="Slop">Slop</option>
                                                        <option value="Bungkus">Bungkus</option>
                                                        <!-- <?php foreach($product as $x ) {?>
                                                            <option value="<?= $x->id_product ?>"><?= $x->nama ?></option>
                                                        <?php } ?> -->
                                                    </select>
                                                </td>
                                                <td><p class="harga"></p></td>
                                                
                                                <td><p class="jumlah"></p></td>
                                                <td>
                                                    <div class="row">
                                                            <div class="col">
                                                                <b>Saat ini</b>
                                                                <p class="stock bg-primary text-center rounded-pill"></p>
                                                            </div>
                                                            <div class="col">
                                                                <b>Berkurang</b>
                                                                <p class="stock-c bg-danger text-center rounded-pill"></p>
                                                            </div>
                                                    </div>
                                                </td>
                                            </tr>
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

