<?php

  header("Content-Type: text/event-stream\n\n");
  header("Cache-Control: no-cache");
  $lastEventId = $_SERVER["HTTP_LAST_EVENT_ID"];
  echo "event: start\n";
  echo "data: " . $lastEventId . "\n";
  echo "data: " . json_encode( array( "dummy" => "OK" ) );
  echo "\n\n";
  ob_flush();
  flush();
  $start = 0;
  if ($lastEventId) {
    if ( preg_match( "/count_([0-9]+)/",$lastEventId , $matches ) ) {
      $start = ( (int) $matches[1] ) + 1;
    }
  }
  for ($i=$start;$i<$start+3;$i++) {
    if ($i==30) {
      echo "event: stop\n";
      echo "data: \n\n";
      ob_flush();
      flush();
      break;
    }

	  sleep(1);
    $myid = "count_" . $i;
	  echo "event: progress\n";
	  echo "data: " . json_encode( array( "progress" => $i+1 ) ) . "\n";
    echo "id: " . $myid . "\n";
    echo "retry: 1000";
	  echo "\n\n";
	  ob_flush();
	  flush();
  }


