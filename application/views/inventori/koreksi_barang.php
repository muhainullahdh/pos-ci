<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Koreksi barang </h4>
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
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header card-no-border" style="padding: 10px !important">
                        <div class="card-header-left">
                            <a href="<?= base_url('inventori/histori_koreksi') ?>" class="btn btn-primary btn-sm">Riwayat koreksi</a>
                            <a href="<?= base_url('inventori/pending_koreksi') ?>" class="btn btn-danger btn-sm">Butuh persetujuan</a>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 10px !important">
                        <?= $this->session->flashdata('message_name') ?>
                        <!-- <div class="row">
                            <a href="<?= base_url('inventori/histori_koreksi') ?>" class="btn btn-primary btn-sm">Riwayat koreksi</a>
                        </div> -->
                        <div class="signal-table">
                            <table class="table table-hover" id="table-koreksi">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode barang</th>
                                        <th>Nama barang</th>
                                        <th>Stok</th>
                                        <th>Gudang</th>
                                        <th>Act.</th>
                                        <th>Id</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">

                        <form action="<?= base_url('inventori/proses_koreksi_barang') ?>" method="post">
                            <input type="hidden" class="form-control" name="id_barang" id="id_barang" required readonly>
                            <div class="row">

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="no_sop">Nama barang</label>
                                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="no_sop">Stok sekarang</label>
                                        <input type="text" class="form-control" name="stok" id="stok" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="no_sop">Debit/Kredit</label>
                                        <select name="debit_kredit" id="debit_kredit" class="form-control" required>
                                            <option value="">--</option>
                                            <option value="debit">Debit</option>
                                            <option value="kredit">Kredit</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="no_sop">Jumlah</label>
                                        <input type="text" class="form-control" name="jumlah" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="no_sop">Alasan</label>
                                        <textarea name="alasan_koreksi" id="alasan_koreksi" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="no_sop"></label>
                                        <button type="submit" class="btn btn-primary btn-process mt-4">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->

<script>
    var tableKoreksi = '#table-koreksi';

    var dataTable = new DataTable(tableKoreksi, {
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "getData",
            "type": "POST",
        },
        // "columnDefs": [-1],
        "columnDefs": [{
            "targets": -1, // Kolom terakhir
            "orderable": false, // Tidak bisa diurutkan
            // "render": function(data, type, row, meta) {
            //     return '';
            // }
        }, {
            "targets": [6],
            "visible": false
        }],
        "orderable": true
    });
    // Tanggapi klik pada tombol .barang_v
    $(tableKoreksi).on('click', '.barang_v', function() {
        // Ambil index baris yang diklik
        var rowIndex = $(this).closest('tr').index();

        // Ambil data detail barang dari baris yang diklik
        var rowData = dataTable.row(rowIndex).data();

        // Pastikan rowData tidak kosong sebelum mengakses indeksnya
        if (rowData) {
            var kodeBarang = rowData[1]; // Kolom ke-2 adalah Nama Barang
            var namaBarang = rowData[2]; // Kolom ke-2 adalah Nama Barang
            var stokSekarang = rowData[3]; // Kolom ke-3 adalah Stok Sekarang
            var idBarang = rowData[6]; // Kolom ke-3 adalah Stok Sekarang

            // Isi nilai ke dalam input nama_barang dan stok
            $('#nama_barang').val(namaBarang);
            $('#stok').val(stokSekarang);
            $('#id_barang').val(idBarang);
        }
    });
</script>