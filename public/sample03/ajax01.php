<?php

if (file_exists("./tmp/hello.txt")) {
  if (!is_writable("./tmp/hello.txt")) {
    $data = array ( "status" => "ERROR" , 
                    "message" => "Please make sample03/tmp/hello.txt is writable"
                );
    echo json_encode( $data );
    die();
  }
} else {
  if (!is_writable("./tmp")) {
    $data = array ( "status" => "ERROR" ,
                    "message" =>  "Please make sample03/tmp directory is writable" 
                );
    echo json_encode( $data );
    die();
  }
}

$name = $_POST["name"];
$age = $_POST["age"];

$fp = fopen("tmp/task.txt","w");
fclose($fp);


for ($i=0;$i<10;$i++) {
  sleep(1);
  $fp = fopen("tmp/task.txt","a");
  $progress = "Task Progress " . ($i+1);
  fwrite($fp,$progress . "\n");
  fclose($fp);
}

$fp = fopen("tmp/task.txt","a");
fwrite($fp,"Completed\n");
fclose($fp);

$data = array ( "status" => "OK" ,
                "message" => "PHP Task is finished" );
echo json_encode( $data );

