var http = require('http');

function sayHello(req, res){
	console.log("recieved from " + req.url);
	if(req.url === '/home'){
		res.writeHead(200, {'Content-Type': 'text/html'});
		res.write("<h1>Welcome to the Home Page</h1>");
		res.end();
	}
	else if(req.url === '/getData'){
		res.writeHead(200, {'Content-Type': 'application/json'});
		let data = {name: 'Bradlee', class: 'cs313'};
		let json = JSON.stringify(data);
		res.end(json);
	}
	else{
		res.writeHead(404, {'Content-Type': 'text/html'});
		res.write("Page not found");
		res.end();
	}
}

var server = http.createServer(sayHello)
server.listen(8080);

console.log("The server is now listening on port 8080");
