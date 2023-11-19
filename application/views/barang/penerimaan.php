<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
                <br><br>
              <div class="row">
                <div class="col-6">
                  <h4>penerimaan</h4>
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
          if ($this->session->flashdata('msg') == 'double_satuan') { ?>
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
            <?php if ($this->uri->segment(2) == 'add_pb') { ?>
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Penerimaan Barang</h4><br>
                  </div>
                    <div class="card-body">
                       <div class="row">
                            <div class="col-xl-1">
                                <label>No.PB</label>
                            </div>
                            <div class="col-xl-3">
                                <?php $date = date('d').date('m').date('Y'); $urutan = $this->db->query("SELECT max(no_pb) as t FROM penerimaan where no_pb like '%".$date."%'")->row_array() ?>
                                <input type="text" readonly class="form-control no_pb" value="<?= "PB-" . date('m') . date('y') .sprintf('%06d',$urutan['t']+1); ?>">
                                <!-- <input type="text" class="form-control no_pb" value="PB-2311-000078"> -->
                            </div>
                            <div class="col-xl-1"></div>
                            <div class="col-xl-2">
                                <label>Type PPN</label>
                            </div>
                            <div class="col-xl-5">
                                <div class="row">
                                        <div class="col">
                                            <div class="form-check radio radio-secondary"> <!-- non ppn 1, include 2,exclude 3 -->
                                                <input class="form-check-input ppn" id="radio21" type="radio" name="ppn" value="1">
                                                <label class="form-check-label" for="radio21">NonPPN </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check radio radio-secondary">
                                                <input class="form-check-input ppn" id="radio22" type="radio" name="ppn" value="2">
                                                <label class="form-check-label" for="radio22">Include PPN </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check radio radio-secondary">
                                                <input class="form-check-input ppn" id="radio24" type="radio" name="ppn" value="3">
                                                <label class="form-check-label" for="radio24">Exclude PPN </label>
                                            </div>
                                        </div>
                                </div>
                            </div>
                       </div>
                       <div class="row mt-3">
                            <div class="col-xl-1">
                                <label>Tgl.PB</label>
                            </div>
                            <div class="col-xl-3">
                                <input type="date" class="form-control tgl_pb">
                            </div>
                            <div class="col-xl-1"></div>
                            <div class="col-xl-2">
                                <label>No Faktur Pajak</label>
                            </div>
                            <div class="col-xl-3">
                                <div class="row">
                                        <div class="col">
                                           <input type="text" class="form-control fp">
                                        </div>
                                        <!-- <div class="col">
                                            <div class="form-check radio radio-secondary">
                                                <input class="form-check-input pembayaran" id="radio22" type="radio" name="radio_pembayaran" value="CASH">
                                                <label class="form-check-label" for="radio22">CASH </label>
                                            </div>
                                        </div> -->
                                </div>
                            </div>
                       </div>
                       <div class="row mt-3">
                            <div class="col-xl-1">
                                <label>Supplier</label>
                            </div>
                            <div class="col-xl-3">
                                <select name="" id="" class="form-control supplier select2">
                                    <option value="">Pilih Supplier</option>
                                    <?php $supplier = $this->db->get('supplier')->result();
                                    foreach ($supplier as $x) { ?>
                                        <option value="<?= $x->kode_supplier ?>"><?= $x->nama_supplier ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-xl-1"></div>
                            <div class="col-xl-2">
                                <label>Tgl Faktur Pajak</label>
                            </div>
                            <div class="col-xl-3">
                                <div class="row">
                                        <div class="col">
                                           <input type="date" class="form-control tgl_fp">
                                        </div>
                                </div>
                            </div>
                       </div>
                       <div class="row">
                            <div class="col-xl-1">
                                <label>No Srt Jln</label>
                            </div>
                            <div class="col-xl-3">
                                <input type="text" class="form-control srt_jln">
                            </div>
                            <div class="col-xl-1"></div>
                            <div class="col-xl-2">
                                <label>Keterangan</label>
                            </div>
                            <div class="col-xl-3">
                                <div class="row">
                                        <div class="col">
                                           <textarea name="" class="form-control keterangan" id="" cols="30" rows="1"></textarea>
                                        </div>
                                </div>
                            </div>
                       </div>
                       <div class="row mt-3">
                            <div class="col-xl-1">
                                <label>Tgl Srt Jln</label>
                            </div>
                            <div class="col-xl-3">
                                <input type="date" class="form-control tgl_srt_jln">
                            </div>
                       </div>
                       <div class="row mt-3">
                            <div class="col-xl-1">
                                <label>Cara Bayar</label>
                            </div>
                            <div class="col-xl-3">
                                <input type="number" class="form-control c_bayar">
                            </div>
                            <div class="col-xl-3">
                                <div class="row">
                                    <div class="col-xl-3">
                                        Tempo
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control tempo">
                                    </div>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Penerimaan Barang</h4><br>
                  </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table display">
                                <thead>
                                            <tr>
                                            <th width="50"></th>
                                            <th width="80" scope="col">Nama Barang</th>
                                            <th width="80" scope="col">Satuan</th>
                                            <th width="80" scope="col">Qty PB</th>
                                            <th width="80" scope="col">Harga Satuan</th>
                                            <th width="80" scope="col">Dis1</th>
                                            <th width="80" scope="col">Dis2</th>
                                            <th width="80" scope="col">Dis.Rp</th>
                                            <th width="80" scope="col">Harga Netto</th>
                                            <th width="80" scope="col">Gudang</th>
                                            </tr>
                                </thead>
                                <tbody id="pb-wrapper">
                                </tbody>
                                </table>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <?php }else{ ?>
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>List penerimaan</h4><br>
                    <a href="<?= base_url('barang/add_pb') ?>" class="btn btn-secondary">Add</a>
                  </div>
                    <div class="card-body">
                        <div class="table-responsive" style="height: 450px;">
                            <table class="display" id="t_barang">
                                <thead>
                                            <tr>
                                            <th width="400" scope="col">No.PB</th>
                                            <th width="80" scope="col">Tanggal</th>
                                            <th width="80" scope="col">Nama Supplier</th>
                                            <th width="80" scope="col">Jumlah</th>
                                            <th width="80" scope="col">Jumlah(FC)</th>
                                            <th width="80" scope="col">Keterangan</th>
                                            </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($penerimaan as $x) {  ?>
                                            <tr>
                                                <td>
                                                    <?= $x->nama ?>
                                                </td>

                                                <td>
                                                    <button type="button" class="btn btn-primary btn-square" data-bs-toggle="modal" data-original-title="test" data-bs-target="#penerimaan_edit<?= $x->id_penerimaan ?>"><i class="fa fa-edit"></i></button>
                                                    <button type="button" id="<?= $x->id_penerimaan ?>" class="btn btn-danger btn-square delete_penerimaan"><i class="fa fa-trash-o"></i></button>

                                                </td>

                                            </tr>
                                            <div class="modal fade bd-example-modal-lg" id="penerimaan_edit<?= $x->id_penerimaan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                                              <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5>Edit penerimaan</h5>
                                                  </div>
                                                  <div class="modal-body">
                                                    <div class="modal-toggle-wrapper">
                                                        <?= $this->session->flashdata('msg') ?>
                                                        <form action="<?= base_url('barang/penerimaan') ?>" method="post">
                                                            <div class="row">
                                                                    <!-- <div class="modal-img"> <img src="../assets/images/gif/online-shopping.gif" alt="online-shopping"></div> -->
                                                                    <div class="col">
                                                                        <h6>Nama penerimaan</h6>
                                                                        <input type="hidden" value="edit" name="action">
                                                                        <input type="hidden" value="<?= $x->id_penerimaan ?>" name="id_penerimaan">
                                                                        <input required type="text" placeholder="Bungkus" value="<?= $x->nama_penerimaan ?>" name="penerimaan" class="form-control">
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
              </div>
            </div>
            <?php } ?>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->

<script>
        $(function() {
                //add row
                $('.select2').select2();
                var counter = 0;

                function cek_barang()
                {
                    $(".barang"+counter+"").focus();
                            var data = "<?= base_url('pos/get_barang') ?>";
                            $(".barang"+counter+"").autocomplete({
                                source: data,
                                select: function (event, ui) {
                                    $('.barang'+counter+'').val(ui.item.label);
                                    $('.id_pb_list'+counter+'').val(ui.item.description);
                                    var i,j;
                                                // $.ajax({
                                                //     url : "<?= site_url('pos/search_barang');?>",
                                                //     method : "POST",
                                                //     data : {id: ui.item.description},
                                                //     async : true,
                                                //     dataType : 'json',
                                                //     success: function(data){
                                                //         var satuann = ''
                                                //         if (data.id_satuan_besar != "") {
                                                //             satuann += '<option value=' + data.qty_besar + ","+data.id_satuan_besar+ '>'+ data.id_satuan_besar +' </option>';
                                                //         }
                                                //         if (data.id_satuan_kecil != "") {
                                                //             satuann += '<option value=' + data.qty_kecil + ","+data.id_satuan_kecil+ '>'+ data.id_satuan_kecil +' </option>';
                                                //         }
                                                //         if (data.id_satuan_kecil_konv != "") {
                                                //             satuann += '<option value=' + data.qty_konv + ","+data.id_satuan_kecil_konv+'>'+ data.id_satuan_kecil_konv +' </option>';
                                                //         }
                                                //         <?php if (strtolower(explode(',',$this->session->userdata('tipe_penjualan'))[0]) == 'umum') { ?>
                                                //             var harga1 = formatRupiah(data.hargajualb_retail)
                                                //             if (data.id_satuan_besar != "") {
                                                //                 var qtyyy = data.qty_besar
                                                //             }
                                                //             var jumlah = data.hargajualb_retail * qtyyy
                                                //         <?php }else if (strtolower(explode(',',$this->session->userdata('tipe_penjualan'))[0]) == 'retail') { ?>
                                                //             var harga1 = formatRupiah(data.hargajualb_retail)
                                                //                 if (data.id_satuan_besar != "") {
                                                //                     var qtyyy = data.qty_besar
                                                //                 }
                                                //             var jumlah = data.hargajualb_retail * qtyyy
                                                //         <?php } else if (strtolower(explode(',',$this->session->userdata('tipe_penjualan'))[0]) == 'grosir'){ ?>
                                                //             var harga1 = formatRupiah(data.hargajualb_grosir)
                                                //             if (data.id_satuan_kecil != "") {
                                                //                     var qtyyy = data.qty_kecil
                                                //                 }
                                                //             var jumlah = data.hargajualk_grosir * qtyyy
                                                //         <?php } else if (strtolower(explode(',',$this->session->userdata('tipe_penjualan'))[0]) == 'partai'){ ?>
                                                //             var harga1 = formatRupiah(data.hargajualb_partai)
                                                //         <?php } else if (strtolower(explode(',',$this->session->userdata('tipe_penjualan'))[0]) == 'promo'){ ?>
                                                //             var harga1 = formatRupiah(data.hargajualb_promo)
                                                //         <?php }?>
                                                //             var stok = data.stok
                                                //             var min_stok = data.min_stok
                                                //         if (stok < min_stok) {
                                                //                 swal({
                                                //                 title: "Opss..!",
                                                //                 text: "Barang "+ data.nama+" sisa "+data.stok,//sisa
                                                //                 icon: "warning",
                                                //                 dangerMode: true,
                                                //                 }).then((r) => {
                                                //                     if (r) {
                                                //                     // location.reload();
                                                //                     //   $('input[id="idq'+i+'"').val($('p.stock'+i+'').text() - $('p.stock-c'+i+'').text())
                                                //                     // swal({
                                                //                     //   text : "oke"
                                                //                     // })
                                                //                     $(".barang"+counter+"").focus();
                                                //                     }
                                                //                 });
                                                //         }else{
                                                //             $("#diskon_item").prop('disabled', false);
                                                //             $('.satuan'+counter+'').html(satuann);
                                                //             $('.harga'+counter+'').val(harga1);
                                                //             $('.qty_isi'+counter+'').val(qtyyy);
                                                //             $('.jumlah'+counter+'').val(jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                                //             var total_pos_fix = 0;
                                                //             for (let t = 1; t <=counter; t++) {
                                                //             total_pos_fix += parseInt($(".jumlah"+t+"")[0].value.replace(/[^a-zA-Z0-9 ]/g, ''))
                                                //             }
                                                //             $('.total_pos').html("Rp."+total_pos_fix.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                                //             $('.stock'+counter+'').val(stok);
                                                //             var qty_isi = $(".satuan"+counter+"")[0].value //qty isi satuan
                                                //             var qty = $("input[id='idq"+counter+"']")[0].value * qty_isi.split(',')[0]
                                                //             $('.stock-c'+counter+'').val(stok - qty);
                                                //         // console.log(data.nama)
                                                //             $('.total_item').val(counter)

                                                //         }

                                                //     }
                                                // });
                                                // return false;
                                            // });
                                }
                            });
                }
                document.onkeyup = function(e) {
                    if (e.which == 16) {

                        var max_fields = 100;
                        var wrapper = $("#pb-wrapper");
                        // var add_kom = $("#add-sampel");

                        if ($(".barang"+counter+"").val() == "") {
                            swal({
                                title: "Opss..!",
                                text: "Barang sebelumnya harus di isi",
                                icon: "warning",
                                dangerMode: true,
                            }).then((r) => {
                                if (r) {
                                // location.reload();
                                //   $('input[id="idq'+i+'"').val($('p.stock'+i+'').text() - $('p.stock-c'+i+'').text())
                                // swal({
                                //   text : "oke"
                                // })
                                $(".barang"+counter+"").focus();
                                }
                            });
                        }else if ($(".harga"+counter+"").val() == "") {
                            swal({
                                title: "Opss..!",
                                text: "stock barang "+$(".barang"+counter+"").val()+" kurang dari batas minimum",
                                icon: "warning",
                                dangerMode: true,
                            }).then((r) => {
                                if (r) {
                                // location.reload();
                                //   $('input[id="idq'+i+'"').val($('p.stock'+i+'').text() - $('p.stock-c'+i+'').text())
                                // swal({
                                //   text : "oke"
                                // })
                                $(".barang"+counter+"").focus();
                                }
                            });
                        }else{
                            if (counter < max_fields) {
                                counter++;
                                $(wrapper).append(
                                    '<tr class="cb" id=r'+counter+'>'+
                                    '<td>'+
                                   '<button id='+counter+' type="button" class="btn btn-danger btn-square delete_item"><i class="icon-trash"></i></button>'+
                                    '<td>'+
                                    '<input class="form-control barang'+counter+'">'+
                                    '<input type="hidden" class="form-control id_pb_list'+counter+'">'+
                                    '</td>'+
                                    '<td>'+
                                    '<select id="ids'+counter+'" class="form-control satuan'+counter+'" style="cursor: text;">'+
                                        '<option value="">Pilih satuan</option>'+
                                        <?php
                                        if ($this->uri->segment(2) == 'add_pb') {
                                            foreach ($satuan as $x) {
                                        ?>
                                        '<option value="<?= $x->id_satuan ?>"><?= $x->satuan ?></option>'+
                                        <?php }
                                            }?>
                                    '</select>'+
                                    '</td>'+
                                    '<td>'+
                                        '<input id="idq'+counter+'" type="text" style="text-align:center;" class="form-control qty'+counter+'">'+
                                    '</td>'+
                                    '<td>'+
                                    '<input type="text" class="form-control uang'+counter+' harga'+counter+'">'+
                                    '</td>'+
                                    '<td>'+
                                    '<input type="text" id="dis1'+counter+'" placeholder="0" style="text-align:center;" class="form-control dis1'+counter+'">'+
                                    '</td>'+
                                    '<td>'+
                                    '<input type="text" id="dis1'+counter+'" placeholder="0" style="text-align:center;" class="form-control dis2'+counter+'">'+
                                    '</td>'+
                                    '<td>'+
                                    '<input type="text" placeholder="0" style="text-align:center;" class="form-control dis_rp'+counter+'">'+
                                    '</td>'+
                                    '<td>'+
                                    '<input type="text" class="form-control uang'+counter+' netto'+counter+'">'+
                                    '</td>'+
                                    '<td>'+
                                    '<input type="text" class="form-control gudang'+counter+'">'+
                                    '</td>'+
                                    '</tr>'
                              );
                            //   $('.select2x').select2();
                            }
                            $('.delete_item').click(function(){
                                e.preventDefault();
                                // var total_pos_fix = $('.total_pos').html().slice(2).replace(/[^a-zA-Z0-9 ]/g, '') - parseInt($(".jumlah"+this.id+"")[0].value.replace(/[^a-zA-Z0-9 ]/g, ''))
                                // $('.total_pos').html("Rp."+total_pos_fix.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));

                                var child = $(this).closest('tr').nextAll();

                                child.each(function () {

                                    // Getting <tr> id.
                                    var id = $(this).attr('id');
                                    // Getting the <p> inside the .row-index class.
                                    var idx = $(this).children('.row-index').children('p');

                                    // Gets the row number from <tr> id.
                                    var dig = parseInt(id.substring(1));

                                    // Modifying row index.
                                    idx.html(`Row ${dig - 1}`);

                                    // Modifying row id.
                                    $(this).attr('id', `r${dig - 1}`);
                                    $('.barang'+counter+'').removeClass('barang'+counter+'').addClass('barang'+parseInt(dig-1)+'');
                                    $('.id_pb_list'+counter+'').removeClass('id_pb_list'+counter+'').addClass('id_pb_list'+parseInt(dig-1)+'');
                                    $('.qty'+counter+'').removeClass('qty'+counter+'').addClass('qty'+parseInt(dig-1)+'');
                                    $('.satuan'+counter+'').removeClass('satuan'+counter+'').addClass('satuan'+parseInt(dig-1)+'');
                                    $('.diskon_item'+counter+'').removeClass('diskon_item'+counter+'').addClass('diskon_item'+parseInt(dig-1)+'');
                                    $('.harga'+counter+'').removeClass('harga'+counter+'').addClass('harga'+parseInt(dig-1)+'');
                                    $('.jumlah'+counter+'').removeClass('jumlah'+counter+'').addClass('jumlah'+parseInt(dig-1)+'');
                                    $('.stock'+counter+'').removeClass('stock'+counter+'').addClass('stock'+parseInt(dig-1)+'');
                                    $('.stock-c'+counter+'').removeClass('stock-c'+counter+'').addClass('stock-c'+parseInt(dig-1)+'');
                                    $('#idq'+counter+'').attr("id", "idq"+parseInt(dig-1)+"");
                                    $('#ids'+counter+'').attr("id", "ids"+parseInt(dig-1)+"");
                                    $('#idd'+counter+'').attr("id", "idd"+parseInt(dig-1)+"");
                                    $('button[id='+counter+']').attr("id", ""+parseInt(dig-1)+"");
                                });
                                $(this).closest('tr').remove();
                                // Decreasing total number of rows by 1.
                                counter--;
                                // });
                            });
                            $(".uang"+counter+"").keyup(function(e){
                                $(this).val(format($(this).val()));
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
                            cek_barang()

                        }
                    }else if(e.which == 113){ // submit f2
                                    var barang = ''
                                    var xx = []
                                    for (let i = 1; i <= counter; i++) {
                                        xx.push ({ // loop table
                                            id_pb_list : $('.id_pb_list'+i+'').val(),
                                            nama_barang : $('.barang'+i+'').val(),
                                            qty : $('.qty'+i+'').val(),
                                            satuan : $('.satuan'+i+'').val(),
                                            harga_satuan : $('.harga'+i+'').val().replace(/[^a-zA-Z0-9 ]/g, ''),
                                            diskon_item : $('.diskon_item'+i+'').val().replace(/[^a-zA-Z0-9 ]/g, ''),
                                            jumlah : $('.jumlah'+i+'').val().replace(/[^a-zA-Z0-9 ]/g, ''),
                                        })
                                    }
                                    var datax = {
                                            cek : value_ac,
                                            no_pb : $('.no_pb').val(),
                                            tgl_pb : $('.tgl_pb').val(),
                                            member : $('.member').val(),
                                            supplier : $('.supplier').val(),
                                            srt_jln : $('.srt_jln').val(),
                                            tgl_srt_jln : $('.tgl_srt_jln').val(),
                                            c_bayar : $('.c_bayar').val(),
                                            tempo : $('.tempo').val(),
                                            ppn : $('.ppn').val(),
                                            fp : $('.fp').val(),
                                            tgl_fp : $('.tgl_fp').val(),
                                            keterangan : $('.keterangan').val(),
                                            // id_transaksi : <?= $this->uri->segment(3) == true ?  $this->uri->segment(3) : 0 ?>,
                                            item : xx
                                        }
                                            $.ajax({
                                                    url : "<?= site_url('barang/submit_pb');?>",
                                                    method : "POST",
                                                    data : datax,
                                                    async : true,
                                                    dataType : 'json',
                                                    success: function(data){
                                                        if (data.tahan == '1') {
                                                            swal({
                                                                    title: "Berhasil..!",
                                                                    text: "Transaksi "+data.no_struk+"  berhasil ditahan",
                                                                    icon: "success",
                                                                    })
                                                                    .then((willDelete) => {
                                                                        if (willDelete) {
                                                                        window.location = '<?= base_url() ?>pos/';
                                                                        }
                                                                    });
                                                        }else{
                                                            swal({
                                                                title: "Berhasil..!",
                                                                text: "Transaksi "+data.no_struk+data.tahan+"  berhasil disimpan",
                                                                icon: "success",
                                                                }).then((willDelete) => {
                                                                if (willDelete) {
                                                                window.open('<?= base_url() ?>pos/cetak?id=' + data.id_transaksi,'_blank');
                                                                window.location = '<?= base_url() ?>pos'
                                                                }
                                                            });
                                                        }
                                                    },
                                                    error: function(data){
                                                        console.log(data)
                                                    }
                                            })
                    }
                };
        })
</script>
