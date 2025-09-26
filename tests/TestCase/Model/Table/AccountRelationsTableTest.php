<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountRelationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountRelationsTable Test Case
 */
class AccountRelationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AccountRelationsTable
     */
    protected $AccountRelations;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AccountRelations',
        'app.Accounts',
        'app.Profiles',
        'app.RelationCategories',
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
        $config = $this->getTableLocator()->exists('AccountRelations') ? [] : ['className' => AccountRelationsTable::class];
        $this->AccountRelations = $this->getTableLocator()->get('AccountRelations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AccountRelations);

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
