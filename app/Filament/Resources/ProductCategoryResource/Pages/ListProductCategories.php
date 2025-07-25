<?php

namespace App\Filament\Resources\ProductCategoryResource\Pages;

use App\Filament\Resources\ProductCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductCategories extends ListRecords
{
    protected static string $resource = ProductCategoryResource::class;

    /**
     * Product category get custom title 
     * 
     */
    public function getTitle(): string
    {
        return 'Product Categories';
    }

    /**
     * Product category get custom breadcrumbs 
     * 
     */
    public function getBreadcrumbs(): array
    {
        return [
            route('filament.admin.pages.dashboard') => 'Product Categories',
            'List',
        ];
    }

    /**
     * Product category get header actions
     * 
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('New product Category'),
        ];
    }

}
