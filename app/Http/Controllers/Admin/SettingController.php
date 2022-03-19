<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{

    public function cover()
    {
        return view('admin.settings.cover');
    }

    public function change_cover(Request $request)
    {

        if ($request->cover4) {
            $image_path = public_path("home/images/cover4.jpg");
            // dd($image_path);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $request->cover4->move(public_path('/home/images'), 'cover4.jpg');
        }
        if ($request->cover3) {
            $image_path = public_path("home/images/cover3.jpg");
            // dd($image_path);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $request->cover3->move(public_path('/home/images'), 'cover3.jpg');
        }
        if ($request->cover2) {
            $image_path = public_path("home/images/cover2.jpg");
            // dd($image_path);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $request->cover2->move(public_path('/home/images'), 'cover2.jpg');
        }
        if ($request->cover1) {
            $image_path = public_path("home/images/cover1.jpg");
            // dd($image_path);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $request->cover1->move(public_path('/home/images'), 'cover1.jpg');
        }
        return redirect()->back();
    }


    public function reports()
    {
        $reports=Report::where('status','like','%'.request('filter').'%')->paginate(5);
        return view('admin.reports.index', compact('reports'));
    }

    public function reportCheck($id)
    {
        $reports=Report::find($id);
        if ($reports) {
            $reports->status="done";
            $reports->save();
        }
        return redirect()->back();
    }
}
