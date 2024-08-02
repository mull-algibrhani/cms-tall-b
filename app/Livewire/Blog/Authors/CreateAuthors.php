<?php

namespace App\Livewire\Blog\Authors;

use App\Models\Blog\Author;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Rules\WordCountBio;

class CreateAuthors extends Component
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

    public function render()
    {
        return view('livewire.blog.authors.create-authors');
    }


    public function store()
    {
        $this->validate(); // Gunakan metode rules() untuk validasi
        Author::create([
            'photo' => $this->photo,
            'name' => $this->name,
            'email' => $this->email,
            'bio' => $this->bio,
            'facebook_link' => $this->facebook_link,
            'instagram_link' => $this->instagram_link,
            'x_link' => $this->x_link
        ]);
        session()->flash('success', 'Author berhasil disimpan!');
        $this->redirect('/blog/authors', navigate: true);
        // $datapost = [
        //     $this->photo,
        //     $this->name,
        //     $this->email,
        //     $this->bio,
        //     $this->facebook_link,=
        //     $this->instagram_link,
        //     $this->x_link
        // ];

        // dd($datapost);

        // Save logic here
    }

    // KODE UNTUK VALIDASI JUMLAH KATA DI SISI SERVER
    // Definisikan fungsi untuk menghitung jumlah kata secara realtime Livewire
    // public function getBioWordCountProperty()
    // {
    //     return $this->countWords($this->bio);
    // }

    // private function countWords($value)
    // {
    //     // Mengubah entitas HTML menjadi karakter biasa
    //     $decodedValue = html_entity_decode($value);
    //     // Menghapus tag HTML
    //     $cleanedValue = strip_tags($decodedValue);
    //     // Menghapus spasi berlebih dan newline
    //     $normalizedValue = preg_replace('/\s+/', ' ', $cleanedValue);
    //     // Menghitung kata yang tidak kosong termasuk angka
    //     return preg_match_all('/\b[\w\d]+\b/', trim($normalizedValue));
    // }

    // public function render()
    // {
    //     return view('livewire.blog.authors.create-authors', [
    //         'bioWordCount' => $this->bio_word_count
    //     ]);
    // }
    // END KODE UNTUK VALIDASI JUMLAH KATA DI SISI SERVER
}