<?php
require_once '../conf/const.php';
require_once '../model/functions.php';
require_once '../model/cart.php';
require_once '../model/user.php';
require_once '../model/history.php';



session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);
$order_id = get_get('order_id');
$history_details= get_history_details($db, $order_id);


include_once VIEW_PATH . 'statement_view.php';