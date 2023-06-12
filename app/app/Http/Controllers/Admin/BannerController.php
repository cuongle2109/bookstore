<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Banner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(11111);
        $banner = Banner::find(1);
        $bannerSub = Banner::find(2);
        return view('admin.banner.index', compact('banner', 'bannerSub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequests $request, Banner $banner)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd(123);
        $user = User::find($id);

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route("admin.banner.index")
                ->withErrors($validator);
        }

        $banner = Banner::find(1);
        $banner->update($request->only('photo'));

        return redirect()->route('admin.banner.index')
            ->with('success','Product created successfully.');
    }

    public function updateSub(UserUpdateRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'photoSub' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route("admin.banner.index")
                ->withErrors($validator);
        }

        $banner = Banner::find(2);
        $request['photo'] = $request['photoSub'];
        $banner->update($request->only('photo'));

        return redirect()->route('admin.banner.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('admin.user.index')
            ->with('success','User deleted successfully');
    }
}
