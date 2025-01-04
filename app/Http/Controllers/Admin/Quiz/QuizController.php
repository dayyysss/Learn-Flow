<?php

namespace App\Http\Controllers\Admin\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Bab;
use App\Models\Course;
use App\Models\Quiz;
use DateTime;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

    public function show($id)
    {
        $quiz = Quiz::with(['questions.options', 'quizResults'])->findOrFail($id);
        return view('dashboard.pages.quizzes.show', compact('quiz'));
    }

    public function create()
    {
        $courses = Course::all(); // Mengambil semua course yang ada
        $babs = []; // Inisialisasi babs kosong
        return view('dashboard.pages.quizzes.create', compact('courses', 'babs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'course_id' => 'required',
            'bab_id' => 'required|exists:babs,id',
            'start_time' => 'required', // Validasi format waktu
            'end_time' => 'required|after:start_time', // Waktu akhir harus setelah waktu mulai
            'description' => 'required', // Perbaikan aturan validasi
        ]);

        // Bersihkan tag HTML dari input description
        $cleanDescription = strip_tags($request->description);

        // Generate slug
        $slug = Str::slug($request->name);
        $count = Quiz::where('slug', 'like', $slug . '%')->where('id', '!=', $id ?? 0)->count();
        $slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;

        try {
            Quiz::create([
                'name' => $request->name,
                'slug' => $slug,
                'course_id' => $request->course_id,
                'bab_id' => $request->bab_id,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'description' => $cleanDescription,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Could not insert data: ' . $e->getMessage()])
                ->withInput();
        }

        return redirect()->route('quiz.index')->with('success', 'Quiz created successfully.');
    }

    public function edit(int $id): View
    {
        $quiz = Quiz::findOrFail($id);
        $courses = Course::all(); // Mengambil semua course yang ada
        $babs = []; // Inisialisasi babs kosong
        return view('dashboard.pages.quizzes.edit', compact('quiz', 'babs'));
    }

    public function update(Request $request, int $id)
    {
        $quiz = Quiz::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'course_id' => 'required',
            'bab_id' => 'required|exists:babs,id',
            'start_time' => 'required', // Format waktu
            'end_time' => 'required|after:start_time', // Waktu akhir harus setelah waktu mulai
            'description' => 'required', // Perbaikan aturan validasi
        ]);

        // Bersihkan tag HTML dari input description
        $cleanDescription = strip_tags($request->description);

        // Generate slug
        $slug = Str::slug($request->name);
        $count = Quiz::where('slug', 'like', $slug . '%')->where('id', '!=', $id ?? 0)->count();
        $slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;


        try {
            $quiz->update([
                'name' => $request->name,
                'slug' => $slug,
                'course_id' => $request->course_id,
                'bab_id' => $request->bab_id,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'description' => $cleanDescription,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Could not update data: ' . $e->getMessage()])
                ->withInput();
        }

        return redirect()->route('quiz.index')->with('success', 'Quiz updated successfully.');
    }

    // Hanya superadmin dan instructor yang bisa menghapus quiz
    public function destroy($id)
    {
        if (!auth()->user()->hasRole(['superadmin', 'instructor', 'admin'])) {
            abort(403, 'Unauthorized action.');
        }

        // Temukan Quiz berdasarkan ID
        $quiz = Quiz::findOrFail($id);

        // Hapus Quiz (cascading deletion akan bekerja di sini)
        $quiz->delete();

        return redirect()->route('quiz.index')->with('success', 'Quiz deleted successfully');
    }

    public function getBabsByCourse(Request $request, $courseId)
    {
        // Mengambil bab berdasarkan course_id yang dipilih
        $babs = Bab::where('course_id', $courseId)->get(['id', 'name']);

        // Mengembalikan response dalam format JSON untuk digunakan di frontend
        return response()->json($babs);
    }
}
