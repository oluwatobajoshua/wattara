<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NextOfKinsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NextOfKinsTable Test Case
 */
class NextOfKinsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NextOfKinsTable
     */
    protected $NextOfKins;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.NextOfKins',
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
        $config = $this->getTableLocator()->exists('NextOfKins') ? [] : ['className' => NextOfKinsTable::class];
        $this->NextOfKins = $this->getTableLocator()->get('NextOfKins', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->NextOfKins);

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
