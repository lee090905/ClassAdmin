<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Student extends Entity
{
    protected array $_accessible = [
        'username' => true,
        'password' => true,
        'age' => true,
        'school_class_id' => true,
        'address' => true,
        'phone_number' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
    ];

    protected array $_hidden = [
        'password',
    ];
}
