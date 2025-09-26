<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlanDurationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlanDurationsTable Test Case
 */
class PlanDurationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PlanDurationsTable
     */
    protected $PlanDurations;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PlanDurations',
        'app.Packages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PlanDurations') ? [] : ['className' => PlanDurationsTable::class];
        $this->PlanDurations = $this->getTableLocator()->get('PlanDurations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PlanDurations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
