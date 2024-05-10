<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function catalogView($types, $categories = null)
    {
        $catalog = Application::getCatalog($types, $categories);

        return view('catalog', compact('catalog'));
    }

}
