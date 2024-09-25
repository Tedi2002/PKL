<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>receipt</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">
  <link rel="stylesheet" href="../paper.css">
  <style>@page { size: 58mm 100mm }</style>
  <style>
    body.receipt .sheet { width: 58mm; height: 100mm } /* change height as you like */
    @media print { body.receipt { width: 58mm } } /* this line is needed for fixing Chrome's bug */
  </style>
</head>

<body class="receipt">
  <section class="sheet padding-10mm">
    <table>
      <thead>
        <th>Item</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Subtotal</th>
      </thead>
      <tbody>
        <tr>
          <td><font style="size: 10;">Nasi Goreng Gila</font></td>
          <td>25.000</td>
          <td>3</td>
          <td>75.000</td>
        </tr>
      </tbody>
    </table>
    
  </section>
<script>
  window.addEventListener("load", window.print());
</script>
</body>

</html>