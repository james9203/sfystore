<?php
/**
 * Created by PhpStorm.
 * User: 11005884
 * Date: 2019/9/25
 * Time: 11:23
 */
namespace jamesluo\sfystore\BaseInfo;
use jamesluo\sfystore\Base\Auth;
use  jamesluo\sfystore\Http\Client;

class Dept extends  Auth{
    public function __construct($AppId = null, $AppSecret = null, $merchantOpenId = null)
    {
        parent::__construct($AppId, $AppSecret, $merchantOpenId);
    }

    /**
     *  获取部门列表
     * @return mixed|null
     */
    public  function  getDeptList(){
        $params['access_token'] = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $ret = Client::post($this->_host.'/api/open/dept/list',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 添加部门
     * @param $deptName
     * @param $deptParentOpenId
     * @param $extCode
     */
    public  function  addDept($deptName,$deptParentOpenId,$extCode){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['deptName']  = $deptName;
        $params['deptParentOpenId']  = $deptParentOpenId;
        $params['extCode']  = $extCode;
        $ret = Client::post($this->_host.'/api/open/dept/add',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 修改部门
     * @param $deptOpenId
     * @param $deptName
     * @param $extCode
     * @return mixed|null
     */
    public  function  editDept($deptOpenId,$deptName,$extCode){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['deptOpenId']  = $deptOpenId;
        $params['deptName']  = $deptName;
        $params['extCode']  = $extCode;
        $ret = Client::post($this->_host.'/api/open/dept/edit',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    public  function  delDept($deptOpenId,$deptName,$extCode){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['deptOpenId']  = $deptOpenId;
        $params['deptName']  = $deptName;
        $params['extCode']  = $extCode;
        $ret = Client::post($this->_host.'/api/open/dept/delete',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }
}
