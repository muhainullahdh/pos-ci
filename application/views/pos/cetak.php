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
        <td width="180">
            No. <?= $transkasi['no_struk'] ?>
        </td>
        <td><?= substr($transkasi['no_struk'],0,10) ?></td>
    </tr>
    <tr>
        <td>Cus : <?=  $this->db->get_where('customers',['id_customer' => $transkasi['pelanggan']])->row_array()['nama_toko']; ?></td>
        <td style="text-align:right"><?= date('H:i:s') ?></td>
    </tr>
    <tr>
        <td>Ksr : <?=  $this->db->get_where('users',['id' => $transkasi['kasir']])->row_array()['nama']; ?></td>
        <td style="text-align:right"><?= date('H:i:s') ?></td>
    </tr>
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
        <td>Total Item</td>
        <td style="text-align:right"><?= count($transaksi_item) ?></td>
    </tr>
    <tr>
        <td>Sub Total</td>
        <td style="text-align:right"><?= number_format($sub_total,0,',',',') ?></td>
    </tr>
    <tr>
        <td>Sisa Bon</td>
        <td style="text-align:right"><?= number_format(0,0,',',',') ?></td>
    </tr>
    <tr>
        <td>Total</td>
        <td style="text-align:right"><?= number_format($sub_total,0,',',',') ?></td>
    </tr>
    <tr>
        <td>
            <?php if($transkasi['pembayaran'] == "CASH") {
                echo "Cash";
            }else if ($transkasi['pembayaran'] == "TRANSFER") {
                echo "Transfer";
            }
            
            ?>
        </td>
        <td style="text-align:right"><?= number_format($sub_total,0,',',',') ?></td>
    </tr>
    <tr>
        <td>Kembali</td>
        <td style="text-align:right"><?= number_format($transkasi['kembali'],0,',',',') ?></td>
    </tr>
    <tr>
        <td></td>
        <td><hr></td>
    </tr>
</table>
</body>
</html>
