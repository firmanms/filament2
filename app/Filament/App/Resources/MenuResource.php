<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\MenuResource\Pages;
use App\Filament\App\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Saade\FilamentAdjacencyList\Forms\Components\AdjacencyList;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Menu';

    protected static ?string $modelLabel = 'Menu';

    protected static ?string $pluralLabel = 'Menu';

    protected static ?string $navigationGroup = 'Pengaturan';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Menu Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Menu')
                            ->required()
                            ->readOnly()
                            ->maxLength(255),
                        AdjacencyList::make('subject')
                            ->maxDepth(1)
                            ->form([
                                Forms\Components\TextInput::make('label')
                                    ->required(),
                                Forms\Components\TextInput::make('link')
                                    ->required(),
                            ])
                        // Forms\Components\Select::make('parent_id')
                        //     ->label('Parent')
                        //     ->relationship(
                        //         name: 'parent',
                        //         titleAttribute: 'name',
                        //         modifyQueryUsing: fn (Builder $query) => $query->where('status',1)->whereBelongsTo(Filament::getTenant())
                        //     )
                        //     ->searchable()
                        //     ->preload(),
                        // Forms\Components\TextInput::make('name')
                        //     ->label('Nama')
                        //     ->required()
                        //     ->maxLength(255),
                        // Forms\Components\TextInput::make('url')
                        //     ->required()
                        //     ->maxLength(255),
                        // Forms\Components\TextInput::make('order')
                        //     ->label('Urutan')
                        //     ->required()
                        //     ->maxLength(255),
                        // Forms\Components\Toggle::make('status')
                        //     ->onColor('success')
                        //     ->offColor('danger'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),
                // Tables\Columns\TextColumn::make('parent_id')
                //     ->label('Parent')
                //     ->sortable()
                //     ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function getBreadcrumb(): string
    {
        return 'Menu';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
