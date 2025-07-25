<?php

namespace App\Filament\Resources\ProductColorsResource\Pages;

use App\Filament\Resources\ProductColorsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductColors extends ListRecords
{

    protected static string $resource = ProductColorsResource::class;

    /**
     * List product colors title
     * 
     */
    public function getTitle(): string
    {
        return 'Product Colors';
    }

    /**
     * List product colors Breadcrumbs
     * 
     */
     public function getBreadcrumbs(): array
    {
        return [
             
        ];
    }

    /**
     * List product colors actions
     * 
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('New Product Color'),
        ];
    }
}
