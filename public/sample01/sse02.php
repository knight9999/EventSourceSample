<?php

  header("Content-Type: text/event-stream\n\n");
  header("Cache-Control: no-cache");
  
  $count = $_GET["count"];
  echo "event: start\n";
  echo "data: " . json_encode( array( "dummy" => "OK" , "count" => $count ) );
  echo "\n\n";
  ob_flush();
  flush();
  for ($i=$count;$i>0;$i--) {
	  sleep(1);
//	  session_start();
	  echo "event: progress\n";
	  echo "data: " . json_encode( array( "count" => $i ) );
    echo "\n\n";
    echo "data: other data (" . $i . ")";
    echo "\n\n";
    ob_flush();
	  flush();
//	  session_write_close();
  }


