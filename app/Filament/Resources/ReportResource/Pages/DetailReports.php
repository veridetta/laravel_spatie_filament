<?php

namespace App\Filament\Resources\ReportResource\Pages;

use App\Filament\Resources\ReportResource;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Request;

class DetailReports extends Page
{
    protected static string $resource = ReportResource::class;

    protected static string $view = 'filament.resources.report-resource.pages.detail-reports';

    public function viewData(): array
    {
        $recordId = Request::input('recordId');
        $record = ReportResource::findRecord($recordId);

        return [
            'record' => $record,
        ];
    }
}
