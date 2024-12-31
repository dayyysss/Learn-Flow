<div id="addKeyword" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-modal w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white dark:bg-dark-card-shade rounded-lg shadow">
          <button type="button" data-modal-hide="addKeyword" class="absolute top-3 end-2.5 hover:bg-gray-200 dark:hover:bg-dark-icon rounded-lg size-8 flex-center">
              <i class="ri-close-line text-gray-500 dark:text-dark-text text-xl leading-none"></i>
          </button>
          <form id="keywordForm">
              <div class="p-4 md:p-5">
                  <label for="keywordInput" class="block text-sm font-medium text-gray-700 dark:text-dark-text mb-2">
                      Tambahkan Kata Kunci
                  </label>
                  <input id="keywordInput" name="meta_kata_kunci" class="w-full border border-gray-300 rounded-md p-2 dark:bg-dark-input dark:text-dark-text" placeholder="Masukkan kata kunci..." />
                  <div id="tagContainer" class="mt-2 flex flex-wrap gap-2">
                      @foreach($existingKeywords as $keyword)
                          <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded-full text-sm flex items-center gap-2">
                              {{ $keyword }}
                              <button type="button" class="text-red-500 hover:text-red-700" data-tag="{{ $keyword }}">&times;</button>
                          </span>
                      @endforeach
                  </div>
                  <button type="submit" class="mt-4 bg-primary text-white px-4 py-2 rounded-md hover:bg-primary-dark">
                      Simpan
                  </button>
              </div>
          </form>
      </div>
  </div>
</div>



{{-- kontak --}}
{{-- kontak --}}
<div id="addKontak" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-modal w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white dark:bg-dark-card-shade rounded-lg shadow">
          <button type="button" data-modal-hide="addKontak" class="absolute top-3 end-2.5 hover:bg-gray-200 dark:hover:bg-dark-icon rounded-lg size-8 flex-center">
              <i class="ri-close-line text-gray-500 dark:text-dark-text text-xl leading-none"></i>
          </button>
          <form id="keywordForm" method="POST" action="{{ route('konfigurasi.kontak') }}">
              @csrf
              <div class="p-4 md:p-5">
  
                  <label for="contact_name" class="block text-sm mb-2 font-medium text-gray-700 dark:text-dark-text mt-4">
                      Nama Kontak
                  </label>
                  <div id="contactNamesContainer">
                      @foreach($informasiKontak as $contact)
                          <div class="flex gap-2 mb-3">
                              <input type="text" name="contact_name[]" class="contact_name w-full border border-gray-300 rounded-md p-2 dark:bg-dark-input dark:text-dark-text" placeholder="Misal: Telepon" value="{{ $contact['name'] }}" required />
                              <input type="text" name="contact_value[]" class="contact_value w-full border border-gray-300 rounded-md p-2 dark:bg-dark-input dark:text-dark-text" placeholder="Misal: 123456789" value="{{ $contact['value'] }}" required />
                          </div>
                      @endforeach
                  </div>
                  
                  <button type="submit" class="mt-4 bg-primary text-white px-4 py-2 rounded-md hover:bg-primary-dark">
                    Simpan
                  </button>
                  <button type="button" id="addContactRow" class="mt-2 hover:bg-gray-200 dark:hover:bg-dark-icon text-white px-4 py-2 rounded-md hover:bg-green-600">
                    <i class="ri-add-line text-gray-500 dark:text-dark-text text-xl leading-none"></i>
                  </button>
              </div>
          </form>
      </div>
  </div>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    const addContactRowButton = document.getElementById('addContactRow');
    const contactNamesContainer = document.getElementById('contactNamesContainer');

    // Fungsi untuk menambah baris kontak baru
    addContactRowButton.addEventListener('click', function () {
        const newContactRow = document.createElement('div');
        newContactRow.classList.add('flex', 'gap-2', 'mb-3');
        newContactRow.innerHTML = `
            <input type="text" name="contact_name[]" class="contact_name w-full border border-gray-300 rounded-md p-2 dark:bg-dark-input dark:text-dark-text" placeholder="Misal: Telepon" required />
            <input type="text" name="contact_value[]" class="contact_value w-full border border-gray-300 rounded-md p-2 dark:bg-dark-input dark:text-dark-text" placeholder="Misal: 123456789" required />
        `;
        contactNamesContainer.appendChild(newContactRow);
    });
});

</script>

{{-- sosial_media --}}
<div id="addSosmed" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-modal w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white dark:bg-dark-card-shade rounded-lg shadow">
          <button type="button" data-modal-hide="addSosmed" class="absolute top-3 end-2.5 hover:bg-gray-200 dark:hover:bg-dark-icon rounded-lg size-8 flex-center">
              <i class="ri-close-line text-gray-500 dark:text-dark-text text-xl leading-none"></i>
          </button>
          <form id="keywordForm" method="POST" action="{{ route('konfigurasi.kontak') }}">
              @csrf
              <div class="p-4 md:p-5">
  
                  <label for="contact_name" class="block text-sm mb-2 font-medium text-gray-700 dark:text-dark-text mt-4">
                      Nama Kontak
                  </label>
                  <div id="contactNamesContainer">
                      @foreach($informasiKontak as $contact)
                          <div class="flex gap-2 mb-3">
                              <input type="text" name="contact_name[]" class="contact_name w-full border border-gray-300 rounded-md p-2 dark:bg-dark-input dark:text-dark-text" placeholder="Misal: Telepon" value="{{ $contact['name'] }}" required />
                              <input type="text" name="contact_value[]" class="contact_value w-full border border-gray-300 rounded-md p-2 dark:bg-dark-input dark:text-dark-text" placeholder="Misal: 123456789" value="{{ $contact['value'] }}" required />
                          </div>
                      @endforeach
                  </div>
                  
                  <button type="submit" class="mt-4 bg-primary text-white px-4 py-2 rounded-md hover:bg-primary-dark">
                    Simpan
                  </button>
                  <button type="button" id="addContactRow" class="mt-2 hover:bg-gray-200 dark:hover:bg-dark-icon text-white px-4 py-2 rounded-md hover:bg-green-600">
                    <i class="ri-add-line text-gray-500 dark:text-dark-text text-xl leading-none"></i>
                  </button>
              </div>
          </form>
      </div>
  </div>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    const addContactRowButton = document.getElementById('addContactRow');
    const contactNamesContainer = document.getElementById('contactNamesContainer');

    // Fungsi untuk menambah baris kontak baru
    addContactRowButton.addEventListener('click', function () {
        const newContactRow = document.createElement('div');
        newContactRow.classList.add('flex', 'gap-2', 'mb-3');
        newContactRow.innerHTML = `
            <input type="text" name="contact_name[]" class="contact_name w-full border border-gray-300 rounded-md p-2 dark:bg-dark-input dark:text-dark-text" placeholder="Misal: Telepon" required />
            <input type="text" name="contact_value[]" class="contact_value w-full border border-gray-300 rounded-md p-2 dark:bg-dark-input dark:text-dark-text" placeholder="Misal: 123456789" required />
        `;
        contactNamesContainer.appendChild(newContactRow);
    });
});

</script>
