<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Book;
use Spatie\PdfToImage\Pdf;

class LibraryController extends Controller
{
    public function addbook(Request $request){
        $validated=$request->validate([
            'book_title'=>'required|string',
            'book_author'=>'required|string',
            'book'=>'required|file|mimes:pdf,epub|max:10000',
            'private'=>'required',
            'cust_id'=> 'required'
        ]);

        $exists=Book::where('cust_id',$request->cust_id)
                    -> where('Book_title',$validated["book_title"])
                    -> where('Book_author',$validated['book_author'])
                    ->exists();
        if($exists){
            return response()->json([
                'status' => 'Error',
                'message' => 'This book already exists in your Library',
            ], 201);
        }    

        $file = $request->file('book');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('books', $fileName, 'public');

        // $pdf = new Pdf(storage_path('app/public/' . $filePath));
        // $thumbnailName = 'covers/' . time() . '.jpg';
        // $pdf->setPage(1)->saveImage(storage_path('app/public/' . $thumbnailName));
        
   
        $book_datas=['book_id'=>'Book_'. random_int(100000,999999),
                'book'=>$fileName,
                'book_title'=>$validated['book_title'],
                'book_author'=>$validated['book_author'],
                'cust_id'=>$request->cust_id,
                'private'=>$validated['private'] ,
                'status'=>'To read',
                'last_page'=>0,
            ];

             
        try {
            Book::create($book_datas);

             return response()->json([
                'status' => 'success',
                'message' => 'Book added Successfully!',
            ], 200);

        }catch(\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Database Error: ' . $e->getMessage()
            ], 500);
        }


    }

    public function fetchBook(Request $request){
        $cust_id=$request->cust_id;
        $books=Book::where('cust_id',$cust_id)->get();

        if($books){
            return response()->json([
                'status' => 'success',
                'message' => 'Book fetched!',
                'datas'=>$books,
            ], 200);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'No Book Found!'
            ], 500);
        }
    }

}
