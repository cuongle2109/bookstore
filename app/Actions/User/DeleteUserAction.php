<?php

namespace App\Actions\User;

use App\Models\User;

/**
 * Class CreateVendorAction
 * @package App\Actions\Vendor
 */
class DeleteUserAction
{
    public function __invoke($id)
    {
        User::destroy($id);

        return redirect()->route('admin.user.index')
            ->with('success','User deleted successfully');
    }
}
