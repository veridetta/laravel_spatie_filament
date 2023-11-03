<?php

namespace App\Filament\Resources\TaskResource\Pages;

use App\Filament\Resources\TaskResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ReportResource;
use App\Filament\Traits\HasParentResource;

class ListTasks extends ListRecords
{
    use HasParentResource;
    protected static string $resource = TaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
           // Actions\CreateAction::make(),
           Actions\CreateAction::make()
           ->url(
               fn (): string => static::getParentResource()::getUrl('tasks.create', [
                   'parent' => $this->parent,
               ])
           ),
        ];
    }
}
