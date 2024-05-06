<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\PengaduanResource\Pages;
use App\Filament\App\Resources\PengaduanResource\RelationManagers;
use App\Models\Pengaduan;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class PengaduanResource extends Resource
{
    protected static ?string $model = Pengaduan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Pengaduan';

    protected static ?string $modelLabel = 'Pengaduan';

    protected static ?string $navigationGroup = 'Tematik';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Sarana Pengaduan')
                // ->description('Put the user name details in.')
                ->schema([
                    Forms\Components\Radio::make('kotak')
                        ->options([
                            'Tersedia' => 'Tersedia',
                            'Tidak Tersedia' => 'Tidak Tersedia',
                        ])
                        ->label('Kotak Pengaduan'),
                    Forms\Components\TextInput::make('lapor')
                        ->label('SP4N Lapor')
                        ->placeholder('www.lapor.go.id')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('fax')
                        ->label('Fax')
                        ->placeholder('022')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('telp')
                        ->label('Telepon')
                        ->placeholder('022')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('wa')
                        ->label('Whatsapp')
                        ->placeholder('62801')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                        ->label('Email')
                        ->placeholder('admin@mail.com')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('fb')
                        ->label('Facebook')
                        ->placeholder('xxxxxxxx')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('link_fb')
                        ->label('Link Facebook')
                        ->placeholder('https://xxxxxxxxxx')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('tw')
                        ->label('Twitter')
                        ->placeholder('xxxxxxxx')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('link_tw')
                        ->label('Link Twitter')
                        ->placeholder('https://xxxxxxxxxx')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('ig')
                        ->label('Instagram')
                        ->placeholder('xxxxxxxx')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('link_ig')
                        ->label('Link Instagram')
                        ->placeholder('https://xxxxxxxxxx')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('tiktok')
                        ->label('Tiktok')
                        ->placeholder('xxxxxxxx')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('link_tiktok')
                        ->label('Link Tiktok')
                        ->placeholder('https://xxxxxxxxxx')
                        ->maxLength(255),

                ])->columns(2),
                Forms\Components\RichEditor::make('jangka_waktu')
                        ->label('Jangka Waktu Penyelesaian')
                        ->required()
                        ->fileAttachmentsDirectory('jangkawaktu/'.Filament::getTenant()->id)
                        ->fileAttachmentsVisibility('private'),
                Forms\Components\RichEditor::make('pengelola')
                        ->label('Pengelola/admin')
                        ->required()
                        ->fileAttachmentsDirectory('attachpengelola/'.Filament::getTenant()->id)
                        ->fileAttachmentsVisibility('private'),
                Forms\Components\RichEditor::make('prosedur')
                        ->label('Prosedur')
                        ->required()
                        ->fileAttachmentsDirectory('attachprosedur/'.Filament::getTenant()->id)
                        ->fileAttachmentsVisibility('private'),
                Forms\Components\FileUpload::make('image')
                        ->label('Pengelolaan Pengaduan')
                        ->image()
                        ->directory('pengaduans/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                // Forms\Components\TextInput::make('image')
                //         ->label('image')
                //         ->placeholder('image')
                //         ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir diubah')
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengaduans::route('/'),
            'create' => Pages\CreatePengaduan::route('/create'),
            'edit' => Pages\EditPengaduan::route('/{record}/edit'),
        ];
    }
}
