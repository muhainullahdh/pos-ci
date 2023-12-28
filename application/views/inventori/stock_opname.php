<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Stock opname</h4>
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
                        <li class="breadcrumb-item">Stok opname</li>
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
                        <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#buatStockOpname">Buat baru</button>

                    </div>
                    <div class="table-responsive">
                        <table class="table" id="stock-opname">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. Stock Opname</th>
                                    <th>Gudang</th>
                                    <th>Tanggal</th>
                                    <th>User</th>
                                    <th>Act.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($lists as $l) :
                                    $gudang = $this->db->where('id', $l->id_gudang)->get('gudang')->row_array();
                                    $user = $this->db->where('id', $l->created_by)->get('users')->row_array();
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $l->no_stock_opname ?></td>
                                        <td><?= $gudang['nama'] ?></td>
                                        <td><?= format_indo($l->tanggal_opname) ?></td>
                                        <td><?= $user['nama'] ?></td>
                                        <td>
                                            <a href='<?= base_url("inventori/detail_sop/$l->no_stock_opname") ?>' class="btn btn-primary btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="buatStockOpname" tabindex="-1" role="dialog" aria-labelledby="buatStockOpname" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buatStockOpnameLongTitle">Buat stock opname</h5>
                <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('inventori/add_stock_opname') ?>" method="post" class="form theme-form dark-inputs" id="barangForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="Tanggal">Tanggal</label>
                                <input class="form-control" id="tanggal" name="tanggal" type="date" value="<?= date('Y-m-d') ?>" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="Tanggal">Lokasi barang</label>
                                <select name="gudang" id="gudang" class="form-select input-air-primary digits" onchange="getBarang()">
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
                                <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control"></textarea>
                            </div>
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
<script>
    $('#stock-opname').DataTable({
        "paging": true,
        "ordering": false,
        "info": false,
        "order": [
            [2, "asc"]
        ]
    });
</script>