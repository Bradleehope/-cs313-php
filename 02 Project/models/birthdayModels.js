const { Pool } = require("pg");

const db_url = process.env.DATABASE_URL; 
const pool = new Pool({connectionString: db_url});

function getAllBirthdays(callback){
	var sql = "SELECT name, day, year, month, current_age FROM birthdays"

	pool.query(sql, function(error, db_results){
		if(err){
			throw err;
		}else{
			console.log("database: ")
			console.log(db_results);	
			var results = {
              		  list: [
              		  {month: "October", name: "Bradlee"},
                	  {month: "November", name: "Mickey Mouse"}
               		 ]
        		}
			callback(null, results);
		}
	});
}

function getBirthdayByMonth(month, callback){
	var sql = "SELECT name, day, year, month, current_age FROM birthdays WHERE month=$1::text"

	pool.query(sql, function(error, db_results){
		if(error){
			throw error;
		}else{
			console.log("database: ")
			console.log(db_results);	
			var results = {
              		  list: [
              		  {month: month, name: "Bradlee"},
                	  {month: "November", name: "Mickey Mouse"}
               		 ]
        		}
			callback(null, results);
		}
	});
}

function getBirthdayByName(name, callback){
	var results = {month:"December", name:name}
	console.log("search for: " + name);
	callback(null, results);
}

function insertBirthday(name, month, day, year, callback){
	var results = {success:true};

	callback(null, results);
}

module.exports = {
	getAllBirthdays: getAllBirthdays,
	getBirthdayByMonth: getBirthdayByMonth,
	getBirthdayByName: getBirthdayByName,
	insertBirthday: insertBirthday,
};
