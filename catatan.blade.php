1. kode editor ck editor pada page create author masih error/hilang saat muncul alert validasi = fix
2. wordcount juga tidak muncul pada text area = fix
3. error saat bernavigasi dari menu author ke menu kategory = fix
4. laravel belum di update keversi 12 =
5. sebelum mengupdate versi larave lakukan laravel test untuk memastikan semua berfungsi dengan baik sebelum upgrade
versi laravel



<script>
  let editorInstance = null; // Variabel untuk menyimpan instance CKEditor

  document.addEventListener('open-modal', function() {
    const editorElement = document.getElementById("editor");

    if (editorElement && !editorElement.classList.contains('ckeditor-initialized')) {
      console.log('Inisialisasi CKEditor...');

      // Inisialisasi CKEditor
      CKEDITOR.ClassicEditor.create(editorElement, {
          toolbar: {
            items: [
              'selectAll', 'bold', 'italic', 'underline', 'strikethrough', 'alignment', 'removeFormat',
              'bulletedList', 'numberedList', 'todoList', 'outdent', 'indent', 'fontColor', 'highlight',
              'specialCharacters', 'link', 'undo', 'redo',
            ],
            shouldNotGroupWhenFull: true
          },
          indentBlock: {
            offset: 17,
            unit: 'px'
          },
          list: {
            properties: {
              styles: true,
              startIndex: true,
              reversed: true
            }
          },
          placeholder: 'Type your biography',
          htmlSupport: {
            allow: [{
              name: /.*/,
              attributes: true,
              classes: true,
              styles: true
            }]
          },
          htmlEmbed: {
            showPreviews: true
          },
          link: {
            decorators: {
              addTargetToExternalLinks: true,
              defaultProtocol: 'https://'
            }
          },
          removePlugins: [
            // 'ExportPdf', 'ExportWord',
            'CKBox', 'CKFinder', 'EasyImage', 'RealTimeCollaborativeComments', 'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory', 'PresenceList', 'Comments', 'TrackChanges', 'TrackChangesData',
            'RevisionHistory', 'Pagination', 'WProofreader', 'MathType'
          ]
        })
        .then(editor => {
          editorInstance = editor; // Simpan instance CKEditor
          editorElement.classList.add('ckeditor-initialized');
          console.log('CKEditor berhasil diinisialisasi');
        })
        .catch(error => {
          console.error('CKEditor Error:', error);
        });
    }
  });

  // Event listener untuk menutup modal
  document.addEventListener('close-modal', function() {
    if (editorInstance) {
      console.log('Menutup modal, menghancurkan CKEditor...');
      // Hancurkan editor yang telah disimpan dalam variabel editorInstance
      editorInstance.destroy()
        .then(() => {
          console.log('CKEditor dihancurkan');
          editorInstance = null; // Reset instance setelah dihancurkan
        })
        .catch(error => {
          console.error('Error saat menghancurkan CKEditor:', error);
        });
    } else {
      console.log('CKEditor belum diinisialisasi atau sudah dihancurkan');
    }
  });
</script>

<script>
  let editorInstance = null; // Variabel untuk menyimpan instance CKEditor

  document.addEventListener('initialize-ckeditor', function() {
    const editorElement = document.getElementById("editor");

    if (editorElement && !editorElement.classList.contains('ckeditor-initialized')) {
      console.log('Inisialisasi CKEditor...');

      // Inisialisasi CKEditor
      CKEDITOR.ClassicEditor.create(editorElement, {
          toolbar: {
            items: [
              'selectAll', 'bold', 'italic', 'underline', 'strikethrough', 'alignment', 'removeFormat',
              'bulletedList', 'numberedList', 'todoList', 'outdent', 'indent', 'fontColor', 'highlight',
              'specialCharacters', 'link', 'undo', 'redo',
            ],
            shouldNotGroupWhenFull: true
          },
          indentBlock: {
            offset: 17,
            unit: 'px'
          },
          list: {
            properties: {
              styles: true,
              startIndex: true,
              reversed: true
            }
          },
          placeholder: 'Type your biography',
          htmlSupport: {
            allow: [{
              name: /.*/,
              attributes: true,
              classes: true,
              styles: true
            }]
          },
          htmlEmbed: {
            showPreviews: true
          },
          link: {
            decorators: {
              addTargetToExternalLinks: true,
              defaultProtocol: 'https://'
            }
          },
          removePlugins: [
            // 'ExportPdf', 'ExportWord',
            'CKBox', 'CKFinder', 'EasyImage', 'RealTimeCollaborativeComments', 'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory', 'PresenceList', 'Comments', 'TrackChanges', 'TrackChangesData',
            'RevisionHistory', 'Pagination', 'WProofreader', 'MathType'
          ]
        })


        .then(editor => {
          editorInstance = editor; // Simpan instance CKEditor
          editorElement.classList.add('ckeditor-initialized');
          console.log('CKEditor berhasil diinisialisasi');
        })
        .catch(error => {
          console.error('CKEditor Error:', error);
        });
    }
  });

  // Event listener untuk menutup modal
  document.addEventListener('close-modal', function() {
    if (editorInstance) {
      console.log('Menutup modal, menghancurkan CKEditor...');
      // Hancurkan editor yang telah disimpan dalam variabel editorInstance
      editorInstance.destroy()
        .then(() => {
          console.log('CKEditor dihancurkan');
          editorInstance = null; // Reset instance setelah dihancurkan
        })
        .catch(error => {
          console.error('Error saat menghancurkan CKEditor:', error);
        });
    } else {
      console.log('CKEditor belum diinisialisasi atau sudah dihancurkan');
    }
  });
