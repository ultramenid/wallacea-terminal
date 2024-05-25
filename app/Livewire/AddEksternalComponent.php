<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Masmerise\Toaster\Toaster;

class AddEksternalComponent extends Component
{
    use WithFileUploads;
    public $photo,$publishdate, $titleID, $titleEN, $descriptionID, $descriptionEN, $category, $subcategory, $sourceurl,$sourcename, $isactive = 0;
    public $isCategory;

    public function updatedCategory($value){
        ($value == 'Nasional') ? $this->isCategory = true : $this->isCategory= false ;
    }

    public function uploadImage(){
        $file = $this->photo->store('public/files/photos');
        $foto = $this->photo->hashName();

        //https://image.intervention.io/v3/modifying/resizing
        $manager = new ImageManager(new Driver());

        $image = $manager->read('storage/files/photos/'.$foto)->cover(300, 150);
        $image->save('storage/files/photos/thumbnail/'.$foto);
        return $foto;
    }

    public function updatedPhoto($photo){
        $extension = pathinfo($photo->getFilename(), PATHINFO_EXTENSION);
        if (!in_array($extension, ['png', 'jpeg', 'bmp', 'gif','jpg','webp','mp4', 'avi', '3gp', 'mov', 'm4a'])) {
           $this->reset('photo');
           Toaster::error('File not supported!');
        }

    }

    public function storeNews(){
        if($this->manualValidation()){
            DB::table('news')->insert([
                'publishdate' => $this->publishdate,
                'titleID' => $this->titleID,
                'titleEN' => $this->titleEN,
                'descriptionID' => $this->descriptionID,
                'descriptionEN' => $this->descriptionEN,
                'img' => $this->uploadImage(),
                'category' => $this->category,
                'url' => $this->sourceurl,
                'status' => $this->isactive,
                'source' => $this->sourcename,
                'subcategory' => $this->subcategory,
                'created_at' => Carbon::now('Asia/Jakarta')
            ]);
            redirect()->to('/cms/news');
        }
    }

    public function render()
    {
        return view('livewire.add-eksternal-component');
    }

    public function manualValidation(){
        if(strlen($this->titleID) > 120){
            Toaster::error('Title Indonesia limit 120 character!');
            return;
        }elseif($this->titleID == '' ){
            Toaster::error('Title Indonesia is required!');
            return;
        }elseif($this->sourcename == '' ){
            Toaster::error('Source Name is required!');
            return;
        }
        elseif($this->sourceurl == '' ){
            Toaster::error('Source URL is required!');
            return;
        }elseif($this->photo == '' ){
            Toaster::error('Image is required!');
            return;
        }elseif($this->descriptionID == '' ){
            Toaster::error('Description Indonesia is required!');
            return;
        }elseif(strlen($this->descriptionID) > 255 ){
            Toaster::error('Description Indonesia limit 255 character!');
            return;
        }elseif($this->publishdate == '' ){
            Toaster::error('Publish date is required!');
            return;
        }elseif($this->category == '' ){
            Toaster::error('Category is required!');
            return;
        }
        return true;
    }
}
