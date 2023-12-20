<?php

namespace App\Filament\App\Resources\WidgetResource\Pages;

use App\Filament\App\Resources\WidgetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWidgets extends ListRecords
{
    protected static string $resource = WidgetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
