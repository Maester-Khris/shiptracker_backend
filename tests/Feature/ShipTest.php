<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShipTest extends TestCase
{

    public function test_shipping_creation()
    {
        $this->seed();
    }
}
