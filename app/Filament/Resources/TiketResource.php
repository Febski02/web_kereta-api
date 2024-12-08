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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('jadwal_kereta')
                ->required()
                ->label('Jadwal Kereta')
                ->inputMode('numeric'), // Bisa diubah menjadi input mode lain sesuai kebutuhan
            Forms\Components\TextInput::make('stasiun_keberangkatan')
                ->required()
                ->label('Stasiun Keberangkatan')
                ->inputMode('text'), // Digunakan untuk stasiun sebagai string
            Forms\Components\TextInput::make('status_tujuan')
                ->required()
                ->label('Status Tujuan')
                ->inputMode('text'), // Digunakan untuk status sebagai string
            Forms\Components\TextInput::make('nomor_kursi')
                ->required()
                ->label('Nomor Kursi')
                ->inputMode('numeric'), // Bisa tetap numeric jika ingin memvalidasi input angka
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('tiket_id')
                ->label('ID Tiket')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('jadwal_kereta')
                ->label('Jadwal Kereta')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('stasiun_keberangkatan')
                ->label('Stasiun Keberangkatan')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('status_tujuan')
                ->label('Status Tujuan')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('nomor_kursi')
                ->label('Nomor Kursi')
                ->sortable()
                ->searchable(),
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
