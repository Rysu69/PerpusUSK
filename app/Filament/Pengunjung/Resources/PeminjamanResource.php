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

    //model yang digunakan
    protected static ?string $model = Peminjaman::class;

    //icon navigasi
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    //label
    protected static ?string $label = 'Daftar Peminjaman';


    //mengatur apakah user bisa mengedit data
    public static function canEdit(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return false;
    }

    //mengatur form
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //id buku
                Forms\Components\Select::make('id_buku')
                //mengambil judul buku dari id buku
                    ->options(function () {
                        return \App\Models\Buku::pluck('judul', 'id');
                    })
                    ->disabled(fn () => request()->route('record') !== null)
                    ->required(),
                //id pengunjung langsung terinput dari session user
                Forms\Components\Hidden::make('id_pengunjung')
                    ->default(fn () => Auth::user()->id)
                    ->required(),
                //tanggal peminjaman
                Forms\Components\DatePicker::make('tanggal_peminjaman')
                    ->disabled(fn () => request()->route('record') !== null)
                    ->required(),
                //tanggal terakhir pengembalian
                Forms\Components\DatePicker::make('tanggal_terakhir_pengembalian')
                    ->disabled(fn () => request()->route('record') !== null)
                    ->required(),
            ]);
    }

    //mengatur tabel
    public static function table(Table $table): Table
    {
        return $table
                ->columns([
                //menampilkan judul buku dari id buku
                Tables\Columns\TextColumn::make('id_buku')
                    ->label('Buku')
                    ->getStateUsing(function ($record) {
                        return \App\Models\Buku::find($record->id_buku)?->judul;
                    })
                    ->searchable()
                    ->sortable(),
                //menampilkan nama pengunjung dari id pengunjung
                Tables\Columns\TextColumn::make('id_pengunjung')
                    ->label('Nama Peminjam')
                    ->getStateUsing(function ($record) {
                        return \App\Models\Pengunjung::find($record->id_pengunjung)?->name;
                    })
                    ->searchable()
                    ->sortable(),
                //tanggal peminjaman
                Tables\Columns\TextColumn::make('tanggal_peminjaman')
                    ->date()
                    ->sortable(),
                //tanggal terakhir pengembalian
                Tables\Columns\TextColumn::make('tanggal_terakhir_pengembalian')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
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
