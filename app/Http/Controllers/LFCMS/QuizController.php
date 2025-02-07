<?php

namespace App\Http\Controllers\LFCMS;

use App\Http\Controllers\Controller;
use App\Models\Bab;
use App\Models\Course;
use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    public function index()
    {
        // Mengambil semua quiz dengan relasi 'questions', 'quizResults', 'course', dan 'bab'
        $quizzes = Quiz::with(['questions', 'quizResults', 'course', 'bab'])->get();

        // Mengirimkan data ke view
        return view('dashboard.pages.quizzes.index', compact('quizzes'));
    }

    public function show($slug)
    {
        $quiz = Quiz::with(['questions.options', 'quizResults', 'course', 'bab'])->where('slug', $slug)->firstOrFail();
        return view('dashboard.pages.quizzes.show', compact('quiz'));
    }

    public function create()
    {
        $courses = Course::all(); // Mengambil semua course yang ada
        $babs = Bab::all();
        return view('dashboard.pages.quizzes.create', compact('courses', 'babs'));
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'course_id' => 'required|exists:courses,id',
            'bab_id' => 'required|exists:babs,id',
            'waktu' => 'required',
           
            'description' => 'required',
        ]);

        $cleanDescription = strip_tags($request->description);

        // Log the incoming request data
        Log::info('Storing Quiz:', $validated);

        $slug = Str::slug($request->name);
        $count = Quiz::where('slug', 'like', $slug . '%')->where('id', '!=', $id ?? 0)->count();
        $slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;

        try {
            Quiz::create([
                'name' => $request->name,
                'slug' => $slug,
                'course_id' => $request->course_id,
                'bab_id' => $request->bab_id,
                'waktu' => $request->waktu,
                'description' => $cleanDescription,
            ]);

            // Log success message
            Log::info('Quiz created successfully', ['slug' => $slug]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error creating quiz: ' . $e->getMessage());

            return redirect()->back()
                ->withErrors(['error' => 'Could not insert data: ' . $e->getMessage()])
                ->withInput();
        }

        return redirect()->back()->with('success', 'Quiz created successfully.');
    }

    public function edit(string $slug)
    {
        $quiz = Quiz::where('slug', $slug)->firstOrFail();
        $courses = Course::all(); // Mengambil semua course yang ada
        $babs = Bab::all();
        return view('dashboard.pages.quizzes.edit', compact('quiz', 'babs', 'courses'));
    }

    public function update(Request $request, string $slug)
    {
        $quiz = Quiz::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required',
            'course_id' => 'required|exists:courses,id',
            'bab_id' => 'required|exists:babs,id',
            'waktu' => 'required', // Format waktu
           
            'description' => 'required',
        ]);

        // Bersihkan tag HTML dari input description
        $cleanDescription = strip_tags($request->description);

        // Generate slug baru jika nama diubah
        $slug = $quiz->slug; // Tetap gunakan slug lama jika nama tidak berubah
        if ($quiz->name !== $request->name) {
            $slug = Str::slug($request->name);
            $count = Quiz::where('slug', 'like', $slug . '%')->where('id', '!=', $quiz->id)->count();
            $slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
        }

        $quiz->update([
            'name' => $request->name,
            'slug' => $slug,
            'course_id' => $request->course_id,
            'bab_id' => $request->bab_id,
            'waktu' => $request->waktu,
            'description' => $cleanDescription,
        ]);

        return redirect()->route('quiz.index')->with('success', 'Quiz updated successfully.');
    }

    // Hanya superadmin dan instructor yang bisa menghapus quiz
    public function destroy(string $id)
    {
        if (!auth()->user()->hasRole(['superadmin', 'instructor', 'admin'])) {
            abort(403, 'Unauthorized action.');
        }

        // Temukan Quiz berdasarkan slug
        $quiz = Quiz::where('id', $id)->firstOrFail();

        // Hapus Quiz (cascading deletion akan bekerja jika diatur di database)
        $quiz->delete();

        return redirect()->back()->with('success', 'Quiz deleted successfully.');
    }

    public function getBabsByCourse(Request $request, $courseId)
    {
        // Mengambil bab berdasarkan course_id yang dipilih
        $babs = Bab::where('course_id', $courseId)->get(['id', 'name']);

        // Mengembalikan response dalam format JSON untuk digunakan di frontend
        return response()->json($babs);
    }

    public function showQuiz($slug)
    {
        // Ambil quiz berdasarkan slug beserta relasi pertanyaan dan opsi jawabannya
        $quiz = Quiz::with(['questions.options', 'quizResults', 'course', 'bab'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('lfcms.pages.kursus.quiz', compact('quiz'));
    }

    public function storeQuestion(Request $request, $quizId)
    {
        // Validasi input
        $validated = $request->validate([
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'option_e' => 'nullable', // Opsi E bisa kosong
            'correct_answer' => 'required', // Validasi correct_answer sesuai dengan opsi
            'score' => 'required|numeric|min:1',
        ]);

        try {
            // Simpan pertanyaan
            $question = Question::create([
                'quiz_id' => $quizId,
                'question' => $validated['question'],
                'score' => $validated['score'],
            ]);

            // Simpan opsi jawaban
            Option::create([
                'question_id' => $question->id,
                'option_a' => $validated['option_a'],
                'option_b' => $validated['option_b'],
                'option_c' => $validated['option_c'],
                'option_d' => $validated['option_d'],
                'option_e' => $validated['option_e'] ?? null,  // Jika option_e tidak diisi, maka null
                'correct_answer' => $validated['correct_answer'], // Menyimpan correct_answer sesuai pilihan
            ]);

            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Pertanyaan berhasil ditambahkan');
        } catch (\Exception $e) {
            // Jika terjadi error, redirect dengan pesan error
            return redirect()->back()->withErrors(['error' => 'Gagal menambahkan pertanyaan: ' . $e->getMessage()]);
        }
    }

    public function updateQuestion(Request $request, $id)
{
    // Validasi input
    $validated = $request->validate([
        'question' => 'required',
        'option_a' => 'required',
        'option_b' => 'required',
        'option_c' => 'required',
        'option_d' => 'required',
        'option_e' => 'nullable',
        'correct_answer' => 'required',
        'score' => 'required|numeric|min:1',
    ]);

    try {
        // Update pertanyaan
        $question = Question::findOrFail($id);
        $question->update([
            'question' => $validated['question'],
            'score' => $validated['score'],
        ]);

        // Update opsi jawaban
        $question->options()->update([
            'option_a' => $validated['option_a'],
            'option_b' => $validated['option_b'],
            'option_c' => $validated['option_c'],
            'option_d' => $validated['option_d'],
            'option_e' => $validated['option_e'] ?? null,
            'correct_answer' => $validated['correct_answer'],
        ]);

        return redirect()->back()->with('success', 'Pertanyaan berhasil diperbarui');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'Gagal memperbarui pertanyaan: ' . $e->getMessage()]);
    }
}

public function deleteQuestion($id)
{
    try {
        $question = Question::findOrFail($id);
        $question->options()->delete(); // Hapus opsi terlebih dahulu
        $question->delete(); // Hapus pertanyaan

        return redirect()->back()->with('success', 'Pertanyaan berhasil dihapus');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'Gagal menghapus pertanyaan: ' . $e->getMessage()]);
    }
}

    
}
