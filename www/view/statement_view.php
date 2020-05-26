<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入明細</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<body>
  <?php 
  include VIEW_PATH . 'templates/header_logined.php'; 
  ?>

  <div class="container">
    <h1>購入明細</h1>

    <?php include VIEW_PATH . 'templates/messages.php'; ?>

<ul>
    <li>注文番号:<?php print($order_id);?></li>
    <li>購入日時:<?php print($created);?></li>
    <li>合計金額:<?php print(number_format($total));?>円</li>
</ul>
      <table class="table table-bordered text-center">
        <thead class="thead-light">
          <tr>
            <th>商品名</th>
            <th>購入時の商品価格</th>
            <th>購入数</th>
            <th>小計</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($history_details as $history_detail){ ?>
          <tr>
            <td><?php print($history_detail['name']);?></td>
            <td><?php print(number_format($history_detail['price']));?>円</td>
            <td><?php print($history_detail['amount']);?></td>
            <td><?php print(number_format($history_detail['subtotal'])); ?>円</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
  </div>
</body>
</html>