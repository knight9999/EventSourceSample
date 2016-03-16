<?php

session_start();
session_write_close();

$name = $_POST["name"];
$age = $_POST["age"];

for ($i=0;$i<10;$i++) {
  sleep(1);
  $progress = "Task Progress " . ($i+1);
  session_start();
  $_SESSION["progress"] = $progress;
  session_write_close();

}

session_start();
$_SESSION["progress"] = "Completed";
session_write_close();

$data = array ( "status" => "OK" ,
                "message" => "PHP Task is finished" );
echo json_encode( $data );

