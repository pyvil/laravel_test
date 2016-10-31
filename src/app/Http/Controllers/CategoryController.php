<?php
/**
 * Category controller
 *
 * @category controller
 * @author   Vitaliy Pyatin <mail.pyvil@gmail.com>
 */
namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Category create action through ajax, otherwise - redirect
     *
     * @param Request $request request instance
     *
     * @return mixed
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $category = new Category();
            if ($category->fillData($request->all())->validate() && $category->save()) {
                return response()->json(['data' => $category->toArray(), 'status' => 1]);
            }
            return response()->json(['data' => [], 'status' => 0]);
        }
        return redirect('/');
    }
}
