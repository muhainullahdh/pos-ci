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
                                    <select name="" id="" class="form-control select2x satuanb">
                                        <option value="">Pilih Satuan Besar</option>
                                        <?php
                                        $db1 = $this->db->get('satuan')->result();
                                        foreach($db1 as $x){ ?>
                                        <option value="<?= $x->id_satuan ?>"><?= $x->satuan ?></option>
                                        <?php } ?>
                                    </select>
                            </div>
                                <div class="col-xl-2 invs">
                                    <span>isi Satuan :</span>
                                </div>
                                <div class="col-xl-3 invs">
                                    <input type="text" class="form-control isi_besar">
                                </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xl-3">
                                <span>Satuan Kecil</span>
                            </div>
                            <div class="col-xl-4">
                                    <select name="" id="" class="form-control select2x satuank">
                                        <option value="">Pilih Satuan Kecil</option>
                                        <?php
                                        $db1 = $this->db->get('satuan')->result();
                                        foreach($db1 as $x){ ?>
                                        <option value="<?= $x->id_satuan ?>"><?= $x->satuan ?></option>
                                        <?php } ?>
                                    </select>
                            </div>
                            <div class="col-xl-2 invs">
                                <span>isi Satuan :</span>
                            </div>
                            <div class="col-xl-3 invs">
                                <input type="text" class="form-control isi_kecil">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xl-3">
                                <span>Satuan Kecil</span>
                            </div>
                            <div class="col-xl-4">
                                <select disabled name="" id="" class="form-control">
                                    <option value="a">vvv</option>
                                </select>
                            </div>
                            <div class="col-xl-2 invs">
                                <span>isi Sat Konv :</span>
                            </div>
                            <div class="col-xl-3 invs">
                                <input disabled type="text" class="form-control">
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
                                <span>Stock</span>
                            </div>
                            <div class="col-xl-4">
                                <input type="text" class="form-control stok">
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2">
                            <div class="col">
                                <span>HPP (Sat Besar) :</span>
                                <input type="text" class="form-control hpp_besar" id="tailprefix">
                            </div>
                                <div class="col">
                                    <span>HPP (Sat Kecil) :</span>
                                    <input type="text" class="form-control hpp_kecil" id="tailprefix2">
                            </div>
                                <div class="col">
                                    <span>HPP (Sat Konv) :</span>
                                    <input type="text" class="form-control" id="tailprefix3">
                            </div>
                        </div>
                        <!-- <div class="row mt-2">
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
                        </div> -->
                        <hr>
                        <div class="row mt-2">
                            <div class="col">
                                <span>Hrg Jual (Sat.Besar)</span>
                                <input type="text" class="form-control harga_j_besar" id="tailprefix4">
                            </div>
                            <div class="col">
                                <span>Hrg Jual (Sat.Kecil)</span>
                                <input type="text" class="form-control harga_j_kecil" id="tailprefix5">
                            </div>
                            <div class="col">
                                <span>Hrg Jual (Sat.Konv)</span>
                                <input type="text" class="form-control hargajual_konv" id="tailprefix6">
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
                                            <th></th>
                                            <th width="400" scope="col">Nama Barang</th>
                                            <th width="280" scope="col">Harga Jual</th>
                                            <th width="280" scope="col">Harga Jual K</th>
                                            <th width="280" scope="col">Harga Jual B</th>
                                            <th width="280" scope="col">Action</th>
                                            </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($barang as $x) {?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td>
                                                    <?= $x->nama ?>
                                                </td>
                                                <td>Rp.<?= number_format($x->hargajualb,0,'.','.')?></td>
                                                <td>Rp.<?= number_format($x->hargajualk,0,'.','.')?></td>
                                                <td>Rp.<?= number_format($x->hargajualb,0,'.','.')?></td>
                                                <td>
                                                    <button type="button" id="<?= $x->id ?>" class="btn btn-primary btn-square barang_v"><i class="fa fa-eye"></i></button>
                                                    <button type="button" id="<?= $x->id ?>" class="btn btn-danger btn-square delete_barang"><i class="fa fa-trash-o"></i></button>
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
                $('.title-b').html('Tambah barang')
                $( document ).ready(function() {
                    $('.invs').hide()
                })
                $(document).on('click', '.delete_barang', function (e) {
                    e.preventDefault();
                    var pid = this.id;
                    swal({
                        title: "Delete",
                        text: "Apakah anda yakin ingin delete barang?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            swal("Barang Berhasil didelete", {
                                icon: "success",
                            });
                        }
                    });
                })
                $(document).on('click', '.barang_v', function (e) {
                    e.preventDefault();
                    var pid = this.id;
                    $('.invs').show()
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
                            $('.hargajual_konv').val(data.hargajualb.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
                            $('.kategori').html('<option value='+data.kategori_id+'>'+data.nama_kategori+'</option>')
                            $.ajax({
                                url : "<?= site_url('barang/get_satuan');?>",
                                method : "POST",
                                data : {id: data.id_satuan_besar,satuan : 'besar'},
                                async : true,
                                dataType : 'json',
                                success: function(data2){
                                    $('.satuanb').html('<option value='+data2.id_satuan+'>'+data2.satuan+'</option>')
                                    $('.isi_besar').val(data2.isi)
                                }
                            })
                            $.ajax({
                                url : "<?= site_url('barang/get_satuan');?>",
                                method : "POST",
                                data : {id: data.id_satuan_kecil,satuan: 'kecil'},
                                async : true,
                                dataType : 'json',
                                success: function(data3){
                                    $('.satuank').html('<option value='+data3.id_satuan+'>'+data3.satuan+'</option>')
                                    $('.isi_kecil').val(data3.isi)
                                }
                            })

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
                                    id_satuanb : $('.satuanb').val(),
                                    isi_besar : $('.isi_besar').val(),
                                    id_satuank : $('.satuank').val(),
                                    isi_kecil : $('.isi_kecil').val(),
                                    kategori_id : $('.kategori').val(),
                                    stok : $('.stok').val(),
                                    hpp_besar : $('.hpp_besar').val(),
                                    hpp_kecil : $('.hpp_kecil').val(),
                                    harga_j_besar : $('.harga_j_besar').val(),
                                    harga_j_kecil : $('.harga_j_kecil').val(),
                                }
                            if (value_ac == "Simpan") {
                                if ($('.nama_barang').val() == "") {
                                    swal({
                                         title: "Opss..!",
                                          text: "Nama Barang tidak boleh kosong",
                                          icon: "warning",
                                    })
                                 }else if ($('.satuanb').val() == "" && $('.satuank').val() == "") {
                                    swal({
                                         title: "Opss..!",
                                          text: "Satuan Besar dan Kecil tidak boleh kosong",
                                          icon: "warning",
                                    })
                                 }else{
                                    console.log($('.satuanb').val())
                                    $.ajax({
                                            url : "<?= site_url('barang/submit');?>",
                                            method : "POST",
                                            data : datax,
                                            async : true,
                                            dataType : 'json',
                                            success: function(data){
                                                            swal({
                                                                title: "Berhasil..!",
                                                                text: "Barang "+data.nama+" berhasil disimpan",
                                                                icon: "success",
                                                                }).then((willDelete) => {
                                                                if (willDelete) {
                                                                    location.reload();
                                                                }
                                                            });
                                            }
                                        })
                                }
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
                        $(function(){
                            $("#rupiahh").keyup(function(e){
                                $(this).val(format($(this).val()));
                            });
                            });
                            var format = function(num){
                            var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
                            if(str.indexOf(".") > 0) {
                                parts = str.split(".");
                                str = parts[0];
                            }
                            str = str.split("").reverse();
                            for(var j = 0, len = str.length; j < len; j++) {
                                if(str[j] != ",") {
                                output.push(str[j]);
                                if(i%3 == 0 && j < (len - 1)) {
                                    output.push(",");
                                }
                                i++;
                                }
                            }
                            formatted = output.reverse().join("");
                            return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
                        };
</script>
