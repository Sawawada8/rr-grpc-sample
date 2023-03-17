<?php

// use Service\EchoInterface;
use Spiral\RoadRunner\GRPC\Server;
use Spiral\RoadRunner\Worker;
use Spiral\RoadRunner\GRPC\ServiceInterface;

require __DIR__ . '/vendor/autoload.php';
require './TestClient.php';


interface EchoInterface
{
    public function Echo();
}

class Ser implements EchoInterface, ServiceInterface
{
    const NAME = 'aaaaaaa';
    public function Echo() {
        return 'echooooooooooo';
    }
}

$server = new Server(null, [
    'debug' => false, // optional (default: false)
]);

$server->registerService(Ser::class, new Ser());

$server->serve(Worker::create());
