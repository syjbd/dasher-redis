<?php
namespace dasher\redis;

class RedisCounter extends RedisBase
{

    /**
     * 执行自增计数并返回自增后的数值
     * @param int $incr 自增数量，默认为1
     * @return int
     */
    public function incr(int $incr=1)
    {
        return intval($this->redis->incrBy($this->key, $incr));
    }

    /**
     * 执行计自减技术并返回递减后的数值
     * @param int $decr
     * @return int
     */
    public function decr(int $decr=1)
    {
        return intval($this->redis->decrBy($this->key, $decr));
    }

    /**
     * 获取计数器的数值
     * @return int
     */
    public function get(){
        return intval($this->redis->get($this->key));
    }

    /**
     * 充值计数器
     * @param $key
     * @return int
     */
    public function reset(){
        return $this->redis->del($this->key);
    }

}