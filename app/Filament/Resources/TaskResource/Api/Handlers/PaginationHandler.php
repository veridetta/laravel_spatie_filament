<?php
namespace App\Filament\Resources\TaskResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use App\Filament\Resources\TaskResource;

class PaginationHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = TaskResource::class;


    public function handler()
    {
        $model = static::getModel();

        $query = QueryBuilder::for($model)
        ->allowedFields($model::$allowedFields ?? [])
        ->allowedSorts($model::$allowedSorts ?? [])
        ->allowedFilters($model::$allowedFilters ?? [])
        ->paginate(request()->query(100))
        ->appends(request()->query());

        return static::getApiTransformer()::collection($query);
    }
}
