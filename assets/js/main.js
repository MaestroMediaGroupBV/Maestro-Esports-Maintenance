var Settings = {
 windowWidth : $('.canvas-wrapper').width(),
 windowHeight : window.outerHeight,
	pointRadius : 2,
	bufferMin : 0.0,
	bufferMax : 1.0,
	resolution : 300,
	pointOffset : 300
}

$(function(){

	var canvas = document.getElementById('canvas'),
			ctx = canvas.getContext('2d'),
			buffer = new ScrollBuffer(),
			randomVals = [];

	var circle = new Circle(function(i){
		var rx = mapRange(this.rand[i][0],[0,1],[-(Settings.windowWidth/2),Settings.windowWidth/2]),
				ry = mapRange(this.rand[i][1],[0,1],[-(Settings.windowHeight/2),Settings.windowHeight/2]),
				angle = this.rand[i][2],
				px = this.centerX + Math.cos(angle*i)*this.radius,
				py = this.centerY + Math.sin(angle*i)*this.radius,
				x = ease(buffer.val,px,rx,1),
				y = ease(buffer.val,py,ry,1);

		p = new Point(x, y).draw(ctx);

	});

	circle.generateRand();
	canvas.width = Settings.windowWidth;
	canvas.height = Settings.windowHeight;

	circle.update();

	//scrolling updates
	$(window).scroll(function(){
		buffer.update();
		if(isNaN(buffer.val)) return;
		circle.update();
	});


})


// Konstructors

function Point( x, y, color, radius ) {
  this.x = x;
  this.y = y;
  this.color = "rgb("+parseInt(Math.random()*255, 10)+",255,255)";
  this.radius = radius || Settings.pointRadius;
}
Point.prototype.draw = function( context ){
	context.beginPath();
	context.arc(this.x, this.y, this.radius, 0 , 2 * Math.PI, false);
	context.fillStyle = this.color;
	context.fill();
}

function Circle(drawFunc) {
	this.radius = 200;
	this.centerX = Settings.windowWidth/2;
	this.centerY = Settings.windowHeight/2;
	this.res = Settings.resolution;
	this.rand = [];
	this.drawFunc = drawFunc || Settings.drawFunc;
}
Circle.prototype.generateRand = function(){
	for (var i = 0; i < (this.res * this.res); i++){
		var rand1 = Math.random(),
				rand2 = Math.random(),
				rand3 = Math.random();
		this.rand.push([rand1, rand2, rand3]);
	}
}
Circle.prototype.update = function(buffer, ctx){
	canvas.width = canvas.width; //reset canvas
	for (var i = 0; i < this.res; i++){
		if(this.drawFunc) this.drawFunc(i);
	}
}

function ScrollBuffer(rangeMin, rangeMax){
	this.min = rangeMin || Settings.bufferMin;
	this.max = rangeMax || Settings.bufferMax;
	this.val = this.min;
	this.inverseVal = this.max;

}
ScrollBuffer.prototype.update = function(){
	var scrollTop = $(window).scrollTop(),
			height = $('body').height() - Settings.windowHeight,
			min = this.min,
			max = this.max;

	this.val = mapRange(scrollTop,[0,height],[min,max]);

}


// Helpers

function mapRange(value, srcRange, dstRange){
  if (value < srcRange[0] || value > srcRange[1]){   // value is outside source range return
    return NaN;
  }
  var srcMax = srcRange[1] - srcRange[0],
      dstMax = dstRange[1] - dstRange[0],
      adjValue = value - srcRange[0];
  return (adjValue * dstMax / srcMax) + dstRange[0];
}

function lerp(a, b, u) {
    return (1 - u) * a + u * b;
};

function ease(t, b, c, d) {
    if ((t/=d/2) < 1) return c/2*t*t + b;
		return -c/2 * ((--t)*(t-2) - 1) + b;
}
