<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\LayananResource\Pages;
use App\Filament\App\Resources\LayananResource\RelationManagers;
use App\Models\Layanan;
use Filament\Facades\Filament;
use Illuminate\Support\Str;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LayananResource extends Resource
{
    protected static ?string $model = Layanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Layanan';

    protected static ?string $modelLabel = 'Layanan';

    protected static ?string $pluralLabel = 'Layanan';

    protected static ?string $navigationGroup = 'Tematik';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make('Agenda Details')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->label('Nama Layanan')
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (Set $set, $state) {
                            $set('slug', Str::slug($state));
                        }),
                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->readOnly()
                        ->maxLength(255),
                    Forms\Components\RichEditor::make('requirement')
                        ->label('Persyaratan')
                        ->required()
                        ->fileAttachmentsDirectory('attachrequirement/'.Filament::getTenant()->id)
                        ->fileAttachmentsVisibility('private'),
                    Forms\Components\RichEditor::make('procedure')
                        ->label('Prosedur')
                        ->required()
                        ->fileAttachmentsDirectory('attachprocedure/'.Filament::getTenant()->id)
                        ->fileAttachmentsVisibility('private'),
                    Forms\Components\TextInput::make('time')
                        ->label('Waktu Penyelesaian')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\RichEditor::make('cost')
                        ->label('Biaya')
                        ->required()
                        ->fileAttachmentsDirectory('attachcost/'.Filament::getTenant()->id)
                        ->fileAttachmentsVisibility('private'),
                    Forms\Components\RichEditor::make('product')
                        ->label('Produk Pelayanan')
                        ->required()
                        ->fileAttachmentsDirectory('attachproduct/'.Filament::getTenant()->id)
                        ->fileAttachmentsVisibility('private'),
                    Forms\Components\RichEditor::make('complaint')
                        ->label('Pengaduan')
                        ->required()
                        ->fileAttachmentsDirectory('attachcomplaint/'.Filament::getTenant()->id)
                        ->fileAttachmentsVisibility('private'),
                    Forms\Components\Toggle::make('status')
                        ->onColor('success')
                        ->offColor('danger'),
                ]),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Layanan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('status')
                    ->onColor('success')
                    ->offColor('danger')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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

    public static function getBreadcrumb(): string
    {
        return 'Layanan';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLayanans::route('/'),
            'create' => Pages\CreateLayanan::route('/create'),
            'edit' => Pages\EditLayanan::route('/{record}/edit'),
        ];
    }
}
