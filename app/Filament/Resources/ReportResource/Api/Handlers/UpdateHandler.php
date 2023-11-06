<?php
namespace App\Filament\Resources\ReportResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\ReportResource;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = ReportResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    public function handler(Request $request, $id)
    {
        $model = static::getModel()::find($id);
        if (!$model) {
            return static::sendErrorResponse("Not found", "Data not found", 400);
        }
        try {

            $model->fill($request->all());

            if($model->save()){
                $response = [
                    'status' => 'success',
                    'message' => 'Successfully created resource',
                    'data' => $model, // Anda dapat menambahkan data lain di sini jika diperlukan
                ];
                return response()->json($response, 200);
            }else {
                // Jika ada kesalahan saat menyimpan, kirim respon gagal
                $errorMessages = $model->getErrors(); // Anda harus mengganti ini dengan cara yang benar untuk mendapatkan pesan kesalahan
                return static::sendErrorResponse("Validation failed", $errorMessages, 400);
            }
        } catch (\Exception $e) {
            // Jika terjadi exception, kirim respon gagal dengan pesan error
            return static::sendErrorResponse("Failed to update resource: " . $e->getMessage(), [], 500);
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
