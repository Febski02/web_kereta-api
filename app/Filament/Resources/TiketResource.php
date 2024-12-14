<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Tiket;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TiketResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TiketResource\RelationManagers;

class TiketResource extends Resource
{
    protected static ?string $model = Tiket::class;
    protected static ?string $navigationLabel = 'Tiket';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('kereta_id')
            ->label('Nama Kereta')
            ->relationship('kereta', 'nama_kereta') // Relasi ke Kereta
            ->required(),

        Forms\Components\Select::make('jadwal_id')
            ->label('Jadwal (Waktu Berangkat)')
            ->relationship('jadwal', 'waktu_berangkat') // Relasi ke Jadwal
            ->required(),
            Forms\Components\TextInput::make('harga')
            ->label('Harga Tiket')
            ->required()
            ->numeric()
            ->maxLength(15),


       

        Forms\Components\TextInput::make('nomor_kursi')
            ->required()
            ->numeric()
            ->maxLength(5),
    ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('kereta.nama_kereta')->label('Nama Kereta'), Tables\Columns\TextColumn::make('jadwal.waktu_berangkat')->label('Waktu Berangkat'),
            Tables\Columns\TextColumn::make('harga')->label('Harga'),
            
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTikets::route('/'),
            'create' => Pages\CreateTiket::route('/create'),
            'edit' => Pages\EditTiket::route('/{record}/edit'),
        ];
    }
}
