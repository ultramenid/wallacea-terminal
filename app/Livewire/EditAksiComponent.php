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


class EditAksiComponent extends Component
{
    public $idAksi;
    public $publishdate, $titleID, $titleEN, $descriptionID, $descriptionEN, $contentID, $contentEN, $category, $photo, $uphoto, $isactive;
    use WithFileUploads;

    public function mount($id){
        $this->idAksi = $id;
        $data = DB::table('aksi')->where('id', $id)->first();
        $this->publishdate = $data->publishdate;
        $this->titleID = $data->titleID;
        $this->titleEN = $data->titleEN;
        $this->descriptionID = $data->descriptionID;
        $this->descriptionEN = $data->descriptionEN;
        $this->contentID = $data->contentID;
        $this->contentEN = $data->contentEN;
        $this->category = $data->category;
        $this->isactive = $data->status;
        $this->uphoto = $data->img;
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

    public function storeAksi(){
        if($this->manualValidation()){
            if(!$this->photo){
                $name = $this->uphoto;
            }else{
                Storage::delete('public/files/photos/'.$this->uphoto);
                Storage::delete('public/files/photos/thumbnail/'.$this->uphoto);
                $name=  $this->uploadImage();
            }
            DB::table('aksi')
                ->where('id', $this->idAksi)
                ->update([
                'publishdate' => $this->publishdate,
                'img' => $name,
                'titleID' => $this->titleID,
                'titleEN' => $this->titleEN,
                'descriptionID' => $this->descriptionID,
                'descriptionEN' => $this->descriptionEN,
                'contentID' => $this->contentID,
                'contentEN' => $this->contentEN,
                'category' => $this->category,
                'status' => $this->isactive,
                'updated_at' => Carbon::now('Asia/Jakarta')
            ]);
            Toaster::success('Succesfully update aksi');
        }
    }

    public function render()
    {
        return view('livewire.edit-aksi-component');
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
