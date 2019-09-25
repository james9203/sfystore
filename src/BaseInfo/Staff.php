<?php
/**
 * Created by PhpStorm.
 * User: 11005884
 * Date: 2019/9/25
 * Time: 10:54
 */
namespace jamesluo\sfystore\BaseInfo;
use jamesluo\sfystore\Base\Auth;
use  jamesluo\sfystore\Http\Client;

class Staff extends Auth{

    public function __construct($AppId = null, $AppSecret = null, $merchantOpenId = null)
    {
        parent::__construct($AppId, $AppSecret, $merchantOpenId);
    }

    public function getStaffList(){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $ret = Client::post($this->_host.'/api/open/staff/list ',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return  $data;
        }
    }

    /**
     * 添加员工
     * @param $data
     * @return mixed|null
     */
    public  function  addStaff($data){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params = array_merge($params,$data);
        $ret = Client::post($this->_host.'/api/open/staff/add',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 修改员工
     * @param $data
     * @return mixed|null
     */
    public  function  updateStaff($data){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params = array_merge($params,$data);
        $ret = Client::post($this->_host.'/api/open/staff/update',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 删除员工
     * @param $staffOpenId
     */
    public  function  delStaff($staffOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['staffOpenId']  = $staffOpenId;
        $ret = Client::post($this->_host.'/api/open/staff/delete',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 员工登录(禁止/允许登录)
     * @param $staffOpenId
     * @param $state
     * @param $allowLogin
     * @param $username
     * @param $password
     * @return mixed|null
     */
    public  function  staffLoginChange($staffOpenId,$state,$allowLogin,$username,$password){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['staffOpenId']  = $staffOpenId;
        $params['state']  = $state;
        $params['allowLogin']  = $allowLogin;
        $params['username']  = $username;
        $params['password']  = $password;
        $ret = Client::post($this->_host.'/api/open/staff/login/change',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 员工（离职/在职）
     * @param $staffOpenId
     * @param state $
     */
    public  function  staffChange($staffOpenId,$state){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['staffOpenId']  = $staffOpenId;
        $params['state']  = $state;
        $ret = Client::post($this->_host.'/api/open/staff/change',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }
}