</script>


<script>
  let editorInstance = null;

  function initializeEditor() {
    const editorElement = document.getElementById("editor");

    if (!editorElement || editorElement.classList.contains('ckeditor-initialized')) {
      return;
    }

    console.log('Inisialisasi CKEditor...');

    // Pastikan CKEditor tidak diinisialisasi dua kali
    if (editorInstance) {
      editorInstance.destroy()
        .then(() => {
          console.log('CKEditor dihancurkan sebelum inisialisasi ulang');
          createEditor();
        })
        .catch(error => {
          console.error('Error saat menghancurkan CKEditor:', error);
        });
    } else {
      createEditor();
    }
  }

  function createEditor() {
    const editorElement = document.getElementById("editor");

    CKEDITOR.ClassicEditor.create(editorElement, {
        toolbar: {
          items: [
            'selectAll', 'bold', 'italic', 'underline', 'strikethrough', 'alignment', 'removeFormat',
            'bulletedList', 'numberedList', 'todoList', 'outdent', 'indent', 'fontColor', 'highlight',
            'specialCharacters', 'link', 'undo', 'redo',
          ],
          shouldNotGroupWhenFull: true
        },
        indentBlock: {
          offset: 17,
          unit: 'px'
        },
        list: {
          properties: {
            styles: true,
            startIndex: true,
            reversed: true
          }
        },
        placeholder: 'Type your biography',
        htmlSupport: {
          allow: [{
            name: /.*/,
            attributes: true,
            classes: true,
            styles: true
          }]
        },
        htmlEmbed: {
          showPreviews: true
        },
        link: {
          decorators: {
            addTargetToExternalLinks: true,
            defaultProtocol: 'https://'
          }
        },
        removePlugins: [
          'CKBox', 'CKFinder', 'EasyImage', 'RealTimeCollaborativeComments', 'RealTimeCollaborativeTrackChanges',
          'RealTimeCollaborativeRevisionHistory', 'PresenceList', 'Comments', 'TrackChanges', 'TrackChangesData',
          'RevisionHistory', 'Pagination', 'WProofreader', 'MathType'
        ]
      })
      .then(editor => {
        editorInstance = editor;
        editorElement.classList.add('ckeditor-initialized');

        //Wordcount
        const wordCountPlugin = editor.plugins.get('WordCount');
        const wordCountWrapper = document.getElementById('word-count');
        if (wordCountWrapper) {
          wordCountWrapper.appendChild(wordCountPlugin.wordCountContainer);
        }

        // Update Livewire saat isi editor berubah
        editor.model.document.on('change:data', () => {
          console.log('Mengirim event updateBio ke Livewire dengan:', editor.getData());
          Livewire.dispatch('updateBio', {
            bio: editor.getData()
          });
        });

        console.log('CKEditor berhasil diinisialisasi');
      })
      .catch(error => {
        console.error('CKEditor Error:', error);
      });
  }

  document.addEventListener('livewire:init', initializeEditor);

  // Livewire akan menangkap update dari CKEditor
  Livewire.on('refreshEditor', () => {
    console.log('Livewire memperbarui CKEditor...');
    initializeEditor();
  });

  document.addEventListener('close-modal', function() {
    if (editorInstance) {
      console.log('Menutup modal, menghancurkan CKEditor...');
      editorInstance.destroy()
        .then(() => {
          console.log('CKEditor dihancurkan');
          editorInstance = null;
        })
        .catch(error => {
          console.error('Error saat menghancurkan CKEditor:', error);
        });
    }
    Livewire.on('refreshEditor', () => {
      console.log('Memuat ulang data CKEditor:', @this.bio);
      if (editorInstance) {
        editorInstance.setData(@this.bio);
      }
    });
  });
