/**
 * @version 1.0
 * @date 2016-06-14
 * @author hgx
 * node http_request
 * 
 */

 var http = require('http'),
 querystring = require('querystring'),
 extend=function(oldObj,newObj){
 	for(var key in newObj){
 		oldObj[key]=newObj[key];
 	}
 	return oldObj;
 }
 
    /**
     *@params opts 基本请求体 opts = {
 	hostname: 'bxjtest.snewfly.com',
 	path: '/jxhd/user/login',
 	method: 'POST'
 		};
     * @params dataObj {'name': "szu",'password': "szu123"}
     */
     var http_request=function(opts,dataObj,onSucc,onErr){
     	opts.hostname=opts.hostname?opts.hostname.replace('http://',''):'';
     	if (typeof dataObj=='object') {
     		dataObj=querystring.stringify(dataObj);
     	}
     	var options=extend({
     		port: 80,
     		method: 'GET',
     		headers: {
     			'Content-Type': 'application/x-www-form-urlencoded'
     		}
     	},opts);
     	if (options.method.toUpperCase().trim()=='GET') 
     		options.path+='?'+dataObj;

     	var req = http.request(options, function(res) {

     		res.setEncoding('utf8');

     		var resData = '';
     		res.on('data', function (chunk) {
     			resData+=chunk;
     		});

     		res.on('end', function() {
     			onSucc(resData);
     		})
     	});

     	req.on('error', function(e) {
     		onErr(e);
     	});

	// POST发送请求
	if (options.method.toUpperCase().trim()=='POST') req.write(dataObj);
	req.end();
}
exports.http_request=http_request;