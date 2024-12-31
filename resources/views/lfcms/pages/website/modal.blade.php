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
                  <div id="tagContainer" class="mt-2 flex flex-wrap gap-2"></div>
                  <button type="submit" class="mt-4 bg-primary text-white px-4 py-2 rounded-md hover:bg-primary-dark">
                      Simpan
                  </button>
              </div>
          </form>
      </div>
  </div>
</div>