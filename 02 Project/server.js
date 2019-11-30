const express = require("express");
require('dotenv').config();

const PORT = process.env.PORT || 5050;
const controller = require("./controllers/birthdayController")

var app = express();

app.use(express.static(__dirname + '/public'));
app.use(express.json());
app.use(express.urlencoded({extended:true}));

app.get("/allBirthdays", controller.getAllBirthdays);
app.get("/month", controller.getMonthofBirthdays);
app.get("/birthday", controller.getBirthday);
app.post("/birthday", controller.postBirthday);

app.listen(PORT, function(){
	console.log("Listening on port " + PORT);
});
