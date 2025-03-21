<?php

namespace App\Livewire\Blog\Authors;

use App\Models\Blog\Author;
use App\Rules\WordCountBio;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Storage;
use Illuminate\Validation\Rule;
use Log;

class Authors extends Component
{
  use WithPagination;
  use WithFileUploads;

  public $perPage = 10;
  public $search = '';

  public $isModalOpen = false;
  public $action = 'create';
  public $author_id;

  public $photo;
  public $name;
  public $email;

  public $facebook_link;
  public $instagram_link;
  public $x_link;

  public $bio = ''; // Properti untuk menyimpan teks CKEditor


  #[On('updateBio')]
  public function updateBio($bio = null)
  {
    // \Log::info('📥 Data diterima di updateBio:', ['bio' => $bio]);
    // Pastikan data valid
    if (!is_string($bio) || empty($bio)) {
      // \Log::warning('❌ updateBio dipanggil tanpa data bio yang valid!', ['bio' => $bio]);
      return;
    }
    $this->bio = $bio;
    // Validasi hanya jika bio ada isinya
    $this->validateOnly('bio');
    // Kirim ulang ke CKEditor
    $this->dispatch('refreshEditor', ['bio' => $this->bio]);
    // \Log::info('✅ Bio berhasil diperbarui:', ['bio' => $this->bio]);
  }
  // Fungsi Refresh Editor
  #[On('refreshEditor')]
  public function refreshEditor()
  {
    // \Log::info('🔄 refreshEditor dipanggil, bio saat ini:', ['bio' => $this->bio]);
    $this->dispatch('refreshEditor', $this->bio ?? '');
  }

