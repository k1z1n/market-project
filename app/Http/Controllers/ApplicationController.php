<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Download;
use App\Models\Feedback;
use App\Models\VersionApplication;
use Carbon\Carbon;
use Coduo\PHPHumanizer\NumberHumanizer;
use Coduo\PHPHumanizer\String\BinarySuffix;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApplicationController extends Controller
{
    public function applicationView($id)
    {
        $application = Application::where('status', 'Активна')->findOrFail($id);
        $latestVersion = VersionApplication::where('application_id', $application->id)
            ->orderBy('created_at', 'desc')
            ->first();
        $application['size'] = NumberHumanizer::binarySuffix($latestVersion['size']);
        $application['download'] = $latestVersion['id'];
//        $application['created_at'] = Carbon::parse($application->created_at)->translatedFormat('d F Y');
        $other = Application::where('type_id', $application->type_id)
            ->whereNotIn('id', [$id])
            ->take(6)
            ->get();

        foreach ($other as $app) {
            $averageRating = Feedback::where('application_id', $app->id)->avg('stars');
            $app->average_rating = round($averageRating, 1);
        }


        $averageRating = Feedback::where('application_id', $application->id)->avg('stars');
        $averageRating = round($averageRating, 1);
        $starsCount = round($averageRating);
        $feedbackCount = Feedback::where('application_id', $application->id)->count();
        $feedbackCount = NumberHumanizer::metricSuffix($feedbackCount);
        $feedbacks = Feedback::where('application_id', $application->id)->take(2)->get();
        return view('application', compact('application', 'other', 'feedbacks', 'feedbackCount', 'averageRating', 'starsCount'));
    }

    public function download($id)
    {
        $application = Application::findOrFail($id);

        $latestVersion = VersionApplication::where('application_id', $application->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$latestVersion) {
            return redirect()->back()->with('error', 'Файлы приложения не найдены');
        }
        $filePath = public_path('storage/version/' . $latestVersion->file_path);
        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'Файл приложения не найден.');
        }

        if (auth()->id()) {
            $application->download_count+=1;
            $application->save();
            $latestVersion = VersionApplication::where('application_id', $id)
                ->orderBy('created_at', 'desc')
                ->first();
            Download::updateOrCreate([
                'user_id' => auth()->id(),
                'application_id' => $application->id,
                'downloaded_version' => $latestVersion->version,
            ]);
        }

        return response()->download($filePath);
    }

    public function downloadForJs($id)
    {
        $application = Application::findOrFail($id);
        $latestVersion = $application->latestVersion;

        if (!$latestVersion) {
            return response()->json(['error' => 'Файлы приложения не найдены.'], 404);
        }

        $filePath = public_path($latestVersion->file_path);

        if (!file_exists($filePath)) {
            return response()->json(['error' => 'Файл приложения не найден.'], 404);
        }

        if (auth()->id()) {
            $latestVersion = VersionApplication::where('application_id', $id)
                ->orderBy('created_at', 'desc')
                ->first();
            Download::updateOrCreate([
                'user_id' => auth()->id(),
                'application_id' => $application->id,
                'downloaded_version' => $latestVersion->version,
            ]);
        }

        return response()->download($filePath);
    }
}
