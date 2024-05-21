<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\VersionApplication;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileView()
    {
        $user = auth()->user();

        $downloadedApplications = Download::where('user_id', $user->id)
            ->with('application')
            ->get();

        $updatedApplications = [];
        $newApplications = [];

        foreach ($downloadedApplications as $download) {
            $application = $download->application;

            $latestVersion = VersionApplication::where('application_id', $application->id)
                ->orderBy('version', 'desc')
                ->first();

            if ($latestVersion && $download->downloaded_version < $latestVersion->version) {
                $updatedApplications[] = $application;
            } elseif ($latestVersion && $download->downloaded_version == $latestVersion->version) {
                $newApplications[] = $application;
            }
        }

        return view('profile', compact('user', 'updatedApplications', 'newApplications'));
    }
}
