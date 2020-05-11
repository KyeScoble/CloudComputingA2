<html>
   <head>
      <title>JavaScript MQTT WebSocket Example</title>
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
        message = new Paho.MQTT.Message("Hello world");
        message.destinationName = "orange1";
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
   </head>
   <body>
	  <h1>Main Body</h1>
		<script>
			MQTTconnect();
		</script>

   </body>
</html>