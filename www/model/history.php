<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_histories($db, $user_id, $is_admin){
$param = array();
  $sql = '
    SELECT
      histories.order_id,
      histories.created,
      sum(price*amount) as total
      
    FROM
      histories

    INNER JOIN
      history_details

    ON
      histories.order_id = history_details.order_id

    GROUP BY
      order_id
  ';
  if($is_admin === false){
    $sql .= '
      WHERE user_id = ?
    ';
    $param = array($user_id);
  }

  return fetch_all_query($db, $sql, $param);
}

function get_history_details($db, $order_id){
  $sql = '
    SELECT
      details,
      price,
      amount,
      price*amount as subtotal

    FROM
      history_details
    
    WHERE
    　 order_id = ?
  ';

  return fetch_all_query($db, $sql, array('order_id'));
}
