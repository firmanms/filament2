<?php

namespace App\Filament\App\Resources\AnswerResource\Pages;

use App\Filament\App\Resources\AnswerResource;
use App\Filament\App\Traits\HasParentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAnswer extends CreateRecord
{
    use HasParentResource;

    protected static string $resource = AnswerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? static::getParentResource()::getUrl('answers.index', [
            'parent' => $this->parent,
        ]);
    }

    // This can be moved to Trait, but we are keeping it here
    //   to avoid confusion in case you mutate the data yourself
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Set the parent relationship key to the parent resource's ID.
        $data[$this->getParentRelationshipKey()] = $this->parent->id;

        return $data;
    }
}
