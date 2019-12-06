const birthdayModels = require("../models/birthdayModels.js");
function getAllBirthdays(req, res){
        console.log("Showing all birthdays in a month");

        birthdayModels.getAllBirthdays(function(error, results){
        	res.json(results);
	});
}


function getMonthofBirthdays(req, res){
        console.log("Showing all birthdays in a month");

	var month = req.query.month;
	console.log("Search for month: " + month);

        birthdayModels.getBirthdayByMonth(month, function(error, results){
        	res.json(results);
	});

}

function getBirthday(req, res){
        console.log("Getting birthday");
	var name = req.query.name;

        birthdayModels.getBirthdayByName(name, function(error, results){
		res.json(results);
	});

}

function postNewBirthday(req, res){
	var name = req.body.name;
	var month = req.body.month;
	var day = req.body.day;
	var year = req.body.year;
	var current_age = req.body.current_age;
	var address = req.body.address;

	var results = birthdayModels.insertBirthday(name, month, day, year, current_age, address, function(error, results){
        	res.json(results);
	});
	console.log("Creating new entry for: " + name);
}

module.exports = {
	getAllBirthdays: getAllBirthdays,
	getMonthofBirthdays: getMonthofBirthdays,
	getBirthday: getBirthday,
	postNewBirthday: postNewBirthday
};
