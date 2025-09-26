<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiscountsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiscountsTable Test Case
 */
class DiscountsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DiscountsTable
     */
    protected $Discounts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Discounts',
        'app.OrderDetails',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Discounts') ? [] : ['className' => DiscountsTable::class];
        $this->Discounts = $this->getTableLocator()->get('Discounts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Discounts);

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
