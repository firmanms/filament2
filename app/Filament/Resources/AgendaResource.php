<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendaResource\Pages;
use App\Filament\Resources\AgendaResource\RelationManagers;
use App\Models\Agenda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Agenda';

    protected static ?string $modelLabel = 'Agenda';

    protected static ?string $pluralLabel = 'Agenda';

    protected static ?string $navigationGroup = 'Publikasi';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('published')
                    ->label('Tanggal')
                    ->dateTime('d-m-Y')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->sortable()
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('team.name')
                    ->label('Puskesmas')
                    ->sortable()
                    ->searchable(),
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
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function getBreadcrumb(): string
    {
        return 'Agenda';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAgendas::route('/'),
            'create' => Pages\CreateAgenda::route('/create'),
            'edit' => Pages\EditAgenda::route('/{record}/edit'),
        ];
    }
}
