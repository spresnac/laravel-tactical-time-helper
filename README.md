# laravel-tactical-time-helper

## About 
This helper package provides you some aiding when it comes to deal with tactical times on your input and output side. I do need this package in my Red-Cross related projects, so they are already battle-tested 🫡. 

It is not feature-complete so you are welcome to add your code 🙏

---

## Install 
First things first, you install this package with
```shell
composer install spresnac/laravel-tactical-time-helper --no-dev
```

---

## Usage
This package contains 2 parts to help you with your times.

### Form request rules
The form request rules provide some guiding about handling incoming form fields where tactical data should be provided by the user.
Therefor you can use the `TacticalTime` class in the `Rules` directory.
An example; in your requests class, you can write it like so:
```php
class CreateEntryRequest extends FormRequest
{
    //...

    public function rules(): array
    {
        return [
            'situation' => 'required|string',
            'tactime' => [
                new \spresnac\tacticaltimehelper\Rules\TacticalTime(),
            ],
            //...
        ];
    }
}
```
By default, the `TacticalTime` rule wants to have the input like `082145may2024` while it ignores the cases. It ignores the case to prevent beeing to strict (there are humans on the other side and mostly, this humans do not have much time when it comes to tactical time inputs) and on the other side the case is not relevant when it comes to converting the input to the real time you store in your database (or whereever); in short: Carbon can handle it, no matter the case 😉

---

### Repository Helper

The `TacticalTimeRepository` provides you 2 static helper functions

#### `public static function toTacticalTime(Carbon $time): string`
This function takes a `Carbon` input and converts it to the corresponding tactical time. Using Carbon is pretty neat in laravel projects because most of your date-related things are (or should be) in Carbon (like `created_at` or `updated_at` or in my case a `situation_at`).  
In short: As long as your input is `Carbon` you are good to go.

#### public static function fromTacticalTime(string $tactime): Carbon
This function takes a string and converts it to it's corresponding `Carbon` object (so you can easily store it into databases or whereever you persist your data).  
The input MUST be like `082145may2024`, so 2 digits for the day, 2 digits for the hour, 2 digits for the minutes, the month as 3-letter-short and the year with 4 digits.  
The result is a `Carbon` object to work further with.

---

## Test
You can test this package by installing it with all dependencies
```shell
composer install spresnac/laravel-tactical-time-helper
```
and then run
```shell
vendor\bin\phpunit
```
(depending on your OS you have to add .\ in front of the line)