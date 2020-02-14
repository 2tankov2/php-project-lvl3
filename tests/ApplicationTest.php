<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Domain;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Client;
use Illuminate\Http\Resources\Json\Resource;

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
        factory(Domain::class, 20)->create();
        $this->get(route('listDomains'));
        $this->assertResponseStatus(200);
    }

    public function testShow()
    {
        $domains = factory('App\Domain', 14)->create();
        $id = $domains->first()->id;
        $this->get(route('showDomain', ['id' => $id]))
            ->assertResponseStatus(200);
    }

    public function testIndex()
    {
        $path = __DIR__ . '/fixtures/index.html';
        $body = file_get_contents($path);
        $contentLength = strlen($body);
        $mock = new MockHandler([
            new Response(200, ['Content-Length' => $contentLength], $body)
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);
        $this->app->instance(Client::class, $client);
        $this->post(route('storeDomain', ['name' => 'https://www.google.com/']));
        $this->seeInDatabase('domains', [
                'name' => 'https://www.google.com/',
                'content_length' => $contentLength,
                'status_code' => 200,
                'body' => $body
        ]);
        $this->assertResponseStatus(302);
    }
}
