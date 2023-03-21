<?php

use Spiral\RoadRunner;
use Nyholm\Psr7;

include "vendor/autoload.php";

// $relay = new \Spiral\Goridge\StreamRelay(STDIN, STDOUT);
// $worker = new RoadRunner\Worker($relay);


$worker = Spiral\RoadRunner\Worker::create();
$psrFactory = new Psr7\Factory\Psr17Factory();

$psr7 = new RoadRunner\Http\PSR7Worker($worker, $psrFactory, $psrFactory, $psrFactory);

while (true) {
    try {
        $request = $psr7->waitRequest();

        if (!($request instanceof \Psr\Http\Message\ServerRequestInterface)) {
            // Termination request received
            break;
        }
    } catch (\Throwablee $e) {

        $psr7->respond(new Psr7\Response(400)); // Bad Request
        continue;
    }

    try {
        // Application code logic
        $psr7->respond(new Psr7\Response(200, [], 'Hello RoadRunner!'));
    } catch (\Throwable $e) {

        $psr7->respond(new Psr7\Response(500, [], 'Something Went Wrong!'));
    }
}
