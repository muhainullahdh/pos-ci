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
                        <li class="breadcrumb-item">Koreksi barang</li>
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
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#buatStockkoreksi">Buat baru</button>
                                <!-- <a href="<?= base_url('inventori/pending_koreksi') ?>" class="btn btn-danger btn-sm">Butuh persetujuan</a> -->
                                <a href="<?= base_url('inventori/histori_koreksi') ?>" class="btn btn-primary btn-sm">Riwayat koreksi</a>
                            </div>
                            <div class="col-6 text-end">
                                <?= format_indo(date('Y-m-d')) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="buatStockkoreksi" tabindex="-1" role="dialog" aria-labelledby="buatStockkoreksi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buatStockkoreksiLongTitle">Buat Koreksi</h5>
                <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('inventori/add_koreksi') ?>" method="post" class="form theme-form dark-inputs" id="barangForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3">
                            <input type="hidden" name="no_urut" id="no_urut" class="form-control" value="<?= $no_urut ?>">
                            <label for="No. Koreksi" class="form-label">No. Koreksi</label>
                            <input type="text" class="form-control" name="no_koreksi" id="no_koreksi" value="<?= $no_koreksi ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label" for="Tanggal">Tanggal</label>
                            <input class="form-control" id="tanggal" name="tanggal" type="date" value="<?= date('Y-m-d') ?>" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="mb-3">
                            <label class="form-label" for="Tanggal">Lokasi barang</label>
                            <select name="gudang" id="gudang" class="form-select input-air-primary digits" onchange="getBarang()" required>
                                <option value="">--</option>
                                <?php
                                foreach ($gudang2 as $g) {
                                ?>
                                    <option value="<?= $g->id ?>">(<?= $g->kode ?>) <?= $g->nama ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="Keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <div class="row">
                        <div class="col-12 text-end">
                            <div class="">
                                <label for="submit" class="form-label">&nbsp;</label>
                                <button type="submit" class="btn btn-primary" name="submit" data-bs-toggle="tooltip" title="Simpan" value="proses">Buat</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>