  // Validasi Real-Time
  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
    // \Log::info("✅ Validasi berjalan untuk: $propertyName");
  }


  // Definisikan aturan validasi sebagai metode
  public function rules()
  {
    $rules = [
      'name' => 'required|min:3',
      'email' => [
        'required',
        'email',
        Rule::unique('authors')->ignore($this->author_id),
      ],
      'bio' => ['required', new WordCountBio(20, 100)],
      'facebook_link' => 'url:https',
      'instagram_link' => 'url:https',
      'x_link' => 'url:https',
    ];

    // Validasi `photo` dalam mode create atau update jika ada file baru yang diunggah
    if ($this->action === 'create' && $this->photo instanceof \Illuminate\Http\UploadedFile) {
      $rules['photo'] = 'max:1024|mimes:jpg,png,jpeg,webp,jfif';
    } elseif ($this->action === 'edit' && $this->photo instanceof \Illuminate\Http\UploadedFile) {
      $rules['photo'] = 'max:1024|mimes:jpg,png,jpeg,webp,jfif';
    }

    return $rules;
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

  //Fungsi valiadasi form untuk mendiseble button save dan update jika form kosong atau error
  public function getIsFormValidProperty()
  {
    return $this->name && $this->email && $this->bio && $this->getErrorBag()->isEmpty();
  }



  public function save()
  {
    // Panggil Fungsi Validasi
    $this->validate();

    try {
      // CREATE
      if ($this->action === 'create') {
        if ($this->photo) {
          $extension = $this->photo->extension();
          $filename = 'author_' . str_replace(' ', '_', $this->name) . '_' . time() . '.' . $extension;
          $path = $this->photo->storeAs('images/author', $filename, 'public');
        } else {
          $filename = null;
        }

        $author = new Author();
        $author->photo = $filename;
        $author->name = $this->name;
        $author->email = $this->email;
        $author->bio = $this->bio;
        $author->facebook_link = $this->facebook_link;
        $author->instagram_link = $this->instagram_link;
        $author->x_link = $this->x_link;
        $author->save();

        // Dispatch event ke toaster sukses
        $this->dispatch('showToast', type: 'success', message: 'Author berhasil disimpan!');
      }
      // UPDATE
      elseif ($this->action === 'edit') {
        $author = Author::find($this->author_id);

        if ($this->photo instanceof \Illuminate\Http\UploadedFile) {
          Storage::delete('public/images/author/' . $author->photo);
          $extension = $this->photo->extension();
          $filename = 'author_' . str_replace(' ', '_', $this->name) . '_' . time() . '.' . $extension;
          $path = $this->photo->storeAs('images/author', $filename, 'public');
        } else {
          $filename = $author->photo;
        }

        $author->update([
          'photo' => $filename,
          'name' => $this->name,
          'email' => $this->email,
          'bio' => $this->bio,
          'facebook_link' => $this->facebook_link,
          'instagram_link' => $this->instagram_link,
          'x_link' => $this->x_link,
        ]);

        // Dispatch event ke toaster sukses
        $this->dispatch('showToast', type: 'success', message: 'Author berhasil diupdate!');
      }

      $this->closeModal();
    } catch (\Exception $e) {
      // Jika terjadi error, tampilkan toaster error
      $this->dispatch('showToast', type: 'error', message: 'Terjadi kesalahan!');
    }
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
    return view('livewire.blog.authors.authors', ['dataauthors' => $authors]);
  }

  // Fungsi open modal
  public function openModal($action = 'create', $id = null)
  {
    $this->action = $action;

    if ($action === 'edit' || $action === 'view') {
      $author = Author::findOrFail($id);
      $this->author_id = $id;
      $this->name = $author->name;
      $this->email = $author->email;
      $this->bio = $author->bio;
      $this->facebook_link = $author->facebook_link;
      $this->instagram_link = $author->instagram_link;
      $this->x_link =   $author->x_link;
      // Set photo ke nama file dari database, jika ada foto yang tersimpan
      $this->photo = $author->photo;
    } else {
      $this->resetInputFields();
    }
    $this->isModalOpen = true;
    $this->dispatch('open-modal'); // Trigger event agar Alpine.js membuka modal
  }

  public function mount()
  {
    // \Log::info('🚀 mount() dipanggil, bio saat ini: ', ['bio' => $this->bio]);
    // Memastikan bahwa CKEditor hanya diinisialisasi sekali ketika komponen dimuat
    // $this->dispatch('open-modal');
    $this->isModalOpen = false;
    // dd('Event initialize-ckeditor dipancarkan');
  }

  // Fungsi close modal
  public function closeModal()
  {
    $this->dispatch('close-modal');  // Emit event untuk menutup modal
    $this->isModalOpen = false;  // Menutup modal
    $this->resetInputFields();   // Mereset field inputan
    $this->resetValidation();    // Mereset pesan validasi
  }

  // Fungsi reset input modal
  private function resetInputFields()
  {
    $this->photo = null;
    $this->name = '';
    $this->email = '';
    $this->bio = '';
    $this->facebook_link = '';
    $this->instagram_link = '';
    $this->x_link = '';
  }

  // Fungsi mengambil url gambar
  public function getPhotoUrl()
  {
    if ($this->action === 'create') {
      // Saat mode create, tampilkan foto sementara jika ada file baru yang diunggah, atau placeholder jika tidak ada
      return $this->photo ? $this->photo->temporaryUrl() : 'https://ui-avatars.com/api/?name=&background=be185b&color=fff&size=128';
    }

    if ($this->action === 'edit' || $this->action === 'view') {
      // Saat mode edit atau view, cek apakah `$this->photo` adalah string (nama file dari database) atau `UploadedFile` (file baru yang diunggah)
      if (is_string($this->photo)) {
        return asset('storage/images/author/' . $this->photo); // Tampilkan foto lama dari penyimpanan
      } elseif ($this->photo instanceof \Illuminate\Http\UploadedFile) {
        return $this->photo->temporaryUrl(); // Tampilkan URL sementara untuk file baru
      } else {
        return $this->getPlaceholderAvatar(); // Tampilkan avatar placeholder jika tidak ada foto
      }
    }
    return $this->getPlaceholderAvatar();
  }

  // Fungsi mengambil gambar placeholder jika photo null
  public function getPlaceholderAvatar()
  {
    return "https://ui-avatars.com/api/?name=" . urlencode($this->name) . "&background=be185b&color=fff";
  }

  //Logic Delete Data
  public function delete($id)
  {
    $author = Author::find($id);

    if ($author) {
      // Hapus gambar terkait
      Storage::delete('public/images/author/' . $author->photo);
      $author->delete();

      // Kirim notifikasi sukses ke frontend
      $this->dispatch('showToast', type: 'success', message: 'Author berhasil dihapus!');
    } else {
      // Kirim notifikasi error ke frontend
      $this->dispatch('showToast', type: 'error', message: 'Author gagal dihapus!');
    }
  }
}
