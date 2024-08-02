<?php

namespace App\Livewire\Blog\Authors;

use App\Models\Blog\Author;
use App\Rules\WordCountBio;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ListAuthors extends Component
{
    use WithPagination;
    use WithFileUploads;


    public $perPage = 10;
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
        // SAVE LOGIC 1
        // $this->validate(); // Gunakan metode rules() untuk validasi
        // Author::create([
        //     'photo' => $this->photo->store('images/author', 'public'),
        //     'name' => $this->name,
        //     'email' => $this->email,
        //     'bio' => $this->bio,
        //     'facebook_link' => $this->facebook_link,
        //     'instagram_link' => $this->instagram_link,
        //     'x_link' => $this->x_link
        // ]);

        // SAVE LOGIC 2
        // Cek apakah ada file photo yang diunggah
        if ($this->photo) {
            // Ambil ekstensi file
            $extension = $this->photo->extension();

            // Buat nama file baru
            $filename = 'author_' . $this->name . '_' . time() . '.' . $extension;

            // Simpan file dengan nama yang dimodifikasi
            $path = $this->photo->storeAs('images/author', $filename, 'public');
        } else {
            // Jika tidak ada file, set filename menjadi null atau gunakan nilai default
            $filename = null;
        }

        // Simpan nama file ke database, misalnya ke user yang sedang login
        $author = new Author();
        $author->photo = $filename;
        $author->name = $this->name;
        $author->email = $this->email;
        $author->bio = $this->bio;
        $author->facebook_link = $this->facebook_link;
        $author->instagram_link = $this->instagram_link;
        $author->x_link = $this->x_link;
        $author->save();
        // Memberikan pesan sukses
        session()->flash('success', 'Author berhasil disimpan!');
        // Mengosongkan input
        $this->reset(['photo', 'name', 'email', 'bio', 'facebook_link', 'instagram_link', 'x_link']);
        // Redirect ke halaman lain
        $this->redirect('/blog/authors', navigate: true);

        //TESTING DAI DAM DATA
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
    }

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Author::where(function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('email', 'LIKE', '%' . $this->search . '%');
        });

        $authors = $query->orderBy('created_at', 'desc')->paginate($this->perPage);
        return view('livewire.blog.authors.list-authors', ['dataauthors' => $authors]);
    }
}