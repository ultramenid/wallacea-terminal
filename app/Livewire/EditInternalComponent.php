<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Masmerise\Toaster\Toaster;
use Illuminate\Support\Str;


class EditInternalComponent extends Component
{
    use WithFileUploads;
    public $publishdate, $titleID, $titleEN, $descriptionID, $descriptionEN, $contentID, $contentEN, $category, $subcategory, $photo, $uphoto, $isactive;
    public $isCategory, $idNews;

    public function mount($id){
        $this->idNews = $id;
        $data = DB::table('news')->where('id', $id)->first();
        $this->publishdate = $data->publishdate;
        $this->titleID = $data->titleID;
        $this->titleEN = $data->titleEN ? $data->titleEN : null;
        $this->descriptionID = $data->descriptionID;
        $this->descriptionEN = $data->descriptionEN ? $data->descriptionEN : null;
        $this->contentID = $data->contentID;
        $this->contentEN = $data->contentEN ? $data->contentEN : null;
        $this->isCategory = $data->subcategory ? true : false;
        $this->isactive = $data->status;
        $this->category = $data->category;
        $this->subcategory = $data->subcategory ? $data->subcategory : null;
        $this->uphoto = $data->img;
    }
    public function updatedCategory($value){
        ($value == 'Nasional') ? $this->isCategory = true : $this->isCategory= false ;
    }

    public function uploadImage(){
        $file = $this->photo->store('public/files/photos');
        $foto = $this->photo->hashName();

        $manager = new ImageManager(new Driver());

        // https://image.intervention.io/v3/modifying/resizing
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
    public function storePosts(){
        if(!$this->photo){
            $name = $this->uphoto;
        }else{
                Storage::delete('public/files/photos/'.$this->uphoto);
                Storage::delete('public/files/photos/thumbnail/'.$this->uphoto);
                $name=  $this->uploadImage();


        }
        DB::table('news')
                ->where('id', $this->idNews)
                ->update([
                    'publishdate' => $this->publishdate,
                    'titleID' => $this->titleID,
                    'titleEN' => $this->titleEN,
                    'descriptionID' => $this->descriptionID,
                    'descriptionEN' => $this->descriptionEN,
                    'category' => $this->category,
                    'subcategory' => ($this->category == 'Internasional') ? null : $this->subcategory,
                    'contentID' => $this->contentID,
                    'contentEN' => $this->contentEN,
                    'img' => $name,
                    'status' => $this->isactive,
                    'updated_at' => Carbon::now('Asia/Jakarta')
                ]);

        Toaster::success('Succesfully update news');
    }

    public function render()
    {
        return view('livewire.edit-internal-component');
    }
    public function manualValidation(){
        if(strlen($this->titleID) > 120){
            Toaster::error('Title Indonesia limit 120 character!');
            return;
        }elseif($this->titleID == '' ){
            Toaster::error('Title Indonesia is required!');
            return;
        }elseif($this->descriptionID == '' ){
            Toaster::error('Description Indonesia is required!');
            return;
        }elseif(strlen($this->descriptionID) > 255 ){
            Toaster::error('Description Indonesia limit 255 character!');
            return;
        }elseif($this->contentID == '' ){
            Toaster::error('Content Indonesia is required!');
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
