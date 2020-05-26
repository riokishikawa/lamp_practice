<?php
require_once '../conf/const.php';
require_once '../model/functions.php';
require_once '../model/cart.php';
require_once '../model/user.php';
require_once '../model/history.php';
require_once '../model/item.php';




session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);
$order_id = get_get('order_id');
$item_id = get_get('item_id');



$history_details= get_history_details($db, $order_id);
$created = $history_details[0]['created'];
$total = 0;
foreach($history_details as $history_detail) {
$total += $history_detail['subtotal'];
} 
include_once VIEW_PATH . 'statement_view.php';