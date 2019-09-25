<?php
/**
 * Created by PhpStorm.
 * User: 11005884
 * Date: 2019/9/24
 * Time: 11:17
 */
namespace jamesluo\sfystore\Base;
use jamesluo\sfystore\Http\Client;
use Illuminate\Support\Facades\Cache;
class Auth {
    const AUTH_KEY = 'sfy_';

    protected  $_host = 'http://open.storeall.cn';
    protected  $_path = '/oauth/token';
    protected  $_AppId;
    protected  $_AppSecret;
    protected  $_merchantOpenId;
    protected  $_access_token;
    public function  __construct($AppId=null,$AppSecret=null,$merchantOpenId=null)
    {
        $this->_AppId = $AppId;
        $this->_AppSecret = $AppSecret;
        $this->_merchantOpenId = $merchantOpenId;
        $this->getToken();
    }

    public function getToken()
    {
        $params['grant_type'] = 'client_credentials';
        $params['client_id'] = $this->_AppId;
        $params['client_secret'] = $this->_AppSecret;
        $data = $this->getTokenCache();
        if (!$data) {
            $ret = Client::post($this->_host . $this->_path, http_build_query($params));
            if ($ret->ok()) {
                $data = $ret->toJson();
                $this->setTokenCache($data);
            }
        }
        $this->_access_token = $data['access_token'];
        return true;
    }

    public function setTokenCache($data)
    {
        $key = md5(self::AUTH_KEY . '_' . $this->_AppSecret . '_' . $this->_AppSecret . '_' . $this->_merchantOpenId);
        $rs = Cache::set($key, serialize($data), $data['expires_in']);
        return $rs;
    }

    public function getTokenCache()
    {
        $key = md5(self::AUTH_KEY . '_' . $this->_AppSecret . '_' . $this->_AppSecret . '_' . $this->_merchantOpenId);
        $data = Cache::get($key);
        $data = unserialize($data);
        return $data;
    }
}
