## ZNZKVI

##### App access via [www.znzkvi.ba](https://znzkvi.ba) !

Important hash:

    - FnJDbEav4pdHmmq
    - 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
    - db: #ovoJesSfra56##$$
    
Useful queries: 

    - UPDATE `quiz__sets` SET `opened`=0, `answered`=0, `correct`=0,`level_opened`=0,`level_answered`=0,`level_correct`=0 where quiz_id = 3
    - UPDATE `quiz` SET `started` = 0, `threshold` = 1, `total_money` = 0, `correct_answers` = 0 where id = 3

To make it work, local system should be synchronised with central system. IP should be kept inside 
config file (.env) such as (production version will have different IPs):

    - CENTAR_URI="http://127.0.0.1" 
    - CENTAR_PORT="8000"

##### Server data

    - IP address: IP_ADDR
    - Local server IP Address: 192.168.1.100

##### ENV data

    - MQTT_HOST="192.168.1.100"
    - MQTT_PORT="1883"
    - MQTT_WS_PORT="8083"

##### MySQL data

    - ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'PASSWORD';
    - CREATE USER 'webapp'@'localhost' IDENTIFIED WITH authentication_plugin BY 'PASSWORD';
    - mysql -u USER -p 
    - database: use db_name
    
##### MQTT Data

###### 1. Alkaris MQTT broker

    MQTT_HOST="mqtt-v2.alkaris.com"
    MQTT_PORT="8883"
    MQTT_WS_PORT="8083"
    MQTT_TLS_ENABLED=true
    
###### 2. Local server (LAN / WAN network)

    #MQTT_HOST="192.168.1.100"
    #MQTT_PORT="1883"
    #MQTT_WS_PORT="8083"
    #MQTT_TLS_ENABLED=false

## PHP 7.4 commands

##### Composer access

    - /usr/bin/php7.4 /usr/local/bin/composer update/install

##### Artisan commands

    - /usr/bin/php7.4 artisan command:name

## Ubuntu commands

##### Nginx commands

    - sudo systemctl start/stop/restart nginx

## Renew SSL Certificates

Now that we have the SSL certificates ready, we need to provide Mosquitto access to them. For this, we need to copy the certificates to a location from where Mosquitto can access them.

    - $ sudo cp /etc/letsencrypt/live/mqtt.example.com/fullchain.pem /etc/mosquitto/certs/server.pem
    - $ sudo cp /etc/letsencrypt/live/mqtt.example.com/privkey.pem /etc/mosquitto/certs/server.key

Change the ownership of the /etc/mosquitto/certs directory to the mosquitto user created during the installation.

    - $ sudo chown mosquitto: /etc/mosquitto/certs

## License

This whole product is under [Alkaris d.o.o](https://alkaris.com) licence!
