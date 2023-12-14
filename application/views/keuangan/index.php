<?= $this->session->flashdata('new_tab') ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    /* .table-sm th {
        padding: 0.2rem;
    } */

    .table-sm td {
        padding: 0.5rem;
    }

    input.nominal {
        width: 100px;
    }
</style>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Keuangan</h4>
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
                        <li class="breadcrumb-item">Keuangan</li>
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

                        <div class="table-responsive">
                            <table class="display" id="payment">
                                <thead>
                                    <tr>
                                        <th style="display: none"></th>
                                        <th>No. Struk</th>
                                        <th>Tgl. Transaksi</th>
                                        <th>Total Transaksi</th>
                                        <th>Total Bayar</th>
                                        <th>Belum bayar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($payment as $p) {
                                        $sisa_bayar = $p->total_transaksi - $p->total_bayar; ?>
                                        <tr>
                                            <td style="display: none"><?= $p->id ?></td>
                                            <td><?= $p->no_struk ?></td>
                                            <td><?= ($p->tgl_transaksi) ? format_indo($p->tgl_transaksi) : "" ?></td>
                                            <td><?= $p->total_transaksi ?></td>
                                            <td><?= $p->total_bayar ?></td>
                                            <td><?= $sisa_bayar ?></td>
                                            <td>
                                                <ul class="action">
                                                    <li class="">
                                                        <button class="btn-primary btn-xs" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#update_payment<?= $p->no_struk ?>" data-bs-no_struk='<?= $p->id ?>'>Bayar</button>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="update_payment<?= $p->no_struk ?>" tabindex="-1" role="dialog" aria-labelledby="update_payment" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="update_paymentLongTitle">No. Struk <?= $p->no_struk ?></h5>
                                                        <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?= base_url('keuangan/bayar_angsuran/') . $p->id ?>" method="post" class="form theme-form dark-input" id="myForm">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="category" class="form-label">Tagihan</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control form-control-sm nominal" value="<?= $sisa_bayar ?>" name="sisa_bayar" id="sisa_bayar<?= $p->no_struk ?>" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="category" class="form-label">Nominal bayar</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control form-control-sm nominal" name="nominal_bayar" id="nominal_bayar<?= $p->no_struk ?>" autofocus>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="category" class="form-label">Sisa bayar</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control form-control-sm nominal" name="sisa" id="sisa<?= $p->no_struk ?>" readonly>
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    $('.select2').select2();
    var paymentOptions = <?= json_encode($payment); ?>;

    // auto complete function
    function autoComplete(arr, input) {
        return arr.filter((e) => {
            if (typeof e === 'string') {
                return e.toLowerCase().includes(input.toLowerCase());
            }
            return false;
        });
    }

    function getValue(val) {
        // if no value
        if (!val) {
            result.innerHTML = "";
            return;
        }

        // Search di sini
        var data = autoComplete(paymentOptions, val);

        // Tambahkan list data
        var res = "<ul>";
        data.forEach((e) => {
            res += "<li>" + e + "</li>";
        });
        res += "</ul>";
        result.innerHTML = res;
    }

    $(document).ready(function() {
        // Basic table example
        $("#payment").DataTable({
            "order": [
                [0, "DESC"]
            ],
        });
    });
</script>
<?php foreach ($payment as $p) : ?>
    <script>
        document.getElementById('nominal_bayar<?= $p->no_struk ?>').addEventListener('input', function() {
            // Menghapus semua karakter selain angka dan koma
            var sanitizedInput = this.value.replace(/[^\d,]/g, '');

            // Mengganti koma ribuan (,) dengan kosong ('') kecuali yang terakhir
            sanitizedInput = sanitizedInput.replace(/(,)(?=\d)/g, '');

            // Memastikan nilai numerik valid atau set ke nilai kosong jika NaN
            var currentInputValue = isNaN(parseFloat(sanitizedInput)) ? '' : parseFloat(sanitizedInput).toLocaleString('en-US');

            // Menetapkan nilai yang telah diformat ke dalam input
            this.value = currentInputValue;

            var nominalTransaksiValue = parseFloat(document.getElementById('sisa_bayar<?= $p->no_struk ?>').value);
            var nominalBayarValue = parseFloat(sanitizedInput.replace(/,/g, ''));

            if (nominalBayarValue > nominalTransaksiValue) {
                // Mengatur nilai input menjadi nilai maksimal yang diperbolehkan
                this.value = nominalTransaksiValue.toLocaleString('en-US');
                nominalBayarValue = nominalTransaksiValue;
            }

            var hasilPengurangan = nominalTransaksiValue - nominalBayarValue;
            document.getElementById('sisa<?= $p->no_struk ?>').value = hasilPengurangan.toLocaleString('en-US');
        });

        // document.getElementById("myForm").addEventListener("submit", function() {
        //     // Formulir disubmit, buka tab baru dengan URL yang diinginkan
        //     window.open('<?= base_url('pos/cetak?id=') . $p->id ?>', '_blank');
        // });
    </script>
<?php endforeach; ?>