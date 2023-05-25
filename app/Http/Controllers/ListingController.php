<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(Request $request)
    {
        $filters = $request->only(['priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo']);

        $query = Listing::latest()
            ->filters($filters)
            ->paginate(10)
            ->withQueryString();

        return inertia('Listing/Index', [
            'filters' => $filters,
            'listings' => $query
        ]);
    }

    public function show(Listing $listing)
    {
//        $this->authorize('view', $listing);
        $listing->load(['images']);

        return inertia('Listing/Show', ['listing' => $listing]);
    }
}
