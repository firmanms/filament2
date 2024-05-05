<?php

namespace App\Filament\App\Resources;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\App\Resources\WidgetResource\Pages;
use App\Filament\App\Resources\WidgetResource\RelationManagers;
use App\Models\Widget;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WidgetResource extends Resource
{
    protected static ?string $model = Widget::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Widget';

    protected static ?string $modelLabel = 'Widget';

    protected static ?string $navigationGroup = 'Pengaturan';

    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make('Widget')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->label('Judul')
                        ->maxLength(255),
                    // Forms\Components\RichEditor::make('label')
                    //     ->label('Deskripsi')
                    //     ->fileAttachmentsDirectory('attachwidgets')
                    //     ->fileAttachmentsVisibility('private'),
                    TinyEditor::make('label')
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsVisibility('public')
                    ->fileAttachmentsDirectory('attachwidgets/'.Filament::getTenant()->id)
                    ->profile('custom')
                    ->columnSpan('full')
                    ->required(),
                ]),
            Forms\Components\Section::make('Pengaturan')
                ->schema([
                    Forms\Components\TextInput::make('sort')
                        ->required()
                        ->numeric()
                        ->label('Urutan')
                        ->maxLength(255),
                    Forms\Components\Toggle::make('status')
                        ->inline(false)
                        ->onColor('success')
                        ->offColor('danger'),
                ])->columns(2),
        ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->html()
                    ->limit(50)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('sort')
                    ->label('Urutan')
                    ->html()
                    ->limit(50)
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->defaultSort('sort', 'asc');
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
            'index' => Pages\ListWidgets::route('/'),
            'create' => Pages\CreateWidget::route('/create'),
            'edit' => Pages\EditWidget::route('/{record}/edit'),
        ];
    }
}
