<?php

namespace App\Http\Controllers;

use App\Repositories\planRepository;
use App\Http\Requests\planCreateRequest;


class PlanController extends Controller
{

    protected $PlanRepository;

    protected $nbrPerPage = 4;


    public function __construct(planRepository $planRepository)
    {
        //  $this->middleware('auth', ['except' => ['index', 'indexTag', 'language']]);
        $this->middleware('admin', ['only' => 'destroy']);

        $this->PlanRepository = $planRepository;
    }

    public function index()
    {
        //  $plans = $this->planRepository->getWithUserAndTagsPaginate($this->nbrPerPage);
        $plans = $this->PlanRepository->getPaginate($this->nbrPerPage);
        $links = $plans->render();

        return view('plans.liste', compact('plans', 'links'));
    }

    public function create()
    {
        return view('plans.add');
    }


    public function store(PlanCreateRequest $request/*, TagRepository $tagRepository*/)
    {
        $inputs = array_merge($request->all()/*, ['user_id' => $request->user()->id]*/);

        $plan = $this->PlanRepository->store($inputs);

        /* if(isset($inputs['tags']))
         {
             $tagRepository->store($post, $inputs['tags']);
         }
 */
        return redirect(route('plan.index'));
    }
}