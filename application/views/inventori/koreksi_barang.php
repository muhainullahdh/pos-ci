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