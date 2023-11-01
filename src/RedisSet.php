<?php
namespace dasher\redis;

class RedisSet extends RedisBase {

    public function sAddArray($arr): int
    {
        $i = 0;
        foreach ($arr as $item){
            $res = $this->sAdd($item);
            if($res) $i++;
        }
        return $i;
    }

    public function sAdd(...$value){
        return $this->redis->sAdd($this->key, ...$value);
    }

    public function sRem(...$value){
        return $this->redis->sRem($this->key, ...$value);
    }

    public function sRemArray($arr): int
    {
        $i = 0;
        foreach ($arr as $item){
            $res = $this->sRem($item);
            if($res) $i++;
        }
        return $i;
    }

    public function sRemove(...$value){
        return $this->redis->sRemove($this->key, ...$value);
    }

    public function sMove($dstKey, $member){
        return $this->redis->sRem($this->key, $dstKey, $member);
    }

    public function sIsMember($value){
        return $this->redis->sIsMember($this->key, $value);
    }

    public function sContains($value){
        return $this->redis->sContains($this->key, $value);
    }

    public function sCard(){
        return $this->redis->sCard($this->key);
    }

    public function sPop($count=1){
        return $this->redis->sPop($this->key, $count);
    }

    public function sRandMember($count=1){
        return $this->redis->sRandMember($this->key, $count);
    }

    public function sInter(...$otherKeys){
        return $this->redis->sPop($this->key, $otherKeys);
    }

    public function sInterStore($key1, ...$otherKeys){
        return $this->redis->sInterStore($this->key, $key1, ...$otherKeys);
    }

    public function sUnion(...$otherKeys){
        return $this->redis->sUnion($this->key, $otherKeys);
    }

    public function sUnionStore($key1, ...$otherKeys){
        return $this->redis->sUnionStore($this->key, $key1, ...$otherKeys);
    }

    public function sDiff(...$otherKeys){
        return $this->redis->sDiff($this->key, $otherKeys);
    }

    public function sDiffStore($key1, ...$otherKeys){
        return $this->redis->sDiffStore($this->key,  $key1, ...$otherKeys);
    }

    public function sMembers(){
        return $this->redis->sMembers($this->key);
    }

    public function sGetMembers(){
        return $this->redis->sGetMembers($this->key);
    }

    public function sScan($key, &$iterator, $pattern = null, $count = 0){
        return $this->redis->sDiffStore($this->key, $iterator, $pattern, $count);
    }
}