</script>

<script>
  let editorInstance = null;

  function initializeEditor(bio = '') {
    const editorElement = document.getElementById("editor");

    if (!editorElement || editorElement.classList.contains('ckeditor-initialized')) {
      return;
    }

    console.log('Inisialisasi CKEditor...');

    if (editorInstance) {
      editorInstance.destroy()
        .then(() => {
          console.log('CKEditor dihancurkan sebelum inisialisasi ulang');
          createEditor(bio);
        })
        .catch(error => console.error('Error saat menghancurkan CKEditor:', error));
    } else {
      createEditor(bio);
    }
  }

  function createEditor(bio) {
    const editorElement = document.getElementById("editor");

    CKEDITOR.ClassicEditor.create(editorElement, {
        toolbar: ['bold', 'italic', 'underline', 'undo', 'redo'],
        placeholder: 'Type your biography'
      })
      .then(editor => {
        editorInstance = editor;
        editorElement.classList.add('ckeditor-initialized');

        if (bio) {
          editor.setData(bio);
        }

        editor.model.document.on('change:data', () => {
          Livewire.dispatch('updateBio', {
            bio: editor.getData()
          });
        });

        console.log('CKEditor berhasil diinisialisasi');
      })
      .catch(error => console.error('CKEditor Error:', error));
  }

  // Inisialisasi CKEditor saat halaman dimuat
  document.addEventListener('livewire:init', () => initializeEditor());

  // Re-inisialisasi CKEditor setelah Livewire re-render
  Livewire.on('refreshEditor', (data) => {
    console.log('Livewire memperbarui CKEditor dengan data:', data);
    initializeEditor(data);
  });
</script>



<!-- //FUNGSI SAVE DATA AUTHOR
  public function save()
  {
    // Panggil Fungsi Validasi
    $this->validate();

    // CREATE
    if ($this->action === 'create') {
      // SAVE LOGIC 2
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

      // Memberikan pesan sukses
      session()->flash('success', 'Author berhasil disimpan!');

      // Dispatch event ke frontend agar toaster muncul
      $this->dispatch('showToast', [
        'type' => 'success',
        'message' => 'Author berhasil disimpan!'
      ]);

      $this->closeModal();
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

      // Memberikan pesan sukses
      session()->flash('success', 'Author berhasil diupdate!');

      // Dispatch event agar toaster muncul di frontend
      $this->dispatch('showToast', [
        'type' => 'success',
        'message' => 'Author berhasil diupdate!'
      ]);

      $this->closeModal();
    }

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
  } -->



<!-- code toaster-succes.blade -->
<div x-data="{ alert: false }" @click.outside="alert = false" x-init="setTimeout(() => alert = true, 1000); 
           setTimeout(() => alert = false, 5000)" x-show="alert" x-transition:enter="transition ease-out duration-300"
  x-transition:enter-start="opacity-0 translate-x-full" x-transition:enter-end="opacity-100 translate-x-0"
  x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-x-0"
  x-transition:leave-end="opacity-0 translate-x-full" class="fixed right-0 bottom-0 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow
        dark:text-gray-400 dark:bg-gray-800" role="alert">
  <div
    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path
        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
    </svg>
    <span class="sr-only">Check icon</span>
  </div>
  <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
  <button @click="alert = false" type="button"
    class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
    data-dismiss-target="#toast-success" aria-label="Close">
    <span class="sr-only">Close</span>
    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
    </svg>
  </button>
</div>

<!-- code toaster-error.blade -->

