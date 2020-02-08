<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\TestCase;

class AppTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testApplication()
    {
        $response = $this->call('GET', '/');
        //$this->assertEquals(200, $response->status());
        //$this->assertEquals(
        //    $this->app->version(), $this->response->getContent()
        //);
        $this->assertResponseOk();
    }

    public function testHasRecordInDB()
    {
        $this->seeInDatabase('domains', [
            'name' => 'https://www.rambler.ru/'
        ]);
    }
}
