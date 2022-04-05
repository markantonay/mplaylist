<?php

namespace Tests;

use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;


abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->faker = Faker::create();
        Artisan::call('migrate');

      //  $this->withoutExceptionHandling();
    }


    /**
     * Rolls back migrations
     */
    public function tearDown(): void
    {
        Artisan::call('migrate:rollback');

        parent::tearDown();
    }
}
