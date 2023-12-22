<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Inventori </h4>
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
                        <li class="breadcrumb-item">Inventori</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <form action="<?= base_url('inventori/process') ?>" method="post" class="form theme-form dark-inputs" id="barangForm">
                        <div class="card-body">


                            <?= $this->session->flashdata('message_name') ?>
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="kelompok_barang" class="form-label">Kelompok barang </label>
                                        <select name="kelompok_barang" id="kelompok_barang" class="form-select input-air-primary digits select2" onchange="getBarang()">
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
                                <!-- <div class="col-4">
                                    <div class="mb-3">
                                        <label for="article_category" class="form-label">s/d</label>
                                        <select name="kelompok_barang" id="kelompok_barang" class="form-select input-air-primary digits">
                                            <option value="">--Pilih</option>
                                        </select>
                                    </div>
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="article_category" class="form-label">Barang</label>
                                        <select name="barang" id="barang" class="form-select input-air-primary digits select2">
                                            <option value="all">--Pilih</option>
                                            <?php
                                            $id_barang = $this->input->post('barang');
                                            $nama_barang = $this->db->where('id', $id_barang)->get('barang')->row_array();
                                            if ($id_barang) {
                                            ?>
                                                <option value="<?= $id_barang ?>" selected><?= $nama_barang['nama'] ?></option>
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
                                            <option value="all">--Pilih</option>
                                            <?php
                                            $id_barang2 = $this->input->post('barang2');
                                            $nama_barang2 = $this->db->where('id', $id_barang2)->get('barang')->row_array();
                                            if ($id_barang2) {
                                            ?>
                                                <option value="<?= $id_barang2 ?>" selected><?= $nama_barang2['nama'] ?></option>
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
                                                <option value="<?= $g->id ?>">(<?= $g->kode ?>) <?= $g->nama ?></option>
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
                                                <option value="<?= $g->id ?>">(<?= $g->kode ?>) <?= $g->nama ?></option>
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
                                        <select name="" id="" class="form-select input-air-primary digits">
                                            <option value="all">All</option>
                                            <option value="sisa_stok">Sisa stok</option>
                                            <option value="stok_0">Stok 0</option>
                                            <option value="stok_minus">Stok minus</option>
                                            <option value="stok_0_dan_minus">Stok 0 dan minus</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="article_category" class="form-label">Nama barang / barcode</label>
                                        <input type="text" name="tanggal" id="tanggal" class="form-control input-air-primary">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-end">
                                    <div class="mb-3">
                                        <label for="submit" class="form-label">&nbsp;</label>
                                        <a href="<?= base_url('inventori') ?>" class="btn btn-warning" data-bs-toggle="tooltip" title="Reset pencarian">Reset</a>
                                        <button type="submit" class="btn btn-primary" name="submit" data-bs-toggle="tooltip" title="Hanya update nama" value="proses">Proses</button>
                                        <button type="submit" class="btn btn-primary" name="submit" data-bs-toggle="tooltip" title="Hanya update nama" value="cetak">Cetak</button>
                                        <button type="submit" class="btn btn-primary" name="submit" data-bs-toggle="tooltip" title="Hanya update nama" value="cetak_excel">Cetak excel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($tampil)) {
                    ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class=" display" id="sisa-stok">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode barang</th>
                                            <th>Nama barang</th>
                                            <th>Satuan</th>
                                            <th>Sisa stok</th>
                                            <th>Saldo stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($tampil as $t) {
                                            $saldo_stock = $t->qty_kecil + $t->hargajualk_retail;
                                        ?>
                                            <tr>
                                                <td class="text-end"><?= $no++ ?>.</td>
                                                <td><?= $t->kode_barang ?></td>
                                                <td><?= $t->nama ?></td>
                                                <td class="text-end"><?= $t->qty_kecil . ' '  . $t->id_satuan_kecil ?></td>
                                                <td class="text-end"><?= $t->stok ?></td>
                                                <td class="text-end"><?= number_format($saldo_stock) ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('.select2').select2();
</script>
<script>
    function getBarang() {
        var kategoriId = document.getElementById('kelompok_barang').value;
        $.ajax({
            type: 'POST',
            url: '<?= base_url('inventori/getbarang') ?>',
            data: {
                kategori_id: kategoriId
            },
            success: function(data) {
                // Parse data JSON dari server
                var barangOptions = JSON.parse(data);

                // Hapus opsi yang ada sebelumnya
                $('#barang').empty();
                $('#barang2').empty();

                // Tambahkan opsi default
                $('#barang').append('<option value="">--Pilih--</option>');
                $('#barang2').append('<option value="">--Pilih--</option>');

                // Tambahkan opsi-opsi barang baru
                $.each(barangOptions, function(index, value) {
                    $('#barang').append('<option value="' + value.id + '">(' + value.kode_barang + ') ' + value.nama + '</option>');
                    $('#barang2').append('<option value="' + value.id + '">(' + value.kode_barang + ') ' + value.nama + '</option>');
                });

                // Tampilkan hasil
                // $('#hasilBarang').html('Hasil: ' + $('#barang option:selected').text());
                // $('#hasilBarang2').html('Hasil: ' + $('#barang2 option:selected').text());
            }
        });
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