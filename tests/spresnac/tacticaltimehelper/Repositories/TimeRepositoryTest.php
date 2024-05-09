<?php

namespace Tests\Repositories;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use spresnac\tacticaltimehelper\Repositories\TacticalTimeRepository;

class TimeRepositoryTest extends TestCase
{
    #[Test]
    public function it_passes_basic_to_tactical_time_test()
    {
        $carbontime = Carbon::createFromFormat(
            format: 'd.m.Y H:i',
            time: '06.04.2024 20:17'
        );
        $result = TacticalTimeRepository::toTacticalTime($carbontime);
        $this->assertEquals(
            expected: '062017apr2024',
            actual: $result,
            message: 'Generated tacTime is not correct'
        );
    }

    #[Test]
    public function it_passes_basic_from_tactical_time_test()
    {
        $tactime = '062017apr2024';
        $result = TacticalTimeRepository::fromTacticalTime($tactime);
        $this->assertInstanceOf(Carbon::class, $result);
        $this->assertEquals(06, $result->day);
        $this->assertEquals(04, $result->month);
        $this->assertEquals(2024, $result->year);
        $this->assertEquals(20, $result->hour);
        $this->assertEquals(17, $result->minute);
    }
}
