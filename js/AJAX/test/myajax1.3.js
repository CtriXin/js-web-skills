      /*
        * modify 16-03-04 增加处理完后的中间件，意在统一处理一些响应，比如登录超时跳转之类的。
        * modify 16-03-21 重构代码
        */

        var myajax=(function($){
            var Ajax=function(){
                this.$ = $;
            };

        /*
        * by hgxbajian 15-11-28 基于jq
        * 统一处理ajax get 请求（返回json格式），成功分发回调函数处理,失败统一提示
        * @param url 完成get 请求url,可不带上host
        * @param param object类型参数，如?name=bajian&age=23,写成{name:'bajian',age:23}
        * @param succCallback succ 回调
        * @param dataType 返回值类型 可空 默认json
        * @param failCallback fail 回调 可空 defaultFailCallback
        * 使用方法ajax_get("/queryDevice",handleQueryDevice);
        */
        Ajax.prototype.get=function(url,param,succCallback,dataType,failCallback,middleware){
            dataType=dataType||'json';
            failCallback=failCallback||myajax.defaultFailCallback;
            middleware=middleware||myajax.defaultMiddleware;
            $.ajax({
              url:url,
              type:'get',
              dataType: dataType,
              data: param,
              success: function (data) {
                middleware(data);
                if (succCallback){
                    succCallback(data);
                }
            },
            error: function (msg) {
                failCallback(msg);
            }
        });
        }

        /*
        * by hgxbajian 15-11-28(此方法写了暂未使用测试)继续基于jq
        * 统一处理ajax post 请求（返回json格式），成功分发回调函数处理,失败统一提示
        * @param url 请求url,可不带上host
        * @param data post data 如{Content: content,To:to}表示 Content=content&To=to
        * @param succCallback succ 回调
        * @param dataType 返回值类型 可空 默认json
        * @param failCallback fail 回调 可空 defaultFailCallback
        * 使用方法 ajax_post("/queryDevice","{Content: content,To:to}",handleQueryDevice);
        */
        Ajax.prototype.post=function(url,data,succCallback,dataType,failCallback,middleware){

            dataType=dataType||'json';
            failCallback=failCallback||myajax.defaultFailCallback;
            middleware=middleware||myajax.defaultMiddleware;
            $.ajax({
              url: url,
              type: 'POST',
              dataType: dataType,
              data: data,
          })
            .done(function(data) {
                middleware(data);
                if (succCallback!=undefined)
                  succCallback(data);
          })
            .fail(function() {
              failCallback();
          })

        }

        return new Ajax();

    })(window.Zepto||jQuery);
    myajax.defaultFailCallback=function(){};
    myajax.defaultMiddleware=function(){};


