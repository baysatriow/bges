<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php
if ($pg == '') {
    include "home.php";
} elseif ($pg == 'pelanggan') {
    include "mod_pelanggan/pelanggan.php";
} elseif ($pg == 'order') {
    include "mod_order/order.php";  
} elseif ($pg == 'kontrak') {
    include "mod_kontrak/kontrak.php"; 
} elseif ($pg == 'am') {
    include "mod_am/am.php"; 
} elseif ($pg == 'user') {
    include "mod_user/user.php";  
}elseif ($pg == 'setting') {
    include "mod_setting/setting.php";
}elseif ($pg == 'usetting'){
    include "mod_user_setting/usetting.php";
}