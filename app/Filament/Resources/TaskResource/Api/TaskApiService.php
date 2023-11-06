<?php
namespace App\Filament\Resources\TaskResource\Api;

use App\Filament\Resources\ReportResource\Api\Handlers\CustomHandler;
use Rupadana\ApiService\ApiService;
use App\Filament\Resources\TaskResource;
use Illuminate\Routing\Router;


class TaskApiService extends ApiService
{
    protected static string | null $resource = TaskResource::class;

    public static function allRoutes(Router $router)
    {
        Handlers\CreateHandler::route($router);
        Handlers\UpdateHandler::route($router);
        Handlers\DeleteHandler::route($router);
        Handlers\PaginationHandler::route($router);
        CustomHandler::route($router);
        Handlers\DetailHandler::route($router);
    }
}
