<?php

namespace App\Filament\Resources\ProductCategoryResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ProductCategoryResource;


class EditProductCategory extends EditRecord
{
    protected static string $resource = ProductCategoryResource::class;

    /**
     * Product category edit custom title
     * 
     */
    public function getTitle(): string
    {
        return 'Edit Product Category';
    }

    /**
     * Product category edit custom Breadcrumbs
     * 
     */
    public function getBreadcrumbs(): array
    {
        return [
            ProductCategoryResource::getUrl() => 'Product Categories',
            'Edit',
        ];
    }

    /**
     * Product category edit relations
     * 
     */
    public static function getRelations(): array
    {
        return [
            
        ];
    }

    /**
     * Product category edit actions
     * 
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    
}
