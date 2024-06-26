<?php

namespace App\Filament\App\Pages\Tenancy;

use Filament\Facades\Filament;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Str;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Pages\Tenancy\EditTenantProfile;
use Illuminate\Database\Eloquent\Model;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class EditTeamProfile extends EditTenantProfile
{
      public static function getLabel(): string
      {
            return 'Ubah Data';
      }

      public function form(Form $form): Form
      {
            return $form
                  ->schema([
                        Section::make('Informasi Website')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->readOnly()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Set $set, $state) {
                                $set('slug', Str::slug($state));
                            }),
                        TextInput::make('slug')
                            ->required()
                            ->readOnly()
                            ->maxLength(255),
                        FileUpload::make('logo')
                            ->required()
                            ->label('Logo')
                            ->image()
                            ->directory('logo/'.Filament::getTenant()->id)
                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                            return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                            }),
                        FileUpload::make('favicon')
                            ->required()
                            ->label('Favicon')
                            ->image()
                            ->directory('favicon/'.Filament::getTenant()->id)
                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                            return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                            }),
                    ])->columns(2),

                    Section::make('Informasi Kantor')
                    ->schema([
                        TextInput::make('office_name')
                            ->required()
                            ->label('Nama Kantor')
                            ->maxLength(255),
                        Textarea::make('office_address')
                            ->required()
                            ->label('Alamat Kantor')
                            ->maxLength(255),
                        Textarea::make('url_maps')
                            ->required()
                            ->label('URL Google Maps'),
                        TextInput::make('leader_name')
                            ->required()
                            ->label('Nama Pimpinan')
                            ->maxLength(255),
                        FileUpload::make('leader_foto')
                            ->required()
                            ->label('Foto Pimpinan')
                            ->image()
                            ->directory('leader_foto/'.Filament::getTenant()->id)
                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                            return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                            }),
                        Textarea::make('video_profile')
                            ->required()
                            ->label('URL Video Youtube')
                            ->maxLength(255),
                        RichEditor::make('maintask')
                            ->required()
                            ->label('footer')
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
                        RichEditor::make('overview')
                            ->required()
                            ->label('Selayang Pandang')
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
                        RichEditor::make('welcome')
                            ->required()
                            ->label('Sambutan Pimpinan')
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
                        TextInput::make('office_telp')
                            ->required()
                            ->label('Telp Kantor')
                            ->maxLength(255),
                        TextInput::make('office_whatsapp')
                            ->required()
                            ->label('Whatsapp Kantor')
                            ->maxLength(255),
                        TextInput::make('office_email')
                            ->required()
                            ->label('Email Kantor')
                            ->maxLength(255),
                        Textarea::make('open_hour')
                            ->required()
                            ->label('Jam Operasional')
                            ->maxLength(255),
                        TextInput::make('nickname')
                            ->label('Sebutan Pimpinan')
                            ->required()
                            ->placeholder('Kepala Puskesmas')
                            ->maxLength(255),
                    ])->columns(3),

                    Section::make('Kategori')
                    ->description('Kategori Puskesmas')
                    ->schema([

                        Select::make('status')
                            ->required()
                            ->label('DTP/NON DTP')
                            ->options([
                                'DTP' => 'DTP',
                                'NON DTP' => 'NON DTP',
                            ]),
                        Select::make('akreditasi')
                            ->required()
                            ->label('Akreditasi')
                            ->options([
                                'Paripurna' => 'Paripurna',
                                'Utama' => 'Utama',
                                'Madya' => 'Madya',
                                'Dasar' => 'Dasar',
                                'Tdk Akreditasi' => 'Tdk Akreditasi',
                            ]),
                        Select::make('karakteristik')
                            ->required()
                            ->label('Karakteristik')
                            ->options([
                                'Kawasan Perkotaan' => 'Kawasan Perkotaan',
                                'Kawasan Perdesaan' => 'Kawasan Perdesaan',
                                'Kawasan Terpencil' => 'Kawasan Terpencil',
                                'Kawasan Sangat Terpencil' => 'Kawasan Sangat Terpencil',
                            ]),
                    ])->columns(3),

                    Section::make('Media Sosial Kantor')
                    ->description('Masukkan username/channel id saja')
                    ->schema([
                        TextInput::make('fb')
                            ->label('Facebook')
                            ->placeholder('https://facebook.com/username')
                            ->maxLength(255),
                        TextInput::make('ig')
                            ->placeholder('https://instagram.com/username')
                            ->label('Instagram')
                            ->maxLength(255),
                        TextInput::make('tw')
                            ->placeholder('https://twitter.com/username')
                            ->label('Twitter')
                            ->maxLength(255),
                        TextInput::make('channel_yt')
                            ->placeholder('https://youtube.com/username')
                            ->label('Channel Youtube')
                            ->maxLength(255),
                        TextInput::make('tiktok')
                            ->placeholder('https://tiktok.com/username')
                            ->label('Tiktok')
                            ->maxLength(255),
                    ])->columns(3),

                    Section::make('Informasi SEO')
                    ->description('Untuk pencarian google')
                    ->schema([
                        TextInput::make('seo_desc')
                            ->label('SEO description')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('seo_keywords')
                            ->label('SEO Keyword')
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),

                  ]);


      }
}
