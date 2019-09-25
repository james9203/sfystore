<?php
/**
 * Created by PhpStorm.
 * User: 11005884
 * Date: 2019/9/24
 * Time: 15:21
 */
namespace jamesluo\sfystore\BaseInfo;
use jamesluo\sfystore\Base\Auth;
use  jamesluo\sfystore\Http\Client;

/**
 * 实体类
 * Class Instance
 * @package jamesluo\sfystore\Face
 */
class Instance extends  Auth{
    public function __construct($AppId = null, $AppSecret = null, $merchantOpenId = null)
    {
        parent::__construct($AppId, $AppSecret, $merchantOpenId);
    }

    /**
     *  获取实体列表
     * @return mixed|null
     */
    public  function  getInstanceList(){
        $params['access_token'] = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $ret = Client::post($this->_host.'/api/open/instance/list',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 创建实体
     * @param $data
     * @return mixed|null
     */
    public  function  addInstance($data){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params = array_merge($params,$data);

        $ret = Client::post($this->_host.'/api/open/instance/add',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 修改实体
     * @param $instanceOpenId
     * @param $data
     * @return mixed|null
     */
    public  function  editInstance($instanceOpenId,$data){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;
        $params = array_merge($params,$data);

        $ret = Client::post($this->_host.'/api/open/instance/edit',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 删除实体
     * @param $instanceOpenId
     * @return mixed|null
     */
    public  function  delInstance($instanceOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;

        $ret = Client::post($this->_host.'/api/open/instance/delete',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 查看实体详情
     * @param $instanceOpenId
     * @return mixed|null
     */
    public  function  getInstanceDetail($instanceOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;

        $ret = Client::post($this->_host.'/api/open/instance/detail',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 修改店铺营业状态
     * @param $instanceOpenId
     * @param $state
     */
    public  function  instanceStateChange($instanceOpenId,$state){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;
        $params['state']  = $state;
        $ret = Client::post($this->_host.'/api/open/instance/state/change',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 实体下添加员工
     * @param $instanceOpenId
     * @param $staffOpenIds
     * @return mixed|null
     */
    public  function  addInstanceStaff($instanceOpenId,$staffOpenIds){
        $params['access_token']  = $this->_access_token;
        $params['appId'] = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;
        $params['staffOpenIds']  = $staffOpenIds;

        $ret = Client::post($this->_host.'/api/open/instance/staff/add',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 实体下移除员工
     * @param $instanceOpenId
     * @param $staffOpenId
     */
    public  function  removeInstanceStaff($instanceOpenId,$staffOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;
        $params['staffOpenId'] = $staffOpenId;

        $ret = Client::post($this->_host.'/api/open/instance/staff/remove',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 获取该实体下的员工列表
     * @param $instanceOpenId
     * @return mixed|null
     */
    public  function  getInstanceStaffList($instanceOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;

        $ret = Client::post($this->_host.'/api/open/instance/staff/list',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 获取该实体下允许添加的员工列表
     * @param $instanceOpenId
     * @return mixed|null
     */
    public  function  getInstanceStaffAllow($instanceOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId'] = $instanceOpenId;

        $ret = Client::post($this->_host.'/api/open/instance/staff/allow',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 获取实体绑定的设备列表
     * @param $instanceOpenId
     * @return mixed|null
     */
    public  function  getInstanceDeviceList($instanceOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;

        $ret = Client::post($this->_host.'/api/open/instance/device/list',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 获取实体未绑定的设备列表
     * @param $instanceOpenId
     * @return mixed|null
     */
    public  function  getInstanceDeviceAllow($instanceOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;

        $ret = Client::post($this->_host.'/api/open/instance/device/allow',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 绑定设备到实体
     * @param $instanceOpenId
     * @param $deviceOpenId
     * @param $gatewayOpenId
     * @param $positive
     * @return mixed|null
     */
    public  function  addInstanceDevice($instanceOpenId,$deviceOpenId,$gatewayOpenId,$positive){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;
        $params['deviceOpenId']  = $deviceOpenId;
        $params['gatewayOpenId']  = $gatewayOpenId;
        $params['positive']  = $positive;

        $ret = Client::post($this->_host.'/api/open/instance/device/add',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 删除设备与出实体绑定关系
     * @param $instanceOpenId
     * @param $deviceOpenId
     * @return mixed|null
     */
    public  function delInstanceDevice($instanceOpenId,$deviceOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId'] =$instanceOpenId;
        $params['deviceOpenId']  = $deviceOpenId;

        $ret = Client::post($this->_host.'/api/open/instance/device/delete',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     *绑定设备到出入口
     * @param $passagewayOpenId
     * @param $deviceOpenId
     * @return mixed|null
     */
    public  function  addInstancePassagewayDevice($passagewayOpenId,$deviceOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['passagewayOpenId']  = $passagewayOpenId;
        $params['deviceOpenId']  = $deviceOpenId;

        $ret = Client::post($this->_host.'/api/open/instance/passageway/device/add',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 删除设备与出入口绑定关系
     * @param $passagewayOpenId
     * @param $deviceOpenId
     * @return mixed|null
     */
    public  function  delInstancePassagewayDevice($passagewayOpenId,$deviceOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['passagewayOpenId']  = $passagewayOpenId;
        $params['deviceOpenId']  = $deviceOpenId;

        $ret = Client::post($this->_host.'/api/open/instance/passageway/device/delete',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 添加试衣间
     * @param $code
     * @param $title
     * @param $parentOpenId
     * @param $extcode
     * @return mixed|null
     */
    public  function  addInstanceFitting($code,$title,$parentOpenId,$extcode){

        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['code'] = $code;
        $params['title']  = $title;
        $params['parentOpenId']  = $parentOpenId;
        $params['extcode'] = $extcode;

        $ret = Client::post($this->_host.'/api/open/instance/fitting/add',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 获取试衣间列表
     * @param $instanceOpenId
     * @return mixed|null
     */
    public  function getInstanceFittingList($instanceOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;

        $ret = Client::post($this->_host.'/api/open/instance/fitting/list',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 添加楼层
     * @param $code
     * @param $title
     * @param $parentOpenId
     * @param $extcode
     * @return mixed|null
     */
    public  function  addInstanceFloor($code,$title,$parentOpenId,$extcode){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['code']  = $code;
        $params['title']  = $title;
        $params['parentOpenId']  = $parentOpenId;
        $params['extcode']  = $extcode;

        $ret = Client::post($this->_host.'/api/open/instance/floor/add',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 获取楼层列表
     * @param $instanceOpenId
     * @return mixed|null
     */
    public  function  getInstanceFloorList($instanceOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;

        $ret = Client::post($this->_host.'/api/open/instance/floor/list',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 实体下创建出入口
     * @param $instanceOpenId
     * @param $name
     * @param $code
     * @param $direction
     * @param $extcode
     * @return mixed|null
     */
    public  function  instancePassagewayNew($instanceOpenId,$name,$code,$direction,$extcode){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;
        $params['name']  = $name;
        $params['code']  = $code;
        $params['direction']  = $direction;
        $params['extcode']  = $extcode;

        $ret = Client::post($this->_host.'/api/open/instance/passageway/new',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }

    }

    /**
     * 实体下修改出入口
     * @param $name
     * @param $code
     * @param $direction
     * @param $extcode
     * @param $passagewayOpenId
     * @return mixed|null
     */
    public  function  updateInstancePassageway($name,$code,$direction,$extcode,$passagewayOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;
        $params['name']  = $name;
        $params['code']  = $code;
        $params['direction']  = $direction;
        $params['extcode']  = $extcode;
        $params['passagewayOpenId']  = $passagewayOpenId;

        $ret = Client::post($this->_host.'/api/open/instance/passageway/update',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 获取出入口列表
     * @param $instanceOpenId
     * @return mixed|null
     */
    public  function  getInstancePassagewayList($instanceOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;

        $ret = Client::post($this->_host.'/api/open/instance/passageway/list',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 获取未绑定在该实体下的出入口列表
     * @param $instanceOpenId
     * @return mixed|null
     */
    public  function  getInstancePassagewayAllow($instanceOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;

        $ret = Client::post($this->_host.'/api/open/instance/passageway/allow',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 切换实体与出入口绑定的方向
     * @param $instanceOpenId
     * @param $passagewayOpenId
     * @param $direction
     * @return mixed|null
     */
    public  function  instancePassagewayPositiveChange($instanceOpenId,$passagewayOpenId,$direction){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;
        $params['passagewayOpenId']  = $passagewayOpenId;
        $params['direction'] = $direction;

        $ret = Client::post($this->_host.'/api/open/instance/passageway/positive/change',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 更换设备与实体的方向（仅限未与出入口绑定的设备）
     * @param $instanceOpenId
     * @param $deviceOpenId
     * @param $direction
     * @return mixed|null
     */
    public  function  instanceDevicePositiveChange($instanceOpenId,$deviceOpenId,$direction){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;
        $params['deviceOpenId']  = $deviceOpenId;
        $params['direction'] = $direction;

        $ret = Client::post($this->_host.'/api/open/instance/device/positive/change',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 移除出入口与实体绑定关系
     * @param $instanceOpenId
     * @param $passagewayOpenId
     * @return mixed|null
     */
    public  function  instancePassagewayRemove($instanceOpenId,$passagewayOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;
        $params['passagewayOpenId']  = $passagewayOpenId;

        $ret = Client::post($this->_host.'/api/open/instance/passageway/remove',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 实体下删除出入口
     * @param $instanceOpenId
     * @param $passagewayOpenId
     * @return mixed|null
     */
    public  function  DelInstancePassageway($instanceOpenId,$passagewayOpenId){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $this->_merchantOpenId;
        $params['instanceOpenId']  = $instanceOpenId;
        $params['passagewayOpenId']  = $passagewayOpenId;

        $ret = Client::post($this->_host.'/api/open/instance/passageway/delete',http_build_query($params));
        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }


}
