<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Kereta;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KeretaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KeretaResource\RelationManagers;

class KeretaResource extends Resource
{
    protected static ?string $model = Kereta::class;
    protected static ?string $navigationLabel = 'kereta';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('nama_kereta')
                ->label('Nama Kereta')
                ->required()
                ->maxLength(15),
            Forms\Components\TextInput::make('kapasitas')
                ->label('Kapasitas')
                ->numeric()
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('kereta_id')
                ->label('ID')
                ->sortable(),
            Tables\Columns\TextColumn::make('nama_kereta')
                ->label('Nama Kereta')
                ->searchable(),
            Tables\Columns\TextColumn::make('kapasitas')
                ->label('Kapasitas')
                ->sortable(),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKeretas::route('/'),
            'create' => Pages\CreateKereta::route('/create'),
            'edit' => Pages\EditKereta::route('/{record}/edit'),
        ];
    }
}
