this.onmessage = function(evt){
	var j=5
	console.log(evt);
	for (var i = 1000000; i >= 0; i--) {
		j++;
		j++;
	}
    postMessage(evt.data +'--worker.js里的附加信息 j='+j);

};

// worker.js执行的上下文，与demo.html执行时的上下文并不相同，最顶层的对象的对象并不是window，
// 无法访问window、与window相关的DOM API，但是可以与setTimeout、setInterval等协作。 
// woker.js执行的全局上下文，是个叫做 WorkerGlobalScope 的东东，它具有属性/方法：


// MessageEvent
// bubbles: false
// cancelBubble: false
// cancelable: false
// currentTarget: DedicatedWorkerGlobalScope
// data: "这是webworker的demo！"
// defaultPrevented: false
// eventPhase: 2
// lastEventId: ""
// origin: ""
// path: Array[0]
// ports: Array[0]
// returnValue: true
// source: null
// srcElement: DedicatedWorkerGlobalScope
// target: DedicatedWorkerGlobalScope
// timeStamp: 1467164349466
// type: "message"
// __proto__: MessageEvent


// inmoprScripts(XX[,XX, XX…])
// 加载外部脚本文件， 理论上 是按照加载它们的顺序执行（仅仅是理论上），且执行上下文与当前执行上下文一致，比如在worker.js里面
// importScripts('subworker.js');
// importScripts('a.js', 'b.js', 'c.js');

// close()
// 关闭当前线程，与terminate作用类似