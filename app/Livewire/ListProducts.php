<?php

namespace App\Livewire;

use App\Models\Product;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ListProducts extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Product::query())
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('brand')->searchable(),
                TextColumn::make('color')->searchable(),
                TextColumn::make('price')->searchable(),
            ])
            ->headerActions([
                // Menggunakan CreateAction bawaan dengan modal
                CreateAction::make()->form([
                    TextInput::make('name')->required(),
                    TextInput::make('brand')->required(),
                    TextInput::make('color')->required(),
                    TextInput::make('price')->required()->numeric(),
                ]),
            ])
            ->actions([
                // Menggunakan EditAction bawaan dengan modal
                EditAction::make()->form([
                    TextInput::make('name')->required(),
                    TextInput::make('brand')->required(),
                    TextInput::make('color')->required(),
                    TextInput::make('price')->required()->numeric(),
                ]),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public function render(): View
    {
        return view('livewire.list-products');
    }
}
