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