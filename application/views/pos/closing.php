<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Closing</title>
    <style>
        #container {
            margin-top: 0;
        }

        .dhr {
            border-bottom: double 4px #666;
        }

        .font-fal {
            font-family: Arial, Helvetica, sans-serif;
        }

        #body {
            margin-top: 1em;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10pt;
        }

        #body table {
            font-family: Arial, Helvetica, sans-serif;
        }

        .paragraf {
            text-indent: 4em;
            text-align: justify;
        }

        i {
            font-weight: normal;
        }

        p {
            text-align: justify;
        }

        table {
            width: 100%;
            font-size: 10pt;
            float: left;
        }

        .no-bor {
            border: none;
        }

        .no-bor td {
            padding: 0 7px;
            text-align: justify;
        }

        hr {
            border: 2px solid #333;
            margin: 5px 0;
        }

        .double {
            border-top: 2px double #333;
            height: 10px;
        }

        h2 {
            font-size: 13pt;
        }

        h3 {
            font-size: 11pt;
        }

        h4 {
            font-size: 10pt;
        }

        h5 {
            font-size: 9pt;
        }

        h6 {
            font-size: 8pt;
        }

        .mt20 {
            margin-top: 20px;
        }

        .mt10 {
            margin-top: 10px;
        }

        .mt-10 {
            padding-top: -10px;
        }

        .mt5 {
            margin-top: 5px;
        }

        .tb-border {
            border-collapse: collapse;
            border: 1px solid #666;
        }

        .tb-border td,
        .tb-border th {
            border-collapse: collapse;
            border-bottom: 1px solid #666;
            border-top: 1px solid #666;
            padding: 2px 5px;
            vertical-align: top;
        }

        .tb-border td h4 {
            margin: 14px 7px;
        }

        .tb-bors {
            border-collapse: collapse;
            padding: 0;
        }

        .bor-lf {
            border-collapse: collapse;
            border: 1px solid #666;
            padding: 4px 7px;
        }

        .no-bor-lf {
            border-left: 1px solid #FFF;
            border-right: 1px solid #666;
            border-bottom: 1px solid #666;
            padding: 4px 7px;
        }

        .no-bor-lfx {
            border-left: 1px solid #FFF;
            border-right: 1px solid #FFF;
            border-bottom: 1px solid #666;
            padding: 4px 7px;
        }

        .bor-lfx {
            border-left: 1px solid #FFF;
            border-right: 1px solid #FFF;
            padding: 4px 7px;
        }

        .tb-bor {
            border-collapse: collapse;
            border: 1px solid #666;
        }

        .tb-nom tr td {
            height: 65px;
        }

        .tb-spd tr td {
            height: 65px;
        }

        .tb-kui tr td {
            padding: 8px;
        }

        .tb-bor td {
            padding: 3px 7px;
        }

        p {
            margin: 10px 0;
        }

        small {
            font-size: 8pt;
        }

        .ln20 {
            line-height: 20px;
        }

        .ptgas {
            width: 640px;
            background-color: yellow;
        }

        .sp1 {
            float: left;
            width: 20px;
        }

        .sp2 {
            float: left;
            width: 160px;
            background-color: yellow;
            display: block;
        }

        .sp3 {
            float: left;
            width: 480px;
        }

        .ft10 {
            font-size: 10pt;
        }

        .ft9 {
            font-size: 9pt;
        }

        .ft8 {
            font-size: 8pt;
        }

        .ft7 {
            font-size: 7pt;
        }

        .ft7s {
            font-size: 7.5pt;
        }

        .ft6s {
            font-size: 6.5pt;
        }

        .ft11 {
            font-size: 11pt;
        }

        .ft12 {
            font-size: 12pt;
        }

        .ft14 {
            font-size: 14pt;
        }

        #tb-bds {
            width: 100%;
            margin: 0 42px 0 46px;
            border-collapse: collapse;
            font-size: 9pt;
        }

        #tb-bd {
            width: 100%;
            margin: 0 82px 0 86px;
            border-collapse: collapse;
            font-size: 9pt;
        }

        .tb-bdr td {
            border-collapse: collapse;
            border: 1px solid #666;
            vertical-align: middle;
            padding: 5px;
        }

        #no-bdr {
            border-left: none;
            text-align: left;
            margin: 0;
            padding: 0;
        }

        #no-bdr td {
            border: none;
            vertical-align: top;
            font-size: 8.5pt;
            padding: 2px 0;
        }

        .ctr {
            text-align: center;
        }

        #tbor {
            border-collapse: collapse;
            border: 1px solid #666;
            ;
        }

        #tbor .no-btm {
            border: none;
            padding: 2px 4px;
        }

        #tbor .btm {
            border: 1px solid #666;
        }

        .sep {
            padding-right: 5px;
            float: left;
        }

        .right {
            text-align: right;
        }

        .center {
            text-align: center;
        }

        .justifi {
            text-align: justify;
        }

        .img-height {
            max-height: 600px;
        }
    </style>
