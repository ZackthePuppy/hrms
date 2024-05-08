<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Models\Employee;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('first_name')->required(),
                TextInput::make('last_name')->required(),
                TextInput::make('phone')->required(),
                TextInput::make('email')->required(),
                TextInput::make('position')->required(),
                // TextInput::make('department')->required(),
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Select::make('department_id')
                            ->label('Hatdog')
                            ->relationship('department', 'name')
                            ->native(false)
                    ])->columnSpan(1),
                TextInput::make('username')->required(),
                TextInput::make('password')->password(),
                TextInput::make('address')->required()->columnspan(2),
            ])->columns((2));
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')->searchable()->sortable(),
                TextColumn::make('last_name')->searchable()->sortable(),
                TextColumn::make('phone')->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('position')->searchable(),
                TextColumn::make('department')->searchable(),
                TextColumn::make('username')->searchable()->hidden(),
                TextColumn::make('address')->searchable()->hidden(),
                //
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageEmployees::route('/'),
        ];
    }
}
