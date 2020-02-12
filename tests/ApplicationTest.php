<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Domain;
use GuzzleHttp\Client;

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

    public function testShowDomains()
    {
        $this->call('GET', '/domains');
        $this->assertResponseOk();
    }

    public function testShow()
    {
        $domains = factory('App\Domain', 14)->create();
        $id = $domains->first()->id;
        $this->get(route('showDomain', ['id' => $id]))
            ->assertResponseStatus(200);
    }

    public function testShowAll()
    {
        factory(Domain::class, 20)->create();
        $this->get(route('listDomains'));
        $this->assertResponseStatus(200);
    }

    public function testIndex()
    {
        $client = new Client();
    }
}
