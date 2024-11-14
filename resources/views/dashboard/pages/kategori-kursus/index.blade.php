@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Courses')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-12">
            <h2>Kategori Kursus</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">Tambah Kategori</button>
        </div>
    </div>

    <!-- Tabel Kategori Kursus -->
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->status }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm">Edit</button>
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal untuk menambah kategori -->
<div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('kategori-kursus.store') }}" method="POST" id="createCategoryForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCategoryModalLabel">Tambah Kategori Kursus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Kategori</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

<!-- Script untuk submit form dan menampilkan pesan success -->
<script>
    document.getElementById('createCategoryForm').addEventListener('submit', function(e) {
        e.preventDefault();
        var form = this;
        
        // Ambil CSRF token dari meta tag
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        // Ambil data dari form menggunakan FormData
        var formData = new FormData(form);

        // Kirim request AJAX
        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message); // Menampilkan pesan berhasil
                window.location.href = data.redirect_url; // Redirect ke halaman yang ditentukan
            } else {
                alert('Terjadi kesalahan saat menyimpan kategori.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengirimkan data.');
        });
    });
</script>
