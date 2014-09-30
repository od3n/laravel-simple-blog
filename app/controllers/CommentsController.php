<?php

class CommentsController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $title = 'Comment list';

        $comments = Comment::all();

        return View::make('comments.index', compact('title', 'comments'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = 'Create new Comment';

        return View::make('comments.create', compact('title'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Comment::$rules);

        if ($validation->passes())
        {
            Comment::create($input);

            return Redirect::route('comments.index');
        }

        return Redirect::route('comments.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {

        $comment = Comment::find($id);

        if ($comment) {

            // Show the page
            return View::make('comments/show', compact('comment'));

        } else {
            // Redirect to the comments index
            return Redirect::to('comments');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $title = 'Edit Comment';

        $comment = Comment::find($id);

        if (is_null($comment))
        {
            return Redirect::route('comments.index');
        }

        return View::make('comments.edit', compact('title', 'comment'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Comment::$rules);

        if ($validation->passes())
        {
            $comment = Comment::find($id);
            $comment->update($input);

            return Redirect::route('comments.edit', $id);
        }

        return Redirect::route('comments.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {
        Comment::find($id)->delete();

        return Redirect::route('comments.index');
    }


}
