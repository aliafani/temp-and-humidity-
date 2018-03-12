$(document).ready(function(){
$.ajax({
url:"http://localhost/final/mysql.php",
type:"GET",
success: function(data){
	var weather = {
		Temperature: [],
		Humidity:	 [],
		timestamp:   []
	};
	
var len=data.length;
console.log(len);
//console.log(data);
for(var i=0; i<len;i++){
weather.Temperature.push(data[i].temperature);
weather.Humidity.push(data[i].humidity);
weather.timestamp.push(data[i].time_stamp);
	}
	//console.log(weather);
	var ctx = $("#bar-chartcanvas");
	var data={
	labels:weather.timestamp,	
	datasets:[
	{
	label:'Temperature in celcius',
	data:weather.Temperature,
		backgroundColor:[
		'rgba(255,99,132,0.6)',
		'rgba(54,162,235,0.6)',
		'rgba(255,206,86,0.6)',
		'rgba(75,192,192,0.6)',
		'rgba(153,102,255,0.6)'
		]
	}
	]
	};
	var chart = new Chart (ctx,{ 
	type:"bar",
	data:data,
	options:{}
	
	});
	var ctx1 = $("#line-chartcanvas");
	var data1={
	labels:weather.timestamp,	
	datasets:[
	{
	label:'Humidity',
	data:weather.Humidity,
		
	}
	]
	};
	var chart = new Chart (ctx1,{ 
	type:"line",
	data:data1,
	options:{}
	
	});
	
	},
error: function (data){
	
	console.log(data);
}
})	
	
	
});