<div x-data="{ alert: false }" @click.outside="alert = false" x-init="setTimeout(() => alert = true, 1000); 
           setTimeout(() => alert = false, 5000)" x-show="alert" x-transition:enter="transition ease-out duration-300"
  x-transition:enter-start="opacity-0 translate-x-full" x-transition:enter-end="opacity-100 translate-x-0"
  x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-x-0"
  x-transition:leave-end="opacity-0 translate-x-full" class="fixed right-0 bottom-0 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow
        dark:text-gray-400 dark:bg-gray-800" role="alert">
  <div
    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-600 dark:text-red-200">
    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
      <path fill-rule="evenodd"
        d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z"
        clip-rule="evenodd" />
    </svg>
    <span class="sr-only">Danger icon</span>
  </div>
  <div class="ms-3 text-sm font-normal">{{ session('error') }}</div>
  <button @click="alert = false" type="button"
    class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
    data-dismiss-target="#toast-error" aria-label="Close">
    <span class="sr-only">Close</span>
    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
    </svg>
  </button>
</div>


//code animation
<div x-data="{ isOpen: false }" x-cloak x-show="isOpen" x-transition.opacity.duration.200ms
  x-trap.inert.noscroll="isOpen" @keydown.esc.window="isOpen = false" @open-modal.window="isOpen = true; $nextTick(() => { 
         if(document.getElementById('editor')) {
             initializeEditor();
         }
     })" @close-modal.window="isOpen = false"
  class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50 bg-black/20 backdrop-blur-md items-center justify-center"
  role="dialog" aria-modal="true" aria-labelledby="ModalCrud" id="style-scrolbar">
  <div x-show="isOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
    x-transition:enter-start="opacity-0 scale-y-0" x-transition:enter-end="opacity-100 scale-y-100"
    class="mb-6 sm:w-full {{ $maxWidth }} sm:mx-auto flex flex-col gap-4 overflow-hidden rounded-xl border border-slate-300 bg-white text-slate-700 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">
    {{$slot}}
  </div>
</div>


<!-- Modal Form -->
@if ($isModalOpen)
<x-backend-component.modal-animation wire:key="modal-crud-authors">
  <x-backend-component.modal-crud-authors :action="$action" :photo="$photo" :name="$name" :bio="$bio"
    :isModalOpen="$isModalOpen" />
</x-backend-component.modal-animation>
@endif
<!-- End Modal Form -->
<x-backend-component.modal-confirm />

