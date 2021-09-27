<?php

namespace App\Http\Livewire;

use Illuminate\Validation\Rule;
use App\Models\Page;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Pages extends Component
{
    use WithPagination;
    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;
    public $slug;
    public $title;
    public $content;
    public $isCybersecurityOnePage;
    public $isCybersecurityTwoPage;
    public $hasLaboratory;
    public $server;

    /**npm
     *
     * @return void
     */
    public function rules(){
        return [
            'title' => 'required',
            'slug' => ['required', Rule::unique('pages', 'slug')->ignore($this->modelId)],
            'content' => 'required',
        ];
    }
    
    /**
     * The livewire mount function
     *
     * @return void
     */
    public function mount(){

        // Resets the pagination after reloading the page
        $this->resetPage();
    }
    
    /**
     * Runs evertime the title variable is updated.
     *
     * @param  mixed $value
     * @return void
     */
    public function updatedTitle($value){
        $this->slug = Str::slug($value);
    }
    
    /**
     * The create function.
     *
     * @return void
     */
    public function create(){
        $this->validate();
        $this->unassignCybersecurityOnePage(); 
        $this->unassignCybersecurityTwoPage();
        Page::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
    }

    /**
     * The read function.
     *
     * @return void
     */
    public function read(){
        return Page::paginate(5);
    }
            
    /**
     * The update function.
     *
     * @return void
     */
    public function update(){
        $this->validate();
        $this->unassignCybersecurityOnePage(); 
        $this->unassignCybersecurityTwoPage();
        Page::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }
    
    /**
     * The delete function.
     *
     * @return void
     */
    public function delete(){
        Page::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();
    }
    
    /**
     * Show the form modal
     * of the create function.
     * @return void
     */
    public function createShowModal(){
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }
        
    /**
     * shows the contents and uses id as reference.
     * This function is a form for update.
     * @param  mixed $id
     * @return void
     */
    public function updateShowModal($id){
        $this->resetValidation();
        $this->reset();
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
    }
    
    public function updatedIsCybersecurityOnePage(){
        $this->isCybersecurityTwoPage = null;
    } 

    public function updatedIsCybersecurityTwoPage(){
        $this->isCybersecurityOnePage = null;
    }

    /**
     * Shows the delete confirmation
     * modal of the delete function.
     * @param  mixed $id
     * @return void
     */
    public function deleteShowModal($id){
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }
    
    /**
     * loads the model data
     * of this component.
     * @return void
     */
    public function loadModel(){
        $data = Page::find($this->modelId);
        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->content = $data->content;
        $this->hasLaboratory = !$data->hasLaboratory ? null:true;
        $this->server = $data->server;
        $this->isCybersecurityOnePage = !$data->is_cybersec_one ? null:true; 
        $this->isCybersecurityTwoPage = !$data->is_cybersec_two ? null:true;
    }
    
    /**
     * The data for the model mapped
     * in this component.
     * @return void
     */
    public function modelData(){
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'has_laboratory' => $this->hasLaboratory,
            'server' => $this->server,
            'is_cybersec_one' => $this->isCybersecurityOnePage, 
            'is_cybersec_two' => $this->isCybersecurityTwoPage, 
        ];
    }

    public function modelDataLab(){
        return [
            'title' => $this->title,
            'slug' => $this->slug,
        ];
    }
    
   
    private function unassignCybersecurityOnePage(){
        if ($this->isCybersecurityOnePage != null){
            Page::where('is_cybersec_one', true)->update([
                'is_cybersec_one' => true, 
            ]);
        }
    }
    
   
     private function unassignCybersecurityTwoPage(){
        if ($this->isCybersecurityTwoPage != null){
            Page::where('is_cybersec_two', true)->update([
                'is_cybersec_two' => true, 
            ]);
        }
    }


    /**
     * the livewire render function.
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.pages', [
            'data' => $this->read(),
        ]);
    }
}
