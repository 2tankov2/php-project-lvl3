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

class AppTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndex()
    {
        $this->call('GET', '/');
        $this->assertResponseOk();
    }

    public function testSaveInDB()
    {
        $domain = factory('App\Domain')->make(['name' => 'https://mail.ru/',]);

        $this->assertEquals(0, Domain::count());

        $domain->save();

        $this->seeInDatabase('domains', [
            'name' => 'https://mail.ru/'
        ]);

        $this->assertEquals(1, Domain::count());
    }

    public function testShowAll()
    {
        factory(Domain::class, 20)->create();
        $this->get(route('domains'));
        $this->assertResponseStatus(200);
    }

    public function testShow()
    {
        $domains = factory('App\Domain', 14)->create();
        $id = $domains->first()->id;
        $this->get(route('domain', ['id' => $id]))
            ->assertResponseStatus(200);
    }

    public function testStore()
    {
        $url = 'https://mail.ru/';
        $path = 'tests/fixtures/index.html';
        $body = file_get_contents($path);
        $contentLength = strlen($body);
        $mock = new MockHandler([
            new Response(200, ['Content-Length' => $contentLength], $body)
        ]);
        $handlerStack = HandlerStack::create($mock);
        $this->app->instance(Client::class, new Client(['handler' => $handlerStack]));
        $this->post(route('domains'), ['name' => $url]);

        $this->seeInDatabase('domains', [
                'name' => $url,
                'content_length' => $contentLength,
                'status_code' => 200,
                'body' => $body
        ]);
        $this->assertResponseStatus(302);
    }
}
