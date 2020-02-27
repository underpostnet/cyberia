<!DOCTYPE html>

<?php

require('DBconnect.php');

function random_strings($length_of_string)
{

    // String of all alphanumeric character
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

    // Shufle the $str_result and returns substring
    // of specified length
    return substr(str_shuffle($str_result),
                       0, $length_of_string);
}

header("Cache-Control: no-cache, must-revalidate");

if(isset($_GET['r'])){

  session_start();
  session_destroy();

}

session_start();

//header('Access-Control-Allow-Origin: *');

if(isset($_SESSION['id'])){

  $id = $_SESSION['id'];
  $coin = $_SESSION['coin'];
  $nick = $_SESSION['nick'];
  $clase = $_SESSION['clase'];
  $tokensv = $_SESSION['tokensv'];

}else{

  $sql = $mysqli->query('INSERT INTO `user` (`id`) VALUES (NULL);');

  $id = $mysqli->insert_id;
  $coin = 0;
  $nick = 'ANON#';
  $clase = 'android';
  $tokensv = random_strings(5);

  $_SESSION['id'] = $id;
  $_SESSION['coin'] = $coin;
  $_SESSION['nick'] = $nick;
  $_SESSION['clase'] = $clase;
  $_SESSION['tokensv'] = $tokensv;

}

$bots = 10;

?>

<html dir='ltr'>

<head>

  <meta charset='utf-8'>

  <meta name='description' content='Cyberia Cafe & Club - Chat & Game - Web App - Browser MMORPG - Virtual World - Powered by UNDERpost.net'>

  <link rel='icon' type='image/x-icon' href='favicon.ico'>

  <link rel='canonical' href='https://www.cyberia.dns-cloud.net/' />

  <meta name='viewport' content='initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>

  <meta name='viewport' content='width=device-width, user-scalable=no' />

  <meta property="og:title" content="Cyberia Chat & Game" />

  <meta property="og:url" content="https://www.cyberia.dns-cloud.net/index.php" />

  <meta property="og:image" content="https://www.cyberia.dns-cloud.net/gfx/cyberiaonline.png" />

  <meta property="og:description" content="Cyberia Chat & Game - Web App - Browser MMORPG - Virtual World - Powered by UNDERpost.net" />

  <meta name='twitter:card' content='summary_large_image'>

  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

  <script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>

  <title>CYBERIA</title>

</head>

