<?php
namespace App\Filament\Resources\ReportResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use App\Filament\Resources\TaskResource;
use Illuminate\Support\Facades\Auth;

class CustomHandler extends Handlers {
    public static string | null $uri = '/datas/{report_id}';
    public static string | null $resource = TaskResource::class;

    public function handler($report_id)
    {
        $model = static::getModel();
        // Lakukan query database seperti biasa
        $query = QueryBuilder::for($model)
            ->allowedFields($model::$allowedFields ?? [])
            ->allowedSorts($model::$allowedSorts ?? [])
            ->allowedFilters($model::$allowedFilters ?? [])
            ->where('report_id', $report_id) // Menambahkan filter berdasarkan user_id
            ->paginate(request()->query('per_page',100))
            ->appends(request()->query());

        // Cek apakah ada data yang ditemukan
        if ($query->isEmpty()) {
            return response()->json([
                'status' => 'not-found',
                'message' => 'Data not found',
                'data' => [],
            ], 404);
        }

        // Jika data ditemukan, kembalikan respons sukses
        return response()->json([
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $query,
        ], 200);
    }
}
