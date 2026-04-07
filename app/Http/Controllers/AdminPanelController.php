<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminPanelController extends Controller
{
    public function dashboard()
    {
        return view('adminpanel.dashboard', [
            'stats' => [
                'programs' => DB::table('programs')->count(),
                'projects' => DB::table('projects')->count(),
                'news_events' => DB::table('news')->count() + DB::table('events')->count(),
                'team' => DB::table('team_members')->count(),
            ],
            'recentProjects' => DB::table('projects')->orderByDesc('created_at')->limit(5)->get(),
            'recentNews' => DB::table('news')->orderByDesc('date')->limit(5)->get(),
        ]);
    }

    public function about()
    {
        return view('adminpanel.about', ['about' => DB::table('about')->latest()->get()]);
    }

    public function programs()
    {
        return view('adminpanel.programs', ['programs' => DB::table('programs')->get()]);
    }

    public function projects()
    {
        return view('adminpanel.projects', [
            'programs' => DB::table('programs')->select('id', 'name')->get(),
            'projects' => DB::table('projects')
                ->leftJoin('programs', 'projects.program_id', '=', 'programs.id')
                ->select('projects.*', 'programs.name as program_name')
                ->get(),
        ]);
    }

    public function research()
    {
        return view('adminpanel.research', ['research' => DB::table('research')->get()]);
    }

    public function news()
    {
        return view('adminpanel.news', ['news' => DB::table('news')->orderByDesc('date')->get()]);
    }

    public function events()
    {
        return view('adminpanel.events', ['events' => DB::table('events')->orderBy('event_date')->get()]);
    }

    public function team()
    {
        return view('adminpanel.team', ['team' => DB::table('team_members')->get()]);
    }

    public function gallery()
    {
        return view('adminpanel.gallery', ['gallery' => DB::table('gallery')->latest()->get()]);
    }

    public function getInvolved()
    {
        return view('adminpanel.get-involved', [
            'requests' => DB::table('get_involved_requests')->latest()->get(),
        ]);
    }

    public function messages()
    {
        return view('adminpanel.messages', ['messages' => DB::table('contact_messages')->latest()->get()]);
    }

    public function users()
    {
        return view('adminpanel.users', ['users' => DB::table('users')->get()]);
    }

    public function storeAbout(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:vision,mission,goal,core_value',
            'content' => 'required|string',
        ]);
        DB::table('about')->insert($data + ['created_at' => now(), 'updated_at' => now()]);
        return back();
    }

    public function updateAbout(Request $request, int $id)
    {
        $data = $request->validate([
            'type' => 'required|in:vision,mission,goal,core_value',
            'content' => 'required|string',
        ]);
        DB::table('about')->where('id', $id)->update($data + ['updated_at' => now()]);
        return back();
    }

    public function destroyAbout(int $id)
    {
        DB::table('about')->where('id', $id)->delete();
        return back();
    }

    public function storeProgram(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'description' => 'required|string',
            'objectives' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);
        $data['slug'] = Str::slug($data['name']);
        $data['image'] = $this->storeFile($request, 'image', 'programs');
        DB::table('programs')->insert($data + ['created_at' => now(), 'updated_at' => now()]);
        return back();
    }

    public function updateProgram(Request $request, int $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'description' => 'required|string',
            'objectives' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);
        $current = DB::table('programs')->where('id', $id)->first();
        $data['slug'] = Str::slug($data['name']);
        $data['image'] = $this->storeFile($request, 'image', 'programs') ?? $current?->image;
        DB::table('programs')->where('id', $id)->update($data + ['updated_at' => now()]);
        return back();
    }

    public function destroyProgram(int $id)
    {
        DB::table('programs')->where('id', $id)->delete();
        return back();
    }

    public function storeProject(Request $request)
    {
        $data = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'title' => 'required|string|max:150',
            'description' => 'required|string',
            'location' => 'required|string|max:100',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'status' => 'required|in:ongoing,completed',
            'image' => 'nullable|image|max:2048',
        ]);
        $data['image'] = $this->storeFile($request, 'image', 'projects');
        DB::table('projects')->insert($data + ['created_at' => now(), 'updated_at' => now()]);
        return back();
    }

    public function updateProject(Request $request, int $id)
    {
        $data = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'title' => 'required|string|max:150',
            'description' => 'required|string',
            'location' => 'required|string|max:100',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'status' => 'required|in:ongoing,completed',
            'image' => 'nullable|image|max:2048',
        ]);
        $current = DB::table('projects')->where('id', $id)->first();
        $data['image'] = $this->storeFile($request, 'image', 'projects') ?? $current?->image;
        DB::table('projects')->where('id', $id)->update($data + ['updated_at' => now()]);
        return back();
    }

    public function destroyProject(int $id)
    {
        DB::table('projects')->where('id', $id)->delete();
        return back();
    }

    public function storeResearch(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|string',
            'file' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ]);
        $data['file'] = $this->storeFile($request, 'file', 'research');
        DB::table('research')->insert($data + ['created_at' => now(), 'updated_at' => now()]);
        return back();
    }

    public function updateResearch(Request $request, int $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|string',
            'file' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ]);
        $current = DB::table('research')->where('id', $id)->first();
        $data['file'] = $this->storeFile($request, 'file', 'research') ?? $current?->file;
        DB::table('research')->where('id', $id)->update($data + ['updated_at' => now()]);
        return back();
    }

    public function destroyResearch(int $id)
    {
        DB::table('research')->where('id', $id)->delete();
        return back();
    }

    public function storeNews(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'content' => 'required|string',
            'date' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);
        $data['image'] = $this->storeFile($request, 'image', 'news');
        DB::table('news')->insert($data + ['created_at' => now(), 'updated_at' => now()]);
        return back();
    }

    public function updateNews(Request $request, int $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'content' => 'required|string',
            'date' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);
        $current = DB::table('news')->where('id', $id)->first();
        $data['image'] = $this->storeFile($request, 'image', 'news') ?? $current?->image;
        DB::table('news')->where('id', $id)->update($data + ['updated_at' => now()]);
        return back();
    }

    public function destroyNews(int $id)
    {
        DB::table('news')->where('id', $id)->delete();
        return back();
    }

    public function storeEvent(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|string',
            'location' => 'required|string|max:100',
            'event_date' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);
        $data['image'] = $this->storeFile($request, 'image', 'events');
        DB::table('events')->insert($data + ['created_at' => now(), 'updated_at' => now()]);
        return back();
    }

    public function updateEvent(Request $request, int $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|string',
            'location' => 'required|string|max:100',
            'event_date' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);
        $current = DB::table('events')->where('id', $id)->first();
        $data['image'] = $this->storeFile($request, 'image', 'events') ?? $current?->image;
        DB::table('events')->where('id', $id)->update($data + ['updated_at' => now()]);
        return back();
    }

    public function destroyEvent(int $id)
    {
        DB::table('events')->where('id', $id)->delete();
        return back();
    }

    public function storeTeam(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'department' => 'required|string|max:100',
            'description' => 'required|string',
            'photo' => 'nullable|image|max:2048',
        ]);
        $data['photo'] = $this->storeFile($request, 'photo', 'team');
        DB::table('team_members')->insert($data + ['created_at' => now(), 'updated_at' => now()]);
        return back();
    }

    public function updateTeam(Request $request, int $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'department' => 'required|string|max:100',
            'description' => 'required|string',
            'photo' => 'nullable|image|max:2048',
        ]);
        $current = DB::table('team_members')->where('id', $id)->first();
        $data['photo'] = $this->storeFile($request, 'photo', 'team') ?? $current?->photo;
        DB::table('team_members')->where('id', $id)->update($data + ['updated_at' => now()]);
        return back();
    }

    public function destroyTeam(int $id)
    {
        DB::table('team_members')->where('id', $id)->delete();
        return back();
    }

    public function storeGallery(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:photo,video',
            'caption' => 'nullable|string|max:255',
            'file' => 'required|file|max:8192',
        ]);
        $data['file'] = $this->storeFile($request, 'file', 'gallery');
        DB::table('gallery')->insert($data + ['created_at' => now(), 'updated_at' => now()]);
        return back();
    }

    public function updateGallery(Request $request, int $id)
    {
        $data = $request->validate([
            'type' => 'required|in:photo,video',
            'caption' => 'nullable|string|max:255',
            'file' => 'nullable|file|max:8192',
        ]);
        $current = DB::table('gallery')->where('id', $id)->first();
        $data['file'] = $this->storeFile($request, 'file', 'gallery') ?? $current?->file;
        DB::table('gallery')->where('id', $id)->update($data + ['updated_at' => now()]);
        return back();
    }

    public function destroyGallery(int $id)
    {
        DB::table('gallery')->where('id', $id)->delete();
        return back();
    }

    public function destroyGetInvolved(int $id)
    {
        DB::table('get_involved_requests')->where('id', $id)->delete();
        return back();
    }

    public function destroyMessage(int $id)
    {
        DB::table('contact_messages')->where('id', $id)->delete();
        return back();
    }

    public function storeUser(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,editor,staff',
        ]);
        $data['password'] = Hash::make($data['password']);
        DB::table('users')->insert($data + ['created_at' => now(), 'updated_at' => now()]);
        return back();
    }

    public function updateUser(Request $request, int $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:admin,editor,staff',
        ]);
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        DB::table('users')->where('id', $id)->update($data + ['updated_at' => now()]);
        return back();
    }

    public function destroyUser(int $id)
    {
        DB::table('users')->where('id', $id)->delete();
        return back();
    }

    private function storeFile(Request $request, string $field, string $folder): ?string
    {
        if (!$request->hasFile($field)) {
            return null;
        }

        $path = $request->file($field)->store("nwio/{$folder}", 'public');
        return '/storage/' . $path;
    }
}
