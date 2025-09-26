<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PublishersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PublishersTable Test Case
 */
class PublishersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PublishersTable
     */
    protected $Publishers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Publishers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Publishers') ? [] : ['className' => PublishersTable::class];
        $this->Publishers = $this->getTableLocator()->get('Publishers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Publishers);

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
