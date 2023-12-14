<?php

namespace App\Filament\App\Resources\AnswerResource\Pages;

use App\Filament\App\Resources\AnswerResource;
use App\Filament\App\Traits\HasParentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAnswers extends ListRecords
{
    use HasParentResource;

    protected static string $resource = AnswerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            Actions\CreateAction::make()
                ->url(
                    fn (): string => static::getParentResource()::getUrl('answers.create', [
                        'parent' => $this->parent,
                    ])
                ),
        ];
    }
}
