<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\FrontEnd\Tour;

class Trips extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */
    public function newTrips()
    {
        $tour = Tour::first();
        $tour->tour_dates();
        $this->json('POST', '/api/tours/trips/create', [
            $tour->tour_dates(),
            $tour,
            'stops'=>[
                'name'=>'Stop Name',
                'desctiption'=>'stop description',
                'location'=>'1124,4324234',//lat,lng
                'freights_details'=>[
                    'type'=>'up',
                    'number_of_items'=>5,
                    'order_person_stop'=>[
                        'name'=>'ahmed',
                        
                    ]
                ]
            ],
        ]);
        $this->assertStatus(201);
        $this->assertDataBaseHas('trips', [
            'tour_id'=>$tour->id,
        ]);
    }
    public function activateTrip()
    {
        $trip = Trip::first();
        $this->json('POST', 'api/tours/trips/activate/'.$trip->id);
        $this->assertDataBaseHas('is_done_days', [
            'trip_id'=>$trip->id,
            'is_done'=>1,
        ]);
    }
    public function getTripInfo()
    {
        $response = $this->json('GET', '/api/tours/trips/2');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'trip' ,'stop_descriptions' ,'tour_id' ,'source' , 'destination','tour'
        ]);
    }
}
