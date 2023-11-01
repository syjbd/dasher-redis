<?php
/**
 * @desc Connect.php
 * @auhtor Wayne
 * @time 2023/11/1 14:53
 */
namespace dasher\redis\connect;



class RedisConnect{

    private static $connections = [];
    private static $servers = [];

    public static function addServer($conf)
    {
        foreach ($conf as $alias => $data){
            self::$servers[$alias]=$data;
        }
    }

    /**
     * @throws \RedisException
     */
    public static function getRedis($alias, $select = 0): \Redis
    {

        if(!array_key_exists($alias,self::$connections)){
            $redis = new \Redis();
            $redis->connect(self::$servers[$alias]['host'],self::$servers[$alias]['port']);
            self::$connections[$alias]=$redis;
            if(isset(self::$servers[$alias]['pwd']) && self::$servers[$alias]['pwd']!=""){
                self::$connections[$alias]->auth(self::$servers[$alias]['pwd']);
            }
        }
        self::$connections[$alias]->select($select);
        return self::$connections[$alias];
    }
}