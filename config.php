<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'secure_user');
define('DB_PASSWORD', 'secure_password');
define('DB_NAME', 'secure_db');
define('DB_SSL', array(
    PDO::MYSQL_ATTR_SSL_CA => '/path/to/ca-cart.pem',
    PDO::MYSQL_ATTR_SSL_CERT => '/path/to/client-cert.pem',
    PDO::MYSQL_ATTR_SSL_KEY => '/path/to/client-key.pem'
));
?>