<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Frontend\User;

class Offers extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function createOffer()
    {
        //authenticated, not guest
        $tour = Tour::first();
        $offer = [
            
            'driver'=>3,
            'vehicle'=>1,
            'price'=>500

        ];
        $this->actingAs(User::find(2));

        $response = $this->json('POST', 'api/tours/offers/create/'.$tour->id, $offer);
        $response->assertStatus(201);
        $this->assertDataBaseHas('tour_offer', [
            'tour_id'=>$tour->id,
            'price'=>500,
            'vehicle'=>3,
            'driver'=>1
        ]);
    }
    public function acceptOffer()
    {
        $offer = 1;
        //must be the same user who created the tour
        $this->json('POST', '/api/tours/offer/accept'.$offer);
        $this->assertDataBaseHas('tour_offer', [
            'id'=>$offer,
            'is_accepted'=>1,
        ]);
    }
}
