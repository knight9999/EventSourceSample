<?php

if (file_exists("./tmp/hello.txt")) {
  if (!is_writable("./tmp/hello.txt")) {
    $data = array ( "status" => "ERROR" , 
                    "message" => "Please make sample02/tmp/hello.txt is writable"
                );
    echo json_encode( $data );
    die();
  }
} else {
  if (!is_writable("./tmp")) {
    $data = array ( "status" => "ERROR" ,
                    "message" =>  "Please make sample02/tmp directory is writable" 
                );
    echo json_encode( $data );
    die();
  }
}

$name = $_POST["name"];
$age = $_POST["age"];

// exec("python ./hello.py > tmp/hello.txt 2>&1 &");
exec("python ./hello.py > ./tmp/hello.txt 2>&1 &");
$data = array ( "status" => "OK" ,
                "message" => "Start Python Task",
                "name" => $name ,
                "age" => $age  );
echo json_encode( $data );

