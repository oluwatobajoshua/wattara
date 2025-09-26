<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BranchesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BranchesTable Test Case
 */
class BranchesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BranchesTable
     */
    protected $Branches;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Branches',
        'app.Companies',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Branches') ? [] : ['className' => BranchesTable::class];
        $this->Branches = $this->getTableLocator()->get('Branches', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Branches);

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
