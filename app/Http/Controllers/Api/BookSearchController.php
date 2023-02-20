<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BooksResource;
use App\Models\Book;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class BookSearchController extends Controller
{
    use HttpResponses;
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
        // $data = BooksResource::collection(Book::all());
        $datacount = Book::all()->count();
        $messsage = "Your Search List of Books....";
        return $this->searchresponse($data, $datacount, $messsage, 200);
    }
}
