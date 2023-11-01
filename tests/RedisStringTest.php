<?php
/**
 * @desc RedisStringTest.php
 * @auhtor Wayne
 * @time 2023/11/1 15:07
 */
use PHPUnit\Framework\TestCase;

class RedisStringTest extends TestCase
{
    public function testRedisStringSetGet()
    {
        $redisString = new \dasher\redis\RedisString("alibaba");
        $redisString->set('anyVal');
        $this->assertTrue($redisString->get() == 'anyVal');
    }

    public function testRedisStringExists()
    {
        $redisString = new \dasher\redis\RedisString("redis_exists");
        $redisString->set('anyVal');
        $this->assertTrue($redisString->exists() == 1);
    }


    public function testRedisStringNoExists()
    {
        $redisString = new \dasher\redis\RedisString("redis_no_exists");
        $this->assertTrue($redisString->exists() == 0);
    }
}