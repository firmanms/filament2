<?php

namespace App\Filament\App\Resources\EmployeResource\Pages;

use App\Filament\App\Resources\EmployeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmploye extends EditRecord
{
    protected static string $resource = EmployeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
