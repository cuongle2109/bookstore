<?php

namespace App\Actions\User;

use App\Models\User;

/**
 * Class CreateVendorAction
 * @package App\Actions\Vendor
 */
class ShowDetailUserAction
{
    public function __invoke($id)
    {
        $user = User::find($id);

        return view('admin.user.edit', compact('user'));
    }
}
