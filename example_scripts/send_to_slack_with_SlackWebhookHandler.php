<?php
include_once("../vendor/autoload.php");
include_once("../config.php");

use \Monolog\Logger as Logger;
use \Monolog\Handler\SlackWebhookHandler as SlackWebhookHandler;

try {
    $logger = new Logger("slack");

    $slack_handler = new SlackWebhookHandler(SLACK_WEBHOOK_URL, "#slackwebhookhandler", "bot2");
    $slack_handler->setLevel(Logger::DEBUG);
    $logger->pushHandler($slack_handler);

    $logger->debug("debug message from slack web hook");
} catch (Exception $e) {
    print_R($e);
}
