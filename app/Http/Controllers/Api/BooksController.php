<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Resources\BooksResource;
use App\Models\Book;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Book::all();
        return BooksResource::collection(
            Book::where(
                'user_id',
                Auth::user()->id
            )->get()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $request->validated($request->all());
        $book = Book::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
            'description' => $request->description,
            'isbn' => $request->isbn,
            'image' => $request->image,
            'published' => $request->published,
            'publisher' => $request->publisher
        ]);
        return new BooksResource($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return $this->isNotAuthorized($book) ? $this->isNotAuthorized($book) :
            new BooksResource($book);
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
    public function update(Request $request, Book $book)
    {
        if (Auth::user()->id !== $book->user_id) {
            return $this->error(null, 'You are not authorized to make this request.', 403);
        }
        $book->update($request->all());
        return new BooksResource($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        // return $this->isNotAuthorized($book) ? $this->isNotAuthorized($book) :
        // $book->delete();
        if($this->isNotAuthorized($book)){
          return  $this->isNotAuthorized($book);
        }else {
            if(!$book->delete())
            {
               return $this->error(null, 'Task Deletion Failed', 403);
           }else{
             return $this->success(null, 'Task Successfully Deleted', 200);
           }
        }
            //$this->success('', 'Task Successfully Deleted', 200);
        
    }
    private function isNotAuthorized($book)
    {
        if (Auth::user()->id !== $book->user_id) {
            return $this->error('', 'You are not authorized to make this request.', 403);
        }
    }
}
