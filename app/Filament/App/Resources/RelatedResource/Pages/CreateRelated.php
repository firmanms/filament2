<?php

namespace App\Filament\App\Resources\RelatedResource\Pages;

use App\Filament\App\Resources\RelatedResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRelated extends CreateRecord
{
    protected static string $resource = RelatedResource::class;
}
