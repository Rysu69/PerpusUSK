<?php

namespace App\Filament\Pengunjung\Resources\BukuResource\Pages;

use App\Filament\Pengunjung\Resources\BukuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBuku extends EditRecord
{
    protected static string $resource = BukuResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
