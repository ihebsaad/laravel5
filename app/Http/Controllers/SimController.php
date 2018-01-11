<?php

namespace App\Http\Controllers;

use App\Repositories\SimRepository;
use App\Http\Requests\SimCreateRequest;


use Carbon\Carbon;


class SimController extends Controller
{

    protected $simRepository;

    protected $nbrPerPage = 4;
    protected $date ;

    public function __construct(simRepository $simRepository)
    {
      //  $this->middleware('auth', ['except' => ['index', 'indexTag', 'language']]);
        $this->middleware('admin', ['only' => 'destroy']);

        $this->simRepository = $simRepository;
    }

    public function index()
    {
      //  $sims = $this->simRepository->getWithUserAndTagsPaginate($this->nbrPerPage);
        $sims = $this->simRepository->getPaginate($this->nbrPerPage);
         $links = $sims->render();

        return view('sims.index', compact('sims', 'links'));
    }

    public function create()
    {
        return view('sims.add');
    }



    public function store(SimCreateRequest $request/*, TagRepository $tagRepository*/)
    {
        $inputs = array_merge($request->all()/*, ['user_id' => $request->user()->id]*/);

        $sim = $this->simRepository->store($inputs);

       /* if(isset($inputs['tags']))
        {
            $tagRepository->store($post, $inputs['tags']);
        }
*/
        return redirect(route('sim.index'));
    }

    public function destroy($id)
    {
        $this->simRepository->destroy($id);

        return redirect()->back();
    }

 /*   public function indexTag($tag)
    {
        $posts = $this->postRepository->getWithUserAndTagsForTagPaginate($tag, $this->nbrPerPage);
        $links = $posts->render();

        return view('posts.liste', compact('posts', 'links'))
            ->with('info', trans('blog.search') . $tag);
    }

    public function language()
    {
        session()->put('locale', session('locale') == 'fr' ? 'en' : 'fr');

        return redirect()->back();
    }
*/
}