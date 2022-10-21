<?php


namespace App\Http\Controllers\Admin;


class PanelController
{
    public function index()
    {
        $user = request()->user();
        return view('admin/index', [
            'title' => 'Admin Panel'
        ]);
    }
}
