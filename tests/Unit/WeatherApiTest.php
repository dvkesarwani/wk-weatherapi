<?php

namespace Tests\Unit;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class WeatherApiTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testApi()
    {
    
        $city = 'Utrecht,NL';
        $apiKey = '2d4d094ac0994b429a3703a313b7177c';
        $response = Http::get('https://api.weatherbit.io/v2.0/forecast/daily?', [
            'city' => $city,
            'days' => 11,
            'key' => $apiKey,
        ]); 
        if($this->assertEquals(200, $response->status())) {
            $this->assertTrue(true);
        }
    }
}

