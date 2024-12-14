<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Jadwal;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\JadwalResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\JadwalResource\RelationManagers;

class JadwalResource extends Resource
{
    protected static ?string $model = Jadwal::class;
    protected static ?string $navigationLabel = 'Jadwal';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kereta_id')
    ->label('Nama Kereta')
    ->relationship('kereta', 'nama_kereta') // Relasi ke model Kereta
    ->required(),
            Forms\Components\DateTimePicker::make('waktu_berangkat')
                ->label('Waktu Berangkat')
                ->required(),
            Forms\Components\DateTimePicker::make('waktu_tiba')
                ->label('Waktu Tiba')
                ->required(),
        ]);
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('jadwal_id')
                ->label('ID')
                ->sortable(),
            Tables\Columns\TextColumn::make('waktu_berangkat')
                ->label('Waktu Berangkat')
                ->dateTime(),
            Tables\Columns\TextColumn::make('waktu_tiba')
                ->label('Waktu Tiba')
                ->dateTime(),
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
            'index' => Pages\ListJadwals::route('/'),
            'create' => Pages\CreateJadwal::route('/create'),
            'edit' => Pages\EditJadwal::route('/{record}/edit'),
        ];
    }
}
