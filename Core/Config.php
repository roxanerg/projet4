<?php
namespace Core;
/**
 * Application configuration
 *
 * PHP version 7.0
 */  
class Config
{
     private $settings = array();
     private static $instance =  null;
  
     public function __construct()
     {
         include_once('../App/Config/Config.php');
         $this->settings = $config;
     }
    
     public static function get()
     {
         if (is_null(self::$instance)) 
         {
            self::$instance = new Config();
         }
         return self::$instance;
     }
     
     public function db($key)
     {
         if (isset($this->settings['database'][$key])) {
             return $this->settings['database'][$key];
         }
         return null;
     }
     
     public function config($key)
     {
         if (isset($this->settings['config'][$key])) {
             return $this->settings['config'][$key];
         }
         return null;
     }
 }
