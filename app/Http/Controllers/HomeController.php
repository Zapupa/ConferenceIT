<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class HomeController extends Controller
{
    public function index() {
        $reports = Report::where("status","одобрено")->get();

        return view('welcome', compact('reports'));
    }
}
