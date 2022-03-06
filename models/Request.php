<?php
    
/*
 *  @desc Contain File Management imnplementations
 *  @class FileManager
 *  @author Philane Msibi
 *  @version 1.0
 */

namespace Msibi_PHP;

class Request {


    private static $handler;

    private static $response;

    private static $headers = [
        'Content-Type: application/json'

    ];

    private static function init($url) {
    
        self::$handler = curl_init($url);
        curl_setopt(self::$handler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(self::$handler, CURLINFO_HEADER_OUT, true);
        curl_setopt(self::$handler, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt(self::$handler, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt(self::$handler, CURLOPT_HTTPHEADER, self::$headers);

    }

    /*
     * @desc Makes a get request to url
     * @func get
     * @param $url
     * @version 1.0
     */ 

    public static function get($url, $content_type = '') {

        self::init($url);

        return self::return_result();
    }

    /*
     * @desc Makes a POST request to url
     * @func post
     * @param $url,
     * @param $content_type - The content Type to set on headers array
     * @version 1.0
     */ 

    public static function post($url, $content_type = '', $data = []) {

        self::init($url);
        curl_setopt(self::$handler, CURLOPT_POST, true);
        curl_setopt(self::$handler, CURLOPT_POSTFIELDS, json_encode($data));
        
        return self::return_result();
    }
    
   
    /*
     * @desc Validate the curl response
     * @func return_response
     * @return object | array
     * @version 1.0
     */

    private static function return_result() {
    
        self::$response = curl_exec(self::$handler);

        curl_close(self::$handler);

        if (!self::$response) die("Error:".curl_error(self::$handler));

        return json_decode(self::$response);
    }

}

