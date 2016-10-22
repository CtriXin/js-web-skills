import request from 'superagent'

//TODO FILE UPLOAD API
const myajax = {}

myajax.prefix='';//前缀，如域名等
myajax.timeout=6e4
myajax.defaultFailCallback=function(){};
myajax.defaultMiddleware=function(){};

/**
 * get 请求获取数据
 * 
 * @param {String} url 请求的地址,可相对路径,带上http前缀的不加prefix
 * @param Object {A:B} 或者 String：A=1&N=SSS
 * @param {Function} [success=() => { }] 请求成功执行回调
 * @param {Function} [error=defaultFailCallback] 请求失败执行回调
 * @param {Function} [middleware=defaultMiddleware] 请求成功中间件，每次调用，默认全局中间件，可执行一些公用逻辑，如登录超时校验等
 * @param {String} [type='json'] 返回值类型
 */
 myajax.get = (url,params = {},success, error = myajax.defaultFailCallback,middleware=myajax.defaultMiddleware,type='json') => {
    url=url.indexOf('http')===0?url:myajax.prefix + url;
    request('GET', url).query(params).timeout(myajax.timeout).type(type).end((err, res = {}) => {
        if (err) 
            error(err)
        else{
            middleware(res.body||res.text)
            success&&success(res.body||res.text)
        }
    })
}

myajax.post = (url, params = {},success, error = myajax.defaultFailCallback,middleware=myajax.defaultMiddleware,type='json') => {
    url=url.indexOf('http')===0?url:myajax.prefix + url;
    request('POST', url).send(params).timeout(myajax.timeout).type(type).end((err, res = {}) => {
        if (err) 
            error(err)
        else{
            middleware(res.body||res.text)
            success&&success(res.body||res.text)
        }
        })
}

export default myajax