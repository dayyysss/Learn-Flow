@extends('lfcms.layouts.app')
@section('page_title', 'Kursus | Learn Flow CMS')
@section('content')

    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        <div class="grid grid-cols-12 gap-x-4">
            <!-- Start Dashboard Overview -->
            <div class="col-span-full border-indigo-500 card p-3 sm:p-7" style="border-top: 4px solid #795DED ">
                <div class="grid grid-cols-12 gap-4">
                    <!-- Quiz Details -->
                    <div
                        class="col-span-full 2xl:col-span-3 p-[10px_16px] dk-border-one rounded-xl h-full dk-theme-card-square">
                        <div
                            class="bg-card-pattern dark:bg-card-pattern-dark bg-no-repeat bg-100% flex-center-between gap-4">
                            <div class="shrink-0 p-5">
                                <div class="card-title text-[32px]">
                                    <p>{{ $quiz->name }}</p>
                                </div>
                                <div class="leading-none text-gray-500 dark:text-dark-text mt-2">
                                    {{ $quiz->description }}
                                </div>
                            </div>

                            <button class="btn b-solid btn-primary-solid dk-theme-card-square" id="openModal">
                                <i class="ri-add-circle-line text-inherit"></i>
                                <span>Tambah</span>
                            </button>




                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Tambah Pertanyaan -->
            <div id="addPertanyaan" style="display: none" class="col-span-full  modal-back card p-3 sm:p-7 mt-4">
                <div class="modal-content">
                    <span class="close-tambah">&times;</span>
                    <h4 class="card-title">Tambah Pertanyaan</h4>
                    <form action="{{ route('quiz.storeQuestion', $quiz->id) }}" class="mt-5" method="POST">
                        @csrf
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-full">
                                <label class="form-label">Pertanyaan</label>
                                <input type="text" name="question" class="form-input" required
                                    placeholder="Masukkan pertanyaan">
                            </div>
                            <div class="col-span-6">
                                <label class="form-label">Opsi A</label>
                                <input type="text" name="option_a" class="form-input" required placeholder="Opsi A">
                            </div>
                            <div class="col-span-6">
                                <label class="form-label">Opsi B</label>
                                <input type="text" name="option_b" class="form-input" required placeholder="Opsi B">
                            </div>
                            <div class="col-span-6">
                                <label class="form-label">Opsi C</label>
                                <input type="text" name="option_c" class="form-input" required placeholder="Opsi C">
                            </div>
                            <div class="col-span-6">
                                <label class="form-label">Opsi D</label>
                                <input type="text" name="option_d" class="form-input" required placeholder="Opsi D">
                            </div>
                            <div class="col-span-full">
                                <label class="form-label">Opsi E (Opsional)</label>
                                <input type="text" name="option_e" class="form-input" placeholder="Opsi E (Opsional)">
                            </div>
                            <div class="col-span-full">
                                <label class="form-label">Jawaban Benar : </label>
                                <select name="correct_answer" class="form-select" required>
                                    <option value="option_a">Opsi A</option>
                                    <option value="option_b">Opsi B</option>
                                    <option value="option_c">Opsi C</option>
                                    <option value="option_d">Opsi D</option>
                                    <option value="option_e">Opsi E</option>
                                </select>
                            </div>
                            <div class="col-span-full">
                                <label class="form-label">Skor</label>
                                <input type="number" name="score" class="form-input" required min="1"
                                    placeholder="Masukkan skor">
                            </div>
                            <div class="col-span-full">
                                <button type="submit" class="btn btn-primary-light w-full">Simpan Pertanyaan</button>
                            </div>


                        </div>
                    </form>
                </div>
            </div>

            @if ($quiz->questions->count() > 0)

                <div class="col-span-full card p-3 sm:p-7">
                    
                    <div class="overflow-x-auto mt-18">
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-700">
                                    <th class="border border-gray-300 px-4 py-2">No</th>
                                    <th class="border border-gray-300 px-4 py-2">Pertanyaan</th>
                                    <th class="border border-gray-300 px-4 py-2">Opsi</th>
                                    <th class="border border-gray-300 px-4 py-2">Jawaban Benar</th>
                                    <th class="border border-gray-300 px-4 py-2">Skor</th>
                                    <th class="border border-gray-300 px-4 py-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quiz->questions as $index => $question)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $question->question }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            A: {{ $question->options->first()->option_a }}<br>
                                            B: {{ $question->options->first()->option_b }}<br>
                                            C: {{ $question->options->first()->option_c }}<br>
                                            D: {{ $question->options->first()->option_d }}<br>
                                            @if ($question->options->first()->option_e)
                                                E: {{ $question->options->first()->option_e }}
                                            @endif
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            {{ strtoupper(str_replace('option_', '', $question->options->first()->correct_answer)) }}
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $question->score }}</td>
                                        <td class="border border-gray-300 px-4 py-2 ">
                                            <div class="flex gap-2">
                                                <form action="{{ route('quiz.questions.delete', $question->id) }}"
                                                    method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-icon btn-danger-icon-light size-7"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pertanyaan ini?')">
                                                        <i
                                                            class="ri-delete-bin-line text-inherit text-[13px]"></i></button>
                                                </form>

                                                <a href="javascript:void(0)" class="btn-icon btn-primary-icon-light size-7"
                                                    onclick="openEditModal({{ json_encode($question) }})">
                                                    <i class="ri-edit-2-line text-inherit text-[13px]"></i>
                                                </a>
                                            </div>
                                            <div id="editMenuTypeModal" class="modal-back" style="display: none">
                                                <div class="modal-content">
                                                    <span class="close-edit">&times;</span>
                                                    <h3>Edit Tipe Menu</h3>
                                                    <form action="" method="POST" class="space-y-4"
                                                        id="editMenuTypeForm">
                                                        @csrf
                                                        @method('PUT') <!-- Gunakan PUT untuk update -->
                                                        <div class="grid grid-cols-12 gap-4">
                                                            <div class="col-span-full">
                                                                <label class="form-label">Pertanyaan</label>
                                                                <input type="text" id="edit_name" name="question"
                                                                    class="form-input" required
                                                                    placeholder="Masukkan pertanyaan">
                                                            </div>
                                                            <div class="col-span-6">
                                                                <label class="form-label">Opsi A</label>
                                                                <input type="text" id="edit_option_a" name="option_a"
                                                                    class="form-input" required placeholder="Opsi A">
                                                            </div>
                                                            <div class="col-span-6">
                                                                <label class="form-label">Opsi B</label>
                                                                <input type="text" id="edit_option_b" name="option_b"
                                                                    class="form-input" required placeholder="Opsi B">
                                                            </div>
                                                            <div class="col-span-6">
                                                                <label class="form-label">Opsi C</label>
                                                                <input type="text" id="edit_option_c" name="option_c"
                                                                    class="form-input" required placeholder="Opsi C">
                                                            </div>
                                                            <div class="col-span-6">
                                                                <label class="form-label">Opsi D</label>
                                                                <input type="text" id='edit_option_d' name="option_d"
                                                                    class="form-input" required placeholder="Opsi D">
                                                            </div>
                                                            <div class="col-span-full">
                                                                <label class="form-label">Opsi E (Opsional)</label>
                                                                <input type="text" id="edit_option_e" name="option_e"
                                                                    class="form-input" placeholder="Opsi E (Opsional)">
                                                            </div>
                                                            <div class="col-span-full">
                                                                <label class="form-label">Jawaban Benar : </label>
                                                                <select name="correct_answer" class="form-select"
                                                                    id="edit_correct_answer" required>
                                                                    <option value="option_a">Opsi A</option>
                                                                    <option value="option_b">Opsi B</option>
                                                                    <option value="option_c">Opsi C</option>
                                                                    <option value="option_d">Opsi D</option>
                                                                    <option value="option_e">Opsi E</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-span-full">
                                                                <label class="form-label">Skor</label>
                                                                <input type="number" id="edit_score" name="score"
                                                                    class="form-input" required min="1"
                                                                    placeholder="Masukkan skor">
                                                            </div>
                                                            <div class="col-span-full">
                                                                <button type="submit"
                                                                    class="btn btn-primary-light w-full">Simpan
                                                                    Pertanyaan</button>
                                                            </div>


                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <p class="text-gray-500 mt-3">Belum ada pertanyaan yang ditambahkan.</p>
            @endif


        </div>
    </div>

    <style>
        .dd-empty {
            display: none;
        }

        .modal-back {
            display: none;
            position: fixed;
            /* Agar modal tetap fixed pada layar */
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Untuk latar belakang gelap */
            display: flex;
            /* Flexbox untuk memastikan modal tetap di tengah */
            justify-content: center;
            /* Pusatkan modal secara horizontal */
            align-items: center;
            /* Pusatkan modal secara vertikal */
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 700px;
            /* Atur lebar modal */
            max-width: 90%;
            /* Pastikan modal responsif pada layar kecil */
            position: relative;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .close,
        .close-tambahMenu,
        .close-tambah,
        .close-edit {
            position: absolute;
            right: 10px;
            top: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        .modal-footer {
            display: flex;
            justify-content: end;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .dd-item>button {
            margin-left: 65px;
            position: absolute;
        }

        .dd1-content {
            background: #ffffff;
            position: relative;
            border: 1px solid #d8d5d5;
            margin: 5px 0;
            padding: 5px 10px;
            height: 30px;
            box-sizing: border-box;
            color: #333;
            text-decoration: none;
            font-weight: 700;
            border-radius: 0px 3px 3px 0px;
        }

        .dd-handle {
            display: block;
            position: relative;
            height: 30px;
            margin: 5px 0;
            padding: 5px 10px;
            color: #fff;
            /* Warna teks */
            text-decoration: none;
            font-weight: 700;
            border: 1px solid #ccc;
            background: #140142;
            border-radius: 3px 0px 0px 3px;
            box-sizing: border-box;
            transition: background-color 0.3s ease;
            /* Animasi transisi */
        }

        .dd-handle:hover {
            background: #053d72;
            /* Warna biru muda saat hover */
            color: #fff;
            /* Tetap warna teks putih */
            cursor: pointer;
            /* Ganti kursor menjadi pointer */
        }


        .dd3-handle::before {
            content: "≡";
            display: flex;
            justify-content: center;
            color: #fff;

            /* position: absolute; */
            text-align: center;
            text-indent: 0px;
            left: 0;
            font-size: 20px;
            font-weight: 400;

        }

        .btn {
            padding: 5px 10px;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .dd {
            max-width: 100%;
        }
    </style>

    <script>
        var modal = document.getElementById("addPertanyaan");
        var openModalBtn = document.getElementById("openModal");
        var closeModalBtns = document.querySelectorAll(".close-tambah, .close-modal");

        openModalBtn.onclick = function() {
            modal.style.display = "flex";
        };

        closeModalBtns.forEach(function(btn) {
            btn.onclick = function() {
                modal.style.display = "none";
            };
        });

        // Tutup modal ketika klik di luar konten modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };
    </script>
    <script>
        var editModal = document.getElementById("editMenuTypeModal");
        var editForm = document.getElementById("editMenuTypeForm");

        // Fungsi untuk membuka modal edit dan mengisi data tipe menu
        function openEditModal(question) {
            // Set nilai input nama berdasarkan data yang diterima
            document.getElementById("edit_name").value = question.question;
            document.getElementById("edit_option_a").value = question.options && question.options[0] ? question.options[0]
                .option_a : '';
            document.getElementById("edit_option_b").value = question.options && question.options[0] ? question.options[0]
                .option_b : '';
            document.getElementById("edit_option_c").value = question.options && question.options[0] ? question.options[0]
                .option_c : '';
            document.getElementById("edit_option_d").value = question.options && question.options[0] ? question.options[0]
                .option_d : '';
            document.getElementById("edit_option_e").value = question.options && question.options[0] ? question.options[0]
                .option_e : '';

            document.getElementById("edit_correct_answer").value = question.options && question.options[0] ? question.options[0]
            .correct_answer : '';
            document.getElementById("edit_score").value = question.score;

            // Ubah action form menjadi route update yang sesuai
            editForm.action = "/lfcms/quiz/questions/" + question.id; // Sesuaikan dengan route update

            // Tampilkan modal edit
            editModal.style.display = "flex";
        }

        // Tutup modal ketika tombol close atau area luar modal diklik
        var closeEditModalBtns = document.querySelectorAll(".close-edit, .close-modal");

        closeEditModalBtns.forEach(function(btn) {
            btn.onclick = function() {
                editModal.style.display = "none";
            };
        });

        window.onclick = function(event) {
            if (event.target == editModal) {
                editModal.style.display = "none";
            }
        };
    </script>
@endsection
