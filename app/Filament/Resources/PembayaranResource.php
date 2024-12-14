<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Pembayaran;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PembayaranResource\Pages;
use App\Filament\Resources\PembayaranResource\RelationManagers;

class PembayaranResource extends Resource
{
    protected static ?string $model = Pembayaran::class;
    protected static ?string $navigationLabel = 'Transaksi';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('registrasi_id')
                ->relationship('pendaftaran', 'nama') // Relasi ke tabel Pendaftarans
                ->required()
                ->label('Nama Pendaftar'),
            Forms\Components\TextInput::make('kode_pembayaran')
                ->required()
                ->maxLength(20),
            Forms\Components\TextInput::make('metode_pembayaran')
                ->required()
                ->maxLength(30),
            Forms\Components\DateTimePicker::make('waktu_pembayaran')
                ->required()
                ->label('Waktu Pembayaran'),
            Forms\Components\TextInput::make('status_pembayaran')
                ->required()
                ->maxLength(35)
                ->label('Status Pembayaran'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('registrasi_id')
                ->label('ID Registrasi')
                ->sortable(),
            Tables\Columns\TextColumn::make('pendaftaran.nama')
                ->label('Nama Pendaftar')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('kode_pembayaran')
                ->label('Kode Pembayaran')
                ->sortable(),
            Tables\Columns\TextColumn::make('metode_pembayaran')
                ->label('Metode Pembayaran'),
            Tables\Columns\TextColumn::make('waktu_pembayaran')
                ->label('Waktu Pembayaran')
                ->dateTime(),
            Tables\Columns\TextColumn::make('status_pembayaran')
                ->label('Status Pembayaran'),
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
            'index' => Pages\ListPembayarans::route('/'),
            'create' => Pages\CreatePembayaran::route('/create'),
            'edit' => Pages\EditPembayaran::route('/{record}/edit'),
        ];
    }
}
