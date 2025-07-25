<?php

namespace App\Filament\Resources\ProductTypesResource\Pages;

use App\Filament\Resources\ProductTypesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductTypes extends ListRecords
{
    protected static string $resource = ProductTypesResource::class;

    public function getTitle(): string
    {
        return 'Product Types';
    }

     public function getBreadcrumbs(): array
    {
        return [
             
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('New Product Type'),
        ];
    }
}
