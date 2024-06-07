<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class AksiComponent extends Component
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
        $dataDelete = DB::table('aksi')->where('id', $id)->first();
        $this->deleteName = $dataDelete->titleID;
        $this->deleteID = $dataDelete->id;

        $this->deleter = true;
    }
    public function deleting($id){
        DB::table('aksi')->where('id', $id)->delete();

        Toaster::success('Succesfully delete riset');


        $this->closeDelete();
    }
    public function getAksi(){
        $sc = '%' . $this->query . '%';
        try {
            return  DB::table('aksi')
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
        $data = $this->getAksi();
        return view('livewire.aksi-component', compact('data'));
    }
}
