<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\ProjectClass;
use App\Models\Language;

class IndexController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(): View
    {
        return view('index');
    }
}
