<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountBeneficiariesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountBeneficiariesTable Test Case
 */
class AccountBeneficiariesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AccountBeneficiariesTable
     */
    protected $AccountBeneficiaries;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AccountBeneficiaries',
        'app.Accounts',
        'app.Beneficiaries',
        'app.Relationships',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AccountBeneficiaries') ? [] : ['className' => AccountBeneficiariesTable::class];
        $this->AccountBeneficiaries = $this->getTableLocator()->get('AccountBeneficiaries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AccountBeneficiaries);

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
