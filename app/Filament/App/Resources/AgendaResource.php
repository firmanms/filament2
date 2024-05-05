<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\AgendaResource\Pages;
use App\Filament\App\Resources\AgendaResource\RelationManagers;
use App\Models\Agenda;
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
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Agenda';

    protected static ?string $modelLabel = 'Agenda';

    protected static ?string $navigationGroup = 'Publikasi';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Agenda Details')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->label('Judul')
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Set $set, $state) {
                                $set('slug', Str::slug($state));
                            }),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->readOnly()
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('description')
                            ->label('Deskripsi')
                            ->fileAttachmentsDirectory('attachagenda/'.Filament::getTenant()->id),
                        Forms\Components\Toggle::make('status')
                            ->onColor('success')
                            ->offColor('danger'),
                    ]),
                    Forms\Components\Section::make('Pengaturan')
                    // ->description('Put the user name details in.')
                    ->schema([
                        Forms\Components\Fileupload::make('image')
                            ->label('Gambar')
                            ->image()
                            ->directory('agendas/'.Filament::getTenant()->id)
                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                            return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                            }),
                        Forms\Components\DatePicker::make('published')
                            ->native(false)
                            ->label('Tanggal')
                            ->displayFormat('d/m/Y')
                            ->required(),
                        Forms\Components\TimePicker::make('time')
                            ->label('Jam')
                            ->native(false)
                            ->required(),
                        Forms\Components\TextInput::make('location')
                            ->label('Tempat')
                            ->required()
                            ->maxLength(255),
                    ])->columns(4),
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
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->sortable()
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('status')
                    ->onColor('success')
                    ->offColor('danger')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('published')
                    ->label('Tanggal')
                    ->dateTime('d-m-Y')
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
            'index' => Pages\ListAgendas::route('/'),
            'create' => Pages\CreateAgenda::route('/create'),
            'edit' => Pages\EditAgenda::route('/{record}/edit'),
        ];
    }
}