<script>
  let editorInstance = null;

  // 🎯 Event listener untuk inisialisasi CKEditor saat modal dibuka
  document.addEventListener('open-modal', function() {
    initializeEditor();
  });

  function initializeEditor() {
    const editorElement = document.getElementById("editor");

    if (!editorElement || editorElement.classList.contains('ckeditor-initialized')) {
      return;
    }

    console.log('🔧 Inisialisasi CKEditor...');

    CKEDITOR.ClassicEditor.create(editorElement, {
        toolbar: {
          items: [
            'selectAll', 'bold', 'italic', 'underline', 'strikethrough', 'alignment', 'removeFormat',
            'bulletedList', 'numberedList', 'todoList', 'outdent', 'indent', 'fontColor', 'highlight',
            'specialCharacters', 'link', 'undo', 'redo',
          ],
          shouldNotGroupWhenFull: true
        },
        indentBlock: {
          offset: 17,
          unit: 'px'
        },
        list: {
          properties: {
            styles: true,
            startIndex: true,
            reversed: true
          }
        },
        placeholder: 'Type your biography',
        htmlSupport: {
          allow: [{
            name: /.*/,
            attributes: true,
            classes: true,
            styles: true
          }]
        },
        htmlEmbed: {
          showPreviews: true
        },
        link: {
          decorators: {
            addTargetToExternalLinks: true,
            defaultProtocol: 'https://'
          }
        },
        removePlugins: [
          'CKBox', 'CKFinder', 'EasyImage', 'RealTimeCollaborativeComments', 'RealTimeCollaborativeTrackChanges',
          'RealTimeCollaborativeRevisionHistory', 'PresenceList', 'Comments', 'TrackChanges', 'TrackChangesData',
          'RevisionHistory', 'Pagination', 'WProofreader', 'MathType'
        ]
      })
      .then(editor => {
        editorInstance = editor;
        editorElement.classList.add('ckeditor-initialized');

        console.log('✅ CKEditor berhasil diinisialisasi');

        // 📌 Tambahkan Word Count ke dalam halaman
        attachWordCount(editor);

        // 📢 Kirim update ke Livewire saat editor kehilangan fokus
        editor.editing.view.document.on('blur', () => {
          const bioData = editor.getData().trim();

          // console.log('📤 [BLUR] Mengirim updateBio ke Livewire:', bioData || '⚠️ Data kosong!');

          if (bioData.length > 0) {
            Livewire.dispatch('updateBio', {
              bio: bioData
            });
          } else {
            //  console.warn('⚠️ Tidak mengirim data kosong ke Livewire');
          }
        });

      })
      .catch(error => {
        console.error('❌ CKEditor Error:', error);
      });
  }

  // 📝 Fungsi untuk Menambahkan Word Count
  function attachWordCount(editor) {
    if (!editor.plugins.has('WordCount')) {
      // console.warn("⚠️ Plugin WordCount tidak tersedia!");
      return;
    }

    const wordCountPlugin = editor.plugins.get('WordCount');
    const wordCountWrapper = document.getElementById('word-count');

    if (wordCountWrapper) {
      wordCountWrapper.innerHTML = ''; // Bersihkan sebelum menambahkan
      wordCountWrapper.appendChild(wordCountPlugin.wordCountContainer);
    }
  }

  // 🛠️ Menyisipkan kembali Word Count setelah Livewire merender ulang
  Livewire.hook('message.processed', () => {
    setTimeout(() => {
      if (editorInstance) {
        attachWordCount(editorInstance);
      }
    }, 50); // ⏳ Beri jeda untuk memastikan elemen sudah ada
  });

  // 🎯 Livewire Listener: Menerima update dari Livewire
  Livewire.on('refreshEditor', (payload) => {
    if (!payload || typeof payload.bio === 'undefined') {
      if (!window.warnedRefreshEditor) {
        //  console.warn('⚠️ Data bio tidak tersedia dalam refreshEditor');
        window.warnedRefreshEditor = true;
      }
      return;
    }

    //  console.log('🔄 Data diterima dari Livewire:', payload);

    if (editorInstance) {
      // console.log('✍️ Memuat ulang data CKEditor:', payload.bio);
      editorInstance.setData(payload.bio || '');
    }

    window.warnedRefreshEditor = false;
  });

  // 🎯 Event listener saat modal ditutup (CKEditor dihancurkan)
  document.addEventListener('close-modal', function() {
    if (editorInstance) {
      console.log('🛑 Menutup modal, menghancurkan CKEditor...');
      editorInstance.destroy()
        .then(() => {
          console.log('✅ CKEditor dihancurkan');
          editorInstance = null;
        })
        .catch(error => {
          console.error('❌ Error saat menghancurkan CKEditor:', error);
        });
    }
  });
</script>

PASS Tests\Unit\ExampleTest
✓ that true is true 0.11s

FAIL Tests\Feature\Auth\AuthenticationTest
⨯ login screen can be rendered 4.37s
⨯ users can authenticate using the login screen 1.98s
⨯ users can not authenticate with invalid password 1.61s
⨯ navigation menu can be rendered 1.79s
⨯ users can logout 1.46s

PASS Tests\Feature\Auth\EmailVerificationTest
✓ email verification screen can be rendered 0.24s
✓ email can be verified 0.32s
✓ email is not verified with invalid hash 0.23s

FAIL Tests\Feature\Auth\PasswordConfirmationTest
⨯ confirm password screen can be rendered 1.53s
⨯ password can be confirmed 1.52s
⨯ password is not confirmed with invalid password 1.52s

FAIL Tests\Feature\Auth\PasswordResetTest
⨯ reset password link screen can be rendered 1.64s
⨯ reset password link can be requested 1.67s
⨯ reset password screen can be rendered 1.68s
⨯ password can be reset with valid token 1.41s

FAIL Tests\Feature\Auth\PasswordUpdateTest
⨯ password can be updated 1.20s
⨯ correct password must be provided to update password 1.19s

FAIL Tests\Feature\Auth\RegistrationTest
⨯ registration screen can be rendered 1.65s
⨯ new users can register 1.44s

PASS Tests\Feature\ExampleTest
✓ it returns a successful response 0.25s

FAIL Tests\Feature\ProfileTest
⨯ profile page is displayed 8.17s
⨯ profile information can be updated 1.31s
⨯ email verification status is unchanged when the email ad… 1.14s
⨯ user can delete their account 1.22s
⨯ correct password must be provided to delete account 1.14s

Tests: 21 failed, 5 passed (12 assertions)
Duration: 43.35s

Laravel Framework 11.44.2