<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaymentModesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PaymentModesTable Test Case
 */
class PaymentModesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PaymentModesTable
     */
    protected $PaymentModes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PaymentModes',
        'app.Orders',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PaymentModes') ? [] : ['className' => PaymentModesTable::class];
        $this->PaymentModes = $this->getTableLocator()->get('PaymentModes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PaymentModes);

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
