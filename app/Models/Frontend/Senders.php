<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Senders extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'country', 'postal_code','town','street','home','gender','nick_name','first_name','company','phone','email','order_id',
    ];
    public function scopeGetSenders()
    {
        // return 'ahmed';
        $users = $this->select('senders.*', \DB::raw('group_concat(DISTINCT order_id) as orders'))
        ->groupBy('email')->orderBy('id', 'DESC')->paginate(10);
        $mysenders = [];
        foreach ($users as $sender) {
            $orders = $sender['orders'];
            $orders =array_map('intval', explode(',', $orders));
            $sender['orders'] =  \App\Models\Frontend\Order::whereIn('id', $orders)->get();
            array_push($mysenders, $sender);
        }
        return ['users'=>$mysenders,'lastPage'=>$users->lastPage()];
        return [$users->pluck('email', 'orders')->toArray(),$users->lastPage()];
    }
    public function scopeGetSenderAddress($q){
        $sender = $q->first();
        // return $sender->street;
        return $sender->street.' '.
                $sender->home.' '.
                $sender->postal_code.' '.
                $sender->town.' '.
                $sender->country;
    }
}
