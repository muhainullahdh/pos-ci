<script>
    window.print()
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
 font-size: 18px;
 font-family: Arial;
}

/* Create two equal columns that floats next to each other */
.col {
  float: left;
  width: 20%;
  /* padding: 10px; */
  /* height: 1px; Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
<body>
<table>
    <tr>
        <td colspan="2" style="text-align: center; vertical-align: middle;"><b style="font-size:28px;">TOKO LINGLING</b><br> JL.RAYA TENGAH NO.1 <br>No.tlp : 081111</td>
    </tr>
    <!-- <tr>
        <td style="text-align:right">JL.RAYA TENGAH NO.1</td>
    </tr> -->
    <tr>
        <td width="180">
            No. <?= $transkasi['no_struk'] ?>
        </td>
        <td style="text-align:right"><?=  date('d/m/Y',strtotime($transkasi['tgl_transaksi']))?></td>
    </tr>
    <tr>
        <td>Cus : <?=  $this->db->get_where('customers',['id_customer' => $transkasi['pelanggan']])->row_array()['nama_toko']; ?></td>
        <td style="text-align:right"><?= date('H:i:s') ?></td>
    </tr>
    <tr>
        <td>Ksr : <?=  $this->db->get_where('users',['id' => $transkasi['kasir']])->row_array()['nama']; ?></td>
        <!-- <td style="text-align:right"><?=  $this->db->get_where('ekspedisi',['id' => $transkasi['pengiriman']])->row_array()['kurir'] == "Internal" ? "Ambil ditoko" : "Ekspedisi"; ?></td> -->
        <td style="font-size:14px;text-align:right"><?=  $this->db->get_where('ekspedisi',['id' => $transkasi['pengiriman']])->row_array()['nama']; ?></td>
    </tr>
    <!-- <tr>
        <td>Pengirim </td>
        <td><?=  $this->db->get_where('ekspedisi',['id' => $transkasi['pengiriman']])->row_array()['kurir'] == "Internal" ? "Ambil ditoko" : "Ekspedisi"; ?></td>
    </tr> -->
    <tr>
        <th colspan="2"><hr></th>
    </tr>
    <?php
    $sub_total = 0;
    foreach ($transaksi_item as $x) {
        $sub_total += $x->harga_satuan*$x->qty;
        ?>
    <tr>
        <td width="240"><?= $x->barang ?></td>
    </tr>
    <tr>
        <td><?= $x->qty ?> &nbsp;&nbsp;&nbsp; <?= $x->satuan ?> &nbsp;&nbsp;&nbsp; <?= number_format($x->harga_satuan,0,',',',') ?> </td>
        <td style="text-align:right"><?= number_format($x->harga_satuan*$x->qty,0,',',',') ?></td>
    </tr>
    <?php } ?>
    <tr>
        <th colspan="2"><hr></th>
    </tr>
    <tr>
        <td>
            <div style="float:left;width:50%;"> Total Item </div>
            <div style="float:left;width:50%;text-align:center"><?= count($transaksi_item) ?> item</div>
        </td>
        <td style="text-align:left"></td>
    </tr>
    <tr>
        <td>Sub Total</td>
        <td style="text-align:right"><?= number_format($sub_total,0,',',',') ?></td>
    </tr>
    <tr>
        <td>Sisa Bon Yang lalu</td>
        <td style="text-align:right"><?= number_format(0,0,',',',') ?></td>
    </tr>
    <tr>
        <td>
            <div style="float:left;width:50%;"> Tunai / Transfer</div>
            <?php
                $bank = json_decode($transkasi['info_pembayaran']) == "" ? 'Cash' : json_decode($transkasi['info_pembayaran'])->bank;
            ?>
            <div style="float:left;width:50%;text-align:center"><?= $bank ?></div>
        </td>
        <td style="text-align:right"><?= number_format($transkasi['total_bayar'],0,',',',') ?></td>
    </tr>
    <?php if ($transkasi['tunai'] == true) {?>
    <tr>
        <td>
            <div style="float:left;width:50%;"> Tunai</div>
        </td>
        <td style="text-align:right"><?= number_format($transkasi['tunai'],0,',',',') ?></td>
    </tr>
    <?php } ?>
    <?php if ($transkasi['pembayaran'] == 'VOCHER') { ?>
    <tr>
        <td>
            <div style="float:left;width:50%;"> Vocher</div>
            <div style="float:left;width:50%;text-align:center">NC00001</div>
        </td>
        <td style="text-align:right"><?= number_format($transkasi['total_bayar'],0,',',',') ?></td>
    </tr>
    <?php } ?>
    <tr>
        <td>
            <!-- <?php if($transkasi['pembayaran'] == "CASH") {
                echo "Cash";
            }else if ($transkasi['pembayaran'] == "TRANSFER") {
                echo "Transfer";
            }
            ?> -->
            Diskon
        </td>
        <td style="text-align:right"><?= number_format($transkasi['diskon'],0,',',',') ?></td>
    </tr>
    <tr>
        <td>Kembali</td>
        <td style="text-align:right"><?= number_format($transkasi['kembali'],0,',',',') ?></td>
    </tr>
    <tr>
        <td></td>
        <td><hr></td>
    </tr>
    <tr>
        <td>Sisa Bon</td>
        <td></td>
    </tr>

    <tr>
        <th colspan="2"><hr></th>
    </tr>
    <tr>
        <td colspan="2" width="150" style="text-align: center; vertical-align: middle;font-size:12px;">Barang yang sudah dibeli tidak dapat <br> di kembalikan
Mohon croscek sebelum meninggalkan toko <br>
<b>TERIMAKASIH</b></td>
    </tr>
</table>
</body>
</html>
