<?php


include_once ("./socketlabs-php/InjectionApi/src/includes.php");
//or if using composer: include_once ('./vendor/autoload.php'); 

use Socketlabs\SocketLabsClient;
use Socketlabs\Message\BasicMessage;
use Socketlabs\Message\EmailAddress;

$client = new SocketLabsClient(28290, "Gx8s4WNt53Qkp9S7YfMi"); //Your SocketLabs ServerId and Injection API key
 
$message = new BasicMessage(); 

$message->subject = "Sending A Basic Message";
$message->htmlBody = "<html>This is the Html Body of my message.</html>";
$message->plainTextBody = "This is the Plain Text Body of my message.";

$message->from = new EmailAddress("from@example.com");
$message->replyTo = new EmailAddress("replyto@example.com");

//A basic message supports up to 50 recipients and supports several different ways to add recipients
$message->addToAddress("kushagraagent47@gmail.com"); //Add a To address by passing the email address
$message->addCcAddress("recipient2@example.com", "Recipient #2"); //Add a CC address by passing the email address and a friendly name
$message->addBccAddress(new EmailAddress("recipient3@example.com")); //Add a BCC address by passing an EmailAddress object
 
$response = $client->send($message);