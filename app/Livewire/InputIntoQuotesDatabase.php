<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class InputIntoQuotesDatabase extends Component
{
    public $personality = '1'; // It's getting modeled from the select input field in the livewire view

    public $personality_list = [
        '1' => 'Extrovertion',
        '2' => 'Agreeableness',
        '3' => 'Openness',
        '4' => 'Conscientiousness',
        '5' => 'Neuroticism',];

    public $quote_input;

    public $database_files_personality_quote_single_type = [];


    // Extracting Data from extroversion database table
    public function mount()
    {
        $this->database_files_personality_quote_single_type = DB::select('SELECT * FROM personality_type_based_quotes WHERE personality_type_identifier_int = ? ORDER BY id DESC', [intval($this->personality)]); // default is "1"
    }



    // Restarting Purpose method
    #[On('restart')]
    public function restart(){

        // It's just for rerendering this component's purpose


     }



     // Select Personality Type method Data changing purpose
     #[On('select_personality_based_data_change')]
     public function select_personality_based_data_change($personality){

        $this->personality = $personality;

        $this->database_files_personality_quote_single_type = DB::select('SELECT * FROM personality_type_based_quotes WHERE personality_type_identifier_int = ? ORDER BY id DESC', [intval($this->personality)]);
     }








    public function submit(){

        $this->validate([
            'personality' => 'required',
            'quote_input' => 'required',
        ]);


        DB::insert('INSERT INTO personality_type_based_quotes (personality_type_identifier_int , quote) VALUES (?, ?)' , [intval($this->personality) , $this->quote_input]);

        session()->flash('message', 'Your Quote has been saved successfully. ' . $this->personality_list[$this->personality] . ' personality type : "' . $this->quote_input . '"');

        // Reset form fields
        $this->quote_input = null;

         // Restating the Quote List
         $this->database_files_personality_quote_single_type = DB::select('SELECT * FROM personality_type_based_quotes WHERE personality_type_identifier_int = ? ORDER BY id DESC', [intval($this->personality)]);
    }



    // Delete Quote from database
    #[On('delete_quote')]
    public function delete_quote($id){

        DB::delete('DELETE FROM personality_type_based_quotes WHERE id = ?', [$id]);

        // Sending a flash message
        session()->flash('message', 'Quote deleted successfully.');

        // Restating the Quote List
        $this->database_files_personality_quote_single_type = DB::select('SELECT * FROM personality_type_based_quotes WHERE personality_type_identifier_int = ? ORDER BY id DESC', [intval($this->personality)]);

    }



    // Edit Quote
    #[On('edit_quote_submit')]
    public function edit_quote_submit($id , $quote){

        try{

            DB::update('UPDATE personality_type_based_quotes SET quote = ? WHERE id = ?', [$quote , $id]);

            // Sending a flash message
            session()->flash('message', 'Quote updated successfully.' . ' New Quote : "' . $quote . '"');

            // Restating the Quote List
            $this->database_files_personality_quote_single_type = DB::select('SELECT * FROM personality_type_based_quotes WHERE personality_type_identifier_int = ? ORDER BY id DESC', [intval($this->personality)]);

        } catch (\Exception $e) {
            // Handle any errors that may occur
            session()->flash('error', 'An error occurred while updating the quote.');
        }
    }


    public function render()
    {
        return view('livewire.input-into-quotes-database' , ['theme_mode' => session('theme_mode') ?? 'light',
        'current_personality_name' => $this->personality_list[$this->personality]]);
    }
}
