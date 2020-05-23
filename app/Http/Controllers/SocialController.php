<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;
use App\User;
class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    
    /**
  * Redirect the user to the Google authentication page.
  *
  * @return \Illuminate\Http\Response
  */

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

     /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        // only allow people with @company.com to login
        if(explode("@", $user->email)[1] !== 'gmail.com'){
            return redirect()->to('/home');
        }

        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
            $newUser                  = new User;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->provider_id     = $user->id;
            $newUser->provider        = $user->avatar;
            $newUser->phone           = '';
            $newUser->address         = '';
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->to('/');
    }

    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user(); 
        $user = $this->createUser($getInfo); 
        auth()->login($user); 
        return redirect()->to('/');
    }

    function createUser($getInfo){
        $user = User::where('email', $getInfo->getEmail())->first();
        if (!$user) {
            $user = User::create([
                'name' => $getInfo->getName(),
                'email' => $getInfo->getEmail(),
                // 'avatar' => $getInfo->getAvatar(),
                'provider' => $getInfo->getAvatar(),
                'provider_id' => $getInfo->getId(),
                'remember_token' => $getInfo->token,
                'phone'  => '',
                'address' => '',
            ]);
        }
        return $user;
    }

}
    