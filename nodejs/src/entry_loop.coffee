EventSource = require 'eventsource'

class EventLoop
  _url = null
  _es = null

  constructor: ( options ) ->
    _url = options.url

  exec: ->
    _es = new EventSource( _url )
    _es.addEventListener("progress", (e) ->
      console.log("progress : " + e.data) )

  
module.exports = EventLoop



