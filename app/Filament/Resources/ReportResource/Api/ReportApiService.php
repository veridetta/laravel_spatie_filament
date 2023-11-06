<?php
namespace App\Filament\Resources\ReportResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\ReportResource;
use Illuminate\Routing\Router;


class ReportApiService extends ApiService
{
    protected static string | null $resource = ReportResource::class;

    public static function allRoutes(Router $router)
    {
        Handlers\CreateHandler::route($router);
        Handlers\UpdateHandler::route($router);
        Handlers\DeleteHandler::route($router);
        Handlers\PaginationHandler::route($router);
        Handlers\DetailHandler::route($router);
    }
}
