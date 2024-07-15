<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Quoter extends Component
{
    public $database_files = [];
    public $current_quote = "Starter";
    public $current_session_int;
    public $treasure_theme_mode = 'dark';


    // Initial $current_quote setup
    public function mount(){
        $this->quoteHunter();

        // $this->current_quote = $this->database_files[0]->quote ; // isset($_SESSION['current_quote_int']) ? $this->database_files[$_SESSION['current_quote_int']]->quote :
    }

    public function change_treasure_theme_mode(){
        $this->treasure_theme_mode == 'light' ? $this->treasure_theme_mode = 'dark' : $this->treasure_theme_mode = 'light';
    }



    public function quoteHunter(){
        // Database stuffs
        if($this->database_files == []){
        $treasure_query = DB::select('SELECT quote FROM users INNER JOIN personality_type_store ON users.id = personality_type_store.user_id INNER JOIN personality_type ON personality_type_store.personality_type_identifier_int = personality_type.identifier_int INNER JOIN personality_type_based_quotes ON personality_type_based_quotes.personality_type_identifier_int = personality_type.identifier_int WHERE users.id = ?', [auth()->user()->id]);

        $this->database_files = $treasure_query;
        }



        session_start();

        isset($_SESSION['current_quote_int']) ?
        // When Session Exists
        $_SESSION['current_quote_int'] == count($this->database_files) - 1 ?
        $_SESSION['current_quote_int'] = 0 :
        $_SESSION['current_quote_int'] += 1 : // This (:) is the else block sign for the very first ? condition
        // When Session Does Not Exist
         $_SESSION['current_quote_int'] = 0;

        $this->current_quote = $this->database_files[$_SESSION['current_quote_int']]->quote;

        $this->current_session_int = $_SESSION['current_quote_int'];

    }

    public function render()
    {

        return view('livewire.quoter' , ['current_quote' => $this->current_quote, 'current_session_int' => $this->current_session_int , 'total_quotes' => count($this->database_files) , 'is_hidden' => 'no' , 'treasure_theme_mode' => $this->treasure_theme_mode ]);

    }
}
