<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class RisetsComponent extends Component
{
    public $deleteName, $deleteID, $deleter;
    public  $paginate = 10, $query = '';
    use WithPagination;
     // refresh page on search
     public function search(){
        $this->resetPage();
    }
    public function closeDelete(){
        $this->deleter = false;
        $this->deleteName = null;
        $this->deleteID = null;
    }
    public function delete($id){

        //load data to delete function
        $dataDelete = DB::table('risets')->where('id', $id)->first();
        $this->deleteName = $dataDelete->titleID;
        $this->deleteID = $dataDelete->id;

        $this->deleter = true;
    }
    public function deleting($id){
        DB::table('risets')->where('id', $id)->delete();

        Toaster::success('Succesfully delete riset');


        $this->closeDelete();
    }
    public function getRisets(){
        $sc = '%' . $this->query . '%';
        try {
            return  DB::table('risets')
                        ->select('id', 'titleID', 'category', 'img', 'status', 'publishdate')
                        ->where('titleID', 'like', $sc)
                        ->orderByDesc('publishdate')
                        ->paginate($this->paginate);
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function render()
    {
        $posts = $this->getRisets();
        // dd($posts);
        return view('livewire.risets-component', compact('posts'));
    }
}
