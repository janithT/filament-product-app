<?php

namespace App\Filament\Resources\ProductsResource\Pages;

use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\ProductsResource;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\RepeatableEntry;


class ViewProducts extends ViewRecord
{
    protected static string $resource = ProductsResource::class;

    public function getTitle(): string
    {
        return 'View Product';
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                // Basic product info section (already done)
                TextEntry::make('name'),
                TextEntry::make('description')->label('This Description'),
                TextEntry::make('category.name')->label('Category'),
                TextEntry::make('color.name')->label('Color'),

                // Product Types
                RepeatableEntry::make('productTypes')
                    ->schema([
                        TextEntry::make('name')->label('Name'),
                            TextEntry::make('pivot.my_bonus_field')->label('My bonus field'),
                    ])
                    ->columns(1)
            ]);
    }
}
