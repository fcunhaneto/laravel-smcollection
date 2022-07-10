<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TitleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param string $type
     * @return \Illuminate\Contracts\View\View
     */
    public function index($type = 'series')
    {
        if ( Gate::allows('isCollaborator') ) {
            $bool = $type === 'filmes';
            $titles = Title::where('titles.is_movie', $bool)
                ->join('title_user', 'titles.id', '=', 'title_user.title_id')
                ->where('title_user.user_trash', false)
                ->orderBy('title_user.updated_at')
                ->paginate(3);

            return view('users.users-index', compact('titles','type'));
        }

        abort(403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create($type): \Illuminate\Contracts\View\View
    {
        if( Gate::allows('isSubscriber') ) {
            $bool = $type === 'filmes';
            $user = auth()->user();
            $series = Title::where('is_movie', $bool)->get();
            $users = $user->titles()->where('titles.is_movie', $bool)->select('titles.*')->get();
            $titles = $series->diff($users);

            return view('users.users-create', compact('titles', 'type'));
        }

        abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
