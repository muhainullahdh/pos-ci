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
                    <form action="<?= base_url() ?>" method="post" class="form theme-form dark-inputs">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="article_category" class="form-label">Kelompok barang</label>
                                        <select name="kelompok_barang" id="kelompok_barang" class="form-select input-air-primary digits">
                                            <option value="">--Pilih</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="article_category" class="form-label">s/d</label>
                                        <select name="kelompok_barang" id="kelompok_barang" class="form-select input-air-primary digits">
                                            <option value="">--Pilih</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="article_category" class="form-label">Barang</label>
                                        <select name="kelompok_barang" id="kelompok_barang" class="form-select input-air-primary digits">
                                            <option value="">--Pilih</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="article_category" class="form-label">s/d</label>
                                        <select name="kelompok_barang" id="kelompok_barang" class="form-select input-air-primary digits">
                                            <option value="">--Pilih</option>
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
                                        <label for="article_category" class="form-label">Gudang</label>
                                        <select name="kelompok_barang" id="kelompok_barang" class="form-select input-air-primary digits">
                                            <option value="">--Pilih</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="article_category" class="form-label">s/d</label>
                                        <select name="kelompok_barang" id="kelompok_barang" class="form-select input-air-primary digits">
                                            <option value="">--Pilih</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="option" class="form-label">Option</label>
                                        <select name="kelompok_barang" id="kelompok_barang" class="form-select input-air-primary digits">
                                            <option value="">--Pilih</option>
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
                                        <button type="submit" class="btn btn-primary">Proses</button>
                                        <button type="submit" class="btn btn-primary">Cetak</button>
                                        <button type="submit" class="btn btn-primary">Cetak excel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-body">

                    </div>
                    <div class="card-body">

                        <?= $this->session->flashdata('message_name') ?>
                        <div class="table-responsive">
                            <table class=" display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Nama barang</th>
                                        <th>Sisa stok</th>
                                        <th>Total stok</th>
                                        <th>Saldo stok</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>