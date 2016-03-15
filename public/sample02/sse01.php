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
    $file = file_get_contents("./tmp/hello.txt");
    if ($file == false) { // The file is not found
      echo "event: progress\n";
      echo "data: " . json_encode( array( "data" => "no_data" ) ) . "\n";
      echo "retry: 1000";
	    echo "\n\n";
    } else {
      $lines = explode( "\n" , $file );
      $count = count( $lines );
      $last = "---";
      if ($count>1) {
        $last = $lines[$count-2];
      }
	    echo "event: progress\n";
	    echo "data: " . json_encode( array( "progress" => $last ) ) . "\n";
      echo "retry: 1000";
	    echo "\n\n";
      if ($last == "Completed") {
        echo "event: stop\n";
        echo "data: " . json_encode( array( "progress" => "completed" ) );
        echo "\n\n";
      }
    }

	  ob_flush();
	  flush();
  }


