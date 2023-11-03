<?php

namespace App\Filament\Resources\ReportResource\Pages;

use App\Filament\Resources\ReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Request;

class ViewReport extends ViewRecord
{
    protected static string $resource = ReportResource::class;

    public function viewData(): array
    {
        $recordId = Request::input('recordId');
        $record = ReportResource::findRecord($recordId);


        return [
            'record' => $record,
        ];
    }
}
