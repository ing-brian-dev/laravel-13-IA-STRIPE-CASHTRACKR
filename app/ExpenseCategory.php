<?php

namespace App;


enum ExpenseCategory: string
{
    case Food = 'food';
    case Transportation = 'transportation';
    case Health = 'health';
    case Entertainment = 'entertainment';
    case Subscriptions = 'subscriptions';
    case Beauty = 'beauty';
    case Clothing = 'clothing';
    case Home = 'home';
    case Education = 'education';
    case Pets = 'pets';
    case Other = 'other';

    public function label(): string
    {
        return match($this) {
            self::Food => 'Comida y Despensa',
            self::Transportation => 'Transporte',
            self::Health => 'Salud',
            self::Entertainment => 'Entretenimiento',
            self::Subscriptions => 'Suscripciones',
            self::Beauty => 'Belleza y Cuidado Personal',
            self::Clothing => 'Ropa y Calzado',
            self::Home => 'Hogar',
            self::Education => 'Educación',
            self::Pets => 'Mascotas',
            self::Other => 'Gastos Varios',
        };
    }

    public function color(): string
    {
        return match($this) {
            self::Food => 'bg-orange-500 text-orange-100',
            self::Transportation => 'bg-blue-500 text-blue-100',
            self::Health => 'bg-red-500 text-red-100',
            self::Entertainment => 'bg-purple-500 text-purple-100',
            self::Subscriptions => 'bg-indigo-500 text-indigo-100',
            self::Beauty => 'bg-pink-500 text-pink-100',
            self::Clothing => 'bg-yellow-500 text-yellow-100',
            self::Home => 'bg-teal-500 text-teal-100',
            self::Education => 'bg-cyan-500 text-cyan-100',
            self::Pets => 'bg-amber-500 text-amber-100',
            self::Other => 'bg-gray-500 text-gray-100',
        };
    }
}
