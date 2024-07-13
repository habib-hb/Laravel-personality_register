<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class HomeController extends Controller{

    public function create(){
        // Extracting personality from DB
        $personality_query = DB::select('SELECT personality_string FROM users INNER JOIN personality_type_store ON users.id = personality_type_store.user_id INNER JOIN personality_type ON personality_type_store.personality_type_identifier_int = personality_type.identifier_int WHERE users.id = ?', [auth()?->user()?->id]) ?? null;

        $personality = $personality_query ? $personality_query[0]->personality_string : null;


        return view('home' , ['personality' => $personality , 'theme_mode' => session('theme_mode') ?? 'light']);
    }
}


?>
