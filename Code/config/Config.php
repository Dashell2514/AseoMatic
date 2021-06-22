<?php

class ConfigurationClient{
    //Database
    const DB_HOST = $_ENV['DB_HOST'];
    const DB_DATABASE = $_ENV["DB_DATABASE"];
    const DB_USER = $_ENV["DB_USER"];
    const DB_PASSWORD = $_ENV["DB_PASSWORD"];
    const DB_PORT = $_ENV["DB_PORT"];
    const DB_CHARSET = $_ENV['DB_CHARSET'];
    
    //Mailtrap
    
    const MAIL_HOST = $_ENV["MAIL_HOST"]; 
    const MAIL_PORT = $_ENV["MAIL_PORT"]; 
    const MAIL_USERNAME  = $_ENV['MAIL_USERNAME'];           
    const MAIL_PASSWORD = $_ENV['MAIL_PASSWORD']; 

}
