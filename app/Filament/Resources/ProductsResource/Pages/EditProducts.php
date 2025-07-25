<?php

namespace App\Filament\Resources\ProductsResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ProductsResource;
use App\Filament\Resources\ProductsResource\RelationManagers\TypeAssignmentRelationManager;

class EditProducts extends EditRecord
{
    protected static string $resource = ProductsResource::class;

    /**
     * Edit product header actions
     * 
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    /**
     * Edit product relations
     * 
     */
    public static function getRelations(): array
    {
        return [
            TypeAssignmentRelationManager::class,
        ];
    }

}
