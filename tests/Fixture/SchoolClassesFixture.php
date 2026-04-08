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
                'created' => '2026-04-06 06:36:02',
                'modified' => '2026-04-06 06:36:02',
            ],
        ];
        parent::init();
    }
}
