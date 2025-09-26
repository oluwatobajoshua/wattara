<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountsTable Test Case
 */
class AccountsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AccountsTable
     */
    protected $Accounts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Accounts',
        'app.Users',
        'app.CreditOfficers',
        'app.Branches',
        'app.Profiles',
        'app.AccountTypes',
        'app.AccountRelations',
        'app.BankDetails',
        'app.Packages',
        'app.Transactions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Accounts') ? [] : ['className' => AccountsTable::class];
        $this->Accounts = $this->getTableLocator()->get('Accounts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Accounts);

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
