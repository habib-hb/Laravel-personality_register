<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class InputIntoQuotesDatabase extends Component
{
    public $personality = '1';
    public $quote_input;



    public function submit(){

        $this->validate([
            'personality' => 'required',
            'quote_input' => 'required',
        ]);


        DB::insert('INSERT INTO personality_type_based_quotes (personality_type_identifier_int , quote) VALUES (?, ?)' , [intval($this->personality) , $this->quote_input]);

        session()->flash('message', 'Your Quote has been saved successfully.');

        // Reset form fields
        $this->reset();
    }


    public function render()
    {
        return view('livewire.input-into-quotes-database');
    }
}
