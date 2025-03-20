<?php

namespace App\Filament\Pengunjung\Resources\PeminjamanResource\Pages;

use App\Filament\Pengunjung\Resources\PeminjamanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeminjamen extends ListRecords
{
    protected static string $resource = PeminjamanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
