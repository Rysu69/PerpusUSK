<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BukuResource\Pages;
use App\Filament\Resources\BukuResource\RelationManagers;
use App\Models\Buku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BukuResource extends Resource
{
    //model yang digunakan
    protected static ?string $model = Buku::class;

    //icon navigasi
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    //label
    protected static ?string $label = 'Buku';

    //mengatur form
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //judul
                Forms\Components\TextInput::make('judul')
                    ->required(),
                //pengarang
                Forms\Components\TextInput::make('pengarang')
                    ->required(),
                //penerbit
                Forms\Components\TextInput::make('penerbit')
                    ->required(),
                //tahun terbit
                Forms\Components\TextInput::make('tahun_terbit')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //judul
                Tables\Columns\TextColumn::make('judul')
                    ->searchable(),
                //pengarang
                Tables\Columns\TextColumn::make('pengarang')
                    ->searchable(),
                //penerbit
                Tables\Columns\TextColumn::make('penerbit')
                    ->searchable(),
                //tahun terbit
                Tables\Columns\TextColumn::make('tahun_terbit')
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
            'index' => Pages\ListBukus::route('/'),
            'create' => Pages\CreateBuku::route('/create'),
            'edit' => Pages\EditBuku::route('/{record}/edit'),
        ];
    }
}
