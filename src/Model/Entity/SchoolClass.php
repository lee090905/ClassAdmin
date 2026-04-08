<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
class SchoolClass extends Entity
{
    protected array $_accessible = [
        'name' => true,
        'teacher' => true,
        'quantity_student' => true,
        'created' => true,
        'modified' => true,
    ];
}
