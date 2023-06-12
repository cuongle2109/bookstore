<?php

namespace App\Actions\User;

use App\Mail\ChangeAddressMail;
use App\Mail\ChangeEmailMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/**
 * Class CreateVendorAction
 * @package App\Actions\Vendor
 */
class UpdateUserAction
{
    public function __invoke(array $data, $user)
    {
        $routeName = Route::currentRouteName();
        if($routeName === 'mypage.profile.update' || $routeName === 'mypage.change-email.update' || $routeName === 'mypage.change-address.update' || $routeName === 'mypage.change-password.update'){
            $user = User::find(Auth::user()->id);
        }

        $user->update($data);

        switch ($routeName){
            case 'mypage.profile.update':
                Session::flush();
                Auth::logout();
                return redirect()->route('login');
                break;
            case 'mypage.change-email.update':
                Mail::to(Auth::user()->email)->send(new ChangeEmailMail());
                Session::flush();
                Auth::logout();
                return redirect()->route('login');
                break;
            case 'mypage.change-address.update':
                Mail::to(Auth::user()->email)->send(new ChangeAddressMail());
                Session::flush();
                Auth::logout();
                return redirect()->route('login');
                break;
            case 'mypage.change-password.update':
                Session::flush();
                Auth::logout();
                return redirect()->route('login');
                break;

        }
        return redirect()->route('admin.user.index')
            ->with('success','User updated successfully');
    }
}