</head>

<body>
    <div id="container">
        <div id="body">
            <h4>Closing</h4>
            <p>Tanggal : <?= $tgl_closing ?></p>
            <table class="tb-bor mt10 ft9">
                <tr>
                    <th class="bor-lf">No</th>
                    <th class="bor-lf">No Struk</th>
                    <th class="bor-lf">Tgl Bukti</th>
                    <th class="bor-lf">Pembayaran</th>
                    <th class="bor-lf">Nama Pelanggan</th>
                    <th class="bor-lf">Total Belanja</th>
                    <th class="bor-lf">Total Bayar</th>
                    <th class="bor-lf">Retur Jual</th>
                    <th class="bor-lf">Kurang Bayar</th>
                    <th class="bor-lf">Bayar BON</th>
                </tr>
                <?php
                $no = 1;
                if (isset($penjualan)) {
                    $jumlah_row = 0;
                    $total_bayar_row = 0;
                    $total_kurang_bayar = 0;
                    $total_kembali_row = 0;
                    foreach ($penjualan as $row) {

                        $jumlah_row += $row->jumlah;
                        $total_bayar_row += $row->total_bayar;
                        $total_kembali_row += $row->kembali;
                        $kurang_bayar = $row->total_transkasi - $row->bayar_piutang;
                        ?>
                        <tr>
                            <td class="bor-lf"><?= $no ?></td>
                            <td class="bor-lf"><?= $row->no_struk ?></td>
                            <td class="bor-lf"><?= $row->tgl_transaksi ?></td>
                            <td class="bor-lf"><?= $row->pembayaran ?></td>
                            <td class="bor-lf"><?= $row->nama_toko ?></td>
                            <td class="bor-lf"><?= 'Rp.' .
                                number_format($row->total_transaksi, 0, '.', '.') ?></td>
                            <?php if ($row->piutang == 1) { ?>
                                <td class="bor-lf">
                                    <?= 'Rp.' .
                                        number_format(
                                            $row->bayar_piutang,
                                            0,
                                            '.',
                                            '.'
                                        ) ?>
                                </td>
                            <?php } else { ?>
                                <td class="bor-lf"><?= 'Rp.' .
                                    number_format(
                                        $row->total_transaksi - $row->bayar_piutang,
                                        0,
                                        '.',
                                        '.'
                                    ) ?></td>
                            <?php } ?>
                            <td class="bor-lf"><?= 'Rp.' .
                                number_format(0, 0, '.', '.') ?></td>
                            <td class="bor-lf"><?= 'Rp.' .
                                number_format(
                                    $kurang_bayar,
                                    0,
                                    '.',
                                    '.'
                                ) ?></td>
                            <!-- <td class="bor-lf"><?= 'Rp.' .
                                number_format(0, 0, '.', '.') ?></td> -->
                            <td class="bor-lf"><?= 'Rp.' .
                                number_format(0, 0, '.', '.') ?></td>
                        </tr>
                <?php
                $no++;
                $total_kurang_bayar += $kurang_bayar;

                    }
                }
                ?>
                <tr>
                    <td class="bor-lf" colspan="5">Grand Total</td>
                    <td class="bor-lf" colspan="1"><?= 'Rp.' .
                        number_format($jumlah_row, 0, '.', '.') ?></td>
                    <td class="bor-lf" colspan="1"><?= 'Rp.' .
                        number_format($total_bayar_row, 0, '.', '.') ?></td>
                    <td class="bor-lf" colspan="1"><?= 'Rp.' .
                        number_format(0, 0, '.', '.') ?></td>
                    <td class="bor-lf" colspan="1"><?= 'Rp.' .
                        number_format($total_kurang_bayar, 0, '.', '.') ?></td>
                    <td class="bor-lf" colspan="1"><?= 'Rp.' .
                        number_format(0, 0, '.', '.') ?></td>
                </tr>
                <tr>
                    <td class="bor-lf" colspan="9" style="text-align:right;"><br><strong>Total penerimaan kasir</strong></td>
                    <td class="bor-lf" colspan="1"><br>
                    <?= 'Rp.' .
                        number_format($jumlah_row - $total_kembali_row  - $total_kurang_bayar, 0, '.', '.') ?></td>
                </tr>
            </table>
            <br>

        </div>
</body>

</html>
