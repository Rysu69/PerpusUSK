<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengunjungResource\Pages;
use App\Filament\Resources\PengunjungResource\RelationManagers;
use App\Models\Pengunjung;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengunjungResource extends Resource
{
    //model yang digunakan
    protected static ?string $model = Pengunjung::class;

    //label
    protected static ?string $navigationIcon = 'heroicon-o-user';

    //mengatur form
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //nama
                Forms\Components\TextInput::make('name')
                    ->required(),
                //email
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),
                //password
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required(),
                //konfirmasi password
                Forms\Components\TextInput::make('password_confirmation')
                    ->password()
                    ->same('password')
                    ->required(),
            ]);
    }

    //mengatur tabel
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //id
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                //nama
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                //email
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
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
            'index' => Pages\ListPengunjungs::route('/'),
            'create' => Pages\CreatePengunjung::route('/create'),
            'edit' => Pages\EditPengunjung::route('/{record}/edit'),
        ];
    }
}
