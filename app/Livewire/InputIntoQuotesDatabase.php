<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class InputIntoQuotesDatabase extends Component
{
    public $personality = '1'; // It's getting modeled from the input field in the livewire view

    public $quote_input;

    public $database_files_personality_quote_single_type = [];

    // Extracting Data from extroversion database table
    public function mount()
    {
        $this->database_files_personality_quote_single_type = DB::select('SELECT * FROM personality_type_based_quotes WHERE personality_type_identifier_int = ?', [intval($this->personality)]); // default is "1"
    }




    public function submit(){

        $this->validate([
            'personality' => 'required',
            'quote_input' => 'required',
        ]);


        DB::insert('INSERT INTO personality_type_based_quotes (personality_type_identifier_int , quote) VALUES (?, ?)' , [intval($this->personality) , $this->quote_input]);

        session()->flash('message', 'Your Quote has been saved successfully.');

        // Reset form fields
        $this->quote_input = null;
    }



    // Delete Quote from database
    public function deleteQuote($id){

        DB::delete('DELETE FROM personality_type_based_quotes WHERE id = ?', [$id]);

        // Sending a flash message
        session()->flash('message', 'Quote deleted successfully.');

        // Restating the Quote List
        $this->database_files_personality_quote_single_type = DB::select('SELECT * FROM personality_type_based_quotes WHERE personality_type_identifier_int = ?', [intval($this->personality)]);

    }

    

    public function render()
    {
        return view('livewire.input-into-quotes-database' ); //, ['database_files_personality_quote_single_type' => $this->database_files_personality_quote_single_type]
    }
}
