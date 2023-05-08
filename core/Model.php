<?php
/*
 *   Jamshidbek Akhlidinov
 *   9 - 5 2023 0:18:1
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\core;

abstract class Model
{

    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';

    public array $errors = [];

    public function loadData(array $data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }

    }

    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($rule)) {
                    $ruleName = $rule[0];
                }

                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }

            }
        }

        return empty($this->errors);
    }

    abstract public function rules(): array;

    public function errorMessage(): array
    {
        return [
            self::RULE_REQUIRED => "This is required",
            self::RULE_EMAIL => "This is not email",
            self::RULE_MIN => "This is min element {min}",
            self::RULE_MAX => "This is max element {max}",
            self::RULE_MATCH => "This is not match",
        ];
    }

    public function addError($attribute, $rule)
    {
        $message = $this->errorMessage()[$rule] ?? '';
        $this->errors[$attribute][] = $message;
    }


}