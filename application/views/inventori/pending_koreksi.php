<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Riwayat koreksi barang </h4>
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
                        <li class="breadcrumb-item">Riwayat koreksi barang</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-no-border">
                        <div class="card-header-right">
                            <!-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#entri_barang">Entri barang</button> -->
                            <a href="<?= base_url('inventori/koreksi_barang') ?>" class="btn btn-primary btn-sm">Koreksi</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <?= $this->session->flashdata('message_name') ?>
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama barang</th>
                                        <th>Tanggal koreksi</th>
                                        <th>Stok awal</th>
                                        <th>Jumlah koreksi</th>
                                        <th>Debit/Kredit</th>
                                        <th>Alasan</th>
                                        <th>User</th>
                                        <th>Act.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($koreksi as $b) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $b->nama_barang ?></td>
                                            <td><?= $b->tanggal_koreksi ?></td>
                                            <td><?= $b->stok_awal ?></td>
                                            <td><?= $b->jumlah_koreksi ?></td>
                                            <td><?= strtoupper($b->debit_kredit) ?></td>
                                            <td><?= $b->alasan_koreksi ?></td>
                                            <td><?= $b->nama_user ?></td>
                                            <td>
                                                <?php
                                                if ($b->status_koreksi == 0) {
                                                ?>
                                                    <a href="<?= base_url('inventori/approve_koreksi/' . $b->id_koreksi) ?>" class="btn btn-primary btn-xs btn-process" title="Setujui koreksi">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                <?php
                                                } else {
                                                ?>
                                                    <button class="btn btn-success btn-xs">Sudah disetujui</button>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(".btn-process").on("click", function(e) {
        e.preventDefault();
        const href = $(this).attr("href");
        Swal.fire({
            title: "Anda yakin?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Proses!",
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        });
    });

    $(".btn-delete").on("click", function(e) {
        e.preventDefault();
        const href = $(this).attr("href");
        Swal.fire({
            title: "Anda yakin?",
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
</script>