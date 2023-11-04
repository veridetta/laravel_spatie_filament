<?php

namespace App\Filament\Resources\YesResource\Widgets;

use App\Models\Report;
use App\Models\Task;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 0;
    protected function getStats(): array
    {
        $chartData = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
        ->groupBy('date')
        ->get()
        ->mapWithKeys(function ($item) {
            return [$item['date'] => $item['count']];
        })
        ->toArray();
        $chartReport = Report::selectRaw('DATE(created_at) as date, COUNT(*) as count')
        ->groupBy(DB::raw('DATE(created_at)'))
        ->get()
        ->mapWithKeys(function ($item) {
            return [$item['date'] => $item['count']];
        })
        ->toArray();
        $chartTask = Task::selectRaw('DATE(created_at) as date, COUNT(*) as count')
        ->groupBy(DB::raw('DATE(created_at)'))
        ->get()
        ->mapWithKeys(function ($item) {
            return [$item['date'] => $item['count']];
        })
        ->toArray();

        return [
            Stat::make('Total User', User::count())
                ->description('Total User')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart($chartData)
                ->color('success'),
            //total report
            Stat::make('Total Report', Report::count())
                ->description('Total Report')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart($chartReport)
                ->color('success'),
                Stat::make('Total Task', Report::count())
                ->description('Total Task')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart($chartTask)
                ->color('success'),
        ];
    }
}
