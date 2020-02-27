<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class App implements MessageComponentInterface {
  protected $clients;

  public function __construct() {
    $this->clients = new \SplObjectStorage;
  }

  public function onOpen(ConnectionInterface $conn) {
    // Store the new connection to send messages to later
    $this->clients->attach($conn);

    echo "New connection! ({$conn->resourceId})\n";

    foreach ($this->clients as $client) {
      if ($conn == $client) {
        // The sender is not the receiver, send to each client connected
        $client->send(('token¿'.$conn->resourceId));

      }
    }

  }

  public function onMessage(ConnectionInterface $from, $msg) {

    //unset(array[indice a borrar])
    //explode(separador, array)
    //implode(separador, array)

    $msgArray = explode('¿', $msg);

    if($msgArray[1]=='serverToken'){

      $serverToken=intval($msgArray[0]);

      foreach ($this->clients as $client) {

        if($from==$client){

          $client->clientId = $serverToken;

        }


      }

    }else if($msgArray[1]=='newBall'){

      foreach ($this->clients as $client) {

        if($from!=$client){

          if(intval($client->clientId)==intval($msgArray[6])){
            $client->send($msg);
          }


        }


      }

    }else{

    if(intval($msgArray[0])==intval($from->resourceId)){

      $msgArray[0]=null;

      $msg = implode('¿', $msgArray);

      $numRecv = count($this->clients) - 1;
      echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
      , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

      foreach ($this->clients as $client) {

        if(($msgArray[1]=='newUser') and ($from == $client)){

          $client->clientId = $msgArray[2];

        }

        if ($from !== $client) {
          // The sender is not the receiver, send to each client connected
          $client->send($msg);
        }
      }

    }else{

      echo '[WARNING] CHECK TOKEN FAILED: '.$msgArray[0].'!='.$from->resourceId."\n";

      foreach ($this->clients as $client) {

        if ($from == $client) {

          $client->send('¿reload');

        }

      }

    }

    }
  }

  public function onClose(ConnectionInterface $conn) {

    foreach ($this->clients as $client) {

      $client->send('del¿'.$conn->clientId);

    }

    // The connection is closed, remove it, as we can no longer send it messages
    $this->clients->detach($conn);

    echo "Connection {$conn->resourceId} has disconnected\n";
  }

  public function onError(ConnectionInterface $conn, \Exception $e) {
    echo "An error has occurred: {$e->getMessage()}\n";

    $conn->close();
  }
}

?>
