<?php

namespace App\Filament\Widgets;

use Illuminate\Contracts\View\View;
use App\Models\Task;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class TasksChart extends ApexChartWidget
{
    protected static ?int $sort = 1;
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'tasksChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Task Selesai';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getFooter(): string|View
    {
        $finished = Task::where('task', 'Selesai')->count();
        $noCount = Task::where('task', 'No Task')->count();
        $total = Task::count();
        $data = [
            'total' => $total,
            'selesai' => $finished,
            'noTask' => $noCount
        ];

        return view('chart.task-status.footer', ['data' => $data]);
    }

    protected function getOptions(): array
    {
        $finished = Task::where('task', 'Selesai')->count();
        $noCount = Task::where('task', 'No Task')->count();
        $total = Task::count()-$noCount;
        $percentage = ($finished / $total) * 100;
        $label = $finished . '/' . $total." Task Selesai";
        return [
            'chart' => [
                'type' => 'radialBar',
                'height' => 280,
                'toolbar' => [
                    'show' => false,
                ],
            ],
            'series' => [$percentage],
            'plotOptions' => [
                'radialBar' => [
                    'startAngle' => -140,
                    'endAngle' => 130,
                    'hollow' => [
                        'size' => $percentage.'%',
                        'background' => 'transparent',
                    ],
                    'track' => [
                        'background' => 'transparent',
                        'strokeWidth' => '100%',
                    ],
                    'dataLabels' => [
                        'show' => true,
                        'name' => [
                            'show' => true,
                            'offsetY' => -10,
                            'fontWeight' => 600,
                            'fontFamily' => 'inherit'
                        ],
                        'value' => [
                            'show' => true,
                            'fontWeight' => 600,
                            'fontSize' => '24px',
                            'fontFamily' => 'inherit'
                        ],
                    ],

                ],
            ],
            'fill' => [
                'type' => 'gradient',
                'gradient' => [
                    'shade' => 'dark',
                    'type' => 'horizontal',
                    'shadeIntensity' => 0.5,
                    'gradientToColors' => ['#f59e0b'],
                    'inverseColors' => true,
                    'opacityFrom' => 1,
                    'opacityTo' => 0.6,
                    'stops' => [30, 70, 100],
                ],
            ],
            'stroke' => [
                'dashArray' => 10,
            ],
            'labels' => [$label],
            'colors' => ['#f59e0b'],
        ];
    }
}
