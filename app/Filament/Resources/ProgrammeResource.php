<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgrammeResource\Pages;
use App\Models\Programme;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ProgrammeResource extends Resource
{
    protected static ?string $model = Programme::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    
    protected static ?string $navigationLabel = 'Programmes';
    
    protected static ?string $modelLabel = 'Programme';
    
    protected static ?string $pluralModelLabel = 'Programmes';
    
    protected static ?string $navigationGroup = 'Gestion LMS';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informations générales')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Titre')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $context, $state, Forms\Set $set) => $context === 'create' ? $set('slug', Str::slug($state)) : null),
                        
                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        
                        Forms\Components\Textarea::make('short_description')
                            ->label('Description courte')
                            ->maxLength(500)
                            ->rows(3),
                        
                        Forms\Components\RichEditor::make('description')
                            ->label('Description complète')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('Métadonnées')
                    ->schema([
                        Forms\Components\Select::make('category')
                            ->label('Catégorie')
                            ->options([
                                'science' => 'Science',
                                'technology' => 'Technologie',
                                'mathematics' => 'Mathématiques',
                                'programming' => 'Programmation',
                                'design' => 'Design',
                                'business' => 'Business',
                                'languages' => 'Langues',
                                'other' => 'Autre',
                            ])
                            ->searchable(),
                        
                        Forms\Components\Select::make('difficulty_level')
                            ->label('Niveau de difficulté')
                            ->options([
                                1 => 'Débutant',
                                2 => 'Facile',
                                3 => 'Intermédiaire',
                                4 => 'Avancé',
                                5 => 'Expert',
                            ])
                            ->required(),
                        
                        Forms\Components\TextInput::make('estimated_hours')
                            ->label('Durée estimée (heures)')
                            ->numeric()
                            ->minValue(1),
                        
                        Forms\Components\Select::make('language')
                            ->label('Langue')
                            ->options([
                                'fr-FR' => 'Français',
                                'en-US' => 'Anglais',
                                'es-ES' => 'Espagnol',
                            ])
                            ->default('fr-FR'),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('Médias')
                    ->schema([
                        Forms\Components\TextInput::make('cover_image_url')
                            ->label('URL image de couverture')
                            ->url(),
                        
                        Forms\Components\TextInput::make('icon_url')
                            ->label('URL icône')
                            ->url(),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('Configuration')
                    ->schema([
                        Forms\Components\Toggle::make('is_published')
                            ->label('Publié')
                            ->default(false),
                        
                        Forms\Components\Toggle::make('is_free')
                            ->label('Gratuit')
                            ->default(true)
                            ->live(),
                        
                        Forms\Components\TextInput::make('price')
                            ->label('Prix (€)')
                            ->numeric()
                            ->minValue(0)
                            ->hidden(fn (Forms\Get $get): bool => $get('is_free')),
                        
                        Forms\Components\TagsInput::make('tags')
                            ->label('Tags')
                            ->separator(','),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image_url')
                    ->label('Image')
                    ->circular()
                    ->defaultImageUrl(fn($record) => 'https://ui-avatars.com/api/?name=' . urlencode($record->title) . '&color=7C3AED&background=EDE9FE'),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('category')
                    ->label('Catégorie')
                    ->badge()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('difficulty_level')
                    ->label('Niveau')
                    ->formatStateUsing(fn ($state) => match($state) {
                        1 => 'Débutant',
                        2 => 'Facile', 
                        3 => 'Intermédiaire',
                        4 => 'Avancé',
                        5 => 'Expert',
                        default => 'N/A'
                    })
                    ->badge()
                    ->color(fn ($state) => match($state) {
                        1 => 'success',
                        2 => 'info',
                        3 => 'warning', 
                        4 => 'danger',
                        5 => 'gray',
                        default => 'gray'
                    })
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('enrolled_count')
                    ->label('Inscrits')
                    ->numeric()
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Publié')
                    ->boolean()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('is_free')
                    ->label('Prix')
                    ->formatStateUsing(fn ($state, $record) => $state ? 'Gratuit' : $record->price . '€')
                    ->badge()
                    ->color(fn ($state) => $state ? 'success' : 'warning'),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Catégorie'),
                
                Tables\Filters\SelectFilter::make('difficulty_level')
                    ->label('Niveau')
                    ->options([
                        1 => 'Débutant',
                        2 => 'Facile',
                        3 => 'Intermédiaire', 
                        4 => 'Avancé',
                        5 => 'Expert',
                    ]),
                
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Publié'),
                
                Tables\Filters\TernaryFilter::make('is_free')
                    ->label('Gratuit'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProgrammes::route('/'),
            'create' => Pages\CreateProgramme::route('/create'),
            'view' => Pages\ViewProgramme::route('/{record}'),
            'edit' => Pages\EditProgramme::route('/{record}/edit'),
        ];
    }
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
