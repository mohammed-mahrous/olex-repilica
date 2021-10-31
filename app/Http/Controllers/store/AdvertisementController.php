<?php

namespace App\Http\Controllers\store;


use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Tag;
use Carbon\Carbon;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.advertisements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $new_array = [];
        // foreach ($request->input() as $key => $value) {
        //     $new_array[$key] = $value;
        // };
        // return response()->json(['data' => $new_array]);
        $validatedData = $request->validate([
            'name' => 'required|string|unique:advertisements,name',
            'category_id' => 'required',
            'image' => 'image|required|max:2048',
            'price' => 'required|numeric',
            'discription' => 'required|string',
            'tags' => 'required|string',
            'user_id' => 'required|numeric',
        ]);

        $advertisement = new Advertisement($validatedData);
        $path = Storage::putFileAs(
            'images/Advertisements/photos',
            $request->file('image'),
            Str::replace(' ', '_', $advertisement->name)
                . '_photo'
                . Str::replace(['-', ' ', ':'], '_', now())
                . '.' . $request->file('image')->extension()
        );
        $advertisement->image = $path;
        $advertisement->save();
        $tags = Str::of($request->tags)->split('/[\s,]+/');
        foreach ($tags as $tag) {
            $new_tag = Tag::firstOrCreate([
                'name' => $tag
            ]);
            $advertisement->Tags()->attach($new_tag);
        };

        return
            response()->json([
                'message' => 'advertisement was created succesfully'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        //
    }
}