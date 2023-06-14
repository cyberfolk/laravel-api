<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['type', 'technologies', 'user'])->orderByDesc('id')->paginate(6);
        return response()->json([
            'succes' => true,
            'projects' => $projects,
        ]);
    }

    public function show($slug)
    {
        $project = Project::with(['type', 'technologies', 'user'])->where('slug', $slug)->first();
        if ($project) {
            return response()->json([
                'succes' => true,
                'result' => $project,
            ]);
        } else {
            return response()->json([
                'succes' => false,
                'result' => 'Post not found 404',
            ]);
        }
    }
}
