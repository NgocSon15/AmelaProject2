<?php
namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\SocialAccount;
use App\User;

class SocialAccountService
{
    public static function createOrGetUser(ProviderUser $providerUser, $social)
    {
        $account = SocialAccount::whereProvider($social)->whereProviderUserId($providerUser->getId())->first();

        if($account)
        {
            return $account->user;
        } else {
            $username = $providerUser->getEmail() ?? $providerUser->getNickname();
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $social
            ]);
            $user = User::where('username', $username)->first();

            if(!$user)
            {
                $user = User::create([
                    'name' => $providerUser->getName(),
                    'username' => $username,
                    'password' => $providerUser->getName(),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
