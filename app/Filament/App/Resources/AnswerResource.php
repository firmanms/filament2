<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\AnswerResource\Pages;
use App\Filament\App\Resources\AnswerResource\RelationManagers;
use App\Models\Answer;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnswerResource extends Resource
{
    protected static ?string $model = Answer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Jawaban';

    protected static ?string $modelLabel = 'Jawaban';

    protected static ?string $navigationGroup = 'FAQ';

    protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make('Jawaban')
                ->schema([
                    Forms\Components\Select::make('question_id')
                            ->label('Pertanyaan')
                            ->relationship(
                                name: 'questions',
                                titleAttribute: 'label',
                                modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant())
                            )
                            ->allowHtml()
                            ->searchable()
                            ->preload()
                            ->required(),
                    Forms\Components\RichEditor::make('label')
                            ->required()
                            ->label('Jawaban')
                            ->toolbarButtons([

                                'blockquote',
                                'bold',
                                'bulletList',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ]),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('questions.label')
                    ->label('Kategori')
                    ->html()
                    ->sortable()
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('label')
                    ->label('Jawaban')
                    ->html()
                    ->sortable()
                    ->limit(50)
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
            'index' => Pages\ListAnswers::route('/'),
            'create' => Pages\CreateAnswer::route('/create'),
            'edit' => Pages\EditAnswer::route('/{record}/edit'),
        ];
    }
}
