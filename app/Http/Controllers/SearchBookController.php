<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Resources\BooksResource;
use App\Models\Book;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SearchBookController extends Controller
{
    use HttpResponses;
    public function index()
    {
        $data = Book::query()->paginate(125);
        return Inertia::render('Books', [
            'data' => $data
        ]);
    }
    public static function show()
    {
        return Book::query()->paginate(125);
    }
    public function searchbooks(Request $request)
    {
        $data = $request->all();
        $quantity = $request->quantity;
        $searchresult =  Book::when(!empty($data['title']), function ($query) use ($data) {
            return $query->where('title', 'like', '%' . $data['title'] . '%');
        })->when(!empty($data['author']), function ($query) use ($data) {
            return $query->where('author', 'like', '%' . $data['author'] . '%');
        })->when(!empty($data['genre']), function ($query) use ($data) {
            return $query->where('genre', 'like', '%' . $data['genre'] . '%');
        })->when(!empty($data['isbn']), function ($query) use ($data) {
            return $query->where('isbn', 'like', '%' . $data['isbn'] . '%');
        })->when(!empty($data['published']), function ($query) use ($data) {
            return $query->where('published', $data['published']);
        })->limit($quantity)->paginate($quantity);
        $data = BooksResource::collection($searchresult);
        $datacount = Book::all()->count();
        $messsage = "Your Search List of Books....";
        return $this->searchresponse($data, $datacount, $messsage, 200);
    }
    public function filterbooks(Request $request)
    {
        $data = $request->all();
        $quantity = $request->quantity;
        $columns = ['title', 'author', 'genre', 'isbn'];

        $search_value = $data['search'];
        $query = Book::select('*');

        foreach ($columns as $column) {
            $query->where($column, 'like', '%' . $search_value . '%');
        }

        $searchresult = $query->get();

        //$data = BooksResource::collection($searchresult);
        // $datacount = Book::all()->count();
        // $messsage = "Your Search List of Books....";
        // return $this->searchresponse($data, $datacount, $messsage, 200);
        return view('Welcome',['result', $searchresult]); 
    }
    public static function genre()
    {
        return Book::select('genre')->distinct()->get();
    }
    public static function authorlist()
    {
        return Book::select('author')->distinct()->get();
    }
    public function store(StoreBookRequest $request)
    {
        Book::create($request->all());

        return redirect()->back()
            ->with('message', 'Book created');
    }
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());

        return redirect()->back()
            ->with('message', 'Book updated');
    }
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->back()
            ->with('message', 'Book deleted');
    }
}
