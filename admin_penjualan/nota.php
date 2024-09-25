<?php
require_once '../database/config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nota No. PJ-4240920241</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets_adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets_adminlte/dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
         <img src="../img/logoservice.png" height="100px" width="125px"> Pangeran Komputer
          <small class="float-right">Tanggal: 2/10/2014</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
      Dari
        <address>
          <strong>Pangeran Komputer</strong><br>
          Jl. Pagojengan no. 212, Paguyangan<br>
          Kabupaten Brebes<br>
          WA: +62 85 227 699 699<br>
          Email: info@pangerankomputer.crt
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        Kepada
        <address>
          <strong>Tuan Virgy Setya Wardana</strong><br>
          -<br>
          -<br>
          Phone: (555) 539-1037<br>
          Email: vsw@prasetyagroup.my.id
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Nota #PJ-4</b><br>
        <br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped table-sm">
          <thead>
          <tr>
            <th>No</th>
            <th>Items</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $id_nota = @$_GET['id_nota'];
            $qr_nota = mysqli_query($koneksi, "SELECT * FROM tbl_nota WHERE id_request='$id_nota'") or die (mysqli_error($koneksi));
            $querytotal = mysqli_query($koneksi,"SELECT SUM(subtotal) AS peluk FROM tbl_nota WHERE id_request='$id_nota'") or die (mysqli_error($koneksi));
            $arrtotal = mysqli_fetch_assoc($querytotal);
            $total = $arrtotal['peluk'];
            $ppn = (11/100)*$total;
            $pph = (2/100)*$total;
            $totalharga = $total+$ppn+$pph;


            if (mysqli_num_rows($qr_nota)> 0) {
              while ($dt_nota = mysqli_fetch_array($qr_nota)){
                ?>
                <tr>
                <td><?= $no++ ; ?></td>
                <td><?= $dt_nota['item']; ?></td>
                <td><?= $dt_nota['qty']; ?></td>
                <td>Rp <?= number_format($dt_nota['harga'],0,",",".");?>,-</td>
                <td>Rp <?= number_format($dt_nota['subtotal'],0,",","."); ?></td>           
              </tr>
              <?php
              }
            }
            ?>
          
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
  
      </div>
      <!-- /.col -->
      <div class="col-6">
        <div class="table-responsive">
          <table class="table table-sm">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>Rp <?=number_format($total,0,".",",");?>,-</td>
            </tr>
            <tr>
              <th>PPN (11%)</th>
              <td>Rp <?=number_format($ppn,0,".",",");?>,-</td>
            </tr>
            <tr>
              <th>PPH (2%)</th>
              <td>Rp <?=number_format($pph,0,".",",");?>,-</td>
            </tr>
            <tr>
              <th>Shipping:</th>
              <td>-</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>Rp <?=number_format($totalharga,0,".",",");?>,-</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
