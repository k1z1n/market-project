<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use App\Models\StatisticVisit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RecordVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $today = Carbon::now()->toDateString();

        // Проверяем, есть ли запись для текущей даты
        $visit = StatisticVisit::where('date', $today)->first();

        if ($visit) {
            $visit->increment('count');
        } else {
            $data = [
              'date' => $today,
              'count' => 1,
            ];
            StatisticVisit::create($data);
        }

        return $next($request);
    }
}
