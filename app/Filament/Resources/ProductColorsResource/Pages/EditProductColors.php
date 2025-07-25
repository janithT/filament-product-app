<?php

namespace App\Filament\Resources\ProductColorsResource\Pages;

use App\Filament\Resources\ProductColorsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductColors extends EditRecord
{
    protected static string $resource = ProductColorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
