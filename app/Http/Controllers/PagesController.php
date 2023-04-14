<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Entry;
use Carbon\Carbon;

class PagesController extends Controller
{
    /**
     * Home page that contains the form
     *
     * @param  Request  $request
     * @return void
     */
    public function home(Request $request)
    {
        return Inertia::render('Home');
    }

    /**
     * Form POST request
     *
     * @param  Request  $request
     * @return void
     */
    public function register(Request $request)
    {
        //We will usually create a custom Request, so can validate more precisely
        $data = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'accepts_rules' => [],
            'subscribed' => [],
        ]);

        /*
        * With a bit more of time, we must follow some good practices, for example create some services and repositories,
        * take adavantage of OOP with Providers and other classes, separte the bussiness logic, data logic, etc.
        */
        $user = User::firstOrCreate(
            ['email' => $data['email']],
            [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'phone' => $data['phone'],
                'accepts_rules' => $data['accepts_rules'],
                'subscribed' => $data['subscribed'],
            ]
        );

        $responseMessage = 'Registered for today. Thank you!';

        $entryForUser = Entry::where('user_id', $user->id)->orderByDesc('created_at')->get()[0] ?? null;

        if( $entryForUser ) {
            if( !Carbon::parse($entryForUser->created_at)->isToday()) {
                Entry::create(['user_id' => $user->id]);
            } else {
                $responseMessage = 'Already Entered today. Try again tomorrow!';
            }
        }
        else {
            Entry::create(['user_id' => $user->id]);
        }


        return Inertia::render('Confirmation', [
            'message' => $responseMessage
        ]);
    }

    /**
     * Confirmation Page
     *
     * @param  Request  $request
     * @return void
     */
    public function confirmation(Request $request)
    {
        return true;
    }
}
