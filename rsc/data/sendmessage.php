<?php
// Push The notification
require_once('PushBots.class.php');

class sendMessage{
  public function push($msg){
    $pb = new PushBots();
    // Application ID
    $appID = '5cb188320540a31fcd656555';
    // Application Secret
    $appSecret = 'd0fa32e4725c24bedb7129422f145706';
    $pb->App($appID, $appSecret);
    $pb->Platform(array(0,1,2,3,4,5));
    $pb->Alert($msg);
    $pb->Push();
  }
  //  public function push2($msg){
  //   $pb = new PushBots();
  //   // Application ID
  //   $appID = '5c3eedd40540a3649a50677b';
  //   // Application Secret
  //   $appSecret = '7fbda3b28a683f96ce3dac4386d5d532';
  //   $pb->App($appID, $appSecret);
  //   $pb->Platform(array(0,1,2,3,4,5));
  //   $pb->Alert($msg);
  //   $pb->Push();
  // }
}
// 
// $msg="Vanessa mande yon sache pen nan 30 minit depi kafou";
// $push=new sendMessage();
// $push->push($msg);

?>
