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
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4">
                                <a href="<?= base_url('inventori/koreksi_barang') ?>" class="btn btn-warning btn-sm">Kembali</a>
                                <a href="<?= base_url('inventori/pending_koreksi') ?>" class="btn btn-danger btn-sm">Butuh persetujuan</a>
                            </div>
                            <div class="col-8 text-end">
                                <?= format_indo(date('Y-m-d')) ?>
                            </div>
                        </div>
                        <form action="<?= base_url('inventori/histori_koreksi') ?>" method="post" class="row g-3 custom-input mt-2">
                            <div class="col-3">
                                <input class="form-control" id="no_sop" name="dari" type="date" value="<?= $this->input->post('dari') ?>" required>
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
                                    <a href="<?= base_url('inventori/histori_koreksi') ?>" class="btn btn-warning">Tampilkan hari ini</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('message_name') ?>
                        <div class="table-responsive mt-3">
                            <table class="table" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No. Koreksi</th>
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
                                            <td><?= $l->no_koreksi ?></td>
                                            <td><?= $gudang['nama'] ?></td>
                                            <td><?= format_indo($l->tanggal_koreksi) ?></td>
                                            <td><?= $user['nama'] ?></td>
                                            <td>
                                                <a href='<?= base_url("inventori/detail_koreksi/$l->no_koreksi") ?>' class="btn btn-primary btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href='<?= base_url("inventori/delete_koreksi/$l->id") ?>' class="btn btn-danger btn-sm btn-delete" data-bs-toggle="tooltip" title="Hapus <?= $l->no_koreksi ?>">&times;</a>
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
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // jquery tolong carikan btn-delete yang ketika diklik jalankan fungsi berikut ini
    $(".btn-delete").on("click", function(e) {
        e.preventDefault();
        const href = $(this).attr("href");

        console.log(href);
        Swal.fire({
            title: "Anda yakin?",
            // text: "You won't be able to revert this!",
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