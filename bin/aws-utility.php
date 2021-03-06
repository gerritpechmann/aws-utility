#!/usr/bin/env php
<?php

require_once 'vendor/autoload.php';

use Symfony\Component\Console\Application;

define('ROOT_DIR', str_replace(basename(__DIR__), '', __DIR__));

$application = new Application('AWS Utility');
$settings = new \AwsUtility\Settings(ROOT_DIR . 'configuration/settings.yaml');

foreach (\AwsUtility\Command\CommandRegistry::getCommands() as $command) {
    $command->setSettings($settings);
    $application->add($command);
}
$application->run();
