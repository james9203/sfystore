<?php
/**
 * Created by PhpStorm.
 * User: 11005884
 * Date: 2019/9/24
 * Time: 18:44
 */
namespace jamesluo\sfystore\Face;
use jamesluo\sfystore\Base\Auth;
use jamesluo\sfystore\Http\Client;

class FaceTool extends  Auth{
    public function  __construct($AppId = null, $AppSecret = null, $merchantOpenId = null)
    {
        parent::__construct($AppId, $AppSecret, $merchantOpenId);
    }
    public function  setPush($url){
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['access_token']  = $this->_access_token;
        $params['url']  = $url;
        $ret = Client::post($this->_host.'/api/open/face/push',$params);
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    public  function  search($instanceOpenId,$faceToken,$img,$passagewayOpenId=null,$deviceOpenId=null){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;
        $params['faceToken']  = $faceToken;
        $params['img']  = $img;
        if(!empty($passagewayOpenId)){
            $params['passagewayOpenId']  = $passagewayOpenId;
        }
        if(!empty($deviceOpenId)){
            $params['deviceOpenId']  = $deviceOpenId;
        }
        $ret = Client::post($this->_host.'/api/open/face/search',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    public  function  detect($instanceOpenId,$img){
        $params['appId']  = $this->_AppId;
        $params['access_token']  = $this->_access_token;
        $params['img']  = $img;
        $params['instanceOpenId'] = $instanceOpenId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $ret = Client::post($this->_host.'/api/open/face/detect',$params);
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }
}
