<?php

namespace App\Filament\App\Resources\AnswerResource\Pages;

use App\Filament\App\Resources\AnswerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAnswer extends EditRecord
{
    protected static string $resource = AnswerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
