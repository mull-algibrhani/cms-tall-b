<?php

namespace App\Livewire\Blog;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Rules\WordCountBio;

class Authors extends Component
{

    use WithFileUploads;
    public $search = '';
    public $photo;
    public $name;
    public $email;
    public $bio;
    public $facebook_link;
    public $instagram_link;
    public $x_link;

    // Definisikan aturan validasi sebagai metode
    public function rules()
    {
        return [
            'photo' => 'max:1024|mimes:jpg,png,jpeg,webp,jfif',
            'name' => 'required|min:3',
            'email' => 'required|email|unique:authors',
            //COSTUM RULES
            'bio' => ['required', new WordCountBio(20, 100)],
            'facebook_link' => 'url:https',
            'instagram_link' => 'url:https',
            'x_link' => 'url:https',
        ];
    }

    protected $messages = [
        'photo.max' => 'Maksimal file 1 MB',
        'photo.mimes' => 'Format yang didukung : jpeg, jpg, png, webp, jfif',
        'name.required' => 'Nama wajib diisi',
        'name.min' => 'Minimal nama 3 karakter',
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Masukkan format email yang benar',
        'email.unique' => 'Email sudah terdaftar',
        'bio.required' => 'Bio wajib diisi',
        'bio' => 'Biografi Minimal 20 dan Maksimal 100 kata.',
        'facebook_link.url' => 'Format url tidak sesuai',
        'instagram_link.url' => 'Format url tidak sesuai',
        'x_link.url' => 'Format url tidak sesuai',
    ];

    // Definisikan fungsi untuk validasi realtime Livewire
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function store()
    {
        // $this->validate(); // Gunakan metode rules() untuk validasi

        $datapost = [
            $this->photo,
            $this->name,
            $this->email,
            $this->bio,
            $this->facebook_link,
            $this->instagram_link,
            $this->x_link
        ];

        dd($datapost);

        // Save logic here
    }

    public function render()
    {
        return view('livewire.blog.authors');
    }
}
