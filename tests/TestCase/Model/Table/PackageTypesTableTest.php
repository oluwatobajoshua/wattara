<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PackageTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PackageTypesTable Test Case
 */
class PackageTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PackageTypesTable
     */
    protected $PackageTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PackageTypes',
        'app.PackageCategories',
        'app.Packages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PackageTypes') ? [] : ['className' => PackageTypesTable::class];
        $this->PackageTypes = $this->getTableLocator()->get('PackageTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PackageTypes);

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
