<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Models\Task;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class TaskResource extends Resource
{
    public static string $parentResource = ReportResource::class;
    protected static ?string $model = Task::class;
    protected static bool $shouldRegisterNavigation = false;
    public static function getRecordTitle(?Model $record): string|null|Htmlable
    {
        return $record->date;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('division')->options([
                    'Umum' => 'Umum',
                    'Publik' => 'Publik',
                    'E-Gov' => 'E-Gov',
                ])->required()
                ->label('Divisi'),
                Forms\Components\Select::make('task')->options([
                    'No Task' => 'No Task',
                    'Belum' => 'Belum',
                    'Selesai' => 'Selesai',
                ])->required()
                ->label('Task'),
                //description
                Forms\Components\Textarea::make('description')->required()
                ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                ->image()->required()
                ->directory('reports')
                ->visibility('public')
                ->label('Gambar')
                ->columnSpanFull(),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SelectColumn::make('division')
                ->options([
                    'Umum' => 'Umum',
                    'Publik' => 'Publik',
                    'E-Gov' => 'E-Gov',
                ])->label('Divisi'),
                Tables\Columns\ImageColumn::make('image')->label('Gambar'),
                Tables\Columns\SelectColumn::make('task')
                ->options([
                    'No Task' => 'No Task',
                    'Belum' => 'Belum',
                    'Selesai' => 'Selesai',
                ])->label('Task'),
                Tables\Columns\TextColumn::make('description')->label('Deskripsi'),
            ])
            ->filters([
                SelectFilter::make('task')
                ->options([
                    'No Task' => 'No Task',
                    'Belum' => 'Belum',
                    'Selesai' => 'Selesai',
                ]),
                SelectFilter::make('division')
                ->options([
                    'Umum' => 'Umum',
                    'Publik' => 'Publik',
                    'E-Gov' => 'E-Gov',
                ])
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
                Tables\Actions\EditAction::make()
                    ->url(
                        fn (Pages\ListTasks $livewire, Model $record): string => static::$parentResource::getUrl('tasks.edit', [
                            'record' => $record,
                            'parent' => $livewire->parent,
                        ])
                    ),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }

}
