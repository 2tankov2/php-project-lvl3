<?php

namespace Tests;

use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * Test for the main page
     *
     * @return void
     */
    public function testHomePage()
    {
        $this->call('GET', '/');
        $this->assertResponseOk();
    }
}
