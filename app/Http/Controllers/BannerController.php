<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $applications = Application::paginate(10);
        $total = Banner::count();
        $banners = Banner::orderBy('sequence')->get();

        return view('admin.banner', compact('applications', 'banners', 'total'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'sequence' => 'nullable|integer',
            'application_id' => 'required|exists:applications,id',
        ]);

        $banner = Banner::where('application_id', $validatedData['application_id'])->first();

        if ($validatedData['sequence'] && $banner) {
            $banner->sequence = $validatedData['sequence'];
            $banner->save();
        } elseif ($banner) {
            $banner->delete();
        } elseif ($validatedData['sequence']) {
            Banner::create([
                'application_id' => $validatedData['application_id'],
                'sequence' => $validatedData['sequence'],
            ]);
        }

        return redirect()->route('banner.index');
    }
}
