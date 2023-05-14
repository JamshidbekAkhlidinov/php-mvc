<?php
/*
 *   Jamshidbek Akhlidinov
 *   13 - 5 2023 10:10:44
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\model;

use app\core\Application;
use app\core\Model;

class LoginForm extends Model
{
    public string $password = '';
    public string $email = '';

    public function rules(): array
    {
        return [
            'password' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
        ];
    }

    public function labels(): array
    {
        return [
            'password' => "Your password",
            'email' => "Your email",
        ];
    }

    public function save()
    {
        $user = User::findOne(['email' => $this->email]);
        if (!$user) {
            $this->addError('email', 'User does not exist with this email');
            return false;
        }

        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is incorrect');
            return false;
        }
        return Application::$app->login($user);
    }


}