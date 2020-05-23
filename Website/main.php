<html>
<head>
  <style>
  </style>

  <link rel="stylesheet" type="text/css" href="css/Style_Main.css">

  <?php
  session_start();
  include( "Google/Client.php" );
  include( "Google/Service/Storage.php" );
  
  

  $date = date('Y-m-d H:i:s');
  $file_content = "user: " . $_SESSION['name']. " logged in at:" . $date . "\n";
  
  $handle = fopen('gs://login-logs/logs.txt',"w");
  fwrite($handle,$file_content);
  fclose($handle);

  
/*   $client = new Google_Client();
  putenv('GOOGLE_APPLICATION_CREDENTIALS=CloudCompA2-aea743ad31f4.json');
  $client->useApplicationDefaultCredentials();
  
  
  $storageService = new Google_Service_Storage( $client );

  
  
  try 
  {

	$postbody = array( 
			'name' => $file_name, 
			//'data' => $file_content,
			'uploadType' => "media"
			);

	$gsso = new Google_Service_Storage_StorageObject();
	$gsso->setName( $file_name );

	$result = $storageService->objects->insert( $bucket, $gsso, $postbody );

	print_r($result);
	 
  }       
  catch (Exception $e)
  {
	print $e->getMessage();
  }
   */
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript">
 </script>

 <script type = "text/javascript" language = "javascript">
    var mqtt;
    var reconnectTimeout = 2000;
    var host="tailor.cloudmqtt.com"; //change this
    var port= 33828;
    var user="khnpnwap";
    var pass="OV4PZj_k9oBG";
	
	
	

  function onConnect() {
  // Once a connection has been made, make a subscription and send a message.

    console.log("Connected ");
    //mqtt.subscribe("sensor1");
    message = new Paho.MQTT.Message("init");
    message.destinationName = "website/init";
    mqtt.send(message);
  }

  function LeftN() {
  message = new Paho.MQTT.Message("LeftN");
  message.destinationName = "website/push";
  mqtt.send(message);
  }

  function RightN() {
  message = new Paho.MQTT.Message("RightN");
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

  function LeftO() {
  message = new Paho.MQTT.Message("LeftO");
  message.destinationName = "website/push";
  mqtt.send(message);
  }
  function RightO() {
  message = new Paho.MQTT.Message("RightO");
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
  <td><button class = "btnStyle"id="rotateL" name="rotateL" onClick="LeftN()">&#8630;</button></td>
  <td><button class = "btnStyle"id="up" name="btnUp" onClick="Forward()">^</button></td>
  <td><button class = "btnStyle"id="rotateR" name="rotateR" onClick="RightN()">&#8631;</button></td>
</tr></br>
<tr>
  <td><button class = "btnStyle" id="left" name="btnLeft" onClick="Left()"><</button></td>
  <td><button class = "btnStyle" id="stop" name="btnStop" onClick="Stop()">o</button></td>
  <td><button class = "btnStyle" id="right" name="btnRight" onClick="Right()">></button></td>
</tr></br>
<tr>
  <td><button class = "btnStyle"id="rotateL2" name="rotateL2" onClick="LeftO()">&#8634;</button></td>
  <td><button class = "btnStyle" id="down" name="btnDown" onClick="Backwards()">V</button></td>
  <td><button class = "btnStyle"id="rotateR2" name="rotateR2" onClick="RightO()">&#8635;</button></td>
</tr>
</table>

</form>
</div>

</head>
</body>
</html>
