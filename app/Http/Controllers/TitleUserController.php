<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\TitleUser;
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
        if ( Gate::allows('isSubscriber') ) {
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
    public function addTitle($type): \Illuminate\Contracts\View\View
    {
        if( Gate::allows('isSubscriber') ) {
            $bool = $type === 'filmes';
            $user = auth()->user();
            $series = Title::where('is_movie', $bool)->get();
            $users = $user->titles()->where('titles.is_movie', $bool)->select('titles.*')->get();
            $titles = $series->diff($users);

            return view('users.users-add-title', compact('titles', 'type'));
        }

        abort(403);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function userStoreOrUpdate(Request $request)
    {
        if ( $user = auth()->user() ) {
            $title_user = TitleUser::where('title_id', $request->input('id'))->first();
            if ( !$title_user ) $title_user= new TitleUser();

            $title_user->title_id = $request->input('id');
            $title_user->user_id = $user->id;
            $title_user->user_rating = $request->input('user_rating');
            $title_user->user_channel = $request->input('user_channel');
            $title_user->user_status = $request->input('user_status');
            if ( $request->input('type') === 'series') {
                $title_user->last_season = $request->input('last_season');
                $title_user->last_episode = $request->input('last_episode');
            }
            $title_user->user_trash = false;

            $title_user->save();

            return redirect()->route('users.index', ['type' => $request->input('type')]);
        }
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
