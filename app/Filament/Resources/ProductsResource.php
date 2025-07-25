<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use App\Filament\Resources\ProductsResource\Pages;
use App\Filament\Resources\ProductsResource\RelationManagers\TypeAssignmentRelationManager;

class ProductsResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    /**
     * Product products form
     * 
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)
                    ->schema([
                        // For name 
                        TextInput::make('name')
                            ->required()
                            ->maxLength(50)
                            ->columnSpan(1)
                            ->unique(
                                ignoreRecord: true,
                            ),

                        // For description
                        Textarea::make('description')
                            ->required()
                            ->rows(2)
                            ->maxLength(500)
                            ->columnSpan(2),

                         // Product Category Select
                        Select::make('product_category_id')
                            ->label('Category')
                            ->relationship('category', 'name')
                            ->required()
                            ->columnSpan(1),

                        // Product Color Select
                        Select::make('product_color_id')
                            ->label('Color')
                            ->relationship('color', 'name')
                            ->required()
                            ->columnSpan(1),

                    ]),
            ]);
    }

    /**
     * Product products table
     * 
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),

                TextColumn::make('description')->searchable(),

                TextColumn::make('category.name')->searchable()->sortable()->label('Category'),

                TextColumn::make('color.name')->searchable()->sortable()->label('Color'),

                TextColumn::make('created_at')
                    ->label('Created at')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Updated at')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    /**
     * Product products relations
     * 
     */
    public static function getRelations(): array
    {
        return [
            TypeAssignmentRelationManager::class,
        ];
    }

    /**
     * Product products pages
     * 
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'view' => Pages\ViewProducts::route('/{record}'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}
