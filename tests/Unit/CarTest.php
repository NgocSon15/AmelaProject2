<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\API\CarControllerApi;


class CarTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $result = CarControllerApi::index();
        $expected = 5;
        dd($result);
        $actual = count($result);
        $this->assertEquals($expected, $actual);
    }
}
