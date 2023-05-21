<?php
/*
 *   Jamshidbek Akhlidinov
 *   15 - 5 2023 15:55:16
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\model;

use akhlidinov\phpmvc\Model;

class ContactForm extends Model
{
    public string $email = '';
    public string $subject = '';
    public string $body = '';


    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'subject' => [self::RULE_REQUIRED],
            'body' => [self::RULE_REQUIRED],
        ];
    }

    public function save(){
        return true;
    }

}