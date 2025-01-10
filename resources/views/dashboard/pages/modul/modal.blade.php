<div id="addMenuTypeModal" class="modal-back" style="display: none">
  <div class="modal-content ">
    <div class="flex justify-between">
      <h3>Tambah Bab</h3>
      <span class="close-tambah cursor-pointer">&times;</span>
    </div>
      <form action="{{ route('babs.store') }}" method="POST" class="space-y-4">
          @csrf
          <div class="mb-3 mt-3">
              <label for="name" class="form-label text-sm font-medium text-gray-700">Nama Bab</label>
              <input type="text"
                  class="form-control mt-1 block w-full border border-slate-400 rounded-md shadow-sm p-13px sm:text-sm"
                  id="name" name="name" required>
          </div>

          <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
          <div class="modal-footer">
              <button type="submit" class="btn bg-indigo-700">Simpan</button>
          </div>
      </form>
  </div>
</div>

<script>
  var modal = document.getElementById("addMenuTypeModal");
var openModalBtn = document.getElementById("openModal");
var closeModalBtns = document.querySelectorAll(".close-tambah, .close-modal");

openModalBtn.onclick = function () {
    modal.style.display = "flex";
};

closeModalBtns.forEach(function (btn) {
    btn.onclick = function () {
        modal.style.display = "none";
    };
});

// Tutup modal ketika klik di luar konten modal
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

</script>
<div id="addModul" class="modal-back" style="display: none">
  <div class="modal-content-modul">
      <span class="close-tambah-modul">&times;</span>
      <h3>Tambah Tipe Menu</h3>
      <form action="{{ route('moduls.store') }}" method="POST" class="space-y-4">
          @csrf


            <div class="modul-section">
                <div class="modul-item border p-5 mb-3">
                    <div class="mb-15px">
                        <label class="mb-3 block font-semibold">Judul Modul</label>
                        <input type="text"  name="name" placeholder="Modul Name" class="form-control mb-3 w-full py-10px px-5 text-sm text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" >
                    </div>

                    <div class="grid grid-cols-1 xl:grid-cols-2 mb-15px gap-y-15px gap-x-30px">
                        <div>
                            <label class="text-xs uppercase text-placeholder block font-semibold text-opacity-50 leading-1.8">Video Pembelajaran</label>
                            <input type="file" name="video" accept="video/*" class="form-control mb-1 mt-3 w-full py-5px px-2 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border -2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" >
                    
                        </div>

                        <div>
                            <label class="text-xs uppercase text-placeholder block font-semibold text-opacity-50 leading-1.8">File Materi Pembelajaran</label>
                        <input type="file" name="file" accept="image/*,application/pdf" class="form-control mt-3 mb-3 w-full py-5px px-2 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border -2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" >
                        </div>
                    </div>

                    <div>
                        <label class="mb-3 block font-semibold">Materi</label>
                        <textarea name="materi" placeholder="Materi" id="materi" class="form-control mt-2 w-full py-10px px-5 text-sm text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" cols="20" rows="10" ></textarea>
                    </div>
                </div>
            </div>
            
        

          <input type="hidden" name="bab_id" id="bab_id">
          <div class="modal-footer">
              <button type="submit" class="btn bg-indigo-700">Simpan</button>
          </div>
      </form>
  </div>
</div>

<script>
  document.querySelectorAll('.openModalTambahModul').forEach(function(btn) {
    btn.onclick = function () {
        var babId = btn.getAttribute('data-bab-id'); // Ambil data-bab-id
        var modal = document.getElementById('addModul-' + babId); // ID modal sesuai dengan bab_id
        
        // Set bab_id ke input hidden dalam modal
        modal.querySelector('#bab_id-' + babId).value = babId;
        console.log("bab_id: ", babId);
        modal.style.display = "flex"; // Tampilkan modal yang sesuai
    };
});

// Menutup modal saat klik tombol close
document.querySelectorAll('.close-tambah-modul').forEach(function(btn) {
    btn.onclick = function () {
        var modal = btn.closest('.modal-back');
        modal.style.display = "none";
    };
});

// Menutup modal jika klik di luar konten modal
window.onclick = function (event) {
    document.querySelectorAll('.modal-back').forEach(function(modal) {
        if (event.target == modal) {
            modal.style.display = "none"; // Sembunyikan modal
        }
    });
};

</script>

<style>
  .iconpicker-popover {
      top: 300px;
  }

  .modal-back {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 99999 !important;
  }

  .modal-content {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      max-width: 500px;
      width: 100%;
  }

  .modal-content-modul {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    max-width: 800px;
    width: 90%;
    max-height: 95vh;  /* Menentukan tinggi maksimal modal */
    overflow-y: auto;  /* Menambahkan scrollbar vertikal jika konten lebih tinggi */
}


  .close,
  .close-tambah-modul {
      float: right;
      cursor: pointer;
      font-size: 24px;
  }

  .modal-footer {
      text-align: right;
  }
</style>

@include('landing.components.tinymce.tinymce')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
