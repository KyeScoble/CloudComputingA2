#!python3
import paho.mqtt.client as mqtt  #import the client1
import time





#forward: pass forward message to raspberry pi
def on_message(client, userdata, msg):
    print(msg.topic)
    print(str(msg.payload))
    if msg.topic == "website/push" and str(msg.payload) == "b'Forward'":client.publish("pi/receive","forward")

    if msg.topic == "website/push" and str(msg.payload) == "b'Backwards'":client.publish("pi/receive","backward")

    if msg.topic == "website/push" and str(msg.payload) == "b'Left'":client.publish("pi/receive","left")

    if msg.topic == "website/push" and str(msg.payload) == "b'Right'":client.publish("pi/receive","right")

    if msg.topic == "website/push" and str(msg.payload) == "b'Stop'":client.publish("pi/receive","stop")

    if msg.topic == "website/push" and str(msg.payload) == "b'LeftN'":client.publish("pi/receive","leftN")

    if msg.topic == "website/push" and str(msg.payload) == "b'RightN'":client.publish("pi/receive","rightN")
        
    if msg.topic == "website/push" and str(msg.payload) == "b'RightO'":client.publish("pi/receive","rightO")
    
    if msg.topic == "website/push" and str(msg.payload) == "b'LeftO'":client.publish("pi/receive","leftO")
        
def on_connect(client, userdata, flags, rc):
    if rc==0:
        client.connected_flag=True #set flag
        client.subscribe("website/push")
        print("connected OK")
    else:
        print("Bad connection Returned code=",rc)

mqtt.Client.connected_flag=False#create flag in class
client = mqtt.Client("python1")             #create new instance
client.username_pw_set("khnpnwap","OV4PZj_k9oBG")
client.connect("tailor.cloudmqtt.com",13828,60)      #connect to broker
client.on_connect=on_connect
client.on_message=on_message  #bind call back function
client.loop_forever()
# while not client.connected_flag: #wait in loop
#     print("In wait loop")
#     time.sleep(1)
# print("in Main Loop")
#client.loop_stop()    #Stop loop
#client.disconnect() # disconnect
