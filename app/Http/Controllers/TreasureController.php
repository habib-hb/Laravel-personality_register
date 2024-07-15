<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TreasureController extends Controller {
    public function create(){

        // $treasure_query = DB::select('SELECT quote FROM users INNER JOIN personality_type_store ON users.id = personality_type_store.user_id INNER JOIN personality_type ON personality_type_store.personality_type_identifier_int = personality_type.identifier_int INNER JOIN personality_type_based_quotes ON personality_type_based_quotes.personality_type_identifier_int = personality_type.identifier_int WHERE users.id = ?', [auth()->user()->id]);



        // session_start();

        // isset($_SESSION['current_quote_int']) ?
        // // When Session Exists
        // $_SESSION['current_quote_int'] == 9 ?
        // $_SESSION['current_quote_int'] = 0 :
        // $_SESSION['current_quote_int'] += 1 :
        // // When Session Does Not Exist
        //  $_SESSION['current_quote_int'] = 0;

        // $current_quote = $treasure_query[$_SESSION['current_quote_int']]->quote;

        // // dd($current_quote);

        return view('treasure');

    }
}
?>
