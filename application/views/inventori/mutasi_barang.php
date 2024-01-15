<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Mutasi barang </h4>
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
                        <li class="breadcrumb-item">Mutasi barang</li>
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
                        <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#entri_barang">Buat baru</button>
                        <!-- <a href="<?= base_url('inventori/pending_mutasi') ?>" class="btn btn-danger btn-sm">Butuh persetujuan</a> -->
                        <a href="<?= base_url('inventori/histori_mutasi') ?>" class="btn btn-primary btn-sm">Riwayat mutasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="entri_barang" tabindex="-1" role="dialog" aria-labelledby="entri_barang" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="entri_barangLongTitle">Entri barang </h5>
                <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('inventori/add_mutasi') ?>" method="post" class="form theme-form dark-input" id="myForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="no_urut" id="no_urut" class="form-control" value="<?= $no_urut ?>">
                            <label for="category" class="form-label">No. Mutasi barang</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm nominal" name="no_mutasi" id="no_mutasi" value="<?= $no_mutasi ?>" readonly autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="category" class="form-label">Tanggal</label>
                            <div class="input-group">
                                <input class="form-control" id="tanggal" name="tanggal" type="date" value="<?= date('Y-m-d') ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="category" class="form-label">Lokasi asal</label>
                            <div class="input-group">
                                <select name="lokasi_asal" id="lokasi_asal" class="form-select">
                                    <option value="">--Pilih lokasi barang</option>
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
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="category" class="form-label">Lokasi tujuan</label>
                            <div class="input-group">
                                <select name="lokasi_tujuan" id="lokasi_tujuan" class="form-select">
                                    <option value="">--Pilih lokasi barang</option>
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
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="category" class="form-label">Keterangan</label>
                            <div class="input-group">
                                <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control"></textarea>
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