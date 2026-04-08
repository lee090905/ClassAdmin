<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SchoolClassesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SchoolClassesTable Test Case
 */
class SchoolClassesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SchoolClassesTable
     */
    protected $SchoolClasses;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.SchoolClasses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SchoolClasses') ? [] : ['className' => SchoolClassesTable::class];
        $this->SchoolClasses = $this->getTableLocator()->get('SchoolClasses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->SchoolClasses);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\SchoolClassesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
