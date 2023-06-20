<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class CreateVendorAction
 * @package App\Actions\Vendor
 */
class CreateUserAction
{
    public function __invoke(array $data)
    {
        $password = $data['password'];
        $data['password'] = Hash::make($password);
        User::create($data);

        return redirect()->route('admin.user.index')
            ->with('success','User created successfully.');
    }
}
