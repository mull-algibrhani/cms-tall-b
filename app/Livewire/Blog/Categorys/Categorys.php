<?php

namespace App\Livewire\Blog\Categorys;

use Livewire\Component;
use App\Models\Blog\Category;
use Livewire\WithPagination;

class Categorys extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search = '';
    public $categorys;
    public $category_name, $category_id;
    public $isModalOpen = false;
    public $action = 'create';

    // Fungsi Render Halaman dan data
    public function render()
    {
        // fungsi pencarian data
        $query = Category::where(function ($query) {
            $query->where('category_name', 'LIKE', '%' . $this->search . '%');
        });
        $categorys = $query->orderBy('created_at', 'desc')->paginate($this->perPage);
        return view('livewire.blog.categorys.categorys', ['datacategorys' => $categorys]);
    }

    // Fungsi open modal
    public function openModal($action = 'create', $id = null)
    {
        $this->action = $action;

        if ($action === 'edit' || $action === 'view') {
            $category = Category::findOrFail($id);
            $this->category_id = $id;
            $this->category_name = $category->category_name;
        } else {
            $this->resetInputFields();
        }

        $this->isModalOpen = true;
        $this->dispatch('open-modal'); // Trigger event agar Alpine.js membuka modal
    }

    public function mount()
    {

        $this->isModalOpen = false;
    }

    // Fungsi close modal
    public function closeModal()
    {
        $this->dispatch('close-modal');  // Emit event untuk menutup modal
        $this->isModalOpen = false;  // Menutup modal
        $this->resetInputFields();
        $this->resetValidation(); // Reset validation messages
    }

    // Fungsi reset input modal
    private function resetInputFields()
    {
        $this->category_name = '';
    }

    // Definisikan aturan validasi sebagai metode
    public function rules()
    {
        return [
            'category_name' => 'required|min:3',
        ];
    }
    // Fungsi pesan custom valiadsi
    protected $messages = [
        'category_name.required' => 'Category wajib diisi',
        'category_name.min' => 'Minimal kategori 3 karakter',
    ];

    // Definisikan fungsi untuk validasi realtime Livewire
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    //Fungsi valiadasi form untuk mendiseble button save dan update jika form kosong atau error
    public function getIsFormValidProperty()
    {
        return $this->category_name && $this->getErrorBag()->isEmpty();
    }

    // Logic save data dengan modal
    public function save()
    {
        // Panggil Fungsi Validasi
        $this->validate();

        try {
            // CREATE
            if ($this->action === 'create') {
                Category::create([
                    'category_name' => $this->category_name,
                ]);
                // Memberikan pesan sukses
                // Dispatch event ke toaster sukses
                $this->dispatch('showToast', type: 'success', message: 'Category berhasil disimpan!');

                // UPDATE
            } elseif ($this->action === 'edit') {
                $category = Category::find($this->category_id);
                $category->update([
                    'category_name' => $this->category_name,
                ]);
                // Dispatch event ke toaster sukses
                $this->dispatch('showToast', type: 'success', message: 'Category berhasil diupdate!');
            }

            $this->closeModal();
        } catch (\Throwable $th) {
            // Jika terjadi error, tampilkan toaster error
            $this->dispatch('showToast', type: 'error', message: 'Terjadi kesalahan!');
        }
    }

    //Logic Delete Data
    public function delete($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            // Kirim notifikasi sukses ke frontend
            $this->dispatch('showToast', type: 'success', message: 'Category berhasil dihapus!');
        } else {
            // Kirim notifikasi error ke frontend
            $this->dispatch('showToast', type: 'error', message: 'Category gagal dihapus!');
        }
    }
}
