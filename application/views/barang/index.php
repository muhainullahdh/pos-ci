<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <!-- <div class="row">
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
              </div> -->
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-header">
                    <h4 class="title-b"></h4>
                  </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3">
                                <span>Kode Barang</span>
                            </div>
                            <div class="col-xl-4">
                                <input type="text" class="form-control kd_barang" readonly value="<?= hexdec(uniqid()) ?>">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xl-3">
                                <span>Nama Barang</span>
                            </div>
                            <div class="col-xl-4">
                                <input type="text" class="form-control nama_barang">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xl-3">
                                <span>Kategori Barang</span>
                            </div>
                            <div class="col-xl-4">
                                <select name="" id="" class="form-control select2x kategori">
                                    <?php
                                    $db = $this->db->get('kategori')->result();
                                    foreach($db as $x){ ?>
                                    <option value="<?= $x->id ?>"><?= $x->nama_kategori ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xl-3">
                                <span>Satuan Besar</span>
                            </div>
                            <div class="col-xl-4">
                                    <select name="" id="" class="form-control select2x kategori">
                                        <?php
                                        $db1 = $this->db->get('satuan')->result();
                                        foreach($db1 as $x){ ?>
                                        <option value="<?= $x->id_satuan ?>"><?= $x->satuan ?></option>
                                        <?php } ?>
                                    </select>
                            </div>
                            <div class="col-xl-2">
                                <span>isi Satuan :</span>
                            </div>
                            <div class="col-xl-3">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xl-3">
                                <span>Satuan Kecil</span>
                            </div>
                            <div class="col-xl-4">
                                <select name="" id="" class="form-control">
                                    <option value="a">vvv</option>
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <span>isi Satuan :</span>
                            </div>
                            <div class="col-xl-3">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xl-3">
                                <span>Satuan Kecil</span>
                            </div>
                            <div class="col-xl-4">
                                <select name="" id="" class="form-control">
                                    <option value="a">vvv</option>
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <span>isi Sat Konv :</span>
                            </div>
                            <div class="col-xl-3">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xl-3">
                                <span>Barcode Sat. Besar</span>
                            </div>
                            <div class="col-xl-4">
                                <input type="text" name="kd_barang" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xl-3">
                                <span>Barcode Sat. Kecil</span>
                            </div>
                            <div class="col-xl-4">
                                <input type="text" name="kd_barang" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xl-3">
                                <span>Barcode Sat. Konv</span>
                            </div>
                            <div class="col-xl-4">
                                <input type="text" name="kd_barang" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xl-3">
                                <span>Brand</span>
                            </div>
                            <div class="col-xl-4">
                                <select name="" id="" class="form-control">
                                    <option value="">Kapal Api</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xl-3">
                                <span>Sisa Stock</span>
                            </div>
                            <div class="col-xl-4">
                                <input type="text" class="form-control stok">
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-xl-2">
                                <span>HPP (Sat Besar) :</span>
                            </div>
                            <div class="col-xl-3">
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-xl-2">
                                <span>HPP (Sat Kecil) :</span>
                            </div>
                            <div class="col-xl-3">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">

                            </div>
                            <div class="col">
                                    Retail
                            </div>
                            <div class="col">
                                    Grosir
                            </div>
                            <div class="col">
                                    Partai
                            </div>
                            <div class="col">
                                    Promo
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xl-2">
                                <span>Hrg Jual (Sat.Besar)</span>
                            </div>
                            <div class="col-xl-3">
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-xl-2">
                                <span>Hrg Jual (Sat.Kecil)</span>
                            </div>
                            <div class="col-xl-3">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xl-2">
                                <span>Hrg Jual (Sat.Konv)</span>
                            </div>
                            <div class="col-xl-3">
                                <input type="text" class="form-control hargajual_konv">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xl-2">
                                <input type="button" class="btn btn-primary btn-square submit" value="Simpan">
                            </div>
                            <div class="col-xl-2">
                                <a href="<?= base_url('barang') ?>" class="btn btn-warning btn-square">Refresh</a>
                            </div>
                        </div>
                     </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-header">
                    <h4>List Barang</h4>
                  </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="t_barang">
                                <thead>
                                            <tr>
                                            <th width="400" scope="col">Nama Barang</th>
                                            <th width="280" scope="col">Harga Jual</th>
                                            <th width="280" scope="col">Harga Jual K</th>
                                            <th width="280" scope="col">Harga Jual B</th>
                                            <th width="280" scope="col">Action</th>
                                            </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($barang as $x) {?>
                                            <tr>
                                                <td>
                                                    <?= $x->nama ?>
                                                </td>
                                                <td>Rp.<?= number_format($x->hargajual,0,'.','.')?></td>
                                                <td>Rp.<?= number_format($x->hargajualk,0,'.','.')?></td>
                                                <td>Rp.<?= number_format($x->hargajualb,0,'.','.')?></td>
                                                <td><button type="button" id="<?= $x->id ?>" class="btn btn-primary btn-square barang_v">view</button></td>
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
                $('.title-b').html('Tambah barang')
                $(document).on('click', '.barang_v', function (e) {
                    e.preventDefault();
                    var pid = this.id;
                    $.ajax({
                        url : "<?= site_url('barang/get_barang');?>",
                        method : "POST",
                        data : {id: pid},
                        async : true,
                        dataType : 'json',
                        success: function(data){
                            $('.kd_barang').val(data.kode_barang)
                            $('.nama_barang').val(data.nama)
                            $('.stok').val(data.stok)
                            $('.hargajual_konv').val(data.hargajual.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
                            $('.kategori').html('<option value='+data.kategori_id+'>'+data.nama_kategori+'</option>')
                            // $('.submit').addClass('btn-danger')
                            $('.submit').removeClass('btn-primary').addClass('btn-danger');
                            $('.submit').val('Update');
                            $('.title-b').html('Update barang')
                        }
                    })
                });
                var action = $(".submit")
                        action.on('click',function() {
                            var value_ac = action.val();
                            var datax = {
                                    cek : value_ac,
                                    kode_barang : $('.kd_barang').val(),
                                    nama_barang : $('.nama_barang').val(),
                                    nama_barang : $('.nama_barang').val(),
                                }
                            if (value_ac == "Simpan") {
                                // console.log($('.nama_barang').val())
                                $.ajax({
                                        url : "<?= site_url('barang/submit');?>",
                                        method : "POST",
                                        data : datax,
                                        async : true,
                                        dataType : 'json',
                                        success: function(data){
                                            console.log(data)
                                        }
                                    })
                            }else if(value_ac == "Update"){
                                    $.ajax({
                                        url : "<?= site_url('barang/submit');?>",
                                        method : "POST",
                                        data : datax,
                                        async : true,
                                        dataType : 'json',
                                        success: function(data){
                                            console.log(data)
                                        }
                                    })
                            }
                        })
</script>
