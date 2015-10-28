<?php

namespace App\Http\Controllers;

use App\ProjectGroup;

use App\Http\Requests\ProjectGroupRequest;


// Allows the creation of new Project Groups
// and displaying a list of ones available
class ProjectGroupController extends Controller
{
    /*
    *  For custom error messages see "resources/lang/en/validation.php"
    *
    *  For validation see "Http/Requests/ProjectGroupRequest.php"
    */

    // Restrict access to authenticated users
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('super', ['except' => ['index']]);
    }
    /**
     * Display a listing of the Project Groups.
     *
     *
     */
    public function index()
    {
        $projects = ProjectGroup::all();

        return view('project_group.index', [
            'project_groups'  => $projects,

        ]);
    }

    /**
     * Show the form for creating a new Project Group.
     *
     *
     */
    public function create()
    {
        $projects = ProjectGroup::all();

        return view('project_group.create', [
            'project_groups'  => $projects,

        ]);
    }

    /**
     * Store a newly created Project Group in database.
     *
     */
    public function store(ProjectGroupRequest $request)
    {
        $input = $request->all();
        $project_group = new ProjectGroup($input);


        $project_group->save();


        return redirect('project_groups/create');
    }

}
