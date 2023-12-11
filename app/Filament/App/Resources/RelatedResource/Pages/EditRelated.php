<?php

namespace App\Filament\App\Resources\RelatedResource\Pages;

use App\Filament\App\Resources\RelatedResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRelated extends EditRecord
{
    protected static string $resource = RelatedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
