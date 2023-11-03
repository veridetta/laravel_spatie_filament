<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportResource\Pages;
use App\Filament\Resources\ReportResource\RelationManagers;
use App\Models\Report;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';
    protected static ?string $navigationGroup = 'Reports';

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
                Forms\Components\Textarea::make('description')->required(),
                Forms\Components\FileUpload::make('image')->image()->required()
                ->label('Gambar')
                ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID'),
                Tables\Columns\TextColumn::make('date')->label('Tanggal'),
                Tables\Columns\TextColumn::make('type')->label('Jenis Laporan'),
                Tables\Columns\TextColumn::make('division')->label('Divisi'),
                Tables\Columns\ImageColumn::make('image')->label('Gambar'),
                Tables\Columns\TextColumn::make('task')->label('Task'),
                Tables\Columns\TextColumn::make('description')->label('Deskripsi'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->recordUrl(
                fn (Model $record): string => route('reports.detail', ['record' => $record]),
            )
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
        ];
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 1 ? 'warning' : 'primary';
    }
}
