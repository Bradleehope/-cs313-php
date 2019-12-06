function displayAll(){
	$.get("/allBirthdays", function(data){
		console.log("Server: ");
		console.log(data);
		
		for (var i = 0; i< data.list.length; i++){
			var birthday = data.list[i];
			console.log(birthday);
			console.log(birthday.name);
			$("#results").append("<b>" + birthday.name + "</b>" + "- " + birthday.month + " " + birthday.day + ", " + birthday.year + " and is currently " + birthday.current_age + " years old <li> Address: " + birthday.address + "</li>");
		}
	})
}

function searchByName(){
	var name = $("#nameInput").val();
	console.log("name: " + name);
	$.get("/birthday", {name:name}, function(data){
		console.log("Server: ");
		console.log(data);
		
		for (var i = 0; i< data.list.length; i++){
			var birthday = data.list[i];
			console.log(birthday);
			console.log(birthday.name);
			$("#results").append("<b>" + birthday.name + "</b>" + "- " + birthday.month + " " + birthday.day + ", " + birthday.year + " and is currently " + birthday.current_age + " years old <li> Address: " + birthday.address + "</li>");
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
			$("#results").append("<b>" + birthday.name + "</b>" + "- " + birthday.month + " " + birthday.day + ", " + birthday.year + " and is currently " + birthday.current_age + " years old <li> Address: " + birthday.address + "</li>");
		}

	})

}

function insertNewBirthday(){
	console.log("Inserting new birthday");
	var name = $("#newName").val();
	var month = $("#newMonth").val();
	var day = $("#newDay").val();
	var year = $("#newYear").val();
	var current_age = $("#newCurrentAge").val();
	var address = $("#newAddress").val();
	var params = {month : month, name: name, day: day, year: year, current_age: current_age, address: address};
	console.log("insert: " + params);
	$.post("/newBirthday", params, function(results){
		if (results) {
			console.log("Success");
		} else {
			console.log("Error in inserting");
		}
	});
}


function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

