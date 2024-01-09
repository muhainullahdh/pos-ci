<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .table th,
    .table td {
        padding: 0.3rem;
    }
</style>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Koreksi barang</h4>
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
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('inventori/koreksi') ?>">Koreksi barang</a>
                        </li>
                        <li class="breadcrumb-item">
                            <?= $koreksi['no_koreksi'] ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <!-- <div class="card-body" style="padding: 10px !important"> -->
                    <div class="card-body">
                        <?= $this->session->flashdata('message_name') ?>
                        <!-- <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#buatStockkoreksi">Buat baru</button> -->
                        <div class="row">
                            <div class="col-12 text-end">
                                <a href="<?= base_url('inventori/koreksi_barang') ?>" class="btn btn-primary btn-sm">Kembali</a>
                                <a href="<?= base_url('inventori/koreksi_approve_all/' . $koreksi['id']) ?>" class="btn btn-primary btn-sm btn-process">Setujui semua</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <input type="hidden" name="no_urut" id="no_urut" class="form-control" value="<?= $koreksi['no_urut'] ?>">
                                    <label class="form-label" for="no_koreksi">No. Koreksi barang</label>
                                    <input class="form-control" id="no_koreksi" name="no_koreksi" type="text" value="<?= $koreksi['no_koreksi'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="Tanggal">Tanggal</label>
                                    <input type="date" name="tanggal_koreksi" id="tanggal_koreksi" class="form-control" value="<?= $koreksi['tanggal_koreksi'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="padding: 10px !important; min-width: 0px !important;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama barang</th>
                                    <th>Satuan</th>
                                    <th>Stok Sistem</th>
                                    <th>Debit/Kredit</th>
                                    <th>Jumlah Koreksi</th>
                                    <th>Status</th>
                                    <th>Act.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;
                                $no_koreksi = $koreksi['no_koreksi'];
                                foreach ($list as $l) :
                                    $barang_detail = $this->db->select('nama')->where('id', $l->id_barang)->get('barang')->row_array();
                                    $status = $l->status_koreksi;

                                    if ($status == 0) {
                                        $ket = "Belum disetujui";
                                    } else {
                                        $ket = "Sudah disetujui";
                                    } ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $barang_detail['nama'] ?></td>
                                        <td><?= $l->satuan ?></td>
                                        <td><?= $l->stok_awal ?></td>
                                        <td><?= $l->debit_kredit ?></td>
                                        <td><?= $l->jumlah_koreksi ?></td>
                                        <td><?= $ket ?></td>
                                        <td>
                                            <a href='<?= base_url("inventori/delete_detail_koreksi/$no_koreksi/$l->Id") ?>' class="btn btn-sm btn-delete <?= ($status == '1') ? 'btn-success disabled' : 'btn-danger' ?>" data-bs-toggle="tooltip" title="Hapus <?= $barang_detail['nama'] ?>">
                                                <i class="fa fa-<?= ($status == '1') ? 'thumbs-up' : 'times' ?>"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                                <!-- <form action="<?= base_url('inventori/add_detail_koreksi_2') ?>" method="post">
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td style="width: 200px;">
                                            <input type="hidden" name="id_koreksi" value="<?= $koreksi['id'] ?>">
                                            <input type="hidden" name="no_koreksi" value="<?= $koreksi['no_koreksi'] ?>">
                                            <select name="barang" id="barang" class="form-select input-air-primary digits select2" onchange="showBarangDetail()" required>
                                                <option value="">--</option>
                                                <?php
                                                foreach ($barang as $b) {
                                                ?>
                                                    <option value="<?= $b->id ?>"><?= $b->nama ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="satuan" id="satuan" readonly>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="stok_awal" id="stok_awal" readonly>
                                        </td>
                                        <td>
                                            <select name="debit_kredit" id="debit_kredit" class="form-control">
                                                <option value="">--Pilih</option>
                                                <option value="debit">Debit</option>
                                                <option value="kredit">Kredit</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="jumlah_koreksi" id="jumlah_koreksi">
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-light btn-sm">&plus;</button>
                                        </td>
                                    </tr>
                                </form> -->
                            </tbody>
                        </table>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.select2').select2();
</script>
<script>
    function showBarangDetail() {
        // Pastikan barangId tidak kosong
        var barangId = document.getElementById('barang').value;

        if (barangId) {
            // Lakukan pengambilan detail barang berdasarkan ID barang
            $.ajax({
                type: 'POST',
                url: '<?= base_url('inventori/getbarangdetail') ?>',
                data: {
                    barang_id: barangId
                },
                success: function(detailData) {
                    // Tampilkan detail barang ke dalam elemen HTML yang sesuai
                    var barangDetail = JSON.parse(detailData);

                    $('#satuan').val(barangDetail.id_satuan_kecil);
                    $('#stok_awal').val(barangDetail.stok);
                }
            });
        } else {
            // Barang tidak dipilih, atur kembali elemen HTML menjadi kosong atau nilai default
            $('#satuan').val('');
            $('#stok_awal').val('');
        }
    }


    // function hitung() {
    //     var stok_awal = document.getElementById('stok_awal').value;
    //     var jumlah_koreksi = document.getElementById('jumlah_koreksi').value;

    //     var hitungSelisih = Number(jumlah_koreksi) - Number(stok_awal);

    //     document.getElementById('selisih').value = hitungSelisih;
    // }


    // jquery tolong carikan btn-delete yang ketika diklik jalankan fungsi berikut ini
    $(".btn-delete").on("click", function(e) {
        e.preventDefault();
        const href = $(this).attr("href");

        console.log(href);
        Swal.fire({
            title: "Anda yakin?",
            // text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        });
    });

    $(".btn-process").on("click", function(e) {
        e.preventDefault();
        const href = $(this).attr("href");

        console.log(href);
        Swal.fire({
            title: "Anda yakin?",
            // text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Setujui!",
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        });
    });
</script>