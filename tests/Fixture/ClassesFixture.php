<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClassesFixture
 */
class ClassesFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'teacher' => 1,
                'quantity_student' => 1,
                'created' => '2026-04-06 06:33:00',
                'modified' => '2026-04-06 06:33:00',
            ],
        ];
        parent::init();
    }
}
