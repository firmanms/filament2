<?php

namespace App\Filament\App\Resources\QuestionResource\Pages;

use App\Filament\App\Resources\QuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateQuestion extends CreateRecord
{
    protected static string $resource = QuestionResource::class;
}
