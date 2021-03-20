<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
  public function index()
    {
      $news = new News();
      $data =  $news->orderBy('created_at', 'desc')->get();

       foreach ($data as &$value) {
          $value['imagePath'] = $news->getImagePath($value['imagePath']);
       }
       return $data;
    }

    public function show($id)
    {   
      $new = News::find($id);

      if(empty($new)){
        return response()->json(['error' => 'empty'], 404);
      }
      return response()->json($new, 200);
    }

    public function store(Request $request)
    {   
        $form = $request->all();
        $validatedData = $request->validate([
          'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        $path = $request->file('file')->store('/public/uploads');
        $dataform = json_decode($form['data'], true);
        $dataform['imagePath'] = $path;
        $news = News::create($dataform);

        return response()->json($news, 201);
    }

    public function update(Request $request, News $news)
    {
        $news->update($request->all());

        return response()->json($news, 200);
    }

    public function delete(News $news)
    {
        $news->delete();

        return response()->json(null, 204);
    }
}
