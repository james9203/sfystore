<?php
/**
 * Created by PhpStorm.
 * User: 11005884
 * Date: 2019/9/24
 * Time: 19:07
 */
namespace jamesluo\sfystore\Face;
use jamesluo\sfystore\Base\Auth;
use jamesluo\sfystore\Http\Client;
class  FaceGroup extends  Auth{
    public  function __construct($AppId = null, $AppSecret = null, $merchantOpenId = null)
    {
        parent::__construct($AppId, $AppSecret, $merchantOpenId);
    }

    /**
     * 人脸库列表
     * @param $instanceOpenId
     */
    public  function  getList($instanceOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;
        $ret = Client::post($this->_host.'/api/open/face/group/list',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 获取人脸库用户列表
     * @param $groupId
     * @param $pageIndex
     * @param $pageSize
     */
    public  function  getUsers($groupId,$pageIndex,$pageSize){
        $params['groupId']  = $groupId;
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['pageIndex']  = $pageIndex;
        $params['pageSize']  = $pageSize;
        $ret = Client::post($this->_host.'/api/open/face/group/users',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 获取人脸用户模板列表
     * @param $groupId
     * @param $guestId
     * @return mixed|null
     */
    public  function  getUserTemplates($groupId,$guestId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['groupId']  = $groupId;
        $params['guestId']  = $guestId;
        $ret = Client::post($this->_host.'/api/open/face/group/user/templates',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 删除人脸用户模板
     * @param $groupId
     * @param $guestId
     * @param $faceToken
     * @return mixed|null
     */
    public  function delUserTemplates($groupId,$guestId,$faceToken){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['groupId']  = $groupId;
        $params['guestId']  = $guestId;
        $params['faceToken']  = $faceToken;
        $ret = Client::post($this->_host.'/api/open/face/group/user/template/delete',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     *新增人脸用户到人脸库
     * @param $mrdId
     * @param $guestName
     * @param $guestAge
     * @param $guestGender
     * @param $faceUrl
     */
    public function  addUser($groupId,$mrdId,$guestName,$guestAge,$guestGender,$faceUrl){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['groupId']  = $groupId;
        $params['mrdId']  = $mrdId;
        $params['guestName']  = $guestName;
        $params['guestAge']  = $guestAge;
        $params['guestGender'] = $guestGender;
        $params['faceUrl']  = $faceUrl;
        $ret = Client::post($this->_host.'/api/open/face/group/user/add',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 从人脸库删除人脸用户
     * @param $groupId
     * @param $guestId
     */
    public  function  delUser($groupId,$guestId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['groupId']  = $groupId;
        $params['guestId']  = $guestId;
        $ret = Client::post($this->_host.'/api/open/face/group/user/delete',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 添加用户人脸模板
     * @param $groupId
     * @param $guestId
     * @param $faceUrl
     * @return mixed|null
     */
    public  function  addUserTemplate($groupId,$guestId,$faceUrl){
        $params['access_token']  = $this->_access_token;
        $params['appId'] = $this->_AppId;
        $params['groupId']  = $groupId;
        $params['guestId']  = $guestId;
        $params['faceUrl']  = $faceUrl;
        $ret = Client::post($this->_host.'/api/open/face/group/user/template/add',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }
}
