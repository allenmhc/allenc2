canvasWidth = 0
canvasHeight = 0

$(document).ready ->
  $lines = $(".lines")
  $path = $lines.find(".line-path")
  $pathAnimation = $lines.find(".line-path-animation")
  canvasWidth = $lines.width()
  canvasHeight = $lines.height()

  startingX = Math.round(canvasWidth / 3 + Math.random() * canvasWidth / 3)
  startingY = Math.round(canvasHeight / 3 + Math.random() * canvasHeight / 3)
  startingPos = new Position(startingX, startingY)

  path = "M#{startingX} #{startingY} "
  for i in [0...1000]
    nextPath = startingPos.nextRandomPath()
    path += "#{nextPath}"

  strokeLength = i * Position.prototype.pointGap
  $path.attr
    "d": path
    "stroke-dasharray": "#{strokeLength},#{strokeLength}"
    "stroke-dashoffset": "#{strokeLength}"
  $pathAnimation.attr( from: strokeLength )

class Position
  pointGap: 50

  constructor: (@x, @y) ->

  nextRandomPath: ->
    direction = Math.floor(Math.random() * 4)
    switch direction
      when 0 then @x -= @pointGap
      when 1 then @y += @pointGap
      when 2 then @x += @pointGap
      when 3 then @y -= @pointGap
    @x += @pointGap if @x < 0
    @x -= @pointGap if @x > canvasWidth
    @y += @pointGap if @y < 0
    @y -= @pointGap if @y > canvasHeight

    "L#{@x} #{@y} "
