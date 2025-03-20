<?php

namespace App\Filament\Pengunjung\Resources;

use App\Filament\Pengunjung\Resources\PeminjamanResource\Pages;
use App\Filament\Pengunjung\Resources\PeminjamanResource\RelationManagers;
use App\Models\Peminjaman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class PeminjamanResource extends Resource
{
    protected static ?string $model = Peminjaman::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_buku')
                    ->options(function () {
                        return \App\Models\Buku::pluck('judul', 'id');
                    })
                    ->disabled(fn () => request()->route('record') !== null)
                    ->required(),
                Forms\Components\Hidden::make('id_pengunjung')
                    ->default(fn () => Auth::user()->id)
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_peminjaman')
                    ->disabled(fn () => request()->route('record') !== null)
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_terakhir_pengembalian')
                    ->disabled(fn () => request()->route('record') !== null)
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_pengembalian'),
                Forms\Components\Select::make('status')
                    ->options([
                        'dipinjam' => 'Dipinjam',
                        'dikembalikan' => 'Dikembalikan',
                        'terlambat' => 'Terlambat',
                    ])
                    ->default('dipinjam')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
                ->columns([
                Tables\Columns\TextColumn::make('id_buku')
                    ->label('Buku')
                    ->getStateUsing(function ($record) {
                        return \App\Models\Buku::find($record->id_buku)?->judul;
                    })
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_peminjaman')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_terakhir_pengembalian')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_pengembalian')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPeminjamen::route('/'),
            'create' => Pages\CreatePeminjaman::route('/create'),
            'edit' => Pages\EditPeminjaman::route('/{record}/edit'),
        ];
    }
}
