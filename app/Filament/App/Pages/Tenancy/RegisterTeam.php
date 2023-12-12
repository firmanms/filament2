<?php

namespace App\Filament\App\Pages\Tenancy;

use App\Models\Team;
use Illuminate\Support\Str;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Pages\Tenancy\RegisterTenant;
use Illuminate\Database\Eloquent\Model;

class RegisterTeam extends RegisterTenant
{
      public static function getLabel(): string
      {
            return 'Register team';
      }

      public function form(Form $form): Form
      {
            return $form
                  ->schema([
                        TextInput::make('name')
                              ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Set $set, $state) {
                                $set('slug', Str::slug($state));
                            }),
                        TextInput::make('slug')
                            ->required()
                            ->readOnly()
                            ->maxLength(255),
                  ]);
      }

      protected function handleRegistration(array $data): Team
      {
            $team = Team::create($data);

            $team->members()->attach(auth()->user());

            return $team;
      }
}
