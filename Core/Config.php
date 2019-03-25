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

     /**
      * @fn	public function __construct()
      *
      * @brief	Gets the construct
      *
      * @author	Roxane Riff
      * @date	25/03/2019
      *
      * @returns	A function.
      */

     public function __construct()
     {
         include_once('../App/Config/Config.php');
         $this->settings = $config;
     }

     /**
      * @fn	public static function get()
      *
      * @brief	Gets or creates the config
      *
      * @author	A
      * @date	25/03/2019
      *
      * @returns	A function.
      */

     public static function get()
     {
         if (is_null(self::$instance)) 
         {
            self::$instance = new Config();
         }
         return self::$instance;
     }

     /**
      * @fn	public function db($key)
      *
      * @brief	Returns the given database key
      *
      * @author	Roxane Riff
      * @date	25/03/2019
      *
      * @param	key	The key.
      *
      * @returns	A function.
      */

     public function db($key)
     {
         if (isset($this->settings['database'][$key])) {
             return $this->settings['database'][$key];
         }
         return null;
     }

     /**
      * @fn	public function config($key)
      *
      * @brief	Gets the given configuration key
      *
      * @author	A
      * @date	25/03/2019
      *
      * @param	key	The key.
      *
      * @returns	A function.
      */

     public function config($key)
     {
         if (isset($this->settings['config'][$key])) {
             return $this->settings['config'][$key];
         }
         return null;
     }
 }
