<?php
namespace dasher\redis;

class RedisString extends RedisBase
{
    public function set($value){
        return $this->redis->set($this->key, $value);
    }

    public function setex($ttl, $value){
        return $this->redis->setex($this->key,$ttl, $value);
    }

    public function setnx($value){
        return $this->redis->setnx($this->key, $value);
    }

    public function get(){
        return $this->redis->get($this->key);
    }

    public function del(){
        return $this->redis->del($this->key);
    }

    public function dump(){
        return $this->redis->dump($this->key);
    }

    public function exists(){
        return $this->redis->exists($this->key);
    }

    public function expire($ttl){
        return $this->redis->expire($this->key, $ttl);
    }

    public function expireAt($timestamp){
        return $this->redis->expireAt($this->key, $timestamp);
    }

    public function pExpire($ttl){
        return $this->redis->pExpire($this->key, $ttl);
    }

    public function pExpireAt($timestamp){
        return $this->redis->pExpireAt($this->key, $timestamp);
    }


    public function move($db){
        return $this->redis->move($this->key, $db);
    }

    public function persist(){
        return $this->redis->persist($this->key);
    }

    public function pttl(){
        return $this->redis->pttl($this->key);
    }

    public function ttl(){
        return $this->redis->ttl($this->key);
    }

    public function randomKey(){
        return $this->redis->randomKey();
    }

    public function renam($dstKey){
        return $this->redis->rename($this->key, $dstKey);
    }

    public function renameNx($dstKey){
        return $this->redis->renameNx($this->key, $dstKey);
    }

    public function scan($pattern = null, $count = 0){
        return $this->redis->scan($this->key, $pattern, $count);
    }

    public function type(){
        return $this->redis->type($this->key);
    }
}