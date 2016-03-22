EventSource = require 'eventsource'

class EventLoop
  _url = null

  constructor: ( options ) ->
    _url = options.url

  exec: ->
    es = new EventSource( _url )
    es.addEventListener("progress", (e) ->
      console.log("progress : " + e.data) )

  
module.exports = EventLoop



