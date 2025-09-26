<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookTypesTable Test Case
 */
class BookTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BookTypesTable
     */
    protected $BookTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.BookTypes',
        'app.Books',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BookTypes') ? [] : ['className' => BookTypesTable::class];
        $this->BookTypes = $this->getTableLocator()->get('BookTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->BookTypes);

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
