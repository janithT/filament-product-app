<?php

namespace App\Filament\Resources;


use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ProductType;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

use Filament\Forms\Components\Actions\Action;
use Filament\Notifications\Notification;
use App\Services\ExternalApiService;
use App\Filament\Resources\ProductTypesResource\Pages;

class ProductTypesResource extends Resource
{
    protected static ?string $model = ProductType::class;

    protected static ?string $label = 'Types';

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    /**
     * Product product types form
     * 
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // For name input
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(100)
                    ->unique(
                        ignoreRecord: true,
                    ),

                // For api unique number input
                TextInput::make('api_unique_number')
                    ->label('Api Unique Number')
                    ->maxLength(100)
                    ->unique(
                        ignoreRecord: true
                    )
                    ->suffixAction(
                        Action::make('fetchFromApi')
                            ->icon('heroicon-m-arrow-path')
                            ->tooltip('Fetch from API')
                            ->action(function ($state, callable $set) {
                                $apiService = app(ExternalApiService::class);

                                $fetchedId = $apiService->fetchApiUniqueId();

                                if ($fetchedId) {
                                    $set('api_unique_number', $fetchedId);

                                    Notification::make()
                                        ->title('ID fetched successfully')
                                        ->success()
                                        ->body("Fetched ID: {$fetchedId}")
                                        ->send();
                                } else {
                                    Notification::make()
                                        ->title('API request failed')
                                        ->danger()
                                        ->body('Could not fetch ID from API.')
                                        ->send();
                                }
                            })
                    )

            ]);
    }

    /**
     * Product products types table
     * 
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),

                TextColumn::make('api_unique_number')->searchable(),

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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    /**
     * Product product types relations
     * 
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * Product product types pages
     * 
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductTypes::route('/'),
            // 'create' => Pages\CreateProductTypes::route('/create'),
            // 'edit' => Pages\EditProductTypes::route('/{record}/edit'),
        ];
    }
}
