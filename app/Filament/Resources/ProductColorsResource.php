<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ProductColor;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\ColorPicker;
use App\Filament\Resources\ProductColorsResource\Pages;

class ProductColorsResource extends Resource
{

    protected static ?string $model = ProductColor::class;

    protected static ?string $navigationIcon = 'heroicon-o-paint-brush';

    protected static ?string $label = 'Colors';

    /**
     * Product colors form
     * 
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(1)
                    ->schema([
                        // Color name input
                        TextInput::make('name')
                            ->label('Color Name')
                            ->required()
                            ->maxLength(100)
                            ->unique(
                                ignoreRecord: true,
                            ),

                        // Color description input
                        Textarea::make('description')
                            ->label('Description')
                            ->rows(2)
                            ->maxLength(255),

                        // Color picker input
                        ColorPicker::make('hex_code')
                            ->label('Hex Code')
                            ->required(),
                    ]),
            ]);
    }

    /**
     * Product colors table
     * 
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),

                TextColumn::make('hex_code')->searchable(),

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
                Tables\Actions\EditAction::make()
                    ->modalHeading('Edit Color')
                    ->modalWidth('xl'),

                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),

            ]);
    }

    /**
     * Product colors relations
     * 
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * Product colors pages
     * 
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductColors::route('/'),
            // 'create' => Pages\CreateProductColors::route('/create'),
            // 'edit' => Pages\EditProductColors::route('/{record}/colors'),
        ];
    }
}
