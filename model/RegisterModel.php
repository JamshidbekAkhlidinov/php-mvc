<?php
/*
 *   Jamshidbek Akhlidinov
 *   9 - 5 2023 0:17:4
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\model;

use app\core\Model;

class RegisterModel extends Model
{
    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';


    public function rules(): array
    {
        return [
            'first_name' => [self::RULE_REQUIRED],
            'last_name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 30]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function register()
    {
        return true;
    }


}