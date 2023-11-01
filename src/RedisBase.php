<?php
namespace dasher\redis;

use dasher\redis\connect\RedisConnect;

class RedisBase {

    protected $key= 'default';
    protected $redis;
    protected $config = [
        'host' => '127.0.0.1',
        'port' => 6379,
        'auth' => '',
        'db' => 0,
        'prefix' => ''
    ];

    /**
     * @throws \RedisException
     */
    public function __construct($key="", $config=[])
    {
        if(!empty($config)) $this->config = $config;
        $this->key = $this->config['prefix'] . $key;
        $this->redis = $this->redisPool($this->config);
    }

    /**
     * @throws \RedisException
     */
    function redisPool(array $config=[]): \Redis
    {

        $conf = ['RA' => $config];
        RedisConnect::addServer($conf); //添加Redis配置
        return RedisConnect::getRedis('RA',$config['db']); //连接RA，使用默认0库

    }

    public function getRedis(): \Redis
    {
        return $this->redis;
    }

    public function exists(){
        return $this->redis->exists($this->key);
    }

    public function expire($ttl){
        return $this->redis->expire($this->key, $ttl);
    }

    public function keys(){
        return $this->redis->keys($this->key);
    }

    public function del(){
        return $this->redis->del($this->key);
    }
}