<?php

namespace App\Actions\User;

use App\Models\User;

/**
 * Class CreateVendorAction
 * @package App\Actions\Vendor
 */
class CreateUserAction
{
    public function __invoke(array $data)
    {
        User::create($data);

        return redirect()->route('admin.user.index')
            ->with('success','User created successfully.');
    }
}
