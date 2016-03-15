<?php

  header("Content-Type: text/event-stream\n\n");
  header("Cache-Control: no-cache");
  echo "event: start\n";
  echo "data: " . json_encode( array( "dummy" => "OK" ) );
  echo "\n\n";
  ob_flush();
  flush();
  for ($i=0;$i<5;$i++) {
	  sleep(1);
//	  session_start();
	  echo "event: progress\n";
	  echo "data: " . json_encode( array( "progress" => $i+1 ) );
	  echo "\n\n";
	  ob_flush();
	  flush();
//	  session_write_close();
  }


