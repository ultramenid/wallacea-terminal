<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Masmerise\Toaster\Toaster;
use Illuminate\Support\Str;


class AddRisetComponent extends Component
{
    public $publishdate, $titleID, $titleEN, $descriptionID, $descriptionEN, $contentID, $contentEN, $category, $fileID, $fileEN, $photo, $isactive=0;
    use WithFileUploads;


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

    public function uploadReports(){
        $name1 = $this->fileID->getClientOriginalName();
        $name2 = ($this->fileEN == '') ? null : $this->fileEN->getClientOriginalName();
        $file1 = $this->fileID->storeAs('public/files/reports', $name1);
        $file2 = ($this->fileEN == '') ? null : $this->fileEN->storeAs('public/files/reports', $name2);

        // $file1 = 1;
        // $file2 = 2;

        return [$name1, $name2];
    }

    public function storeRiset(){
        dd($this->fileID->getClientOriginalName());
        if($this->manualValidation()){
            DB::table('risets')->insert([
                'publishdate' => $this->publishdate,
                'img' => $this->uploadImage(),
                'titleID' => $this->titleID,
                'titleEN' => $this->titleEN,
                'descriptionID' => $this->descriptionID,
                'descriptionEN' => $this->descriptionEN,
                'fileID' => $this->uploadReports()[0],
                'fileEN' =>$this->uploadReports()[1],
                'contentID' => $this->contentID,
                'contentEN' => $this->contentEN,
                'category' => $this->category,
                'status' => $this->isactive,
                'slug' => Str::slug($this->titleID,'-'),
                'created_at' => Carbon::now('Asia/Jakarta')
            ]);
            redirect()->to('/cms/listrisets');

            // $this->redirect('/cms/risets', navigate: true);

        }
    }

    public function render()
    {
        return view('livewire.add-riset-component');
    }

    public function manualValidation(){
        if(strlen($this->titleID) > 120){
            Toaster::error('Title Indonesia limit 120 character!');
            return;
        }elseif($this->photo == '' ){
            Toaster::error('Image is required!');
            return;
        }elseif($this->fileID == '' ){
            Toaster::error('File Indonesia is required!');
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
