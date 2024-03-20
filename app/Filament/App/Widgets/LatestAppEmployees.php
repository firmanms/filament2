<?php

namespace App\Filament\App\Widgets;

use App\Models\Employee;
use App\Models\Post;
use Filament\Facades\Filament;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestAppEmployees extends BaseWidget
{
    protected static ?string $heading = 'Postingan Terbaru';
    protected static ?int $sort = 3;
    public function table(Table $table): Table
    {
        return $table
            ->query(Post::query()->whereBelongsTo(Filament::getTenant()))
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('categories.name'),
            ]);
    }
}
