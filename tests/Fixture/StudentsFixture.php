<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StudentsFixture
 */
class StudentsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'username' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'age' => 1,
                'class' => 1,
                'addrest' => 'Lorem ipsum dolor sit amet',
                'phone_number' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'created' => '2026-04-06 06:36:42',
                'modified' => '2026-04-06 06:36:42',
            ],
        ];
        parent::init();
    }
}
