<?php
namespace dasher\redis;

class RedisLock extends RedisBase
{

    /**
     * 锁过期时间
     * @param int $expire
     * @return bool
     */
    public function lock(int $expire=5){
        $is_lock = $this->redis->setnx($this->key, time()+$expire);
        // 不能获取锁
        if(!$is_lock){
            // 判断锁是否过期
            $lock_time = $this->redis->get($this->key);
            // 锁已过期，删除锁，重新获取
            if(time()>$lock_time){
                $this->unlock();
                $is_lock = $this->redis->setnx($this->key, time()+$expire);
            }
        }
        return (bool)$is_lock;
    }

    /**
     * 释放锁
     * @return int
     */
    public function unlock(){
        return $this->redis->del($this->key);
    }
}