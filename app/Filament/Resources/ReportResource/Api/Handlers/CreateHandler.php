<?php
namespace App\Filament\Resources\ReportResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\ReportResource;

class CreateHandler extends Handlers
{
    public static string | null $uri = '/';
    public static string | null $resource = ReportResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    public function handler(Request $request)
    {
        try {
            $request->validate([
                'date' => 'required',
                'type' => 'string',
                'user_id' => 'exists:users,id',
            ]);

            $model = new (static::getModel());
            $model->fill($request->all());

            if ($model->save()) {
                // Jika penyimpanan berhasil, kirim respon sukses
                $response = [
                    'status' => 'success',
                    'message' => 'Successfully created resource',
                    'data' => $model, // Anda dapat menambahkan data lain di sini jika diperlukan
                ];
                return response()->json($response, 200);
            } else {
                // Jika ada kesalahan saat menyimpan, kirim respon gagal
                return static::sendErrorResponse("Failed to create resource", [], 500);
            }
        } catch (\Exception $e) {
            // Jika terjadi exception, kirim respon gagal dengan pesan error
            return static::sendErrorResponse("Failed to create resource: " . $e->getMessage(), [], 500);
        }
    }
    protected static function sendErrorResponse($message, $data = [], $status = 500)
{
    return response()->json([
        'status' => 'error',
        'message' => $message,
        'data' => $data
    ], $status);
}

}
