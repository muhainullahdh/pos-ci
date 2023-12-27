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
                                        <th>Kode barang</th>
                                        <th>Nama barang</th>
                                        <th>Tanggal koreksi</th>
                                        <th>Jumlah koreksi</th>
                                        <th>Alasan</th>
                                        <th>User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($koreksi as $b) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $b->kode_barang ?></td>
                                            <td><?= $b->nama ?></td>
                                            <td><?= $b->tanggal_koreksi ?></td>
                                            <td><?= $b->jumlah_koreksi ?></td>
                                            <td><?= $b->alasan_koreksi ?></td>
                                            <td><?= $b->nama_user ?></td>
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