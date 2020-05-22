import paho.mqtt.client as mqtt
import RPi.GPIO as gpio
import time

def init():
    gpio.setmode(gpio.BCM)
    gpio.setup(17, gpio.OUT)
    gpio.setup(22, gpio.OUT)
    gpio.setup(23, gpio.OUT)
    gpio.setup(24, gpio.OUT)
    
def forward():
    init()
    gpio.output(17, True)
    gpio.output(22, False)
    gpio.output(23, False) 
    gpio.output(24, True)

def stop():
    init()
    gpio.cleanup()
    
def backward():
    init()
    gpio.output(17, False)
    gpio.output(22, True)
    gpio.output(23, True) 
    gpio.output(24, False)
    
def right():
    init()
    gpio.output(17, False)
    gpio.output(22, True)
    gpio.output(23, False) 
    gpio.output(24, True)

def left():
    init()
    gpio.output(17, True)
    gpio.output(22, False)
    gpio.output(23, True) 
    gpio.output(24, False)
    
def leftN(tf):
    init()
    gpio.output(17, True)
    gpio.output(22, False)
    gpio.output(23, True) 
    gpio.output(24, False)
    time.sleep(tf)
    gpio.cleanup()

def rightN(tf):
    init()
    gpio.output(17, False)
    gpio.output(22, True)
    gpio.output(23, False) 
    gpio.output(24, True)
    time.sleep(tf)
    gpio.cleanup()

def on_connect(client, userdata, flags, rc):
    print("connected with result code {0}".format(str(rc)))
    client.subscribe("pi/receive")
    client.publish("pi/push","piCS")
    
def on_message(client, userdata, msg):
    print(msg.topic)
    print(str(msg.payload))
    if msg.topic == "pi/receive" and str(msg.payload) == "b'forward'":
        forward()
    if msg.topic == "pi/receive" and str(msg.payload) == "b'stop'":
        stop()
    if msg.topic == "pi/receive" and str(msg.payload) == "b'backward'":
        backward()
    if msg.topic == "pi/receive" and str(msg.payload) == "b'left'":
        left()
    if msg.topic == "pi/receive" and str(msg.payload) == "b'right'":
        right()
    if msg.topic == "pi/receive" and str(msg.payload) == "b'leftN'":
        leftN(float(0.6))
    if msg.topic == "pi/receive" and str(msg.payload) == "b'rightN'":
        rightN(float(0.6))
    if msg.topic == "pi/receive" and str(msg.payload) == "b'leftO'":
        leftN(float(1))
    if msg.topic == "pi/receive" and str(msg.payload) == "b'rightO'":
        rightN(float(1))
    


    

client=mqtt.Client()
client.username_pw_set("khnpnwap","OV4PZj_k9oBG")
client.connect("tailor.cloudmqtt.com",13828,60)
client.on_connect = on_connect
client.on_message = on_message
client.loop_forever()
