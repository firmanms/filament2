<?php

namespace App\Filament\App\Resources\ApiResource\Pages;

use App\Filament\App\Resources\ApiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateApi extends CreateRecord
{
    protected static string $resource = ApiResource::class;
}
