<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepositWithdrawalsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepositWithdrawalsTable Test Case
 */
class DepositWithdrawalsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DepositWithdrawalsTable
     */
    protected $DepositWithdrawals;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DepositWithdrawals',
        'app.Transactions',
        'app.Statuses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DepositWithdrawals') ? [] : ['className' => DepositWithdrawalsTable::class];
        $this->DepositWithdrawals = $this->getTableLocator()->get('DepositWithdrawals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DepositWithdrawals);

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
