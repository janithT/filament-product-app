<?php

namespace App\Filament\Resources;


use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ProductCategory;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\ProductCategoryResource\Pages;
use App\Filament\Resources\ProductCategoryResource\RelationManagers\ProductTypesRelationManager;

class ProductCategoryResource extends Resource
{
    protected static ?string $model = ProductCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $label = 'Categories';

    /**
     * Product category form
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
                            ->rows(3)
                            ->maxLength(500)
                            ->columnSpan(2),

                    ]),
            ]);
    }

    /**
     * Product category table list
     * 
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),

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
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    /**
     * Product category relations
     * 
     */
    public static function getRelations(): array
    {
        return [
            ProductTypesRelationManager::class,
        ];
    }

    /**
     * Product category pages
     * 
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductCategories::route('/'),
            'create' => Pages\CreateProductCategory::route('/create'),
            'edit' => Pages\EditProductCategory::route('/{record}/edit'),
        ];
    }
}
