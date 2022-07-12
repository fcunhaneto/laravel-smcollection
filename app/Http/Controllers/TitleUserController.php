<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\TitleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TitleUserController extends Controller
{
    /**
     * Display a listing of user series or movie.
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
     * Show a table with movies or series to user add it.
     *
     * @param string $type
     * @return \Illuminate\Contracts\View\View
     */
    public function addTitle($type)
    {
        if( Gate::allows('isSubscriber') ) {
            $bool = $type === 'filmes';
            $user = auth()->user();
            $title = Title::where('is_movie', $bool)->get();
            $users = $user->titles()->where('titles.is_movie', $bool)->select('titles.*')->get();
            $titles = $title->diff($users);

            return view('users.users-add-title', compact('titles', 'type'));
        }

        abort(403);
    }

    /**
     * Store or update user movie or serie.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function userStoreOrUpdate(Request $request)
    {
        if ( $user = auth()->user() ) {
            $title_user = TitleUser::where('title_id', $request->input('id'))->first();
            if ( !$title_user ) $title_user= new TitleUser();

            $id = $request->input('id');
            $title_user->title_id = $id;
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

            $rating = intval( Title::where('titles.id', $id)
                ->leftJoin('title_user', 'titles.id', '=', 'title_user.title_id')
                ->select('title_user.rating')
                ->avg('title_user.rating')
            );

            Title::where('titles.id', $id)->update(['title_rating' => $rating]);

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