<body>

  <div class='description' style='display: none;'><h1>Cyberia Chat & Game</h1></div>

  <div class='cover'>

    <img src='gfx/loading.gif' style='position: absolute; width: 50px; height: 50px; transform: translate(-50%, -50%); left: 50%; top: 50%;'>

  </div>

  <div class='coverShop'>

    <img src='gfx/loading.gif' style='position: absolute; width: 50px; height: 50px; transform: translate(-50%, -50%); left: 50%; top: 50%;'>

  </div>

  <style>


  *{font-family: Arial; text-decoration: none; font-size: 14px;}

  html,body, #st-full-pg {

    width: 100%;
    height: 100%;
    margin: 0;
    background: black;
    color: white;
    position: relative;
    overflow: hidden;
    cursor : url('gfx/dinamic.cur') 0 0, auto;

  }

  .cover {

    position: absolute;
    width: 100%;
    height: 100%;
    background: black;
    z-index: 9999;

  }

  .coverShop {

    position: absolute;
    display: none;
    width: 100%;
    height: 100%;
    background: black;
    z-index: 998;

  }

  .map {

    position: absolute;
    width: 100%;
    height: 100%;

  }

  .mapUser {

    position: absolute;
    border: none;
    width: 100%;
    height: 100%;

  }

  .noti {

    position: fixed;
    display: none;
    background: red;
    border-radius: 50%;
    border: 2px solid white;
    z-index: 1002;
    display: none;

  }

  .notiCenter {
    position: absolute;
    transform: translate(-50%, -50%);
    left: 50%;
    top: 50%;
    font-weight: 600;
  }

  .iconChat {

    position: fixed;
    right: 20px;
    height: 40px;
    width: 40px;
    filter: invert(100%);
    bottom: 20px;
    max-width: 100px;
    max-height: 100px;
    z-index: 1001;

  }

  .iconDude {

    position: fixed;
    left: 20px;
    height: 40px;
    width: 40px;
    filter: invert(100%);
    bottom: 20px;
    max-width: 100px;
    max-height: 100px;
    z-index: 1001;

  }

  .subMap {

    position: fixed;
    height: 200%;
    width: 200%;
    top: 0px;

  }

  .inputBox {

    position: fixed;
    width: 100%;
    height: 40px;
    bottom: 0px;
    z-index: 1001;
    display: none;

  }

  .subInputChat {

    position: absolute;
    padding-left: 10px;
    background: white;
    width: 100%;
    height: 100%;
    font-size: 16px;
    border: none;

  }

  .subInputChat::placeholder {

    color: black;
    font-weight: bold;

  }

  .chatContent {

    position: absolute;
    top: 20px;
    left: 20px;
    width: 100%;
    border: none;
    overflow-y: auto;
    z-index: 1001;

  }

  .subChatContent {

    width: 100%;

  }

  .chat {

    display: none;
    width: 100%;
    height: 100%;
    position: absolute;

  }

  .chatOpa{

    z-index: 1000;
    background: black;
    opacity: 0.5;
    width: 100%;
    height: 100%;
    position: absolute;

  }

  .banner {

    position: fixed;
    transform: translate(-50%, 0);
    left: 50%;
    z-index: 999;

  }

  .cyberia {

    font-size: 60px;
    font-weight: 900;
    text-shadow: 0px 0px 15px black, 0px 0px 15px black;

  }

  .coinInfo {

    font-weight: 900;
    text-shadow: 0px 0px 15px black, 0px 0px 15px black;
    font-size: 25px;
    text-align: center;

  }

  .triangle {

    font-weight: 900;
    text-shadow: 0px 0px 15px black, 0px 0px 15px black;
    font-size: 25px;
    text-align: center;

  }

  .shop {

    display: none;
    width: 100%;
    height: 100%;
    z-index: 998;

  }

  .contentShop {

    position: absolute;
    width: 100%;
    top: 90px;

  }

  .gallery {

    position: absolute;
    width: 100%;
    height: 20%;
    text-align: center;

  }

  .previewContent {

    position: absolute;
    width: 100%;
    height: 50%;
    top: 20%;

  }

  .preview {

    position: absolute;
    transform: translate(-50%, -50%);
    left: 50%;
    top: 50%;

  }

  .setContent {

    position: absolute;
    width: 100%;
    height: 10%;
    top:80%;

  }

  .setButton{

    position: fixed;
    width: 50%;
    height: 70px;
    border: 5px solid white;
    border-radius: 25px;
    transform: translate(-50%, 0);
    left: 50%;
    bottom: 20px;
    max-width: 400px;

  }

  .contentSetNick {

    position: fixed;
    width: 50%;
    transform: translate(-50%, 0);
    left: 50%;
    display: none;
    max-width: 400px;

  }

  .inputNick {

    position: absolute;
    border: none;
    background: black;
    text-align: center;
    color: white;
    transform: translate(-50%, -50%);
    top: 50%;
    left: 50%;
    width: 90%;
    height: 80%;
    font-size: 12px;

  }

  .inputNick::placeholder {

      color: white;
      font-weight: 700;

  }

  .setButton:hover {

    color: red;

  }

  .sb1 {

    font-size: 14px;

  }

  .sb2 {

    font-size: 20px;
    font-weight: 900;

  }

  .divCenter {

    position: absolute;
    transform: translate(-50%, -50%);
    left: 50%;
    top: 50%;
    width: 100%;
    text-align: center;

  }

  .contentbuy12 {

      position: absolute;
      transform: translate(-50%, -50%);
      left: 50%;
      top: 50%;
      width: 100%;
      height: 80px;

  }

  .buy1 {

    position: absolute;
    height: 50%;
    width: 100%;

  }

  .buy2 {

    position: absolute;
    height: 50%;
    width: 100%;
    top: 50%;

  }

  .imgbuy1 {

    width: 40px;
    height: 40px;

  }

  .contentSetNick:hover {

    color: red;

  }

  .dudeContent {

    position: absolute;
    transform: translate(-50%, -50%);
    left: 50%;
    top: 50%;
    width: 300px;
    height: 200px;
    z-index: 1000;
    background: black;
    border: solid 5px white;
    border-radius: 15px;

  }

  .dudelink:hover {

    color: red;

  }

  .mono:hover {

    opacity: 0.7;

  }

  </style>

  <div class='main'>

    <div class='map'>

      <div class='mapUser'>

        <div class='subMap'></div>

      </div>

    </div>

  </div>

  <div class='noti'><div class='notiCenter'></div></div>

  <div class='banner'>

    <div class='cyberia'>CYBERIA</div>

    <div class='coinInfo'>$0</div>

    <div class='triangle'>&#9650;</div>

  </div>

  <div class='shop'>

      <div class='contentShop'>

        <div class='gallery'>

          <div>

            <img class='skin1' src='gfx/clases/random/08.gif' data-clase='random' style='border: 2px solid white; border-radius: 10px;'>

            <img class='skin2' src='gfx/clases/agent/08.gif' data-clase='agent' style='border: 2px solid black; border-radius: 10px;'>

            <img class='skin3' src='gfx/clases/eiri/08.gif' data-clase='eiri' style='border: 2px solid black; border-radius: 10px;'>

            <img class='skin4' src='gfx/clases/junko/08.gif' data-clase='junko' style='border: 2px solid black; border-radius: 10px;'>

            <img class='skin5' src='gfx/clases/kaneki/08.gif' data-clase='kaneki' style='border: 2px solid black; border-radius: 10px;'>

            <img class='skin6' src='gfx/clases/kishins/08.gif' data-clase='kishins' style='border: 2px solid black; border-radius: 10px;'>

          </div>

          <div>

            <img class='skin7' src='gfx/clases/lain/08.gif' data-clase='lain' style='border: 2px solid black; border-radius: 10px;'>

            <img class='skin8' src='gfx/clases/paranoia/08.gif' data-clase='paranoia' style='border: 2px solid black; border-radius: 10px;'>

            <img class='skin9' src='gfx/clases/punk/08.gif' data-clase='punk' style='border: 2px solid black; border-radius: 10px;'>

            <img class='skin10' src='gfx/clases/ayleen/08.gif' data-clase='ayleen' style='border: 2px solid black; border-radius: 10px;'>

            <img class='skin11' src='gfx/clases/purple/08.gif' data-clase='purple' style='border: 2px solid black; border-radius: 10px;'>

            <img class='skin12' src='gfx/clases/android/08.gif' data-clase='android' style='border: 2px solid black; border-radius: 10px;'>

          </div>

        </div>

        <div class='previewContent'>

          <div class='preview'>

            <img class='previewImg' src='gfx/clases/random/08.gif' style='height: 100%; width: 100%;'>

          </div>

          <!-- <div class='s8'>&#8634;</div> -->

        </div>

        <div class='contentSetNick'>

          <div class='contentbuy12'>

            <div class='buy1'>

                <div class='divCenter'><img class='imgbuy1' src='gfx/clases/random/08.gif'></div>

            </div>

            <div class='buy2'>

                <div class='divCenter'><span style='font-size: 15px; font-weight: 700;'>GO!</span> $500</div>

            </div>

          </div>

        </div>

        <div class='setButton'>

          <div class='divCenter'>

            <div class='sb1'>GET A SKIN AND NICK</div>

            <div class='sb2'>$500</div>

          </div>

        </div>

      </div>


  </div>


  <img src='gfx/chat.png' class='iconChat'>

  <img src='gfx/dude.png' class='iconDude'>

  <div class='chat'>

    <div class='chatContent'>

      <div class='subChatContent'></div>

    </div>

    <div class='chatOpa'></div>

  </div>

  <div class='inputBox'>

    <input type='text' class='subInputChat' spellcheck='false' autocomplete='new-password' placeholder=' . . .' value='' />

  </div>

  <div class='dudeContent' style='display: none;'>

    <div class='divCenter'>

      <div><strong>CYBERIA.DNS-CLOUD.NET</strong></div><br>

      <div>Chat & Game</div><br>

      <div class='dudelink'>Developed by <strong>UNDER</strong>post.net</div>

      <br>

      <img src='gfx/underpost.png' class='dudelink mono' style='width: 50xp; height: 50px;'>

    </div>

  </div>

  <script type='text/javascript'>

  (function(){

    //DATA ARRAYS

    var arrayColor = new Array();

    arrayColor[1]='red';
    arrayColor[2]='pink';
    arrayColor[3]='gray';
    arrayColor[4]='yellow';
    arrayColor[5]='blue';
    arrayColor[6]='green';
    arrayColor[7]='purple';
    arrayColor[8]='orange';
    arrayColor[9]='white';
    arrayColor[10]='teal';

    //END DATA ARRAYS

    //FUNCTIONS

    function random(min, max) {

      return Math.floor(Math.random() * (max - min + 1) ) + min;

    }

    function f(select, css){

      return parseFloat($(select).css(css).replace('px', ''));

    }

    function i(select, css){

      return parseInt($(select).css(css).replace('px', ''));

    }

    function shopIn(){

      shop = true;

      resizeShop();

      $('.sb1').html('GET A SKIN AND NICK');

      $('.main').css('display', 'none');

      $('.coverShop').css('display', 'block');

      $('.shop').css('display', 'block');

      $('.coverShop').delay(300).fadeOut(250);

    }

    function skinset(rs){

      for(var i=1;i<=12;i++){

        $('.skin'+i).css('width', rs);
        $('.skin'+i).css('height', rs);

      }

    }

    function resizeShop(){

      if(shop){

        var rs = f('body', 'height') - f('.contentShop', 'top');

        $('.contentShop').css('height', (rs+'px'));

        rs = (f('.gallery', 'height')*0.5)-4+'px';

        var rs2 = ((parseFloat(rs)+4)*6);

        if(f('body', 'width')<(rs2+20)){

           rs = ( ( f('body', 'width')/6 ) -10 +'px');

           skinset(rs);

        }else{

           skinset(rs);

        }

        if(f('.previewContent', 'height')<f('body', 'width')){

          $('.preview').css('height', $('.previewContent').css('height'));
          $('.preview').css('width', $('.previewContent').css('height'));

        }else{

          $('.preview').css('height', $('body').css('width'));
          $('.preview').css('width', $('body').css('width'));

        }

      }

    }

    function shopOut(){

      $('.shop').css('display', 'none');
      $('.main').css('display', 'block');

      shop = false;

    }

    function iconResize(){



    }

    function resizeBall(){

      bodySizeW = f('body', 'width');
      bodySizeH = f('body', 'height');

      if(bodySizeW<=bodySizeH){

        for(var i=1;i<=bots;i++){

          $('.ball'+i).css('height', ((bodySizeW*size/200)+'px'));
          $('.ball'+i).css('width', ((bodySizeW*size/200)+'px'));

        }

      }else{

        for(var i=1;i<=bots;i++){

          $('.ball'+i).css('height', ((bodySizeH*size/200)+'px'));
          $('.ball'+i).css('width', ((bodySizeH*size/200)+'px'));

        }

      }

      $('.iconChat').css('height', ((bodySizeW*size/300)+'px'));
      $('.iconChat').css('width', ((bodySizeW*size/300)+'px'));
      $('.iconDude').css('height', ((bodySizeW*size/300)+'px'));
      $('.iconDude').css('width', ((bodySizeW*size/300)+'px'));

    }

    function resizeMap(){

      //bodyw->100
      //ballw->x


      $('.map').css('left', ('-'+(f('.ball1', 'width')/2)+'px'));
      $('.map').css('top', ('-'+(f('.ball1', 'width')/2)+'px'));


    }

    function resizeNoti(){

      $('.noti').css('left', (f('.iconChat', 'left')+'px'));
      $('.noti').css('top', (f('.iconChat', 'top')-10+'px'));
      $('.noti').css('width', (f('.iconChat', 'width')*0.4+'px'));
      $('.noti').css('height', (f('.iconChat', 'width')*0.4+'px'));

      if(noti>0 && noti<=9){
        $('.notiCenter').html((''+noti));
        $('.noti').css('display', 'block');
      }else if(noti>9){
        $('.notiCenter').html('+9');
        $('.noti').css('display', 'block');
      }else{
        $('.noti').css('display', 'none');
      }


    }

    function config(){

      setInterval(function(e){

        resizeBall();
        resizeMap();
        resizeNoti();

        if(shop){

          resizeShop();

        }

        if(coin>=500){

          nocoin=false;

        }else{

          nocoin=true;

        }

        var wi = (f('.iconChat', 'left')-40+'px');
        var wi = (f('.iconDude', 'right')-40+'px');
        var wc = (f('body', 'width')-40+'px');
        $('.chatContent').css('height', (f('body', 'height')-20-90+'px'));
        $('.chatContent').css('width', wc);
        $('.inputBox').css('width', wi);

        $('.contentSetNick').css('top', '90px');
        $('.contentSetNick').css('height', (  f('.setButton', 'top') - 110 + 'px' ));

        $('.coinInfo').html('$'+coin);

        $('.cover').delay(300).fadeOut(250);

      }, 350);

    }

    function loadUser(a){

      $('.mapUser').append('<div class="'+a[2]+'"></div>');

      $('.'+a[2]).css('position', 'absolute');
      $('.'+a[2]).css('width', (size+'px'));
      $('.'+a[2]).css('height', (size+'px'));
      $('.'+a[2]).css('left', (a[3]+'%'));
      $('.'+a[2]).css('top', (a[4]+'%'));
      $('.'+a[2]).css('z-index', (parseInt(a[3])+300));
      $('.'+a[2]).css('transform', 'translate(-50%, -100%)');

      var spriteStyle='position: absolute; width: '+size+'px; height: '+size+'px; display: none;';

      $('.'+a[2]).append('<img src="gfx/clases/'+a[6]+'/02.gif" class="'+a[2]+'-02" style="'+spriteStyle+'">');
      $('.'+a[2]).append('<img src="gfx/clases/'+a[6]+'/04.gif" class="'+a[2]+'-04" style="'+spriteStyle+'">');
      $('.'+a[2]).append('<img src="gfx/clases/'+a[6]+'/06.gif" class="'+a[2]+'-06" style="'+spriteStyle+'">');
      $('.'+a[2]).append('<img src="gfx/clases/'+a[6]+'/08.gif" class="'+a[2]+'-08" style="'+spriteStyle+'">');

      $('.'+a[2]).append('<img src="gfx/clases/'+a[6]+'/12.gif" class="'+a[2]+'-12" style="'+spriteStyle+'">');
      $('.'+a[2]).append('<img src="gfx/clases/'+a[6]+'/14.gif" class="'+a[2]+'-14" style="'+spriteStyle+'">');
      $('.'+a[2]).append('<img src="gfx/clases/'+a[6]+'/16.gif" class="'+a[2]+'-16" style="'+spriteStyle+'">');
      $('.'+a[2]).append('<img src="gfx/clases/'+a[6]+'/18.gif" class="'+a[2]+'-18" style="'+spriteStyle+'">');

      $('.'+a[2]+'-08').css('display', 'block');

      var arrowStyle='position: absolute; transform: translate(-50%, 0); left: 50%; width: 180%; top: -'+size+'px; display: none;';

      $('.'+a[2]).append('<img src="gfx/greenArrow.gif" class="greenArrow'+a[2]+'" style="'+arrowStyle+'">');
      $('.'+a[2]).append('<img src="gfx/redArrow.gif" class="redArrow'+a[2]+'" style="'+arrowStyle+'">');

      if(a[2]==id){
        $('.greenArrow'+a[2]).css('display', 'block');
      }

      var nickStyle = 'position: absolute; text-shadow: 0 0 4px black, 0 0 4px black; transform: translate(-50%, 0); left: 50%; width: 180%; top: -'+10+'px; font-weight: bold; text-align: center; font-size: 10px;';

      $('.'+a[2]).append('<div class="nick'+a[2]+'" style="'+nickStyle+'"></div>');

      if(a[7]=='ANON#'){

        $('.nick'+a[2]).html('ANON#'+a[2]);

      }else{

        $('.nick'+a[2]).html(a[7]);

      }


    }

    function shopFull(){

      if(shop){

        $('.triangle').html('&#9660;');

        shopOut();

      }else{

        triangle=false;

        $('.banner').stop();

        $('.triangle').html('&#9660;');

        $('.banner').animate({top: ('-70px')}, 150,'swing', function() {


        });

        shopIn();

      }

    }

    function moveUser(idf, xf, yf, vel){

      //console.log('move User -> x:'+xf+' y:'+yf);

      //100% -> width
      //x%  -> left

      var oldx = (f(('.'+idf), 'left')*100)/f('.map', 'width');
      var oldy = (f(('.'+idf), 'top')*100)/f('.map', 'height');

      var newx = parseFloat(xf);
      var newy = parseFloat(yf);

      $('.'+idf).css('z-index', parseInt(newy+300));

      //console.log(oldx);
      //console.log(oldy);
      //console.log(newx);
      //console.log(newy);

      if( Math.abs(newx-oldx)>Math.abs(newy-oldy) ){

        if(newx<oldx){

          iniGifMove[idf] = '14';
          finGifMove[idf] = '04';

        }

        if(newx>oldx){

          iniGifMove[idf] = '16';
          finGifMove[idf] = '06';

        }

      }else{

        if(newy<oldy){

          iniGifMove[idf] = '12';
          finGifMove[idf] = '02';

        }

        if(newy>oldy){

          iniGifMove[idf] = '18';
          finGifMove[idf] = '08';

        }

      }

      $('.'+idf+'-02').css('display', 'none');
      $('.'+idf+'-04').css('display', 'none');
      $('.'+idf+'-06').css('display', 'none');
      $('.'+idf+'-08').css('display', 'none');
      $('.'+idf+'-12').css('display', 'none');
      $('.'+idf+'-14').css('display', 'none');
      $('.'+idf+'-16').css('display', 'none');
      $('.'+idf+'-18').css('display', 'none');

      $('.'+idf+'-'+iniGifMove[idf]).css('display', 'block');

      $('.'+idf).stop();

      if(idf==id){

        udata[3]=newx;
        udata[4]=newy;
        udata[1]='moveUser';
        udata[5]=vel;
        conn.send(udata.join('¿'));

      }

      $('.'+idf).animate({left: (newx+'%'), top: (newy+'%')}, parseInt(vel),'swing', function() {

        $('.'+idf+'-'+iniGifMove[idf]).css('display', 'none');

        $('.'+idf+'-'+finGifMove[idf]).css('display', 'block');

      });

    }

    function loadBall(idf, xb, yb, color, display){

      var styleBall = 'display: '+display+'; height: '+size+'px; width: '+size+'px; position: absolute; z-index: '+(100+parseInt(yb))+'; border-radius: 50%; background: '+color+'; left: '+xb+'%; top: '+yb+'%; box-shadow: 0px 0px 20px 0px '+color+';';



      $('.map').append('<div class="ball'+idf+'" style="'+styleBall+'"></div>');




      $('.map').append('<div class="info'+idf+'"></div>');

    }

    function moveBall(idf, xf, yf, vel){

      if(boolExplodeBall[idf]){

        $('.ball'+idf).stop();

        $('.ball'+idf).animate({top: (xf+'%'), left: (yf+'%')}, parseInt(vel), 'swing', function() {

        });

      }

    }

    function info(e, i){

      if(du[i]){

        coin=coin+10;

        coinsave=coinsave+10;

        if(coinsave==500){

          coinsave=0;

          $.post( 'save.php', { nick: udata[7], id: id, clase: udata[6], coin: coin, tokensv: tokensv } );

        }

        du[i]=false;

        $('.coinInfo').html('$'+coin);

        $('.info'+i).html('<img src="gfx/clases/coin/08.gif" style="z-index: 900; position: absolute; transform: translate(-50%, -50%); left: 50%; top: 100%; width: 40px; height: 40px;">');

        var posX = $('.mapUser').offset().left;
        var posY = $('.mapUser').offset().top;

        var xdu=(((e.pageX - posX)*100)/$(".mapUser").width());
        var ydu=(((e.pageY - posY)*100)/$(".mapUser").height());

        $('.info'+i).css('position', 'absolute');

        $('.info'+i).css('top',   (ydu+'%'));
        $('.info'+i).css('left',   (xdu+'%'));

        $('.info'+i).fadeIn(100).delay(800).fadeOut(100);

        setTimeout(function(){

          du[i]=true;

        }, 1000);

      }

    }

    function explodeBall(idf, bool){

      if(boolExplodeBall[idf]){

        $('.ball'+idf).stop();
        $('.ball'+idf).css('box-shadow', 'none');

        boolExplodeBall[idf]=false;

        if(bool){

          conn.send(token+'¿explode¿'+idf);

        }

        if(!shop){

          $('.ball'+idf).effect( 'explode', {pieces: 4}, 500, function() {



          });

        }else{

          $('.ball'+idf).css('display', 'none');

        }


      }

    }

    function detectMove(e, vel){

      var posX = $('.mapUser').offset().left;
      var posY = $('.mapUser').offset().top;

      x=(((e.pageX - posX)*100)/$(".mapUser").width());
      y=(((e.pageY - posY)*100)/$(".mapUser").height());

      if(x>100){
        x=100;
      }

      if(x<0){
        x=0;
      }

      if(y>100){
        y=100;
      }

      if(y<0){
        y=0;
      }

      console.log('map press -> x:'+x+'% y:'+y+'%');
      moveUser(id, x, y, vel);

    }

    function chatIn(){

      if(dude){
        dudef();
      }

      $('.iconDude').css('display', 'none');

      if(shop){

        shopOut();
        nickOut();

      }

      chatdis=true;
      noti=0;
      //$('.chatContent').fadeIn(250);
      $('.chat').css('display', 'block');
      $('.iconChat').attr('src', 'gfx/chatclose.png');
      $('.subInputChat').css('border-radius', '10px');
      $('.inputBox').css('width', (f('.iconChat', 'left')-40+'px'));
      $('.inputBox').css('left', '20px');
      $('.inputBox').css('bottom', '20px');
      $('.inputBox').fadeIn(250);
      $('.subInputChat').focus();

      setTimeout(function(){

        $('.chatContent').scrollTop(maxscroll);

      }, 800);

      $('.chatContent').scrollTop(maxscroll);

    }

    function chatOut(){

      $('.inputBox').fadeOut(250);
      $('.chat').fadeOut(250);
      $('.iconDude').css('display', 'block');
      $('.iconChat').attr('src', 'gfx/chat.png');
      chatdis=false;

    }

    function addmsgChat(idf, msg, name, clase){

      if(name=='ANON#'){

        var fname='ANON#'+idf;

      }else{

        var fname=name;

      }

      var tu = new Date();

      var hr = tu.getHours();

      var min = tu.getMinutes();

      if(hr<10){
        hr='0'+hr;
      }
      if(min<10){
        min='0'+min;
      }

      var tu = hr+':'+min;

      var cssAvatar = 'position: relative; width: 30px; height: 19px; overflow: hidden; float: left; top: 5px;';

      var avatar = '<div style="'+cssAvatar+'"><img src="gfx/clases/'+clase+'/08.gif" style="width: 100%;"></div>';

      var iuser = '';

      if(idf==id){

          iuser='<span style="color: #1eff00; font-size: 10px;">&#9658;</span>';

      }

      var addContent =  avatar+'<strong style="font-size: 10px;">'+iuser+' '+tu+' | '+fname+' :</strong><br>'+msg+'<br>';

      $('.subChatContent').append(addContent);

      $('.chatContent').scrollTop(maxscroll);

    }

    function nickIn(){

      buy=true;

      $('.gallery').css('display', 'none');

      $('.previewContent').css('display', 'none');

      $('.imgbuy1').attr('src', ('gfx/clases/'+$('.skin'+sshop).attr('data-clase')+'/08.gif'));

      $('.setButton').html('<input type="text" class="inputNick" spellcheck="false" autocomplete="new-password" placeholder="NICK" value="" />');

      $('.inputNick').focus();

      $('.contentSetNick').delay(300).fadeIn(100);

    }

    function nickOut(){

      setTimeout(function(){

        buy=false;

      }, 500);

      $('.contentSetNick').css('display', 'none');

      $('.gallery').css('display', 'block');

      $('.previewContent').css('display', 'block');

      $('.setButton').html('<div class="divCenter"><div class="sb1">GET A SKIN AND NICK</div><div class="sb2">$500</div></div>');

    }

    function newskinandnick(fid, fnick, fclase){

      if(fnick=='ANON#'){

        var fnick = fnick+fid;

      }

      $('.'+fid+'-02').attr('src', 'gfx/clases/'+fclase+'/02.gif');
      $('.'+fid+'-04').attr('src', 'gfx/clases/'+fclase+'/04.gif');
      $('.'+fid+'-06').attr('src', 'gfx/clases/'+fclase+'/06.gif');
      $('.'+fid+'-08').attr('src', 'gfx/clases/'+fclase+'/08.gif');
      $('.'+fid+'-12').attr('src', 'gfx/clases/'+fclase+'/12.gif');
      $('.'+fid+'-14').attr('src', 'gfx/clases/'+fclase+'/14.gif');
      $('.'+fid+'-16').attr('src', 'gfx/clases/'+fclase+'/16.gif');
      $('.'+fid+'-18').attr('src', 'gfx/clases/'+fclase+'/18.gif');

      $('.nick'+fid).html(fnick);

    }

    function checkstr (cadenaAnalizar) {
      for (var i = 0; i< cadenaAnalizar.length; i++) {
        var caracter = cadenaAnalizar.charAt(i);

        if( caracter != ' ') {

          return true;

        }

      }

      return false;
    }

    function newskinandnicksend(){

      coin=coin-500;

      $('.coinInfo').html('$'+coin);

      var newnick = $('.inputNick').val();

      if(newnick==''){

        newnick='ANON#';

      }

      if(sshop==1){

        sshop=random(2, 12);

      }

      var newskin = $('.skin'+sshop).attr('data-clase');

      udata[6]=newskin;
      udata[7]=newnick;

      newskinandnick(id, newnick, newskin);

      $.post( "save.php", { nick: newnick, id: id, clase: newskin, coin: coin, tokensv: tokensv } );

      shopOut();
      nickOut();
      chatOut();

      conn.send(token+'¿newskinandnick¿'+id+'¿'+newnick+'¿'+newskin);

    }

    function dudef(){

      if(dude){

        dude = false;

        $('.dudeContent').css('display', 'none');

        $('.iconDude').attr('src', 'gfx/dude.png');

      }else{

        dude = true;

        $('.dudeContent').css('display', 'block');

        $('.iconDude').attr('src', 'gfx/chatclose2.png');

      }

    }

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

    //END FUNCTIONS

    //INITIAL VARIABLE

    var iniGifMove = new Array();

    var finGifMove = new Array();

    var boolExplodeBall = new Array();

    var du = new Array();

    <?php

    for($i=1;$i<=$bots;$i++){

      echo "boolExplodeBall[".$i."]=true;";

    }

    for($i=1;$i<=$bots;$i++){

      echo "du[".$i."]=true;";

    }

    ?>

    var id  = <?php echo $id; ?>;
    var bots = <?php echo $bots; ?>;
    var bodySizeW = f('body', 'width');
    var bodySizeH = f('body', 'height');
    var chatdis = false;
    var reset = false;
    var triangle = true;
    var dude = false;
    var shop = false;
    var sshop = 1;
    var coin = <?php echo $coin; ?>;
    var coinsave = 0;
    var maxscroll = 999999999;
    var size = 40;
    var token;
    var tokensv = '<?php echo $tokensv; ?>';
    var noti = 0;
    var udata = new Array();
    var nocoin = true;
    var buy = false;
    udata[0] = null; //token
    udata[1] = null; //event
    udata[2] = id; //id
    udata[3] = random(10, 90); //x
    udata[4] = random(10, 90); //y
    udata[5] = null; //vel
    udata[6] = '<?php echo $clase; ?>'; //clase
    udata[7] = '<?php echo $nick; ?>'; //nick

    var conn;

    runWS(5000, true, ('ws://localhost:8080'));

    //runWS(5000, true, ('wss://ywork.ddns.net/cyws'));

    config();

    //END INITIAL VARIABLE

    //EVENTS

    <?php

    for($i=1;$i<=$bots;$i++){

      echo "

      $(document).on('mouseover', '.ball".$i."', function(e) {

        explodeBall(".$i.", true);
        detectMove(e, 150);
        info(e, ".$i.");

      });

      ";

    }

    for($i=1;$i<=12;$i++){

      echo "

      $('.gallery').on('mouseover', '.skin".$i."', function(e){

        if(".$i."!=sshop){

          $('.skin".$i."').css('border', '2px solid red');
          $('.previewImg').attr('src', ('gfx/clases/'+$('.skin".$i."').attr('data-clase')+'/08.gif'));

        }

      });

      $('.gallery').on('mouseout', '.skin".$i."', function(e){

        if(".$i."!=sshop){

          $('.skin".$i."').css('border', '2px solid black');

        }

      });

      $('.gallery').on('click', '.skin".$i."', function(e){

        if(".$i."!=sshop){

          $('.skin'+sshop).css('border', '2px solid black');

          sshop = ".$i.";

          $('.skin".$i."').css('border', '2px solid white');

        }

      });

      ";

    }

    ?>

    $('.contentShop').on('mouseover', '.previewContent', function(e){

      $('.previewImg').attr('src', ('gfx/clases/'+$('.skin'+sshop).attr('data-clase')+'/08.gif'));

    });

    $(document).on('click', '.iconDude', function(e){

      dudef();

    });

    $(document).on('click', '.triangle', function(e){

      nickOut();

      //&#9660; down &#9650; top

      if(triangle){

        triangle=false;

        $('.banner').stop();

        $('.triangle').html('&#9660;');

        $('.banner').animate({top: ('-70px')}, 150,'swing', function() {

        });

      }else{

        triangle=true;

        $('.banner').stop();

        $('.triangle').html('&#9650;');

        $('.banner').animate({top: ('20px')}, 150,'swing', function() {


        });

        if(shop){

          shopOut();

        }

      }

    });

    $('body').keypress(function(e){

      var key = e.which;

      if(key==144){

        location.reload();

      }

      if(key==13 && !chatdis && !buy){

        chatIn();

      }else{

        if(chatdis){

          $('.subInputChat').focus();

        }

      }

    });

    document.onkeydown = function(evt) {
      evt = evt || window.event;
      var isEscape = false;
      if ("key" in evt) {
        isEscape = (evt.key === "Escape" || evt.key === "Esc");
      } else {
        isEscape = (evt.keyCode === 27);
      }
      if (isEscape) {
        //alert("Escape");
        chatOut();
        shopOut();
        nickOut();

      }
    };


    $('.setButton').keypress(function(e) {

        e.preventDefault;

        var key = e.which;

        if(key==13){

          newskinandnicksend();

        }

    });

    $('.subInputChat').keypress(function(e) {

      e.preventDefault;

      var key = e.which;

      //console.log('key press -> '+key);

      if(key==13){

        var val = $('.subInputChat').val().replace(/¿/g, '');

        val = val.replace(/>/g, '');

        val = val.replace(/</g, '');

        val = val.replace(/'/g, '´');

        val = val.replace(/"/g, '´');

        var check = checkstr(val);

        if(val!='' && check ){

          addmsgChat(id, val, udata[7], udata[6]);
          $('.subInputChat').val('');
          $('.subInputChat').focus();
          conn.send(token+'¿msgChat¿'+id+'¿'+val+'¿'+udata[7]+'¿'+udata[6]);

        }else{

          $('.subInputChat').val('');
          $('.subInputChat').focus();

        }

      }

    });

    $(document).on('click', '.mapUser', function(e){

      detectMove(e, 1500);

    });

    $(document).on('click', '.iconChat', function(e){

      if(chatdis){

        chatOut();

      }else{

        chatIn();

      }

      if(shop){

        shopOut();

      }

    });

    $(document).on('click', '.dudelink', function(e){

        window.location.href = 'https://underpost.net';

    });

    $(document).on('click', '.dudeContent', function(e){

        dudef();

    });

    $(document).on('click', '.contentSetNick', function(e){

        newskinandnicksend();

    });


    $(document).on('click', '.cyberia', function(e){

      shopFull();

    });

    $(document).on('click', '.coinInfo', function(e){

      shopFull();
      nickOut();

    });



    $(document).on('click', '.setButton', function(e){

      if(nocoin){

        $('.sb1').html('<span style="color: red; font-weight: 700;">Not enough Coins</span>');

      }else{

        nickIn();

      }

    });

    document.oncontextmenu = function(){

      if(!chatdis){

        return false;

      }else{

        return true;

      }

    }

    document.ondragstart = function(){

      if(!chatdis){

        return false;

      }else{

        return true;

      }

    }

    document.onselectstart = function(){

      if(!chatdis){

        return false;

      }else{

        return true;

      }

    }

    //END EVENTS

    //WS EVENTS

    conn.onopen = function(e){

      console.log('webSocket connected');

    }

    conn.onmessage = function(e) {

      if(!document.hidden){

        if(reset){

          location.reload();

        }

        reset=false;

        var msg = e.data.split('¿');

        if(parseInt(msg[2])!=id){

          if(msg[1]!='moveBall' && msg[1]!='newBall' && msg[0]!='token'){

            console.log('message received -> '+e.data);

          }

          if(msg[0]=='token'){

            //console.log('asigned token -> '+msg[1]);

            udata[0]=msg[1];
            token=msg[1];

            console.log('create user id -> '+udata[2]);

            loadUser(udata);
            udata[1]='newUser';
            conn.send(udata.join('¿'));
            udata[1]='newUserBall';
            conn.send(udata.join('¿'));

          }

          if(msg[0]=='del'){

            if(parseInt(msg[1])!=id){

              console.log('user id:'+msg[1]+' -> has disconnected');
              $('.'+msg[1]).remove();

            }

          }

          if(msg[1]=='reload'){

            location.reload();

          }

          if(msg[1]=='newUser' && !$('.'+msg[2]).length){

            console.log('create user id -> '+msg[2]);

            loadUser(msg);
            udata[1]='newUser';
            conn.send(udata.join('¿'));

          }

          if(msg[1]=='moveUser'){

            if(!$('.'+msg[2]).length){

              loadUser(msg);

            }

            moveUser(msg[2], msg[3], msg[4], msg[5]);

          }

          if(msg[1]=='newBall' && !$('.ball'+msg[2]).length){

            loadBall(msg[2], msg[3], msg[4], msg[5], msg[7]);

          }

          if(msg[1]=='moveBall'){

            moveBall(msg[2], msg[3], msg[4], msg[5]);

          }

          if(msg[1]=='explode'){

            explodeBall(msg[2], false);

          }

          if(msg[1]=='resBall'){

            $('.ball'+msg[2]).css('box-shadow', ('0px 0px 20px 0px '+msg[3]));
            $('.ball'+msg[2]).css('background', msg[3]);

            $('.ball'+msg[2]).css('left', (msg[4]+'%'));
            $('.ball'+msg[2]).css('top', (msg[5]+'%'));

            $('.ball'+msg[2]).fadeIn(500);

            setTimeout(function(){

              boolExplodeBall[parseInt(msg[2])]=true;

            }, 600);

          }

          if(msg[1]=='msgChat'){

            if(!chatdis){

              noti++;

            }

            addmsgChat(msg[2], msg[3], msg[4], msg[5]);

          }

          if(msg[1]=='newskinandnick'){

            newskinandnick(msg[2], msg[3], msg[4]);

          }

        }else{

          window.location.href = 'https://underpost.net';

        }

      }else{

        reset=true;

      }

    }

  }());

</script>

</body>

</html>
