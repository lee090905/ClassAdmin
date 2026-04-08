<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SchoolClassesFixture
 */
class SchoolClassesFixture extends TestFixture
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
                'created' => '2026-04-08 08:23:08',
                'modified' => '2026-04-08 08:23:08',
            ],
        ];
        parent::init();
    }
}
