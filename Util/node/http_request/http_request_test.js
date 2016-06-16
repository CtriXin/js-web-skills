var httpUtil=require('./httpUtil.js');

/*
 var postData = {
 	'name': "szu",
 	'password': "szu123"
 };
*/
 // var opts = {
 // 	hostname: 'http://bxjtest.snewfly.com',
 // 	path: '/jxhd/user/login',
 // 	method: 'POST'
 // };
 
 var postData = {
 	'start': "0",
 	'limit': "2"
 };

 //to set cookie
 var opts = {
 	hostname: 'http://bxjtest.snewfly.com',
 	path: '/jxhd/school/teacher/query',
 	headers:{
 		'Cookie': '_ga=GA1.2.508302645.1457440461; PHPSESSID=iqt324t2o2ukjjv0sed8m7iel5; session=eyJpdiI6Ill2NjltVTZMc3daWCtxclNmVkJVOVE9PSIsInZhbHVlIjoiZ0FOcEFSNSt3a0FTdUs5VFdlS0ZsUlBMT3NLU21paG1LaEFaajZCTFwvcVMyc1p6RWtGdDFNbHFFUUFpdGRjbVBSSldTVDJhRm9FU0FDVWdJeWlaWE1RPT0iLCJtYWMiOiI4ZjM0MmRmNzM5NGQ2MmIxMTdjZmJhZjNhMDBhNWM2ZmMzYmU1OGM5MTg0ZmM0MGMwNjdlYzc0NmE3NWJlYmIyIn0%3D'
 	}
 };
 
 var onSucc=function(data){
	console.log('onSucc'+data);
 }
 
 var onErr=function(data){
	console.log('onErr'+data);
 }

httpUtil.http_request(opts,postData,onSucc,onErr);