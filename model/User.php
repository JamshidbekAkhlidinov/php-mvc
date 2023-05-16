<?php
/*
 *   Jamshidbek Akhlidinov
 *   9 - 5 2023 0:17:4
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\model;


use app\core\UserModel;

class User extends UserModel
{
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';

    public int $status = 0;


    public function tableName(): string
    {
        return 'user';
    }

    public function attributes(): array
    {
        return [
            'firstname', 'lastname', 'email', 'password', 'status'
        ];
    }

    public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL,
                [self::RULE_UNIQUE, 'class' => self::class, 'attribute' => 'email']
            ],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 30]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }


    public function labels(): array
    {
        return [
            'firstname' => "Firstname",
            'lastname' => "Lastname",
            'email' => "Email",
            'password' => "Password",
            'status' => "Status",
            'confirmPassword' => 'Confirm password'
        ];
    }

    public function getDisplayName()
    {
        return $this->firstname . " " . $this->lastname;
    }
}