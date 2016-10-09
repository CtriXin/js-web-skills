<?php

//http://wiki.swoole.com/wiki/page/319.html
//四中回调http://wiki.swoole.com/wiki/page/458.html
//每隔2000ms触发一次
swoole_timer_tick(2000, function ($timer_id) {
    echo "tick-2000ms\n";
});

//3000秒后执行此函数
swoole_timer_after(3000, function () {
    echo "after 3000ms.\n";
});