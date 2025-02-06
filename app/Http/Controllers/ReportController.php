<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function create() {
        $sections = Section::all();

        return view('report.create', compact('sections'));
    }

    public function store(Request $request){
        $data= $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'theme' => ['required', 'string', 'max:255'],
            'path_img' => 'image|mimes:png,jpg,jpeg,gif|max:800',
        ]);

        $imageName = time() . '.png'; // f[f[f[f]]]

        $data['path_img']->move(public_path('images'), $imageName);


        Report::create([
            'fullname' => $data['fullname'],
            'theme' => $data['theme'],
            'status' => 'новая',
            'path_img' => $imageName,
            'section_id' => $request['section_id'],
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back();
    }
}
