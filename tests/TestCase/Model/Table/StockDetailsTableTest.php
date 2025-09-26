<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StockDetailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StockDetailsTable Test Case
 */
class StockDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StockDetailsTable
     */
    protected $StockDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.StockDetails',
        'app.Stocks',
        'app.Books',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('StockDetails') ? [] : ['className' => StockDetailsTable::class];
        $this->StockDetails = $this->getTableLocator()->get('StockDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->StockDetails);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
