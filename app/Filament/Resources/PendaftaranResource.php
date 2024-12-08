<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Pendaftaran;
use Filament\Resources\Resource;
use App\Filament\Resources\PendaftaranResource\Pages;

class PendaftaranResource extends Resource
{
    protected static ?string $model = Pendaftaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('nama')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('email')
                ->email()
                ->required(),
            Forms\Components\TextInput::make('nomor_identifikasi')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('nomor_telepon')
                ->tel()
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('registrasi_id')->label('ID'),
            Tables\Columns\TextColumn::make('nama')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('nomor_identifikasi')->label('Nomor Identifikasi'),
            Tables\Columns\TextColumn::make('nomor_telepon')->label('Nomor Telepon'),
            Tables\Columns\TextColumn::make('created_at')->label('Dibuat Pada')->dateTime(),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
            // Add more bulk actions here if needed
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
            'index' => Pages\ListPendaftarans::route('/'),
            'create' => Pages\CreatePendaftaran::route('/create'),
            'edit' => Pages\EditPendaftaran::route('/{record}/edit'),
        ];
    }
}
