<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentsResource\Pages;
use App\Filament\Resources\StudentsResource\RelationManagers;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Card;
use App\Models\Students;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentsResource extends Resource
{
    protected static ?string $model = Students::class;
    protected static ?string $navigationGroup = 'Data Master';
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('nis')->rules(['required','numeric'])->unique(ignorable:fn($record) => $record),
                Forms\Components\TextInput::make('name')->rules(['required']),
                Select::make('gender')->rules(['required'])
                ->options([
                    'male' => 'Male',
                    'female' => 'Female',
                ]),
                DatePicker::make('date_of_birth')->rules(['required']),
                Forms\Components\Textarea::make('address'),
                ])  
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nis')->searchable(),
                TextColumn::make('name')->searchable(),
                TextColumn::make('gender'),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudents::route('/create'),
            'edit' => Pages\EditStudents::route('/{record}/edit'),
        ];
    }
}
