const express = require('express');
const app = express();

const connectionString = process.env.DATABASE_URL || "postgres://qixdjeprohlcem:43b67e5126f4be40e64b9c754399c2ff9684f754a63ed09080a5b0a682991c5f@ec2-174-129-253-104.compute-1.amazonaws.com:5432/d11lcihdc885p4?ssl=true";
const { Pool } = require("pg");
const pool = new Pool({connectionString: connectionString});


app.set('port', (process.env.PORT || 5000));
app.use(express.static(__dirname + '/public'));

app.get('/getBirthdays', getBirthdays);

app.listen(app.get('port'), function() {
  console.log('Node app is running on port', app.get('port'));
});


function getBirthdays(request, response){
	const month = request.query.month;

	getBirthdayfromDb(month, function(error, result){
		if(error || result == null || result.length != 1){
			response.status(500).json({success:false, data:error});
		}else{
			const birthday = result[0];
			response.status(200).render('pages/birthdayinfo', birthday);
		}
	});
}

function getBirthdayfromDb(month, callback){
	console.log("Getting information from db");

	const sql = "SELECT * FROM birthdays where month = $1::text";

	const params = [month];

	pool.query (sql, params, function(err, result){
		if(err){
			console.log("Error in query: ")
			console.log(err);
			callback(err, null);
		}

		console.log("Back from DB with results: ");
		console.log("Results:" + JSON.stringify(result.rows));
	
		callback(null, result.rows);
	});
}

