const { Pool } = require("pg");

const db_url = process.env.DATABASE_URL = 'postgres://lsirugpppciofj:7e34a25205cbf2ae7dd7532ef21ca1dde6c4de74ed58ff16c830568bfa583255@ec2-54-243-239-199.compute-1.amazonaws.com:5432/d9d9hdgnto5v2k?ssl=true';
const pool = new Pool({connectionString: db_url});

function getAllBirthdays(callback){
	var sql = "SELECT name, day, address, year, month, current_age FROM birthdays"

	pool.query(sql, function(err, db_results){
		if(err){
			throw err;
		}else{
			console.log("database: ")
			console.log(db_results);	
			var results = {
				success: true, list: db_results.rows 
        		};
			callback(null, results);
		}
	});
}

function getBirthdayByMonth(month, callback){
	var sql = "SELECT name, day, address, year, month, current_age FROM birthdays WHERE month=$1::text"
	var params = [month];
	pool.query(sql, params, function(error, db_results){
		if(error){
			throw error;
		}else{
			console.log("database: ")
			console.log(db_results);	
			var results = {
              		  success: true, list: db_results.rows
        		};
			callback(null, results);
		}
	});
}

function getBirthdayByName(name, callback){
	var sql = "SELECT name, day, year, address, month, current_age FROM birthdays WHERE name=$1::text"
	var params = [name];
	pool.query(sql, params, function(error, db_results){
		if(error){
			throw error;
		}else{
			console.log("database: ")
			console.log(db_results);	
			var results = {
				success:true, list: db_results.rows
        		};
			callback(null, results);
		}
	});
}


function insertBirthday(name, month, day, year, current_age, address, callback){
	var sql = "INSERT INTO birthdays(name, month, day, year, current_age, address) values ($1, $2, $3, $4, $5, $6)"

	console.log("sql statement");
	var params = [name, month, day, year, current_age, address];
	pool.query(sql, params, function(error, db_results){
		if(error){
			throw error;
		}else{
			console.log("results, ", params);
			var results = {
				success:true
        		};
			callback(null, results);
		}
	});
}

module.exports = {
	getAllBirthdays: getAllBirthdays,
	getBirthdayByMonth: getBirthdayByMonth,
	getBirthdayByName: getBirthdayByName,
	insertBirthday: insertBirthday,
};
