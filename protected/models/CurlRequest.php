<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CurlRequest
{
    private $ch;
    /**
     * Init curl session
     * 
     * $params = array('url' => '',
     *                    'host' => '',
     *                   'header' => '',
     *                   'method' => '',
     *                   'referer' => '',
     *                   'cookie' => '',
     *                   'post_fields' => '',
     *                    ['login' => '',]
     *                    ['password' => '',]      
     *                   'timeout' => 0
     *                   );
     */                
    public function init($params)
    {
        $this->ch = curl_init();
        $user_agent = 'Mozilla/5.0 (Windows; U; 
Windows NT 5.1; ru; rv:1.8.0.9) Gecko/20061206 Firefox/1.5.0.9';
        $header = array(
        "Accept: text/xml,application/xml,application/xhtml+xml,
text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5",
        "Accept-Language: en-US,en;q=0.8,de;q=0.6,zh-CN;q=0.4,zh;q=0.2,vi;q=0.2,zh-TW;q=0.2",
        "Accept-Encoding: gzip,deflate,sdch",
        "Accept-Charset: windows-1251,utf-8;q=0.7,*;q=0.7",
        "Keep-Alive: 300");
        if (isset($params['host']) && $params['host'])      $header[]="Host: ".$params['host'];
        if (isset($params['header']) && $params['header']) $header[]=$params['header'];
        
        @curl_setopt ( $this -> ch , CURLOPT_RETURNTRANSFER , 1 );
        @curl_setopt ( $this -> ch , CURLOPT_VERBOSE , 1 );
        @curl_setopt ( $this -> ch , CURLOPT_HEADER , 1 );
        
        if ($params['method'] == "HEAD") @curl_setopt($this -> ch,CURLOPT_NOBODY,1);
        @curl_setopt ( $this -> ch, CURLOPT_FOLLOWLOCATION, 1);
        
        var_dump($header);
        
        @curl_setopt ( $this -> ch , CURLOPT_HTTPHEADER, $header );
        
        
        if ($params['referer'])    @curl_setopt ($this -> ch , CURLOPT_REFERER, $params['referer'] );
        @curl_setopt ( $this -> ch , CURLOPT_USERAGENT, $user_agent);
        if ($params['cookie'])            curl_setopt ($this -> ch , CURLOPT_COOKIE, $params['cookie']);

        if ( $params['method'] == "POST" )
        {
            curl_setopt( $this -> ch, CURLOPT_POST, true );
            curl_setopt( $this -> ch, CURLOPT_POSTFIELDS, $params['post_fields'] );
        }
        
        @curl_setopt( $this -> ch, CURLOPT_URL, $params['url']);
        @curl_setopt ( $this -> ch , CURLOPT_SSL_VERIFYPEER, 0 );
        @curl_setopt ( $this -> ch , CURLOPT_SSL_VERIFYHOST, 0 );
        
        if (isset($params['login']) & isset($params['password']))
            @curl_setopt($this -> ch , CURLOPT_USERPWD,$params['login'].':'.$params['password']);
        
        
        @curl_setopt ( $this -> ch , CURLOPT_TIMEOUT, $params['timeout']);
    }
    
    /**
     * Make curl request
     *
     * @return array  'header','body','curl_error','http_code','last_url'
     */
    public function exec()
    {
        $response = curl_exec($this->ch);
        $error = curl_error($this->ch);
        $result = array( 'header' => '', 
                         'body' => '', 
                         'curl_error' => '', 
                         'http_code' => '',
                         'last_url' => '');
        if ( $error != "" )
        {
            $result['curl_error'] = $error;
            return $result;
        }
        
        $header_size = curl_getinfo($this->ch,CURLINFO_HEADER_SIZE);
        $result['header'] = substr($response, 0, $header_size);
        $result['body'] = substr( $response, $header_size );
        $result['http_code'] = curl_getinfo($this -> ch,CURLINFO_HTTP_CODE);
        $result['last_url'] = curl_getinfo($this -> ch,CURLINFO_EFFECTIVE_URL);
        return $result;
    }
            
    public function getMethod() {
        
         $curl = curl_init();
            // Set some options - we are passing in a useragent too here
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'http://shitu.baidu.com/i?rn=10&ftn=indexstu&ct=1&tn=shituresult&objurl=http://t2.baidu.com/it/u=20024478,2483778547&fm=21&gp=0.jpg',
                CURLOPT_USERAGENT => 'Codular Sample cURL Request'
            ));
            // Send the request & save response to $resp
            echo $resp = curl_exec($curl);
            // Close request to clear up some resources
            curl_close($curl);
            
    }
    
    public function postMethod() {
        
        // Get cURL resource
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://testcURL.com',
            CURLOPT_USERAGENT => 'Codular Sample cURL Request',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => array(
                item1 => 'value',
                item2 => 'value2'
            )
        ));
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);
    }
}
