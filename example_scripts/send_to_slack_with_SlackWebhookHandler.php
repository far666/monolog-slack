<?php
include_once("../vendor/autoload.php");
include_once("../config.php");

use \Monolog\Logger as Logger;
use \Monolog\Handler\SlackWebhookHandler as SlackWebhookHandler;

try {
    // channel and username seens not work
    $slack_handler = new SlackWebhookHandler(SLACK_WEBHOOK_URL, "#test", "bot2");
    $slack_handler->setLevel(Logger::DEBUG);

    $logger = new Logger("slack");
    $logger->pushHandler($slack_handler);

    $logger->debug("debug message from slack web hook");
} catch (Exception $e) {
    print_R($e);
}
