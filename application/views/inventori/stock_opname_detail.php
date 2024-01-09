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
                    <h4>Stock opname</h4>
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
                            <a href="<?= base_url('inventori/stock_opname') ?>">Stok opname</a>
                        </li>
                        <li class="breadcrumb-item">
                            <?= $sop['no_stock_opname'] ?>
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
                        <!-- <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#buatStockOpname">Buat baru</button> -->
                        <div class="row">
                            <div class="col-12 text-end">
                                <a href="<?= base_url('inventori/stock_opname') ?>" class="btn btn-primary btn-sm">Kembali</a>
                                <a href="<?= base_url('inventori/sop_approve_all/' . $sop['id']) ?>" class="btn btn-primary btn-sm btn-process">Setujui semua</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <input type="hidden" name="no_urut" id="no_urut" class="form-control" value="<?= $sop['no_urut'] ?>">
                                    <label class="form-label" for="no_sop">No. Stock Opname</label>
                                    <input class="form-control" id="no_sop" name="no_sop" type="text" value="<?= $sop['no_stock_opname'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="Tanggal">Tanggal</label>
                                    <input type="date" name="tanggal_sop" id="tanggal_sop" class="form-control" value="<?= $sop['tanggal_opname'] ?>" readonly>
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
                                    <th>Stok Aktual</th>
                                    <th>Selisih</th>
                                    <th>Status</th>
                                    <th>Act.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;
                                $no_sop = $sop['no_stock_opname'];
                                foreach ($list as $l) :
                                    $barang_detail = $this->db->select('nama')->where('id', $l->id_barang)->get('barang')->row_array();
                                    $status = $l->status;

                                    if ($status == 0) {
                                        $ket = "Belum disetujui";
                                    } else {
                                        $ket = "Sudah disetujui";
                                    } ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $barang_detail['nama'] ?></td>
                                        <td><?= $l->satuan ?></td>
                                        <td><?= $l->qty_sistem ?></td>
                                        <td><?= $l->qty_fisik ?></td>
                                        <td><?= $l->selisih ?></td>
                                        <td><?= $ket ?></td>
                                        <td>
                                            <!-- <a href='<?= base_url("inventori/delete_detail_sop/$no_sop/$l->Id") ?>' class="btn btn-danger btn-sm btn-delete" data-bs-toggle="tooltip" title="Hapus <?= $barang_detail['nama'] ?>">&times;</a> -->
                                            <a href='<?= base_url("inventori/delete_detail_sop/$no_sop/$l->Id") ?>' class="btn btn-sm btn-delete <?= ($status == '1') ? 'btn-success disabled' : 'btn-danger' ?>" data-bs-toggle="tooltip" title="Hapus <?= $barang_detail['nama'] ?>">
                                                <i class="fa fa-<?= ($status == '1') ? 'thumbs-up' : 'times' ?>"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                                <!-- <form action="<?= base_url('inventori/add_detail_sop') ?>" method="post">
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td style="width: 200px;">
                                            <input type="hidden" name="id_stock_opname" value="<?= $sop['id'] ?>">
                                            <input type="hidden" name="no_stock_opname" value="<?= $sop['no_stock_opname'] ?>">
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
                                            <input type="text" class="form-control" name="qty_sistem" id="qty_sistem" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="qty_fisik" id="qty_fisik" oninput="hitung()">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="selisih" id="selisih" readonly>
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
                    $('#qty_sistem').val(barangDetail.stok);
                }
            });
        } else {
            // Barang tidak dipilih, atur kembali elemen HTML menjadi kosong atau nilai default
            $('#satuan').val('');
            $('#qty_sistem').val('');
        }
    }


    function hitung() {
        var qty_sistem = document.getElementById('qty_sistem').value;
        var qty_fisik = document.getElementById('qty_fisik').value;

        var hitungSelisih = Number(qty_fisik) - Number(qty_sistem);

        document.getElementById('selisih').value = hitungSelisih;
    }


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