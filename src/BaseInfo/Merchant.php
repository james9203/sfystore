<?php
/**
 * Created by PhpStorm.
 * User: 11005884
 * Date: 2019/9/25
 * Time: 19:11
 */
namespace jamesluo\sfystore\BaseInfo;
use jamesluo\sfystore\Base\Auth;
use  jamesluo\sfystore\Http\Client;

class Merchant extends  Auth{
    public function __construct($AppId = null, $AppSecret = null, $merchantOpenId = null)
    {
        parent::__construct($AppId, $AppSecret, $merchantOpenId);
    }

    /**
     * 获取商户列表
     * @return mixed|null
     */
    public  function  getMerchantList(){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $ret = Client::post($this->_host.'/api/open/merchant/list',http_build_query($params));

        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     *  添加商户
     * @param $data
     * @return mixed|null
     */
    public  function  addMerchant($data){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params = array_merge($params,$data);
        $ret = Client::post($this->_host.'/api/open/merchant/add',http_build_query($params));

        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 修改商户
     * @param $merchantOpenId
     * @param $data
     * @return mixed|null
     */
    public function  editMerchant($merchantOpenId,$data){
        $params['access_token']  = $this->_access_token;
        $params['appId']  = $this->_AppId;
        $params['merchantOpenId']  = $merchantOpenId;
        $params = array_merge($params,$data);
        $ret = Client::post($this->_host.'/api/open/merchant/edit',http_build_query($params));

        if($ret->ok()){
            $data = $ret->toJson();
            return $data;
        }
    }
}
