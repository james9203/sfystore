<?php
/**
 * Created by PhpStorm.
 * User: 11005884
 * Date: 2019/9/24
 * Time: 15:37
 */
namespace jamesluo\sfystore\Face;
use jamesluo\sfystore\Base\Auth;
use jamesluo\sfystore\Http\Client;

class  Guest extends Auth
{
    public function __construct($AppId = null, $AppSecret = null, $merchantOpenId = null)
    {
        parent::__construct($AppId, $AppSecret, $merchantOpenId);
    }

    public function getList($instanceOpenId, $passagewayOpenId, $startTime, $endTime, $limitNum, $guestType = 0)
    {
        $params['access_token'] = $this->_access_token;
        $params['appId'] = $this->_AppId;
        $params['merchantOpenId'] = $this->_merchantOpenId;
        $params['instanceOpenId'] = $instanceOpenId;
        $params['passagewayOpenId'] = $passagewayOpenId;
        $params['startTime'] = $startTime;
        $params['endTime'] = $endTime;
        $params['limitNum'] = $limitNum;
        $params['guestType'] = $guestType;
        $ret = Client::post($this->_host . '/api/open/face/guest/list', http_build_query($params));
        if ($ret->ok()) {
            $data = $ret->toJson();
            return $data;
        }
    }
    public  function  getInfo($instanceOpenId,$faceUrl,$faceToken){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;
        $params['faceUrl']  = $faceUrl;
        $params['faceToken']  = $faceToken;
        $ret = Client::post($this->_host.'/api/open/face/guest/info',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    public function edit($instanceOpenId, $guestId, $data)
    {
        $params['access_token'] = $this->_access_token;
        $params['appId'] = $this->_AppId;
        $params['merchantOpenId'] = $this->_merchantOpenId;
        $params['instanceOpenId'] = $instanceOpenId;
        $params['guestId'] = $guestId;
        if (isset($data['name'])) {
            $params['name'] = $data['name'];
        }
        if (isset($data['gender'])) {
            $params['gender'] = $data['gender'];
        }
        if (isset($data['mobile'])) {
            $params['mobile'] = $data['mobile'];
        }
        if (isset($data['birthday'])) {
            $params['birthday'] = $data['birthday'];
        }
        $ret = Client::post($this->_host . '/api/open/face/guest/edit', http_build_query($params));
        if ($ret->ok()) {
            $rsdata = $ret->toJson();
            return $rsdata;
        }
    }
}
