<?php
include_once("../vendor/autoload.php");
include_once("../config.php");

use \Monolog\Logger as Logger;
use \Monolog\Handler\SlackHandler as SlackHandler;
use \Monolog\Handler\SlackbotHandler as SlackbotHandler;

try {
    $logger = new Logger("slack");

    $slack_handler = new SlackHandler(SLACK_TOKEN, "#slackhandler", "bot");
    /**
     * this will affect which function will send message to slack 
     * if level higher than setLevel, it will send
     */
    $slack_handler->setLevel(Logger::WARNING);

    $logger->pushHandler($slack_handler);

    // this will not work
    $logger->info("just an INFO message");

    // this will work
    $logger->warning("just an WARNING message");
    $logger->error("just an ERROR message");
} catch (Exception $e) {
    print_R($e);
}
