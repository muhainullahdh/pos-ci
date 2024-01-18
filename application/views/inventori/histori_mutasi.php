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
                                        $cek = $this->db->where('id_mutasi', $l->id)->where('status_mutasi', '0')->get('mutasi_details')->num_rows();
                                        $gudang_asal = $this->db->get_where('gudang', ['id' => $l->id_gudang_asal])->row_array();
                                        $gudang_tujuan = $this->db->get_where('gudang', ['id' => $l->id_gudang_tujuan])->row_array();

                                        $user = $this->db->where('id', $l->created_by)->get('users')->row_array();
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <span class="badge <?= ($cek == 0) ? "badge-success" : "badge-warning text-dark" ?>" style="margin-right: 5px;"><?= $cek ?>
                                                </span>
                                                <?= $l->no_mutasi ?>
                                            </td>
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