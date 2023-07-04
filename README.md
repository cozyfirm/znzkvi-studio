## ZNZKVI

##### App access via [www.znzkvi.ba](https://znzkvi.ba) !

Important hash:

    - FnJDbEav4pdHmmq
    - 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

To make it work, local system should be synchronised with central system. IP should be kept inside 
config file (.env) such as (production version will have different IPs):

    - CENTAR_URI="http://127.0.0.1" 
    - CENTAR_PORT="8000"

##### Server data

    - IP address: IP_ADDR

##### MySQL data

    - ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'PASSWORD';
    - CREATE USER 'webapp'@'localhost' IDENTIFIED WITH authentication_plugin BY 'PASSWORD';
    - mysql -u USER -p 
    - database: use db_name

## PHP 7.4 commands

##### Composer access

    - /usr/bin/php7.4 /usr/local/bin/composer update/install

##### Artisan commands

    - /usr/bin/php7.4 artisan command:name

## Ubuntu commands

##### Nginx commands

    - sudo systemctl start/stop/restart nginx
    

## License

This whole product is under [Alkaris d.o.o](https://alkaris.com) licence!
