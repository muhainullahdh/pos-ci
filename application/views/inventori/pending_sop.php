<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Stock opname pending </h4>
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

                            <a href="<?= base_url('inventori/stock_opname') ?>">
                                Stock opname
                            </a>
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
                    <div class="card-body">

                        <?= $this->session->flashdata('message_name') ?>
                        <div class="table-responsive">
                            <table class=" display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode barang</th>
                                        <th>Nama barang</th>
                                        <th>Qty sistem</th>
                                        <th>Qty fisik</th>
                                        <th>Selisih</th>
                                        <th>Act.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($barang as $b) {
                                        $selisih = $b->selisih;
                                        $formatted_selisih = ($selisih >= 0) ? "+$selisih" : "$selisih";
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $b->kode_barang ?></td>
                                            <td><?= $b->nama ?></td>
                                            <td><?= $b->qty_sistem ?></td>
                                            <td><?= $b->qty_fisik ?></td>
                                            <td class="text-center"><?= $formatted_selisih ?></td>
                                            <td>
                                                <a href='<?= base_url("inventori/approve/$b->Id") ?>' class="btn btn-primary btn-sm btn-process" title="Konfirmasi <?= $b->nama ?>">
                                                    <i class="fa fa-thumbs-up"></i>
                                                </a>
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
<?php
foreach ($barang as $b) {
?>
    <div class="modal fade" id="modal<?= $b->kode_barang ?>" tabindex="-1" role="dialog" aria-labelledby="modal<?= $b->kode_barang ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="entri_barangLongTitle"><?= $b->nama ?> </h5>
                    <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('inventori/proses_koreksi_barang/' . $b->id_barang) ?>" method="post" class="form theme-form dark-input" id="myForm">
                    <div class="modal-body">
                        <input type="hidden" name="id_stock_opname_details" value="<?= $b->Id ?>">
                        <input type="hidden" name="nama_barang" value="<?= $b->nama ?>">
                        <div class="row">
                            <div class="col">
                                <label for="category" class="form-label">Koreksi stok</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm nominal" name="koreksi_stok" id="koreksi_stok">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="category" class="form-label">Alasan koreksi</label>
                                <div class="input-group">
                                    <textarea type="text" class="form-control form-control-sm nominal" name="alasan_koreksi" id="alasan_koreksi"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>

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