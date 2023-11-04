<?php

namespace App\Filament\Widgets;

use App\Models\Report;
use Illuminate\Support\Facades\DB;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class ReportsChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'reportsChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?int $sort = 2;
    protected static ?string $heading = 'Jumlah Laporan';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {

        // Data perbulan
        $data = Report::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->get()
        ->keyBy('month');

        // Inisialisasi array dengan nilai 0 untuk setiap bulan
        $monthlyData = array_fill(1, 12, 0);

        // Mengisi nilai array dengan jumlah data yang sesuai
        foreach (range(1, 12) as $month) {
        if (isset($data[$month])) {
            $monthlyData[$month] = $data[$month]['count'];
        }
        }

        // Mengonversi array hasil ke dalam bentuk yang Anda inginkan [1, 1, 2, ..., 0]
        $monthlyData = array_values($monthlyData);


        return [
            'chart' => [
                'type' => 'line',
                'height' => 280,
                'toolbar' => [
                    'show' => false
                ]
            ],
            'series' => [
                [
                    'name' => 'Reports',
                    'data' => $monthlyData,
                ],
            ],
            'xaxis' => [
                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                'labels' => [
                    'style' => [
                        'fontWeight' => 400,
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontWeight' => 400,
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'fill' => [
                'type' => 'gradient',
                'gradient' => [
                    'shade' => 'dark',
                    'type' => 'horizontal',
                    'shadeIntensity' => 1,
                    'gradientToColors' => ['#ea580c'],
                    'inverseColors' => true,
                    'opacityFrom' => 1,
                    'opacityTo' => 1,
                    'stops' => [0, 100, 100, 100],
                ],
            ],
            'dataLabels' => [
                'enabled' => false,
            ],
            'grid' => [
                'show' => false,
            ],
            'markers' => [
                'size' => 2
            ],
            'tooltip' => [
                'enabled' => true
            ],
            'stroke' => [
                'width' => 4
            ],
            'colors' => ['#f59e0b'],
        ];
    }
}
