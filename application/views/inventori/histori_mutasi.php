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
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4">
                                <a href="<?= base_url('inventori/mutasi_barang') ?>" class="btn btn-warning btn-sm">Kembali</a>
                                <!-- <a href="<?= base_url('inventori/pending_mutasi') ?>" class="btn btn-danger btn-sm">Butuh persetujuan</a> -->
                            </div>
                            <div class="col-8 text-end">
                                <?= format_indo(date('Y-m-d')) ?>
                            </div>
                        </div>
                        <form action="<?= base_url('inventori/histori_mutasi') ?>" method="post" class="row g-3 custom-input mt-2">
                            <div class="col-3">
                                <input class="form-control" name="dari" type="date" value="<?= $this->input->post('dari') ?>" required>
                            </div>
                            <div class="col-3">
                                <div class="">
                                    <input type="date" class="form-control" name="sampai" value="<?= $this->input->post('dari') ?>" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <a href="<?= base_url('inventori/histori_sop') ?>" class="btn btn-warning">Tampilkan hari ini</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('message_name') ?>
                        <div class="table-responsive">
                            <table class=" display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No. Mutasi</th>
                                        <th>Gudang asal</th>
                                        <th>Gudang tujuan</th>
                                        <th>Tanggal</th>
                                        <th>User</th>
                                        <th>Act.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($lists as $l) {
                                        $gudang_asal = $this->db->get_where('gudang', ['id' => $l->id_gudang_asal])->row_array();
                                        $gudang_tujuan = $this->db->get_where('gudang', ['id' => $l->id_gudang_tujuan])->row_array();

                                        $user = $this->db->where('id', $l->created_by)->get('users')->row_array();
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $l->no_mutasi ?></td>
                                            <td><?= $gudang_asal['nama'] ?></td>
                                            <td><?= $gudang_tujuan['nama'] ?></td>
                                            <td><?= format_indo($l->tanggal_mutasi) ?></td>
                                            <td><?= $user['nama'] ?></td>
                                            <td>
                                                <a href='<?= base_url("inventori/detail_mutasi/$l->no_mutasi") ?>' class="btn btn-primary btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href='<?= base_url("inventori/delete_mutasi/$l->id") ?>' class="btn btn-danger btn-sm btn-delete" data-bs-toggle="tooltip" title="Hapus <?= $l->no_mutasi ?>">&times;</a>
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