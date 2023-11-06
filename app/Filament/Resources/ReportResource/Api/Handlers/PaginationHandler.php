<?php
namespace App\Filament\Resources\ReportResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use App\Filament\Resources\ReportResource;
use Illuminate\Support\Facades\Auth;

class PaginationHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = ReportResource::class;

    public function handler()
    {
        $model = static::getModel();

        // Mengambil user yang saat ini diautentikasi
        $user = Auth::user();
        $user_id = $user->id;

        // Lakukan query database seperti biasa
        $query = QueryBuilder::for($model)
            ->allowedFields($model::$allowedFields ?? [])
            ->allowedSorts($model::$allowedSorts ?? [])
            ->allowedFilters($model::$allowedFilters ?? [])
            ->where('user_id', $user_id) // Menambahkan filter berdasarkan user_id
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
