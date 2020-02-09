<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Domain;

class AppTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * The record creation test verifies
     * that such a record has appeared in the database.
     *
     * @return void
     */

    public function testHasRecordInDB()
    {
        $domain = factory('App\Domain')->make(['name' => 'https://mail.ru/',]);

        $this->assertEquals(0, Domain::count());

        $domain->save();

        $this->seeInDatabase('domains', [
            'name' => 'https://mail.ru/'
        ]);

        $this->assertEquals(1, Domain::count());
    }
}
