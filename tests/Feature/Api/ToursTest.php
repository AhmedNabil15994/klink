<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Frontend\User;
use App\Models\Frontend\Tour;

class ToursTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    ///////// Totable tour
    public function createTour()
    {
        $tour = [
            'notes'=>'tour notes',

        ];
        
        $response = $this->json('POST', 'api/tours/create');
        $response->assertStatus(201);
        $this->assertDataBaseHas('tours', $tour);
       
        // when the user is logged in we assert profile_id_company not to be null
        $this->actingAs(User::first());
        $response = $this->json('POST', 'api/tours/create');
        $response->assertStatus(201);
        $this->assertDataBaseHas('tours', [
            'notes'=>'tour notes',
            'profile_id_company'=>$user->id,
        ]);
    }
    public function calculatePrice()
    {
        // $this->assert()
    }
    public function tourNumber()
    {
        $tour = [
            'id'=>1,
            'company_profile_id'=>5,
            
        ];
        $tour['trips'] = [
            [
                'stops'=>[
                    [
                        'postal_code'=>'250'
                    ]
                ]
            ]
                    ];
        $response = $this->json('GET', '/api/tours/info/1');
        $response->assertJSON([
            'tour_number'=>'1-FA',
            
        ]);
    }
    public function deleteTour()
    {
        $tour = Tour::first();
        $response = $this->json('DELETE', '/api/tours/delete/'.$tour->id);
        $response->assertStatus(204);
        $this->assertDataBaseMissing('tours', [
            'id'=>$tour->id,
            
        ]);
        $this->assertDataBaseMissing('tours', [
            'id'=>$tour->id,
            
        ]);
    }
    public function edit()
    {
        $tour = Tour::first();
        $response = $this->json('POST', '/api/tours/update'.$tour->id, [
            'notes'=>'new notes',
            
        ]);
        $response->assertStatus(203);
        $this->assertDataBaseHas('tours', [
            'id'=>$tour->id,
            'notes'=>'new notes',
            
        ]);
    }
    public function UpdateDates()
    {
        //admin, (customer, guest owner)
        $tour = $tour->first();
        $id = $tour->dates->id;
        $response = $this->json('POST', '/api/tours/dates/updates'.$tour->id, [
            'tour_start_date'=>'12-12-2012',
            'tour_finish_date'=>'13-12-2012',
            'tour_start_time' =>'13-12-2012',
            'tour_finish_time'=>'15-12-2012',
        ]);
        $response->assertStatus(203);
        $this->assertDataBaseHas('tour_dates', [
            'id'=>$id,
            'tour_start_date'=>'12-12-2012',
            'tour_finish_date'=>'13-12-2012',
            'tour_start_time' =>'13-12-2012',
            'tour_finish_time'=>'15-12-2012',
        ]);
    }
    public function setFreeDays()
    {
        $tour = Tour::first();
        $freeDays = [
            
            [
                'date'=>'12-12-2012',
                'description'=>'Berlin freedom day',
            ],
            [
                'date'=>'13-12-2012',
                'description'=>'Berlin freedom day 2',
            ]
        ];
        $response = $this->json('POST', '/api/tours/freedom_dates/'.$tour->id, $freeDays);
        $response->assertStatus(201);
        $this->assertDataBaseHas('free_days', [
            'tour_id'=> $tour->id,
            'date'=>'12-12-2012',
            'description'=>'Berlin freedom day',
        ]);
        $this->assertDataBaseHas('free_days', [
            'tour_id'=> $tour->id,
            'date'=>'13-12-2012',
            'description'=>'Berlin freedom day 2',
        ]);
    }
    public function is_done_days_create()
    {
        $tour = Tour::first();
        $response = $this->json('POST', 'api/tours/trips/finish');
    }
    public function tour_calculate_type_create()
    {
        $tour = Tour::first();
        $response = $this->json('POST', 'api/tours/type/calculateionreset/'.$tour->id, [
            'min_tour'=>50,
            'max_tour'=>50,
            
        ]);
        $response->assertStatus(202);
        $this->assertDataBaseHas('tour_calculate_type', [
            'min_tour'=>50,
            'max_tour'=>50,
            'tour_id'=>$tour->id,
        ]);
    }
}
