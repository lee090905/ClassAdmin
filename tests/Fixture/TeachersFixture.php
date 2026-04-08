<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TeachersFixture
 */
class TeachersFixture extends TestFixture
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
                'class' => 1,
                'addrest' => 'Lorem ipsum dolor sit amet',
                'phone_number' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'created' => '2026-04-06 06:36:57',
                'modified' => '2026-04-06 06:36:57',
            ],
        ];
        parent::init();
    }
}
