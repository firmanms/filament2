<?php

namespace App\Filament\App\Resources\EmployeResource\Pages;

use App\Filament\App\Resources\EmployeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmployes extends ListRecords
{
    protected static string $resource = EmployeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
