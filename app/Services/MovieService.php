<?php

namespace App\Services;

use App\Models\Movie;
use Illuminate\Pagination\LengthAwarePaginator;

class MovieService
{
    public function getMoviesWithSearch(?string $searchTerm = null, int $perPage = 6): LengthAwarePaginator
    {
        $query = Movie::latest();

        if ($searchTerm) {
            $query->where('judul', 'like', '%' . $searchTerm . '%')
                  ->orWhere('sinopsis', 'like', '%' . $searchTerm . '%');
        }

        return $query->paginate($perPage)->withQueryString();
    }
}
