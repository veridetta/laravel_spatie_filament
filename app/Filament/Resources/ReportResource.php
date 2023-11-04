<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportResource\Pages;
use App\Models\Report;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\TaskResource\Pages\CreateTask;
use App\Filament\Resources\TaskResource\Pages\EditTask;
use App\Filament\Resources\TaskResource\Pages\ListTasks;
use App\Models\User;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;
class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';
    protected static ?string $navigationGroup = 'Reports';
    protected static string $view = 'filament.resources.report.pages.view-report';
    public static function getRecordTitle(?Model $record): string|null|Htmlable
    {
        return $record->date;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //user_id,tanggal, divisi,image, task, description
                Forms\Components\DateTimePicker::make('date')->required()->default(now())->label('Tanggal'),
                Forms\Components\Select::make('type')->options([
                    'Morning' => 'Morning',
                    'Afternoon' => 'Afternoon',
                ])->required()
                ->label('Jenis Laporan'),

            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        if(auth()->user()->role == 'admin'){
            return parent::getEloquentQuery();
        }else{
            return parent::getEloquentQuery()->where('user_id', auth()->user()->id);
        }

    }
    public static function table(Table $table): Table
    {
        return $table

            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID'),
                Tables\Columns\TextColumn::make('date')->label('Tanggal')->date('d-M-Y')->searchable(),
                Tables\Columns\TextColumn::make('type')->label('Jenis Laporan'),
                //tampilkan nama user
                TextColumn::make('users.name')->label('Nama User'),
            ])
            ->filters([
                SelectFilter::make('task')
                ->options([
                    'Morning' => 'Morning',
                    'Afternoon' => 'Afternoon',
                ])
                ->label('Jenis Laporan'),
                DateRangeFilter::make('date')->label('Tanggal'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('Manage Tasks')
                ->color('success')
                ->icon('heroicon-o-clipboard-document-list')
                ->url(
                    fn (Report $record): string => static::getUrl('tasks.index', [
                        'parent' => $record->id,
                    ])
                ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            'edit' => Pages\EditReport::route('/{record}/edit'),

             // Task
             'tasks.index' => ListTasks::route('/{parent}/tasks'),
             'tasks.create' => CreateTask::route('/{parent}/tasks/create'),
             'tasks.edit' => EditTask::route('/{parent}/tasks/{record}/edit'),
        ];
    }

}
