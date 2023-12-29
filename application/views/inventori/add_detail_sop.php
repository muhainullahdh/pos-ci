<div class="page-body">

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Stock opname <?= $no_stock_opname ?></h4>
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

                    <form action="<?= base_url('inventori/add_detail_sop') ?>" method="post">
                        <div class="card-body">
                            <?= $this->session->flashdata('message_name') ?>
                            <!-- <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#buatStockOpname">Buat baru</button> -->
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="no_sop">No. Stock Opname</label>
                                        <input class="form-control" id="no_sop" name="no_sop" type="text" value="<?= $no_stock_opname ?>" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="Tanggal">Tanggal</label>
                                        <input type="date" name="tanggal_sop" id="tanggal_sop" class="form-control" value="<?= $tanggal_opname ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="stock-opname">
                                <thead>
                                    <tr>
                                        <th>Nama barang</th>
                                        <th>Satuan</th>
                                        <th>Stok Sistem</th>
                                        <th>Stok Aktual</th>
                                        <th>Selisih</th>
                                        <th>Act.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width: 200px;">
                                            <select name="barang[]" id="barang[]" class="form-select input-air-primary digits select2" onchange="showBarangDetail(this)" required>
                                                <option value="">--</option>
                                                <?php
                                                foreach ($barang as $b) {
                                                ?>
                                                    <option value="<?= $b->id ?>">(<?= $b->kode_barang ?>) <?= $b->nama ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="satuan[]" id="satuan[]" readonly>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="qty_sistem[]" id="qty_sistem[]" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="qty_fisik[]" id="qty_fisik[]" oninput="hitung(this)">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="selisih[]" id="selisih[]" readonly>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-light btn-sm" name="add_row">&plus;</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- <script>
    $('.select2').select2();
</script> -->
<script>
    $(document).ready(function() {
        $('.select2').select2();

        <?php
        $barangOptions = [];
        foreach ($barang as $b) {
            $barangOptions[] = [
                'id' => $b->id,
                'kode_barang' => $b->kode_barang,
                'nama' => $b->nama,
            ];
        }
        ?>

        var optionsBarang = <?php echo json_encode($barangOptions); ?>;

        function showBarangDetail(element) {
            var barangId = $(element).val();

            if (barangId) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('inventori/getbarangdetail') ?>',
                    data: {
                        barang_id: barangId
                    },
                    success: function(detailData) {
                        var barangDetail = JSON.parse(detailData);
                        var row = $(element).closest('tr');
                        row.find('[name="satuan[]"]').val(barangDetail.id_satuan_kecil);
                        row.find('[name="qty_sistem[]"]').val(barangDetail.stok);
                    }
                });
            } else {
                var row = $(element).closest('tr');
                row.find('[name="satuan[]"]').val('');
                row.find('[name="qty_sistem[]"]').val('');
            }
        }

        function hitung(element) {
            var row = $(element).closest('tr');
            var qty_sistem = row.find('[name="qty_sistem[]"]').val();
            var qty_fisik = row.find('[name="qty_fisik[]"]').val();
            var selisih = Number(qty_fisik) - Number(qty_sistem);
            row.find('[name="selisih[]"]').val(selisih);
        }

        $('[name="add_row"]').on('click', function() {
            var existingRow = $('#stock-opname tbody tr:first');
            var newRow = existingRow.clone();
            newRow.find('input, select').val('');

            var selectBarang = newRow.find('select[name="barang[]"]');
            selectBarang.empty();
            optionsBarang.forEach(function(option) {
                selectBarang.append('<option value="' + option.id + '">(' + option.kode_barang + ') ' + option.nama + '</option>');
            });

            $('#stock-opname tbody').append(newRow);
        });

        $(".btn-delete").on("click", function(e) {
            e.preventDefault();
            const href = $(this).attr("href");
            Swal.fire({
                title: "Anda yakin?",
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
    });
</script>

</script>