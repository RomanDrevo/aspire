<?php

namespace App\Http\Controllers;

use App\Acme\Transformers\LessonTransformer;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class LessonsController extends ApiController
{
    protected $lessonTransformer;

    function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;
//        $this->middleware('auth', ['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $lessons = Lesson::all();
        return $this->respond(
            [
                'data' => $this->lessonTransformer->transformCollection($lessons->toArray())
            ]
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
//        die($request['title']);
        if(! $request['title'] or ! $request['body']){
            return $this->setStatusCode(422)->respondWithError('Params failed validation for a lesson.');
        }

        Lesson::create([
            'title' => $request['title'],
            'body' => $request['body']
        ]);

        return $this->respondCreated('Lesson created!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);

        if (!$lesson) {
            return $this->respondNotFound('Lesson does not exist');

        }

        return $this->respond([
            'data' => $this->lessonTransformer->transform($lesson)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
