<?php
namespace App\Filament\Resources\TaskResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\TaskResource;
use Illuminate\Support\Facades\Storage;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = TaskResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    public function handler(Request $request)
    {
        try {
            $request->validate([
                'division' => 'required|string',
                'task' => 'required|string',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,jpg,png|max:5120', // Maksimal 5MB
            ]);

            // Unggah berkas ke direktori yang sesuai
            $image = $request->file('image')->store('public/reports'); // Ganti 'images' dengan direktori yang sesuai

            $model = new (static::getModel());

            // Isi atribut model dengan data dari permintaan
            $model->fill($request->all());

            // Setel imagePath ke path berkas yang diunggah
            $model->str_replace('public/', '', $image);

            if ($model->save()) {
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
