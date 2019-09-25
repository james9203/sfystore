<?php
/**
 * Created by PhpStorm.
 * User: 11005884
 * Date: 2019/9/25
 * Time: 14:29
 */

namespace jamesluo\sfystore\BaseInfo;
use jamesluo\sfystore\Base\Auth;
use  jamesluo\sfystore\Http\Client;
class Device extends  Auth{
    public function __construct($AppId = null, $AppSecret = null, $merchantOpenId = null)
    {
        parent::__construct($AppId, $AppSecret, $merchantOpenId);
    }


    /**
     * 获取开发者商户体系的设备列表
     * @param null $online
     * @param null $used
     * @param null $funcValue
     * @return mixed|null
     */
    public  function  getDeviceList($online=null,$used=null,$funcValue=null){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        if(!empty($online)){
            $params['online']  = $online;
        }
        if(!empty($used)){
            $params['used']  = $used;
        }
        if(!empty($funcValue)){
           $params['funcValue']  = $funcValue;
        }
        $ret = Client::post($this->_host.'/api/open/device/list',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     *设备功能列表
     * @return mixed|null
     */
    public  function  getDeviceFuncs(){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $ret = Client::post($this->_host.'/api/open/device/funcs',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * @param $sn
     * @param $extCode
     */
    public  function  addDevice($sn,$extCode){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['sn']  = $sn;
        $params['extCode']  = $extCode;
        $ret = Client::post($this->_host.'/api/open/device/add',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 将设备从商户订购关系中移除
     * @param $deviceOpenId
     * @return mixed|null
     */
    public  function  delDevice($deviceOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['deviceOpenId']  = $deviceOpenId;
        $ret = Client::post($this->_host.'/api/open/device/delete',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 获取设备详情
     * @param $deviceOpenId
     * @return mixed|null
     */
    public  function  getDeviceDetail($deviceOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId'] = $this->_merchantOpenId;
        $params['deviceOpenId']  = $deviceOpenId;
        $ret = Client::post($this->_host.'/api/open/device/detail',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 更换设备
     * @param $deviceOpenId
     * @param $sn
     * @return mixed|null
     */
    public  function  deviceReplace($deviceOpenId,$sn){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['deviceOpenId'] =  $deviceOpenId;
        $params['sn']  = $sn;
        $ret = Client::post($this->_host.'',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 修改设备别名
     * @param $deviceOpenId
     * @param $alias
     * @return mixed|null
     */
    public  function  deviceAlias($deviceOpenId,$alias){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['deviceOpenId']  = $deviceOpenId;
        $params['alias']  = $alias;
        $ret = Client::post($this->_host.'/api/open/device/alias',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }


    /**
     * 删除设备网络
     * @param $deviceOpenId
     * @return mixed|null
     */
    public  function  deviceNetdel($deviceOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['deviceOpenId'] = $deviceOpenId;
        $ret = Client::post($this->_host.'',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     *设备抓图
     * @param $deviceOpenId
     * @return mixed|null
     */
    public  function  deviceGrap($deviceOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['deviceOpenId']  = $deviceOpenId;
        $ret = Client::post($this->_host.'',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 重启设备
     * @param $deviceOpenId
     * @return mixed|null
     */
    public  function  deviceReboot($deviceOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['deviceOpenId']  = $deviceOpenId;
        $ret = Client::post($this->_host.'/api/open/device/reboot',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 设备状态小时查询
     * @param $deviceOpenId
     * @param $time
     * @return mixed|null
     */
    public  function  deviceHourState($deviceOpenId,$time){

        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['deviceOpenId']  = $deviceOpenId;
        $params['time']  = $time;

        $ret = Client::post($this->_host.'/api/open/device/hour/state',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }

    }

    /**
     * 设备状态天查询
     * @param $deviceOpenId
     * @param $start
     * @param $end
     * @return mixed|null
     */
    public  function  deviceDayState($deviceOpenId,$start,$end){
        $params['access_token']  = $this->_access_token;
        $params['appId'] = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['deviceOpenId']  = $deviceOpenId;
        $params['start']  = $start;
        $params['end']  = $end;

        $ret = Client::post($this->_host.'/api/open/device/day/state',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 设备状态查询
     * @param $deviceOpenId
     * @param $start
     * @param $end
     * @return mixed|null
     */
    public  function  deviceState($deviceOpenId,$start,$end){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['deviceOpenId']  = $deviceOpenId;
        $params['start']  = $start;
        $params['end']  = $end;

        $ret = Client::post($this->_host.'/api/open/device/state',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 获取设备参数详情（暂定）
     * @param $deviceOpenId
     * @return mixed|null
     */
    public  function  deviceDetailConfig($deviceOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['deviceOpenId']  = $deviceOpenId;

        $ret = Client::post($this->_host.'/api/open/device/detail/config',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }
}
