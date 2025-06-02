<?php


namespace Tests\Unit;


use App\Helpers\Helper;
use Tests\TestCase;

class HelperTest extends TestCase
{
    public function testHelperEquality(): void
    {
        $this->assertEquals("ELEVATOR", Helper::getFullComplaintUnit("ELEVR"));
    }
}