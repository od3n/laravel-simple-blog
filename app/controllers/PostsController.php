<?php

class PostsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
    {
        $title = 'Post list';

        $posts = Post::all();

        return View::make('posts.index', compact('title', 'posts'));
    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $title = 'Create new Post';

        return View::make('posts.create', compact('title'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Post::$rules);

        if ($validation->passes())
        {
            Post::create($input);

            return Redirect::route('posts.index');
        }

        return Redirect::route('posts.create')
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

        $post = Post::find($id);

        if ($post) {

            // Show the page
            return View::make('posts/show', compact('post'));

        } else {
            // Redirect to the posts index
            return Redirect::to('posts');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function comment($id) {

        $input = Input::all();
        $validation = Validator::make($input, Comment::$rules);

        if ($validation->passes())
        {
            Comment::create($input);

            return Redirect::route('posts.show', $id);
        }

        return Redirect::route('posts.show', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $title = 'Edit Post';

        $post = Post::find($id);

        if (is_null($post))
        {
            return Redirect::route('posts.index');
        }

        return View::make('posts.edit', compact('title', 'post'));
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
        $validation = Validator::make($input, Post::$rules);

        if ($validation->passes())
        {
            $post = Post::find($id);
            $post->update($input);

            return Redirect::route('posts.edit', $id);
        }

        return Redirect::route('posts.edit', $id)
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
        Post::find($id)->delete();

        return Redirect::route('posts.index');
    }


}
