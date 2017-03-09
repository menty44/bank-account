<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransactionTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex() {
        $this->assertTrue(true);
    }

    public function testDeposit() {

        $response = $this->call('GET', 'account/manage/deposit');
        $this->assertRedirectedToAction('TransactionController@create', null, ['flash_message']);

        // Only check that you're redirecting to a specific URI
        $this->assertRedirectedTo('account/manage');

        // Just check that you don't get a 200 OK response.
        $this->assertFalse($response->isOk());

        // Make sure you've been redirected.
        $this->assertTrue($response->isRedirection());
    }

}
