<?php

namespace App\Livewire;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class AddRisetComponent extends Component
{
    public $publishdate, $titleID, $titleEN, $descriptionID, $descriptionEN, $contentID, $contentEN, $category, $fileID, $fileEN, $photo, $isactive=0;
    public $isCategory;

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
        $file1 = $this->fileID->store('public/files/reports');
        $file2 = $this->fileEN->store('public/files/reports');
        $name1 = $this->fileID->getClientOriginalName();
        $name2 = $this->fileEN->getClientOriginalName();
        // $file1 = 1;
        // $file2 = 2;

        return [$name1, $name2];
    }

    public function render()
    {
        return view('livewire.add-riset-component');
    }
}
