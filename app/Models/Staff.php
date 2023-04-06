<?php

namespace App\Models;

use App\Core\Model;
use App\Core\Rules\RuleEmail;
use App\Core\Rules\RuleMin;
use App\Core\Rules\RuleRequired;
use App\Core\Rules\RuleUniquie;

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
            'office_id' => [new RuleRequired()],
            'username' => [new RuleRequired(), new RuleUniquie("username")],
            'email' => [new RuleRequired(), new RuleUniquie("email"), new RuleEmail()],
            'password' => [new RuleRequired(), new RuleMin(8)],
            'firstname' => [new RuleRequired()],
            'middlename' => [new RuleRequired()],
            'lastname' => [new RuleRequired()]
        ];
    }
}