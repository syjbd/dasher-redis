<?php
namespace dasher\redis;

class RedisZSet extends RedisBase
{

    public function zAdd($score1, $value1, $score2 = null, $value2 = null, $scoreN = null, $valueN = null){
        return $this->redis->zAdd($this->key, (int)$score1, $value1, (int)$score2, $value2, (int)$scoreN, $valueN);
    }

    public function zRange($start, $end, $withScores = null){
        return $this->redis->zRange($this->key, $start, $end, $withScores);
    }

    public function zRem($member1, ...$otherMembers)
    {
        return $this->redis->zRem($this->key, $member1, ...$otherMembers);
    }

    public function zRevRange($start, $end, $withScores = null)
    {
        return $this->redis->zRevRange($this->key, $start, $end, $withScores);
    }

    public function zRangeByScore($start, $end, array $options = array()): array
    {
        return $this->redis->zRangeByScore($this->key, $start, $end, $options);
    }

    public function zRevRangeByScore($start, $end, array $options = array())
    {
        return $this->redis->zRevRangeByScore($this->key, $start, $end, $options);
    }

    public function zRangeByLex($min, $max, $offset = null, $limit = null)
    {
        return $this->redis->zRangeByLex($this->key, $min, $max, $offset, $limit);
    }

    public function zRevRangeByLex($min, $max, $offset = null, $limit = null)
    {
        return $this->redis->zRevRangeByLex($this->key, $min, $max, $offset, $limit);
    }

    public function zCount($start, $end)
    {
        return $this->redis->zCount($this->key, $start, $end);
    }

    public function zRemRangeByScore($start, $end)
    {
        return $this->redis->zRemRangeByScore($this->key, $start, $end);
    }

    public function zDeleteRangeByScore($start, $end)
    {
        return $this->redis->zRemRangeByScore($this->key, $start, $end);
    }

    public function zRemRangeByRank($start, $end)
    {
        return $this->redis->zRemRangeByRank($this->key, $start, $end);
    }

    public function zDeleteRangeByRank($start, $end)
    {
        return $this->redis->zDeleteRangeByRank($this->key, $start, $end);
    }

    public function zCard()
    {
        return $this->redis->zCard($this->key);
    }

    public function zSize()
    {
        return $this->redis->zSize($this->key);
    }

    public function zScore($member)
    {
        return $this->redis->zScore($this->key, $member);
    }

    public function zRank($member)
    {
        return $this->redis->zRank($this->key, $member);
    }

    public function zRevRank($member)
    {
        return $this->redis->zRevRank($this->key, $member);
    }

    public function zIncrBy($value, $member)
    {
        return $this->redis->zIncrBy($this->key, $value, $member);
    }

    public function zUnionStore($output, $zSetKeys, array $weights = null, $aggregateFunction = 'SUM')
    {
        return $this->redis->zUnionStore($output, $zSetKeys, $weights, $aggregateFunction);
    }

    public function zUnion($Output, $ZSetKeys, array $Weights = null, $aggregateFunction = 'SUM')
    {
        return $this->redis->zUnion($Output, $ZSetKeys, $Weights, $aggregateFunction);
    }

    public function zInterStore($output, $zSetKeys, array $weights = null, $aggregateFunction = 'SUM')
    {
        return $this->redis->zInterStore($output, $zSetKeys, $weights, $aggregateFunction);
    }


    public function zInter($Output, $ZSetKeys, array $Weights = null, $aggregateFunction = 'SUM')
    {
        return $this->redis->zInter($Output, $ZSetKeys, $Weights, $aggregateFunction);
    }

    public function zScan(&$iterator, $pattern = null, $count = 0)
    {
        return $this->redis->zScan($iterator, $pattern, $count);
    }

    public function bzPopMax($key1, $key2, $timeout)
    {
        return $this->redis->bzPopMax($key1, $key2, $timeout);
    }


    public function bzPopMin($key1, $key2, $timeout)
    {
        return $this->redis->bzPopMin($key1, $key2, $timeout);
    }

    public function zPopMax($key, $count = 1)
    {
        return $this->redis->zPopMax($this->key, $count);
    }

    public function zPopMin($count = 1)
    {
        return $this->redis->zPopMin($this->key, $count);
    }
}