<html>
<head>
  <style>
  </style>

  <link rel="stylesheet" type="text/css" href="css/Style_Main.css">

  <?php
  session_start();
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript">
 </script>

 <script type = "text/javascript" language = "javascript">
    var mqtt;
    var reconnectTimeout = 2000;
    var host="url"; //change this
    var port= port;
    var user="username";
    var pass="password";

  function onConnect() {
  // Once a connection has been made, make a subscription and send a message.

    console.log("Connected ");
    //mqtt.subscribe("sensor1");
    message = new Paho.MQTT.Message("init");
    message.destinationName = "website/init";
    mqtt.send(message);
  }

  function Left90() {
  message = new Paho.MQTT.Message("Left90");
  message.destinationName = "website/push";
  mqtt.send(message);
  }

  function Right90() {
  message = new Paho.MQTT.Message("Right90");
  message.destinationName = "website/push";
  mqtt.send(message);
  }

  function Forward() {
  message = new Paho.MQTT.Message("Forward");
  message.destinationName = "website/push";
  mqtt.send(message);
  }

  function Backwards() {
  message = new Paho.MQTT.Message("Backwards");
  message.destinationName = "website/push";
  mqtt.send(message);
  }

  function Left() {
  message = new Paho.MQTT.Message("Left");
  message.destinationName = "website/push";
  mqtt.send(message);
  }

  function Right() {
  message = new Paho.MQTT.Message("Right");
  message.destinationName = "website/push";
  mqtt.send(message);
  }

  function Stop() {
  message = new Paho.MQTT.Message("Stop");
  message.destinationName = "website/push";
  mqtt.send(message);
  }

  function Left180() {
  message = new Paho.MQTT.Message("Left180");
  message.destinationName = "website/push";
  mqtt.send(message);
  }
  function Right180() {
  message = new Paho.MQTT.Message("Right180");
  message.destinationName = "website/push";
  mqtt.send(message);
  }

  function MQTTconnect() {
    console.log("connecting to "+ host +" "+ port);
    mqtt = new Paho.MQTT.Client(host,port,"clientjs");
    //document.write("connecting to "+ host);
    var options = {
        timeout: 3,
        onSuccess: onConnect,
        useSSL: true,
        userName: user,
        password: pass
     };

    mqtt.connect(options); //connect
    }

  </script>

<ul>
  <li><a class="active">Welcome: <?php echo "" .$_SESSION['name'];  ?></a></li>
  <li><a href = '\name'>Change Username</a></li>
  <li><a href = '\password'>Change Password</a></li>
  <li><a href=''>Help</a></li>
  <li><a href="\">Log out</a></li>
</ul>

<body>
  <script>
    MQTTconnect();
  </script>
<div id="controls">
<form id="#form" name="#form">
  <table id="btnTable">
<tr>
  <td><button class = "btnStyle"id="rotateL" name="rotateL" onClick="Left90()" value="rotateL">&#8630;</button></td>
  <td><button class = "btnStyle"id="up" name="btnUp" onClick="Forward()" value="up">^</button></td>
  <td><button class = "btnStyle"id="rotateR" name="rotateR" onClick="Right90()" value="rotateR">&#8631;</button></td>
</tr></br>
<tr>
  <td><button class = "btnStyle" id="left" name="btnLeft" onClick="Left()" value="left"><</button></td>
  <td><button class = "btnStyle" id="stop" name="btnStop" onClick="Stop()" value="stop">o</button></td>
  <td><button class = "btnStyle" id="right" name="btnRight" onClick="Right()" value="right">></button></td>
</tr></br>
<tr>
  <td><button class = "btnStyle"id="rotateL2" name="rotateL2" onClick="Left180()" value="rotateL2">&#8634;</button></td>
  <td><button class = "btnStyle" id="down" name="btnDown" onClick="Backwards()" value="down">V</button></td>
  <td><button class = "btnStyle"id="rotateR2" name="rotateR2" onClick="Right180()" value="rotateR2">&#8635;</button></td>
</tr>
</table>

</form>
</div>

</head>
</body>
</html>
