<?php

namespace App\Models;

use App\Core\Model;

class Staff extends Model {
    public int $id;
    public int $office_id;
    public string $username;
    public string $email;
    public string $password;
    public string $firstname;
    public string $middlename;
    public string $lastname;

    public function rules(): array
    {
        return [
            'office_id' => [self::RULE_REQUIRED],
            'username' => [self::RULE_REQUIRED, self::RULE_UNIQUE],
            'email' => [self::RULE_REQUIRED, self::RULE_UNIQUE, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => '8']],
            'firstname' => [self::RULE_REQUIRED],
            'middlename' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED]
        ];
    }
}