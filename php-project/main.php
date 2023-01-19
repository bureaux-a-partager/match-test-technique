<?php

require_once('./php-project/Runner.php');
require_once('./php-project/Report.php');

$availableTests = ['tiny', 'small', 'medium', 'large'];
$testToRun = $argv[1] ?? 'tiny';

if (!in_array($testToRun, $availableTests)) {
    print_r('Available tests are:' . PHP_EOL);
    print_r($availableTests);
    exit(1);
}
$func = 'test' . ucfirst($testToRun);
$report = new Report();
$runner = new Runner();
$runner->$func($report);
