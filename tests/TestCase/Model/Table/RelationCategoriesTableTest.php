<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RelationCategoriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RelationCategoriesTable Test Case
 */
class RelationCategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RelationCategoriesTable
     */
    protected $RelationCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.RelationCategories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RelationCategories') ? [] : ['className' => RelationCategoriesTable::class];
        $this->RelationCategories = $this->getTableLocator()->get('RelationCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->RelationCategories);

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
