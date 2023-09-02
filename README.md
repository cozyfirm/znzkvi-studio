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
