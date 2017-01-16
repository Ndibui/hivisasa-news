var express = require('express'),
	app		= express();

app.get('/', function(req,res){
	res.sendFile(__dirname + '/index.html');
})

app.use('/app', express.static(__dirname + '/app'));
app.use('/js', express.static(__dirname + '/lib/js'));
app.use('/css', express.static(__dirname + '/lib/css'));
app.use('/fonts', express.static(__dirname + '/lib/fonts'));
app.use('/img', express.static(__dirname + '/lib/img'));
app.use('/vendor', express.static(__dirname + '/lib/vendor'));

app.use('/views', express.static(__dirname + '/views'));
app.use('/node_modules', express.static(__dirname + '/node_modules'));
app.use('/controllers', express.static(__dirname + '/app/controllers'));
app.use('/services', express.static(__dirname + '/app/services'));

app.use('*',function(req,res,next){
	res.sendFile(__dirname + '/index.html');
})

app.listen(3000, function(){
	console.log('Listening...');
})