<?php

# show help
if (in_array('--help', $argv) || in_array('-h', $argv)):
    echo '
2wirebrute

Useage: php 2wirebrute.php [up|dn] [starting point]

Crack 2wire default password scheme by generating 10 digit numbers. Output is
sent to stdout. Counts up by default.

Practical useage examples:

Count down from 9999999999
> php 2wirebrute.php dn

Count up from 0
> php 2wirebrute.php

Count up from 1000000000
> php 2wirebrute.php up 1000000000
';
    exit;
endif;

if (!isset($argv[1]) || $argv[1] === 'up'):
    $start = isset($argv[2]) ? abs((int) $argv[2]) : 0;
    $end = 9999999999;
    $dir = 1;
elseif ($argv[1] === 'dn'):
    $start = isset($argv[2]) ? abs((int) $argv[2]) : 9999999999;
    $end = 0;
    $dir = -1;
else:
    exit('Invalid direction');
endif;

while (($dir === -1 && $start >= $end) || ($dir === 1 && $start <= $end)):
    echo str_pad($start, 10, '0', STR_PAD_LEFT) . PHP_EOL;
    $start += $dir;
endwhile;
