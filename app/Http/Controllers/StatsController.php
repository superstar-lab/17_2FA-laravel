<?php


namespace App\Http\Controllers;


use App\CardCategory;

class StatsController extends Controller
{
    public function statsAPI()
    {
        $categories = CardCategory::with('cards.orders')->get();

        $data = [];

        foreach($categories as $order){
            $cards = $order->cards;
            $total = 0;
            $lastWeek = 0;
            $lastMonth = 0;
            foreach($cards as $card){
                $total += $card->orders()->where('status','completed')->count();
                $lastWeek += $card->orders()->orderBy('created_at', 'DESC')
                    ->whereDate('created_at', '>', \Carbon\Carbon::now()->subWeek())->where('status','completed')->count();
                $lastMonth += $card->orders()->orderBy('created_at', 'DESC')
                    ->whereDate('created_at', '>', \Carbon\Carbon::now()->subMonth())->where('status','completed')->count();
            }
            $data[] = ['name' => $order->name,'total' => $total, 'last-week' => $lastWeek, 'last-month' => $lastMonth];
        }

        return $data;
    }
}
