<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Propcom\RestAPI\Infrastructure\Resultset;

class InfrastructureResultsetTest extends TestCase
{

	const COUNT = 1;
	const TOTAL = 2;
	const OFFSET = 3;
	const LIMIT = 4;

	protected static $resultset;

	public static function setUpBeforeClass()
	{
		static::$resultset = new Resultset(static::COUNT, static::TOTAL, static::OFFSET, static::LIMIT);
	}

	public function testCanGetCount()
	{
		$this->assertEquals(static::COUNT, static::$resultset->getCount(), 'Wrong count retrieved');
	}

	public function testCanGetTotal()
	{
		$this->assertEquals(static::TOTAL, static::$resultset->getTotal(), 'Wrong total retrieved');
	}

	public function testCanGetOffset()
	{
		$this->assertEquals(static::OFFSET, static::$resultset->getOffset(), 'Wrong offset retrieved');
	}

	public function testCanGetLimit()
	{
		$this->assertEquals(static::LIMIT, static::$resultset->getLimit(), 'Wrong limit retrieved');
	}
}
