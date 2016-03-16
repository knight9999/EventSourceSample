<?php

  session_start();
  session_write_close();

  header("Content-Type: text/event-stream\n\n");
  header("Cache-Control: no-cache");
  echo "event: start\n";
  echo "data: " . json_encode( array( "dummy" => "OK" ) );
  echo "\n\n";
  ob_flush();
  flush();
  for ($i=0;$i<5;$i++) {
	  sleep(1);
    session_start();
    $progress = $_SESSION["progress"];
    session_write_close();

    if ($progress == false) { // The file is not found
      echo "event: progress\n";
      echo "data: " . json_encode( array( "data" => "no_data" ) ) . "\n";
      echo "retry: 1000";
	    echo "\n\n";
    } else {
	    echo "event: progress\n";
	    echo "data: " . json_encode( array( "progress" => $progress ) ) . "\n";
      echo "retry: 1000";
	    echo "\n\n";
      if ($progress == "Completed") {
        echo "event: stop\n";
        echo "data: " . json_encode( array( "progress" => "completed" ) );
        echo "\n\n";
      }
    }

	  ob_flush();
	  flush();
  }


