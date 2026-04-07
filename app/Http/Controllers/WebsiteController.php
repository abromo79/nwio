<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function home()
    {
        return view('websitepart.home', [
            'programs' => DB::table('programs')->limit(3)->get(),
            'news' => DB::table('news')->orderByDesc('date')->limit(3)->get(),
            'events' => DB::table('events')->orderBy('event_date')->limit(3)->get(),
        ]);
    }

    public function about()
    {
        return view('websitepart.about-us', [
            'about' => DB::table('about')->get()->groupBy('type'),
        ]);
    }

    public function program(string $slug)
    {
        $program = DB::table('programs')->where('slug', $slug)->first();
        abort_if(!$program, 404);

        return view('websitepart.program-detail', [
            'program' => $program,
            'activities' => DB::table('program_activities')
                ->where('program_id', $program->id)
                ->pluck('activity'),
        ]);
    }

    public function projects(string $status)
    {
        abort_unless(in_array($status, ['ongoing', 'completed'], true), 404);

        return view('websitepart.projects', [
            'status' => $status,
            'projects' => DB::table('projects')
                ->where('status', $status)
                ->leftJoin('programs', 'projects.program_id', '=', 'programs.id')
                ->select('projects.*', 'programs.name as program_name')
                ->orderByDesc('start_date')
                ->get(),
        ]);
    }

    public function research()
    {
        return view('websitepart.research-innovation', [
            'research' => DB::table('research')->orderByDesc('created_at')->get(),
        ]);
    }

    public function getInvolved()
    {
        return view('websitepart.get-involved');
    }

    public function news()
    {
        return view('websitepart.news', [
            'news' => DB::table('news')->orderByDesc('date')->get(),
        ]);
    }

    public function events()
    {
        return view('websitepart.events', [
            'events' => DB::table('events')->orderBy('event_date')->get(),
        ]);
    }

    public function team()
    {
        return view('websitepart.our-team', [
            'team' => DB::table('team_members')->get(),
        ]);
    }

    public function gallery()
    {
        return view('websitepart.gallery', [
            'gallery' => DB::table('gallery')->latest()->get(),
        ]);
    }

    public function contact()
    {
        return view('websitepart.contact-us');
    }
}
