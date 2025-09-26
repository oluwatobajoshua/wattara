<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BankDetailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BankDetailsTable Test Case
 */
class BankDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BankDetailsTable
     */
    protected $BankDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.BankDetails',
        'app.Accounts',
        'app.Banks',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BankDetails') ? [] : ['className' => BankDetailsTable::class];
        $this->BankDetails = $this->getTableLocator()->get('BankDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->BankDetails);

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
