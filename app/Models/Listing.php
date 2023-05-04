<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'beds',
        'baths',
        'area',
        'city',
        'code',
        'street',
        'street_nr',
        'price',
    ];

    public function owner(): BelongsTo {
        return $this->belongsTo(\App\Models\User::class, 'by_user_id');
    }

    public function scopeMostRecent(Builder $query): void {
        $query->orderByDesc('created_at');
    }

    public function scopeFilters(Builder $query, array $filters): void {
        $query->when(
            $filters['priceFrom'] ?? false,
            fn ($query, $value) => $query->where('price', '>=', $value))
            ->when(
                $filters['priceTo'] ?? false,
                fn ($query, $value) => $query->where('price', '<=', $value))
            ->when(
                $filters['beds'] ?? false,
                fn ($query, $value) => $query->where('beds', (int) $value < 6 ? '=' : '>=', $value))
            ->when(
                $filters['baths'] ?? false,
                fn ($query, $value) => $query->where('baths', (int) $value < 6 ? '=' : '>=', $value))
            ->when(
                $filters['areaFrom'] ?? false,
                fn ($query, $value) => $query->where('area', '>=', $filters['areaFrom']))
            ->when(
                $filters['areaTo'] ?? false,
                fn ($query, $value) => $query->where('area', '<=', $filters['areaTo']));
    }
}
