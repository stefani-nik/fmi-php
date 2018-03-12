<?php

class Request{

    protected $serverInfo;

    function __construct($arr)
    {
        $this->serverInfo = $arr;
    }

    public function getMethod(){
        return strtolower($this->serverInfo['REQUEST_METHOD']);
    }

    public function getPath(){
        return $this->serverInfo['PATH_INFO'];  // PATH_INFO has to be declared in httpd.conf  ( AcceptPathInfo = On)
    }

    public function getUrl(){
        return  "http://{$this->serverInfo['HTTP_HOST']}{$this->serverInfo['REQUEST_URI']}";
    }

    public function getUserAgent(){
        return $this->serverInfo['HTTP_USER_AGENT'];
    }
}

class GetRequest extends Request{

    function __construct($arr)
    {
        parent::__construct($arr);
    }

    public function getData(){
        $queryStr = $this->serverInfo['QUERY_STRING']; // if no query string uncomment the line below
        // $queryStr = "a=1&b=2";
        parse_str($queryStr, $result);
        return $result;

    }
}

$request = new Request($_SERVER);
$getRequest = new GetRequest($_SERVER);

echo $request->getMethod().'</br>';
echo $request->getPath().'</br>';
echo $request->getUrl().'</br>';
echo $request->getUserAgent().'</br>';
echo http_build_query($getRequest->getData()); // builds the query back from the assoc array

?>