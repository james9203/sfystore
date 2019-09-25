<?php
/**
 * Created by PhpStorm.
 * User: 11005884
 * Date: 2019/9/25
 * Time: 10:25
 */

namespace jamesluo\sfystore\Stat;

use jamesluo\sfystore\Base\Auth;
use jamesluo\sfystore\Http\Client;

class  StatInstance extends Auth
{

    public function __construct($AppId = null, $AppSecret = null, $merchantOpenId = null)
    {
        parent::__construct($AppId, $AppSecret, $merchantOpenId);
    }

    /**
     * 获取实体5分钟级别客流数据
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
        $ret = Client::post($this->_host . '/api/v2/instance/traffic/five', http_build_query($params));
        if ($ret->ok()) {
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 获取实体半小时级别客流数据
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
        $ret = Client::post($this->_host . '/api/v2/instance/traffic/half', http_build_query($params));
        if ($ret->ok()) {
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 获取实体小时级别客流数据
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
        $ret = Client::post($this->_host . '/api/v2/instance/traffic/half', http_build_query($params));
        if ($ret->ok()) {
            $data = $ret->toJson();
            return $data;
        }
    }

    /**
     * 获取实体天级别客流数据
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
        $ret = Client::post($this->_host . '/api/v2/instance/traffic/day', http_build_query($params));
        if ($ret->ok()) {
            $data = $ret->toJson();
            return $data;
        }
    }

}
