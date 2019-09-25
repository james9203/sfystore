<?php
/**
 * Created by PhpStorm.
 * User: 11005884
 * Date: 2019/9/25
 * Time: 11:42
 */

namespace jamesluo\sfystore\BaseInfo;

use jamesluo\sfystore\Base\Auth;
use  jamesluo\sfystore\Http\Client;

class  Organization extends Auth
{
    public function __construct($AppId = null, $AppSecret = null, $merchantOpenId = null)
    {
        parent::__construct($AppId, $AppSecret, $merchantOpenId);
    }

    /**
     * 获取组织结构列表
     * @return mixed|null
     */
    public function getOrganizationList()
    {
        $params['access_token'] = $this->_access_token;
        $params['appId'] = $this->_AppId;
        $params['merchantOpenId'] = $this->_merchantOpenId;
        $ret = Client::post($this->_host . '/api/open/organization/list', http_build_query($params));
        if ($ret->ok()) {
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 添加组织结构
     * @param $name
     * @param $parentOpenId
     * @param $extCode
     * @return mixed|null
     */
    public function addOrganization($name, $parentOpenId, $extCode)
    {
        $params['access_token'] = $this->_access_token;
        $params['appId'] = $this->_AppId;
        $params['merchantOpenId'] = $this->_merchantOpenId;
        $params['name'] = $name;
        $params['parentOpenId'] = $parentOpenId;
        $params['extCode'] = $extCode;
        $ret = Client::post($this->_host . '/api/open/organization/add', http_build_query($params));
        if ($ret->ok()) {
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 修改组织结构
     * @param $name
     * @param $parentOpenId
     * @param $organizationOpenId
     * @param $extCode
     * @return mixed|null
     */
    public function updateOrganization($name, $parentOpenId, $organizationOpenId, $extCode)
    {
        $params['access_token'] = $this->_access_token;
        $params['appId'] = $this->_AppId;
        $params['merchantOpenId'] = $this->_AppId;
        $params['name'] = $name;
        $params['parentOpenId'] = $parentOpenId;
        $params['organizationOpenId'] = $organizationOpenId;
        $params['extCode'] = $extCode;
        $ret = Client::post($this->_host . '/api/open/organization/update', http_build_query($params));
        if ($ret->ok()) {
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 删除组织结构
     * @param $organizationOpenId
     */
    public function delOrganization($organizationOpenId)
    {
        $params['access_token'] = $this->_access_token;
        $params['appId'] = $this->_AppId;
        $params['merchantOpenId'] = $this->_merchantOpenId;
        $params['organizationOpenId'] = $organizationOpenId;
        $ret = Client::post($this->_host . '/api/open/organization/delete', http_build_query($params));
        if ($ret->ok()) {
            $data = $ret->toJson();
            return $data;
        }
    }
}
