<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Newsletter\NewsletterFacade;

class subscribe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscribe:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Subscribe All Users to mailchimp';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $users = \App\Models\User::all();

        foreach ($users as $user){
            NewsletterFacade::subscribe($user->email);
            dump('subscribed '.$user->email);
        }
        return 0;
    }
}
