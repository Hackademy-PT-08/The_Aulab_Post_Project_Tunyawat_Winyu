<?php

namespace App\Http\Controllers;

use App\Models\ProfileEdit;
use Illuminate\Http\Request;

class ProfileEditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.edit-info');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfileEdit $profileEdit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfileEdit $profileEdit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfileEdit $profileEdit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfileEdit $profileEdit)
    {
        //
    }
}
