<?php

namespace App\Http\Controllers;


use App\Models\Title;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param string $type
     * @return View
     */
    public function index($type = 'series')
    {
        if ( Gate::allows('isCollaborator') ) {
            $bool  = $type === 'filmes';

            $titles = Title::where('titles.is_movie', $bool)->orderBy('updated_at', 'desc')->paginate(3);


            return view('admin.admin-index', compact('titles', 'type'));
        }

        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create($type)
    {
        if( Gate::allows('isCollaborator') ) {
            return view('admin.admin-create', ['type' => $type]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if( Gate::allows('isCollaborator' )) {
            $request->validate([
                'title' => 'required',
            ]);

            $type = $request->input('type');
            $title = new Title();

            $this->saveOrUpdateTitle($request, $title, $type);

            $type .= 's';
            return redirect()->route('users.create', ['type' => $type]);
        }

        abort(403);
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
     * @return View
     */
    public function edit($id)
    {
        if ( Gate::allows('isCollaborator') ) {
            $title = Title::findOrfail($id);
            $type = $title->is_movie ? 'filme' : 'serie';

            return view('admin.admin-edit', compact('title', 'type'));
        }

        abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        if ( Gate::allows('isCollaborator')  ) {
            $title = Title::findOrfail($request->input('id'));
            $type = $title->is_movie ? 'filme' : 'serie';

            $this->saveOrUpdateTitle($request, $title, $type);

            $type .= 's';
            return redirect()->route('admin.index', ['type' => $type]);
        }

        abort(403);
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

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Title  $title
     * @param  string  $type
     * @return void
     */
    public function saveOrUpdateTitle(Request $request, Title $title, string $type) {
        $title->title = $request->input('title');
        $title->original_title = $request->input('original_title');
        $title->year = $request->input('year');
        $title->summary = $request->input('summary');

        if ($type === 'serie') {
            $title->series_seasons = $request->input('series_seasons');
            $title->series_situation = $request->input('series_situation');
            $title->is_movie = false;
        } else {
            $title->movie_duration = $request->input('movie_duration');
            $title->is_movie = true;
        }

        if( $file = $request->file('poster') ) {
            $poster_name = 'poster-' . $title->year . '-' . $this->cleanString($title->title) . '.' . $file->extension();
            $title->poster = strtolower($poster_name);
            $file->move('./posters', $title->poster);
        }

        $channels = null;

        $total = $request->input('channels') ? count($request->input('channels')) : 0;
        if ( $total ) {
            $channels = $this->checkboxToArray($request->input('channels'), $total);
            $title->title_channels = implode(',', $channels[1]);
        }

        $categories = null;
        $total = $request->input('categories') ? count($request->input('categories')) : 0;
        if ( $total ) {
            $categories = $this->checkboxToArray($request->input('categories'), $total);
            $title->title_categories = implode(',', $categories[1]);
        }

        $countries = null;
        $total = $request->input('countries') ? count($request->input('countries')) : 0;
        if ( $total ) {
            $countries = $this->checkboxToArray($request->input('countries'), $total);
            $title->title_countries = implode(',', $countries[1]);
        }

        $title->save();

        if ( $channels ) $title->channels()->sync($channels[0]);
        if ( $categories ) $title->categories()->sync($categories[0]);
        if ( $countries ) $title->countries()->sync($countries[0]);
    }

    /**
     * @param $array
     * @param $total
     * @return array[]
     */
    public function checkboxToArray($array, $total) {
        $ids = [];
        $names = [];
        for($i = 0; $i < $total; $i++) {
            $arr = explode(',', $array[$i]);
            $ids[] = $arr[0];
            $names[] = $arr[1];
        }
        return [$ids, $names];
    }

    /**
     * @param $string
     * @return string
     */
    public function cleanString($string) {
        $unwanted_array = array('Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A',
            'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I',
            'Î'=>'I',  'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a',
            'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i',
            'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o',
            'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
        $str = strtr( $string, $unwanted_array ); // Replaces accents characters
        $string = str_replace(' ', '-', $str); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z\d\-]/', '', $string); // Removes others special chars.
    }
}
