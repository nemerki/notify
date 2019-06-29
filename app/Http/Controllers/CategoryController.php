<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Http\Request;
use App\Transformers\UserTransformer;

class CategoryController extends Controller
{

    /**
     * Constructor
     *
     * @param UserRepository $userRepository
     * @param UserTransformer $userTransformer
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $categories = Category::all()->where('type_id', Category::PARENT);

        return response()->json($categories, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function show($category_id)
    {
        $category_id = filter_var($category_id, FILTER_SANITIZE_NUMBER_INT);
        $categories = Category::all()->where('parent_id', $category_id);

        return response()->json($categories, 200);
    }


}