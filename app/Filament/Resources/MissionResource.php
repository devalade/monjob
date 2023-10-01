<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MissionResource\Pages;
use App\Filament\Resources\MissionResource\RelationManagers;
use App\Forms\Components\MapBox;
use App\Models\Mission;
use App\Models\MissionCategory;
use App\Models\MissionStatus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class MissionResource extends Resource
{
    protected static ?string $model = Mission::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            TextEntry::make('location')
            ->label('Location')
        ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Forms\Components\Wizard\Step::make('Details')->schema([
                        Forms\Components\TextInput::make('name')
                            ->maxLength(200)
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('description')
                            ->maxLength(2000)
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Select::make('mission_category_id')
                            ->label('Category')
                            ->options(MissionCategory::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('mission_status_id')
                            ->label('Status')
                            ->options(MissionStatus::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        MapBox::make('name')
                    ]),
                    Forms\Components\Wizard\Step::make('Participant Settings')->schema([
                        Forms\Components\TextInput::make('latitude')
                            ->numeric()
                            ->required(),
                        Forms\Components\TextInput::make('longitude')
                            ->numeric()
                            ->required(),
                        Forms\Components\DateTimePicker::make('date_and_time')
                            ->afterOrEqual(now())
                            ->required(),
                        Forms\Components\DatePicker::make('registration_deadline')
                            ->required(),
                        Forms\Components\TextInput::make('capacity')
                            ->numeric()
                            ->minLength(1)
                            ->maxValue(10)
                            ->required(),
                        Forms\Components\TextInput::make('resources')
                            ->label('Resouces/Materials')
                            ->required(),
                        Forms\Components\TextInput::make('tags')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                    Forms\Components\Wizard\Step::make('Additional Information')->schema([
                        Forms\Components\FileUpload::make('photos')
                            ->image()
                            ->minSize(512)
                            ->maxSize(1024)
                            ->nullable()
                        ,
                        Forms\Components\FileUpload::make('videos')
                            ->minSize(512)
                            ->maxSize(1024)
                            ->nullable(),
                        Forms\Components\TextInput::make('notes')
                            ->nullable()
                    ])
                ])->columnSpanFull(),
            ]);
    }

    /**
     * @throws \Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Nom')
                ->searchable(),


            ])
            ->filters([
                SelectFilter::make('mission_category_id')
                    ->label('Category')
                    ->relationship('missionCategory', 'name')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('mission_status_id')
                    ->label('Status')
                    ->relationship('missionStatus', 'name')
                    ->searchable()
                    ->preload()

            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('participants')
                    ->icon('heroicon-o-users')
                ->url(fn (Mission $record): string => self::getUrl('participants', compact('record'))),
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
            'index' => Pages\ListMissions::route('/'),
            'create' => Pages\CreateMission::route('/create'),
            'view' => Pages\ViewMission::route('/{record}'),
            'edit' => Pages\EditMission::route('/{record}/edit'),
            'participants' => Pages\Participants::route('/{record}/participants'),
        ];
    }
}
