<?php

namespace App\Filament\Resources\ProductTypesResource\Pages;

use App\Filament\Resources\ProductTypesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductTypes extends EditRecord
{
    protected static string $resource = ProductTypesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
