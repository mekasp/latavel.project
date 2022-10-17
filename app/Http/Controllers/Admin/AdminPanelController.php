<?php


namespace App\Http\Controllers\Admin;


class AdminPanelController
{
    public function index()
    {
        $user = request()->user();
        return view('admin/index', [
            'title' => 'Admin Panel'
        ]);
    }
}
