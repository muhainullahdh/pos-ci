<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Sisa stok </h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url() ?>">
                                <svg class="stroke-icon">
                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Sisa stok</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#filterStok">Filter</button>
                            </div>
                            <div class="col-6 text-end">
                                <?php
                                if (isset($tampil)) {
                                ?>
                                    <div class="btn-group">
                                        <a href="<?= base_url('inventori') ?>" class="btn btn-warning btn-sm" type="button">Reset</a>
                                        <form action="<?= base_url('inventori/unduh_stock') ?>" method="post">
                                            <button type="submit" class="btn btn-primary btn-sm" name="submit" data-toggle="tooltip" title="Cetak Excel" value="cetak_excel" style="margin-left: 5px; margin-right: 5px;" onclick="cetak_excel()">Cetak excel</button>
                                            <button type="submit" id="btnCetakPDF" class="btn btn-primary btn-sm" name="submit" data-toggle="tooltip" title="Cetak PDF" value="cetak" target="_blank">Cetak PDF</button>
                                            <input type="hidden" class="form-control" name="kelompok_barang" value="<?= $this->input->post('kelompok_barang') ?>">
                                            <input type="hidden" class="form-control" name="barang" value="<?= $this->input->post('barang') ?>">
                                            <input type="hidden" class="form-control" name="barang2" value="<?= $this->input->post('barang2') ?>">
                                            <input type="hidden" class="form-control" name="gudang1" value="<?= $this->input->post('gudang1') ?>">
                                            <input type="hidden" class="form-control" name="gudang2" value="<?= $this->input->post('gudang2') ?>">
                                            <input type="hidden" class="form-control" name="opsi_stok" value="<?= $this->input->post('opsi_stok') ?>">
                                            <input type="hidden" class="form-control" name="input_nama_barang" value="<?= $this->input->post('input_nama_barang') ?>">
                                        </form>

                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 10px !important">
                        <?php
                        if (isset($tampil)) {
                        ?>
                            <div class="table-responsive">
                                <table class=" display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode barang</th>
                                            <th>Nama barang</th>
                                            <th>Kode gudang</th>
                                            <th>Satuan</th>
                                            <th>Sisa stok</th>
                                            <th>Saldo stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($tampil as $t) {
                                            $saldo_stock = $t->stok * $t->hpp_kecil;
                                            $kd_gudang = $this->db->select('kode')->where('id', $t->id_gudang)->get('gudang')->row_array(); ?>
                                            <tr>
                                                <td class="text-end"><?= $no++ ?>.</td>
                                                <td><?= $t->kode_barang ?></td>
                                                <td><?= $t->nama ?></td>
                                                <td><?= $kd_gudang['kode'] ?></td>
                                                <td>
                                                    <select class="satuan-select">
                                                        <?php
                                                        if ($t->id_satuan_kecil) {
                                                        ?>
                                                            <option value="kecil" data-harga="<?= $t->hpp_kecil; ?>" data-stok="<?= $t->stok ?>" data-qty="<?= $t->qty_kecil ?>"><?= $t->id_satuan_kecil ?></option>
                                                        <?php
                                                        }

                                                        if ($t->id_satuan_besar) {
                                                        ?>
                                                            <option value="besar" data-harga="<?= $t->hpp_besar; ?>" data-stok="<?= $t->stok ?>" data-qty="<?= $t->qty_kecil ?>"><?= $t->id_satuan_besar ?></option>
                                                        <?php
                                                        }

                                                        if ($t->id_satuan_kecil_konv) {
                                                        ?>
                                                            <option value="konv" data-harga="<?= $t->hpp_konv; ?>" data-stok="<?= $t->stok ?>" data-qty="<?= $t->qty_besar ?>"><?= $t->id_satuan_kecil_konv ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td class="text-end stok" id="stok"><?= number_format($t->stok) ?></td>
                                                <td class="text-end harga" id="saldo_stok-<?= $t->id ?>"><?= number_format($saldo_stock) ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="filterStok" tabindex="-1" role="dialog" aria-labelledby="filterStok" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterStokLongTitle">Cek stok</h5>
                <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('inventori/process') ?>" method="post" class="form theme-form dark-inputs" id="barangForm">
                <div class="modal-body">


                    <?= $this->session->flashdata('message_name') ?>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="kelompok_barang" class="form-label">Kelompok barang </label>
                                <select name="kelompok_barang" id="kelompok_barang" class="form-select input-air-primary digits select2">
                                    <!-- <select name="kelompok_barang" id="kelompok_barang" class="form-select input-air-primary digits select2" onchange="getBarang()"> -->
                                    <option value="">--pilih</option>
                                    <?php
                                    foreach ($categories as $c) {
                                    ?>
                                        <option <?= ($this->input->post('kelompok_barang') == $c->id) ? "selected" : "" ?> value="<?= $c->id ?>"><?= $c->nama_kategori ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="article_category" class="form-label">Barang</label>
                                <select name="barang" id="barang" class="form-select input-air-primary digits select2">
                                    <option value="">--Pilih</option>
                                    <!-- <?php
                                            $id_barang = $this->input->post('barang');
                                            $nama_barang = $this->db->where('id', $id_barang)->get('barang')->row_array();
                                            if ($id_barang) {
                                            ?>
                                        <option value="<?= $id_barang ?>" selected><?= $nama_barang['nama'] ?></option>
                                    <?php
                                            }
                                    ?> -->
                                    <?php
                                    foreach ($barang as $b) {
                                    ?>
                                        <option <?= ($id_barang == $b->id) ? "selected" : '' ?> value="<?= $b->id ?>"><?= $b->nama ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="article_category" class="form-label">s/d</label>
                                <select name="barang2" id="barang2" class="form-select input-air-primary digits select2">
                                    <option value="">--Pilih</option>
                                    <!-- <?php
                                            $id_barang2 = $this->input->post('barang2');
                                            $nama_barang2 = $this->db->where('id', $id_barang2)->get('barang')->row_array();
                                            if ($id_barang2) {
                                            ?>
                                        <option value="<?= $id_barang2 ?>" selected><?= $nama_barang2['nama'] ?></option>
                                    <?php
                                            }
                                    ?> -->
                                    <?php
                                    foreach ($barang as $b) {
                                    ?>
                                        <option <?= ($id_barang2 == $b->id) ? "selected" : '' ?> value="<?= $b->id ?>"><?= $b->nama ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="article_category" class="form-label">&nbsp;</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control input-air-primary">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="gudang1" class="form-label">Gudang</label>
                                <select name="gudang1" id="gudang1" class="form-select input-air-primary digits select2">
                                    <option value="">--Pilih</option>
                                    <?php
                                    foreach ($gudang as $g) {
                                    ?>
                                        <option <?= ($this->input->post('gudang1') == $g->id) ? "selected" : "" ?> value="<?= $g->id ?>"><?= $g->nama ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="gudang2" class="form-label">s/d</label>
                                <select name="gudang2" id="gudang2" class="form-select input-air-primary digits select2">
                                    <option value="">--Pilih</option>
                                    <?php
                                    foreach ($gudang as $g) {
                                    ?>
                                        <option <?= ($this->input->post('gudang2') == $g->id) ? "selected" : "" ?> value="<?= $g->id ?>"><?= $g->nama ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="option" class="form-label">Option</label>
                                <select name="opsi_stok" id="opsi_stok" class="form-select input-air-primary digits">
                                    <option value="all">All</option>
                                    <option <?= ($this->input->post('opsi_stok') == "sisa_stok") ? "selected" : "" ?> value="sisa_stok">Sisa stok</option>
                                    <option <?= ($this->input->post('opsi_stok') == "stok_0") ? "selected" : "" ?> value="stok_0">Stok 0</option>
                                    <option <?= ($this->input->post('opsi_stok') == "stok_minus") ? "selected" : "" ?> value="stok_minus">Stok minus</option>
                                    <option <?= ($this->input->post('opsi_stok') == "stok_0_dan_minus") ? "selected" : "" ?> value="stok_0_dan_minus">Stok 0 dan minus</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="article_category" class="form-label">Nama barang / barcode</label>
                                <input type="text" name="input_nama_barang" id="input_nama_barang" class="form-control input-air-primary" value=" <?= (($this->input->post('input_nama_barang'))) ? $this->input->post('input_nama_barang') : "" ?>" placeholder="Masukkan kata kunci nama barang">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <div class="row">
                        <div class="col-12 text-end">
                            <div class="mb-3">
                                <label for="submit" class="form-label">&nbsp;</label>
                                <a href="<?= base_url('inventori') ?>" class="btn btn-warning" data-bs-toggle="tooltip" title="Reset pencarian">Reset</a>
                                <button type="submit" class="btn btn-primary" name="submit" data-bs-toggle="tooltip" title="Hanya update nama" value="proses">Tampilkan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $('#kelompok_barang').select2({
        dropdownParent: $('#filterStok')
    });
    $('#barang').select2({
        dropdownParent: $('#filterStok')
    });
    $('#barang2').select2({
        dropdownParent: $('#filterStok')
    });

    $(document).ready(function() {
        $('.satuan-select').change(function() {

            var selectedOption = $(this).find(':selected').val();
            var harga = $(this).find(':selected').data('harga');
            var stok = $(this).find(':selected').data('stok');
            var qty = $(this).find(':selected').data('qty');

            var jumlah;
            if (selectedOption == "kecil") {
                jumlah = stok;
            } else {
                jumlah = Math.floor(stok / qty);
            }

            console.log(selectedOption);

            var saldo = harga * jumlah;
            $(this).closest('tr').find('.harga').text(saldo.toLocaleString());
            $(this).closest('tr').find('.stok').text(jumlah);
        });
    });
</script>
<script>
    <?php

    $barangOptions = [];
    foreach ($barang as $b) {
        $barangOptions[] = [
            'id' => $b->id,
            'label' => $b->nama,
            'satuan' => $b->id_satuan_kecil,
            'satuan_besar' => $b->id_satuan_besar,
            'satuan_konv' => $b->id_satuan_kecil_konv,
            'stok' => $b->stok,
            'hpp_kecil' => $b->hpp_kecil,
            'hpp_besar' => $b->hpp_besar,
            'hpp_konv' => $b->hpp_konv,
        ];
    }
    ?>

    function check_saldo(id) {
        // Dapatkan nilai stok dan hpp dari elemen <select>
        var selectedBarang = document.getElementById('satuan-' + id);
        var selectedOption = selectedBarang.options[selectedBarang.selectedIndex];
        var stok = selectedOption.getAttribute('data-stok');
        var hpp_kecil = selectedOption.getAttribute('data-hpp-kecil');
        var hpp_besar = selectedOption.getAttribute('data-hpp-besar');
        var hpp_konv = selectedOption.getAttribute('data-hpp-konv');

        // Hitung saldo stok
        var saldoStok = stok * hpp;

        // Update elemen dengan ID 'saldo_stok' sesuai dengan ID barang
        document.getElementById('saldo_stok-' + id).innerHTML = saldoStok.toFixed(2);
    }
</script>
<script>
    $('#sisa-stok').DataTable({
        "paging": true,
        "ordering": false,
        "info": false,
        "order": [
            [2, "asc"]
        ]
    });
    $('#basic-3').DataTable({});
</script>