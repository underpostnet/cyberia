<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel='icon' type='image/x-icon' href='favicon.ico'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <title>SERVER</title>
  </head>

  <body>

    <script>

    function runWS(time, log, url){

      conn = new WebSocket(url);

      if(log){

        console.log(conn);

        setInterval(function(){

          if(conn.readyState==0){
            //WebSocket.CONNECTING
            console.log('server connecting -> state:0');

          }

          if(conn.readyState==1){
            //WebSocket.OPEN
            console.log('server on -> state:1');

          }

          if(conn.readyState==2){
            //WebSocket.CLOSING
            console.log('server closing -> state:2');

          }

          if(conn.readyState==3){
            //WebSocket.CLOSED
            console.log('server closed -> state:3');

            setTimeout(function(e){

              location.reload();

            }, 3000);


          }

        }, time);

      }

    }
    var conn;

    //arrays

    <?php

    $bots=10;

    echo "var bots = ".$bots.";";

    ?>

    var arrayColor = new Array();

    arrayColor[1]='red';
    arrayColor[2]='red';
    arrayColor[3]='blue';
    arrayColor[4]='blue';
    arrayColor[5]='green';
    arrayColor[6]='green';
    arrayColor[7]='yellow';
    arrayColor[8]='yellow';
    arrayColor[9]='white';
    arrayColor[10]='white';

    var dead = new Array();
    var delayDead = new Array();
    var x = new Array();
    var y = new Array();
    var color = new Array();
    var display = new Array();

    for(var i=1;i<=bots;i++){

      color[i] = arrayColor[random(1, 10)];
      display[i]= 'block';
      x[i]=random(1, 100);
      y[i]=random(1, 100);

    }

    //functions

    function random(min, max) {

      return Math.floor(Math.random() * (max - min + 1) ) + min;

    }

    runWS(5000, true, ('ws://localhost:8080'));

    var token;

    conn.onmessage = function(e){

      var msg=e.data.split('¿');

      if(msg[0]=='token'){
        token=msg[1];
        conn.send(token+'¿serverToken')
      }

      if(msg[1]=='newUserBall'){

        for(var i=1;i<=bots;i++){

          var str = token+'¿newBall¿'+i+'¿'+x[i]+'¿'+y[i]+'¿'+color[i]+'¿'+msg[2]+'¿'+display[i];

          conn.send(str);

        }

      }

      if(msg[1]=='explode'){

          dead[parseInt(msg[2])]=true;
          delayDead[parseInt(msg[2])]=0;
          display[parseInt(msg[2])]='none';

      }

    }




    function respawnBall(){

      setInterval(function(e){

        for(var i=1;i<=bots;i++){

          if(dead[i]){

            if(delayDead[i]<1){

                delayDead[i]=delayDead[i]+1;

            }else{

                dead[i] = false;
                display[i]='block';
                color[i]=arrayColor[random(1, 10)];
                var xr=random(1, 100);
                var yr=random(1, 100);
                conn.send(token+'¿resBall¿'+i+'¿'+color[i]+'¿'+xr+'¿'+yr);

            }


          }

        }

      }, 500);

    }

    respawnBall();

    <?php



    for($i=1;$i<=$bots;$i++){

      echo "

      function moveBall".$i."(){

        setInterval(function(e){

          if(!dead[".$i."]){

            x[".$i."] = random(0, 100);
            y[".$i."] = random(0, 100);

            var vel = random(500, 8000);

            conn.send(token+'¿moveBall¿'+".$i."+'¿'+x[".$i."]+'¿'+y[".$i."]+'¿'+vel);

          }



        }, ".rand(500, 8000).");

      }

      moveBall".$i."();

      ";

    }

    ?>

    setTimeout(function(e){

      location.reload();


    }, 1800000);

    </script>

  </body>
</html>
