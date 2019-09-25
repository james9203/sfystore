<?php
/**
 * Created by PhpStorm.
 * User: 11005884
 * Date: 2019/9/25
 * Time: 14:03
 */
namespace jamesluo\sfystore\BaseInfo;
use jamesluo\sfystore\Base\Auth;
use  jamesluo\sfystore\Http\Client;

class Roles extends  Auth{
    public  function __construct($AppId = null, $AppSecret = null, $merchantOpenId = null)
    {
        parent::__construct($AppId, $AppSecret, $merchantOpenId);
    }

    /**
     * @return mixed|null
     */
    public  function  getRoleList(){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $ret = Client::post($this->_host.'/api/open/role/list',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 添加角色
     * @param $code
     * @param $name
     * @param $description
     * @param $level
     * @param $roleOpenId
     * @param $extCode
     * @return mixed|null
     */
    public function addRole($code, $name, $description, $level, $roleOpenId, $extCode)
    {
        $params['access_token'] = $this->_access_token;
        $params['appId'] = $this->_AppId;
        $params['merchantOpenId'] = $this->_merchantOpenId;
        $params['code'] = $code;
        $params['name'] = $name;
        $params['description'] = $description;
        $params['level'] = $level;
        $params['roleOpenId'] = $roleOpenId;
        $params['extCode'] = $extCode;
        $ret = Client::post($this->_host . '/api/open/role/add', http_build_query($params));
        if ($ret->ok()) {
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 修改角色
     * @param $code
     * @param $name
     * @param $description
     * @param $roleOpenId
     * @param null $extCode
     * @return mixed|null
     */
    public  function  editRole($code,$name,$description,$roleOpenId,$extCode=null){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['code']  = $code;
        $params['name']  = $name;
        $params['description']  = $description;
        $params['roleOpenId']  = $roleOpenId;
        if(!empty($extCode)){
            $params['extCode'] = $extCode;
        }
        $ret = Client::post($this->_host.'/api/open/role/edit',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 删除角色
     * @param $roleOpenId
     * @return mixed|null
     */
    public function delRole($roleOpenId)
    {
        $params['access_token'] = $this->_access_token;
        $params['appId'] = $this->_AppId;
        $params['merchantOpenId'] = $this->_merchantOpenId;
        $params['roleOpenId'] = $roleOpenId;
        $ret = Client::post($this->_host . '/api/open/role/delete', http_build_query($params));
        if ($ret->ok()) {
            $data = $ret->toJson();
            return $data;
        }
    }
}
