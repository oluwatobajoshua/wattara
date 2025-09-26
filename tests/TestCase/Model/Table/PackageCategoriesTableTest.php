<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PackageCategoriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PackageCategoriesTable Test Case
 */
class PackageCategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PackageCategoriesTable
     */
    protected $PackageCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PackageCategories',
        'app.PackageTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PackageCategories') ? [] : ['className' => PackageCategoriesTable::class];
        $this->PackageCategories = $this->getTableLocator()->get('PackageCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PackageCategories);

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
