<?php

namespace App\Filament\App\Resources\ApiResource\Pages;

use App\Filament\App\Resources\ApiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApi extends EditRecord
{
    protected static string $resource = ApiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
