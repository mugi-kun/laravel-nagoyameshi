<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitedController extends Controller
{
    public function store($shop_id)
    {
        Auth::user()->visite_shops()->attach($shop_id);

        return back();
    }

    public function destroy($shop_id)
    {
        Auth::user()->visite_shops()->detach($shop_id);

        return back();
    }
}
