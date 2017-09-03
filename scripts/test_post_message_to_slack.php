<?php
include_once("../vendor/autoload.php");
include_once("../config.php");

use \Monolog\Logger as Logger;
use \Monolog\Handler\SlackHandler as SlackHandler;
use \Monolog\Handler\SlackbotHandler as SlackbotHandler;

try {
    $logger = new Logger("slack");
    //print_r($logger);

    //$slack_handler = new SlackbotHandler("ryansofar", SLACK_TOKEN, "#general");
    $slack_handler = new SlackHandler(SLACK_TOKEN, "#general", "bot");
    $slack_handler->setLevel(Logger::ERROR);
    $logger->pushHandler($slack_handler);
    //print_r($slack_handler);

    $logger->error("just an ERROR message");
    $logger->warning("just test it works");
    //print_R($logger);
} catch (Exception $e) {
    print_R($e);
}
