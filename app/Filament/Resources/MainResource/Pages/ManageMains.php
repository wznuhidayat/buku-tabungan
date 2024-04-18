<?php

namespace App\Filament\Resources\MainResource\Pages;

use App\Filament\Resources\MainResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMains extends ManageRecords
{
    protected static string $resource = MainResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
