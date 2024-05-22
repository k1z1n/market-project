<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Feedback;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function feedbackView($id)
    {
        $feedbacks = Feedback::where('application_id', $id)->paginate(10);
        $app = Application::findOrFail($id);
        $averageRating = Feedback::where('application_id', $id)->avg('stars');
        $averageRating = round($averageRating, 1);
        $starsCount = round($averageRating);
        $feedbackCount = Feedback::where('application_id', $id)->count();

//        foreach ($feedbacks as $feedback) {
//            $feedback->created_at = Carbon::parse($feedback->created_at)->translatedFormat('d M Y');
//        }
//        $feedbacks->each(function ($feed) {
//            $feed->date = Carbon::parse($feed->created_at)->translatedFormat('d M Y');
//        });
        return view('feedback', compact('feedbacks', 'app', 'averageRating', 'starsCount', 'feedbackCount'));
    }

    public function feedbackStore(Request $request)
    {
        if (auth()->guest()) {
            return redirect()->back()->with('error', 'Авторизуйтесь как пользователь');
        }

        $user = auth()->user();
        if (!isset($user->username)) {
            return redirect()->back()->with('error', 'Для написания отзыва введите имя в профиле');
        }

        if (empty($request->input('message'))) {
            return redirect()->back()->with('error', 'Поле отзыва пустое');
        }

        $data = $request->validate([
            'application_id' => 'required',
            'message' => 'required|string',
        ]);

        $stars = $request->input('stars');
        if (empty($stars)) {
            return redirect()->back()->withInput()->with('error', 'Рейтинг не указан');
        }

        $existingFeedback = Feedback::where('user_id', auth()->user()->id)
            ->where('application_id', $data['application_id'])
            ->first();

        if ($existingFeedback) {
            return redirect()->back()->withInput()->with('error', 'Вы уже оставили отзыв для этого приложения');
        }

        $data['stars'] = $stars;
        $data['user_id'] = auth()->user()->id;

        Feedback::create($data);

        return redirect()->route('application.view', $data['application_id'])->with('message', 'Спасибо за оценку');
    }

}
