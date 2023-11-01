<?php
namespace dasher\redis;

class RedisGeo extends RedisBase {

    public function geoAdd($longitude,$latitude,$member){
        return $this->redis->geoadd($this->key,$longitude,$latitude,$member);
    }

    public function geoHash(...$member){
        return $this->redis->geohash($this->key,...$member);
    }

    public function geoPos(string $member)
    {
        return $this->redis->geopos($this->key, $member);
    }

    public function geoDist($member1, $member2, $unit = null)
    {
        return $this->redis->geodist($this->key, $member1, $member2, $unit);
    }

    public function geoRadius($longitude, $latitude, $radius, $unit, array $options = null)
    {
        return $this->redis->georadius($this->key, $longitude, $latitude, $radius,$unit, $options);
    }

    public function geoRadiusByMember($member, $radius, $units, array $options = null)
    {
        return $this->redis->georadiusbymember($this->key, $member, $radius, $units, $options);
    }
}