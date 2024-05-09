<?php

namespace tests\Rules;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use spresnac\tacticaltimehelper\Rules\TacticalTime;

class TacticalTimeTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }
    
    #[Test]
    public function it_passes_a_basic_test()
    {
        $rule = new TacticalTime();
        $fail_result = null;
        $rule->validate(
            attribute: 'tactical_time_field',
            value: '041237feb2024',
            fail: function($echo) use (&$fail_result) {$fail_result = $echo;}
        );
        $this->assertNull($fail_result, 'Result MUST be null to pass the test');
    }

    #[Test]
    public function it_does_not_care_for_cases()
    {
        $rule = new TacticalTime();
        $fail_result = null;
        $rule->validate(
            attribute: 'tactical_time_field',
            value: '041237FEB2024',
            fail: function($echo) use (&$fail_result) {$fail_result = $echo;}
        );
        $this->assertNull($fail_result, 'Result MUST be null to pass the test');
    }

    #[Test]
    public function it_fails_on_false_inputs()
    {
        $rule = new TacticalTime();
        $fail_result = null;
        $rule->validate(
            attribute: 'tactical_time_field',
            value: '04.02.2024 12:37',
            fail: function($echo) use (&$fail_result) {$fail_result = $echo;}
        );
        $this->assertNotNull($fail_result, 'Result MUST NOT be null to pass the test');
    }

    #[Test]
    public function it_fails_on_short_year_input()
    {
        $rule = new TacticalTime();
        $fail_result = null;
        $rule->validate(
            attribute: 'tactical_time_field',
            value: '041237feb24',
            fail: function($echo) use (&$fail_result) {$fail_result = $echo;}
        );
        $this->assertNotNull($fail_result, 'Result MUST NOT be null to pass the test');
    }

    #[Test]
    public function it_fails_on_empty_inputs()
    {
        $rule = new TacticalTime();
        $fail_result = null;
        $rule->validate(
            attribute: 'tactical_time_field',
            value: '',
            fail: function($echo) use (&$fail_result) {$fail_result = $echo;}
        );
        $this->assertNotNull($fail_result, 'Result MUST NOT be null to pass the test');
    }

    #[Test]
    public function it_fails_on_null_inputs()
    {
        $rule = new TacticalTime();
        $fail_result = null;
        $rule->validate(
            attribute: 'tactical_time_field',
            value: null,
            fail: function($echo) use (&$fail_result) {$fail_result = $echo;}
        );
        $this->assertNotNull($fail_result, 'Result MUST NOT be null to pass the test');
    }
}
