<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Addons;
use App\Models\Category;
use App\Models\Cusine;
use App\Models\Dish;
use App\Models\DishTranslation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Container\Container;

class FilterController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
            $addons= collect(Addons::all());
            $cusines=Cusine::all();
            $categories=Category::all();
            if($lang == 'ar'){
                return response()->json(['data'=>[
                ['name'=>'اضافات','values'=>$addons]
                ,['name'=>'اطباق','values'=>$cusines]
                ,['name'=>'اقسام','values'=>$categories]
                ]],200);
            }else{
                return response()->json(['data'=>[
                ['name'=>'addons','values'=>$addons]
                ,['name'=>'cusines','values'=>$cusines]
                ,['name'=>'categories','values'=>$categories]
                ]],200);
            }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,$lang)
    {
        $dishes_id=DishTranslation::where('name', 'LIKE', "%$request->search%")->pluck('dish_id');
        $dishes=Dish::with('categories')
        ->with('cusines')
        ->with('users')
        ->when($request->search ,function($q) use ($dishes_id){//return dishes where name = search
            $q->whereIn('id',$dishes_id)->get();
        })
        ->where(function($q) use ($request){//return dishes where have cusines =request['cusine']
            if($request->cusines){
                $q->whereHas('cusines',function($res) use ($request){
                    $res->whereIn('cusines.id',$request->cusines);
                })->get();
            }
        })
        ->where(function($q) use  ($request){//return dishes where have categories =request['categories']
            if($request->categories){
                $q->whereHas('categories',function($res) use ($request){
                    $res->whereIn('categories.id',$request->categories);
                })->get();
            }
        })
        ->where(function($q) use  ($request){//return dishes where availabe from to
            if($request->avaliable){
                $q->whereHas('users' ,function($res) use ($request){
                        $res->where('work_from'  ,'<=',  $request->avaliable['from'] )
                        ->Where('work_to' ,'>=', $request->avaliable['to']);
                })->get();
            }

        })->get()->where($request->price['min'],'<=','lowest','>=',$request->price['max']);//return dishes where price between
        $pageSize = 5;//custom paginate size
        return $this->paginate($dishes, $pageSize);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public static function paginate(Collection $results, $pageSize)
    {
        $page = Paginator::resolveCurrentPage('page');

        $total = $results->count();

        return self::paginator($results->forPage($page, $pageSize), $total, $pageSize, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);

    }
    protected static function paginator($items, $total, $perPage, $currentPage, $options)
    {
        return Container::getInstance()->makeWith(LengthAwarePaginator::class, compact(
            'items', 'total', 'perPage', 'currentPage', 'options'
        ));
    }
}
