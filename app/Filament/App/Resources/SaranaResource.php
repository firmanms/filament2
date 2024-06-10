<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\SaranaResource\Pages;
use App\Filament\App\Resources\SaranaResource\RelationManagers;
use App\Models\Sarana;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class SaranaResource extends Resource
{
    protected static ?string $model = Sarana::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Sarana';

    protected static ?string $modelLabel = 'Sarana';

    protected static ?string $pluralLabel = 'Sarana'; // Judul plural

    protected static ?string $navigationGroup = 'Tematik';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Maklumat, Visi Misi dan lainnya')
                ->description('Maksimal upload 3 gambar')
                ->schema([
                    Forms\Components\FileUpload::make('maklumat')
                        ->label('Maklumat')
                        ->image()
                        ->directory('maklumat/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('visi')
                        ->label('Visi')
                        ->image()
                        ->directory('visi/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('misi')
                        ->label('Misi')
                        ->image()
                        ->directory('misi/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('motto')
                        ->label('Motto')
                        ->image()
                        ->directory('motto/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('kode_etik')
                        ->label('Kode Etik')
                        ->image()
                        ->directory('kode_etik/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('tata_tertib')
                        ->label('Tata Tertib')
                        ->image()
                        ->directory('tata_tertib/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('si_pelayanan_publik')
                        ->label('Sistem Informasi Pelayanan Publik')
                        ->image()
                        ->directory('si_pelayanan_publik/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                ])->columns(4),
                Forms\Components\Section::make('Sarana')
                ->description('Maksimal upload 3 gambar')
                ->schema([
                    Forms\Components\FileUpload::make('ruang_tunggu')
                        ->label('Ruang Tunggu')
                        ->image()
                        ->directory('ruang_tunggu/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('meja_layanan')
                        ->label('Meja Layanan')
                        ->image()
                        ->directory('meja_layanan/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('parkir')
                        ->label('Parkir')
                        ->image()
                        ->directory('parkir/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('tempat_ibadah')
                        ->label('Tempat Ibadah')
                        ->image()
                        ->directory('tempat_ibadah/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('charger')
                        ->label('Charger')
                        ->image()
                        ->directory('charger/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('pojok_baca')
                        ->label('Pojok Baca')
                        ->image()
                        ->directory('pojok_baca/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('toilet')
                        ->label('Toilet')
                        ->image()
                        ->directory('toilet/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),

                ])->columns(3),
                Forms\Components\Section::make('Sarana Khusus')
                ->description('Maksimal upload 3 gambar')
                ->schema([
                    Forms\Components\FileUpload::make('petunjuk_layanan_khusus')
                        ->label('Petunjuk Layanan/Papan Informasi Khusus')
                        ->image()
                        ->directory('petunjuk_layanan_khusus/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('petunjuk_tanda')
                        ->label('Petunjuk Seperti Tanda Lansia dan Ibu Menyusui')
                        ->image()
                        ->directory('petunjuk_tanda/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('narator')
                        ->label('Narator/Audio')
                        ->image()
                        ->directory('narator/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('huruf_braile')
                        ->label('Papan Informasi Huruf Braile')
                        ->image()
                        ->directory('huruf_braile/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('kursi_roda')
                        ->label('Kursi Roda')
                        ->image()
                        ->directory('kursi_roda/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('rambatan')
                        ->label('Ram Rambatan')
                        ->image()
                        ->directory('rambatan/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('laktasi')
                        ->label('Laktasi')
                        ->image()
                        ->directory('laktasi/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('toilet_disabilitas')
                        ->label('Toilet Disabilitas')
                        ->image()
                        ->directory('toilet_disabilitas/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('kursi_prioritas')
                        ->label('Kursi Prioritas')
                        ->image()
                        ->directory('kursi_prioritas/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('parkir_khusus')
                        ->label('Parkir Khusus')
                        ->image()
                        ->directory('parkir_khusus/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('tempat_main')
                        ->label('Tempat Bermain Anak')
                        ->image()
                        ->directory('tempat_main/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('lantai_pemandu')
                        ->label('Lantai Pemandu/ Guiding Block')
                        ->image()
                        ->directory('lantai_pemandu/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),

                ])->columns(4),
                Forms\Components\Section::make('Sarana Keamanan')
                ->description('Maksimal upload 3 gambar')
                ->schema([
                    Forms\Components\FileUpload::make('apar')
                        ->label('Apar')
                        ->image()
                        ->directory('apar/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('jalur_evakuasi')
                        ->label('Jalur Evakuasi')
                        ->image()
                        ->directory('jalur_evakuasi/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('cctv')
                        ->label('cctv')
                        ->image()
                        ->directory('cctv/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('petugas_keamanan')
                        ->label('Petugas Keamanan')
                        ->image()
                        ->directory('petugas_keamanan/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('titik_kumpul')
                        ->label('Titik Kumpul')
                        ->image()
                        ->directory('titik_kumpul/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('ruang_arsip')
                        ->label('Ruang Arsip')
                        ->image()
                        ->directory('ruang_arsip/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                    Forms\Components\FileUpload::make('red_button')
                        ->label('Red Button/Tombol Darurat')
                        ->image()
                        ->directory('red_button/'.Filament::getTenant()->id)
                        ->multiple()
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                        }),
                ])->columns(4),

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
                    // Tables\Actions\DeleteBulkAction::make(),
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

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function getBreadcrumb(): string
    {
        return 'Sarana';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSaranas::route('/'),
            'create' => Pages\CreateSarana::route('/create'),
            'edit' => Pages\EditSarana::route('/{record}/edit'),
        ];
    }
}
