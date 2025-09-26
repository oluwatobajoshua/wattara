<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BeneficiariesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BeneficiariesTable Test Case
 */
class BeneficiariesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BeneficiariesTable
     */
    protected $Beneficiaries;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Beneficiaries',
        'app.Accounts',
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
        $config = $this->getTableLocator()->exists('Beneficiaries') ? [] : ['className' => BeneficiariesTable::class];
        $this->Beneficiaries = $this->getTableLocator()->get('Beneficiaries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Beneficiaries);

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
