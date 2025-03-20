<?php

namespace App\Filament\Resources\PengunjungResource\Pages;

use App\Filament\Resources\PengunjungResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengunjungs extends ListRecords
{
    protected static string $resource = PengunjungResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
