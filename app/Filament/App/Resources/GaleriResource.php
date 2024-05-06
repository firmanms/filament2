<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\GaleriResource\Pages;
use App\Filament\App\Resources\GaleriResource\RelationManagers;
use App\Models\Galeri;
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

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Galeri';

    protected static ?string $modelLabel = 'Galeri';

    protected static ?string $navigationGroup = 'Publikasi';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make('Galeri')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Judul')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (Set $set, $state) {
                            $set('slug', Str::slug($state));
                        }),
                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->readOnly()
                        ->maxLength(255),
                    // Forms\Components\RichEditor::make('description')
                    //     ->label('Deskripsi')
                    //     ->fileAttachmentsDirectory('attachposts')
                    //     ->fileAttachmentsVisibility('private'),
                    Forms\Components\Textarea::make('description')
                        ->label('Deskripsi')
                        ->autosize()
                        ->required(),
                ]),
                Forms\Components\Section::make('Gambar')
                // ->description('Put the user name details in.')
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('Cover')
                        ->image()
                        ->directory('gallery/'.Filament::getTenant()->id)
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('image_gallery')
                        ->label('Gambar Galeri (Maks 5 Foto)')
                        ->image()
                        ->directory('image_gallery/'.Filament::getTenant()->id)
                        ->multiple()
                        ->maxFiles(5)
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                ])->columns(2),
                Forms\Components\Section::make('Pengaturan')
                // ->description('Put the user name details in.')
                ->schema([
                    Forms\Components\DatePicker::make('published')
                        ->label('Publikasi')
                        ->native(false)
                        ->displayFormat('d/m/Y')
                        ->required(),
                    Forms\Components\Select::make('category')
                        ->label('Kategori')
                        ->options([
                            'Kegiatan' => 'Kegiatan',
                            'Inovasi' => 'Inovasi',
                            'Prestasi' => 'Prestasi',
                        ])
                        ->searchable()
                        ->preload()
                        ->required(),
                    Forms\Components\Toggle::make('status')
                        ->inline(false)
                        ->onColor('success')
                        ->offColor('danger'),
                ])->columns(3),
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
                Tables\Columns\TextColumn::make('category')
                    ->label('Jenis')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('status')
                    ->onColor('success')
                    ->offColor('danger')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('published')
                    ->label('Publikasi')
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
            'index' => Pages\ListGaleris::route('/'),
            'create' => Pages\CreateGaleri::route('/create'),
            'edit' => Pages\EditGaleri::route('/{record}/edit'),
        ];
    }
}
