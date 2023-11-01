<?php
namespace dasher\redis;

class RedisHash extends RedisBase {

    public function hDel($hashKey1, ...$otherHashKeys){
        return $this->redis->hDel($this->key, $hashKey1, ...$otherHashKeys);
    }

    public function hExists($hashKey){
        return $this->redis->hExists($this->key,$hashKey);
    }

    public function hGet($hashKey){
        return $this->redis->hGet($this->key,$hashKey);
    }

    public function hGetAll(){
        return $this->redis->hGetAll($this->key);
    }

    public function hIncrBy($hashKey, $value){
        return $this->redis->hIncrBy($this->key, $hashKey, $value);
    }

    public function hIncrByFloat($hashKey, $value){
        return $this->redis->hIncrByFloat($this->key,$hashKey, $value);
    }

    public function hKeys(){
        return $this->redis->hKeys($this->key);
    }

    public function hLen(){
        return $this->redis->hLen($this->key);
    }

    public function hMGet($hashKeys){
        return $this->redis->hMGet($this->key, $hashKeys);
    }

    public function hMSet($hashKeys){
        return $this->redis->hMSet($this->key, $hashKeys);
    }

    public function hSetNx($hashKey, $value){
        return $this->redis->hSetNx($this->key, $hashKey, $value);
    }

    public function hVals(){
        return $this->redis->hVals($this->key);
    }

    public function hScan( &$iterator, $pattern = null, $count = 0){
        return $this->redis->hScan($this->key, $iterator, $pattern = null, $count = 0);
    }

    public function del(){
        return $this->redis->del($this->key);
    }
}