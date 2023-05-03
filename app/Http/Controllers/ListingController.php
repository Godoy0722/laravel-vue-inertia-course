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

    public function create()
    {
//        $this->authorize('create', Listing::class);

        return inertia('Listing/Create');
    }

    public function store(Request $request)
    {
        $request->user()->listings()->create(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:10000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );

        return redirect()->route('listings.index')
            ->with('success', 'Listing was created');
    }

    public function show(Listing $listing)
    {
//        $this->authorize('view', $listing);

        return inertia('Listing/Show', ['listing' => $listing]);
    }

    public function edit(Listing $listing)
    {
        return inertia('Listing/Edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing)
    {
        $listing->update($request->validate([
            'beds' => 'required|integer|min:0|max:20',
            'baths' => 'required|integer|min:0|max:20',
            'area' => 'required|integer|min:15|max:1500',
            'city' => 'required',
            'code' => 'required',
            'street' => 'required',
            'street_nr' => 'required|min:1|max:10000',
            'price' => 'required|integer|min:1|max:20000000',
        ]));

        return redirect()->route('listings.index')
            ->with('success', 'Listing was updated');
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect()->back()
            ->with('success', 'Listing was deleted');
    }
}
