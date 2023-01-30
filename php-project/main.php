<?php

require_once('./Runner.php');
require_once('./Report.php');

$availableTests = ['tiny', 'small', 'medium', 'large', 'custom', 'tricky'];
$testToRun = $argv[1] ?? 'tiny';
$argsToPassToRunner = [new Report()];

if (!in_array($testToRun, $availableTests)) {
    print_r('Available tests are:' . PHP_EOL);
    print_r($availableTests);
    exit(0);
}

if ($testToRun === 'custom') {
    if (!isset($argv[2])) {
        print_r('Integer list can not be empty:' . PHP_EOL);
        exit(0);
    }
    $intList = explode(",", $argv[2]);
    if (count($intList) < 5) {
        print_r('With custom data, array must have a min length of 5' . PHP_EOL);
        exit(0);
    }
    $argsToPassToRunner[] = $intList;
}

$func = 'test' . ucfirst($testToRun);
$runner = new Runner();
$runner->$func(...$argsToPassToRunner);
