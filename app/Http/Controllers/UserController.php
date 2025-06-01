<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class UserController extends Controller
{
    public function index()
    {
        $reports = Report::where('user_id', auth()->id())->latest()->paginate(10);
        return view('user.dashboard', compact('reports'));
    }
}
