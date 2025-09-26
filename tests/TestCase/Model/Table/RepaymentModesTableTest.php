<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RepaymentModesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RepaymentModesTable Test Case
 */
class RepaymentModesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RepaymentModesTable
     */
    protected $RepaymentModes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.RepaymentModes',
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
        $config = $this->getTableLocator()->exists('RepaymentModes') ? [] : ['className' => RepaymentModesTable::class];
        $this->RepaymentModes = $this->getTableLocator()->get('RepaymentModes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->RepaymentModes);

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
