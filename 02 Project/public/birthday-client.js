function searchByName(){
	var name = $("#nameInput").val();
	console.log("name: " + name);
	$.get("/birthday", {name:name}, function(data){
		console.log("Server: ");
		console.log(data);
		
		for (var i = 0; i< data.list.length; i++){
			var birthday = data.list[i];
			console.log(birthday);
			$("#results").append("<li>" + birthday.name + birthday.month +"</li");
		}


	})
}

function searchByMonth(){
	var month = $("#monthInput").val();
	console.log("month: " + month);
	$.get("/month", {month:month}, function(data){
		console.log("Server: ");
		console.log(data);

		for (var i = 0; i< data.list.length; i++){
			var birthday = data.list[i];
			console.log(birthday);
			$("#results").append("<li>" + birthday.name + birthday.month +"</li");
		}

	})

}
