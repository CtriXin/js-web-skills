<?php
echo "install signal...\n";
pcntl_signal(SIGHUP,  function($signo) {
    echo '$signo--'.$signo;
     echo "is call\n";
});


pcntl_signal(SIGTERM,  function($signo) {
     echo "10086 is call\n";
     echo '$signo--'.$signo;
});

echo "generate sign machine...\n";
posix_kill(posix_getpid(), SIGHUP);
// posix_kill(posix_getpid(), SIGTERM);

echo "dispatch...\n";
pcntl_signal_dispatch();

echo "complete\n";

?>