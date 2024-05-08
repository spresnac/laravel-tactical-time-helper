<?php

namespace spresnac\tacticaltimehelper\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class TacticalTime implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $result = preg_match(
            pattern: '/^[0-9]{6}(jan|feb|mar|apr|may|jun|jul|aug|sep|oct|nov|dec){1}[0-9]{4}$/i',
            subject: $value
        );
         if ($result !== 1) {
            $fail('The :attribute is not a valid tactical time.');
        }
    }
}
