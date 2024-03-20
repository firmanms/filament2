<?php

namespace App\Filament\App\Widgets;

use App\Models\Department;
use App\Models\Employe;
use App\Models\Employee;
use App\Models\Page;
use App\Models\Post;
use App\Models\Team;
use Filament\Facades\Filament;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAppOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Post', Post::query()->whereBelongsTo(Filament::getTenant())->count())
                ->description('Postingan Berita/Pengumuman')
                // ->descriptionIcon('heroicon-m-arrow-trending-up')
                // ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Page', Page::query()->whereBelongsTo(Filament::getTenant())->count())
                ->description('Halaman yang dibuat')
                // ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('success'),
            Stat::make('Pegawai', Employe::query()->whereBelongsTo(Filament::getTenant())->count())
                ->description('Pegawai')
                // ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }
}
