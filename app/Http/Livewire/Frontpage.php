<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;

class Frontpage extends Component
{
    public $title;
    public $content;
    public $slug;
    public $isCybersecurityOnePage;
    public $isCybersecurityTwoPage;
    
    /**
     * The livewire mount function.
     *
     * @param  mixed $urlslug
     * @return void
     */
    public function mount($urlslug = null){
        $this->retrieveContent($urlslug);
    }
    
    /**
     * Retrieves the contents of the page.
     *
     * @param  mixed $urlslug
     * @return void
     */
    public function retrieveContent($urlslug){
        //Get home page if slug is empty
        if (empty($urlslug)){
            $data = Page::where('is_default_home', true)->first();
        } else {
            //Get the page according to the url slug value
            $data = Page::where('slug', $urlslug)->first();

            //if we can't retrieve anything, get the default error page
            if(!$data){
                $data = Page::where('is_default_not_found', true)->first();
            }
        }

        $this->title = $data->title;
        $this->content = $data->content;
        $this->slug = $data->slug;
        $this->isCybersecurityOnePage = !$data->is_cybersec_one ? null:true; 
        $this->isCybersecurityTwoPage = !$data->is_cybersec_two ? null:true;
        
    }
   
    /**
     * The livewire render function
     *
     * @return void
     */

    public function render()
    {
        return view('livewire.frontpage')->layout('layouts.frontpage');
    }
}
