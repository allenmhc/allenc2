(function() {
  var Position, canvasHeight, canvasWidth;
  canvasWidth = 0;
  canvasHeight = 0;
  $(document).ready(function() {
    var $lines, $path, $pathAnimation, i, nextPath, path, startingPos, startingX, startingY, strokeLength;
    $lines = $(".lines");
    $path = $lines.find(".line-path");
    $pathAnimation = $lines.find(".line-path-animation");
    canvasWidth = $lines.width();
    canvasHeight = $lines.height();
    startingX = Math.round(canvasWidth / 3 + Math.random() * canvasWidth / 3);
    startingY = Math.round(canvasHeight / 3 + Math.random() * canvasHeight / 3);
    startingPos = new Position(startingX, startingY);
    path = "M" + startingX + " " + startingY + " ";
    for (i = 0; i < 1000; i++) {
      nextPath = startingPos.nextRandomPath();
      path += "" + nextPath;
    }
    strokeLength = i * Position.prototype.pointGap;
    $path.attr({
      "d": path,
      "stroke-dasharray": "" + strokeLength + "," + strokeLength,
      "stroke-dashoffset": "" + strokeLength
    });
    return $pathAnimation.attr({
      from: strokeLength
    });
  });
  Position = (function() {
    Position.prototype.pointGap = 50;
    function Position(x, y) {
      this.x = x;
      this.y = y;
    }
    Position.prototype.nextRandomPath = function() {
      var direction;
      direction = Math.floor(Math.random() * 4);
      switch (direction) {
        case 0:
          this.x -= this.pointGap;
          break;
        case 1:
          this.y += this.pointGap;
          break;
        case 2:
          this.x += this.pointGap;
          break;
        case 3:
          this.y -= this.pointGap;
      }
      if (this.x < 0) {
        this.x += this.pointGap;
      }
      if (this.x > canvasWidth) {
        this.x -= this.pointGap;
      }
      if (this.y < 0) {
        this.y += this.pointGap;
      }
      if (this.y > canvasHeight) {
        this.y -= this.pointGap;
      }
      return "L" + this.x + " " + this.y + " ";
    };
    return Position;
  })();
}).call(this);
