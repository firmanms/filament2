<?php

namespace App\Filament\App\Resources\SlideResource\Pages;

use App\Filament\App\Resources\SlideResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSlide extends EditRecord
{
    protected static string $resource = SlideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
