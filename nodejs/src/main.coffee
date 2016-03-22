# EventSource = require("eventsource")
#
# es = new EventSource('http://sse/sample01/sse01.php')
#
# es.addEventListener "progress", (e) ->
#   console.log( "progress : " + e.data ) 


EntryLoop = require "./entry_loop"
el = new EntryLoop( { 
  url : "http://sse/sample01/sse01.php" 
} )

el.exec()


