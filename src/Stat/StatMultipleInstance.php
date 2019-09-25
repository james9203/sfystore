<?php
/**
 * Created by PhpStorm.
 * User: 11005884
 * Date: 2019/9/25
 * Time: 10:32
 */

namespace jamesluo\sfystore\Stat;

use jamesluo\sfystore\Base\Auth;
use jamesluo\sfystore\Http\Client;

class StatMultipleInstance extends Auth
{

    public function __construct($AppId = null, $AppSecret = null, $merchantOpenId = null)
    {
        parent::__construct($AppId, $AppSecret, $merchantOpenId);
    }

    /**
     * 获取所有实体五分钟客流数据
     * @param $openId
     * @param $start
     * @param $end
     * @return mixed|null
     */
    public function trafficFive($openId, $start, $end)
    {
        $params['access_token'] = $this->_access_token;
        $params['appId'] = $this->_AppId;
        $params['merchantOpenId'] = $this->_merchantOpenId;
        $params['openId'] = $openId;
        $params['start'] = $start;
        $params['end'] = $end;
        $ret = Client::post($this->_host . '/api/v2/multipleInstance/traffic/five', http_build_query($params));
        if ($ret->ok()) {
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 获取所有实体半小时客流数据
     * @param $openId
     * @param $start
     * @param $end
     * @return mixed|null
     */
    public function trafficHalf($openId, $start, $end)
    {
        $params['access_token'] = $this->_access_token;
        $params['appId'] = $this->_AppId;
        $params['merchantOpenId'] = $this->_merchantOpenId;
        $params['openId'] = $openId;
        $params['start'] = $start;
        $params['end'] = $end;
        $ret = Client::post($this->_host . '/api/v2/multipleInstance/traffic/half', http_build_query($params));
        if ($ret->ok()) {
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 获取所有实体小时客流数据
     * @param $openId
     * @param $start
     * @param $end
     * @return mixed|null
     */
    public function trafficHour($openId, $start, $end)
    {
        $params['access_token'] = $this->_access_token;
        $params['appId'] = $this->_AppId;
        $params['merchantOpenId'] = $this->_merchantOpenId;
        $params['openId'] = $openId;
        $params['start'] = $start;
        $params['end'] = $end;
        $ret = Client::post($this->_host . '/api/v2/multipleInstance/traffic/hour', http_build_query($params));
        if ($ret->ok()) {
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 获取所有实体天客流数据
     * @param $openId
     * @param $start
     * @param $end
     * @return mixed|null
     */
    public function trafficDay($openId, $start, $end)
    {
        $params['access_token'] = $this->_access_token;
        $params['appId'] = $this->_AppId;
        $params['merchantOpenId'] = $this->_merchantOpenId;
        $params['openId'] = $openId;
        $params['start'] = $start;
        $params['end'] = $end;
        $ret = Client::post($this->_host . '/api/v2/multipleInstance/traffic/day', http_build_query($params));
        if ($ret->ok()) {
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 获取所有实体当前时间客流和滞留数据
     */
    public function strand()
    {
        $params['access_token'] = $this->_access_token;
        $params['appId'] = $this->_AppId;
        $params['merchantOpenId'] = $this->_merchantOpenId;
        $ret = Client::post($this->_host . '/api/v2/instance/strand', http_build_query($params));
        if ($ret->ok()) {
            $data = $ret->toJson();
            return $data;
        }
    }

}
