<?php

namespace App\Actions\User;

use App\Models\User;

/**
 * Class CreateVendorAction
 * @package App\Actions\Vendor
 */
class ShowListUserAction
{
    public function __invoke()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }
}
