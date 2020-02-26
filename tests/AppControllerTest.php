<?php

namespace Tests;

use Tests\TestCase;

class AppControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->get('/');
        $this->assertResponseOk();
    }
}
