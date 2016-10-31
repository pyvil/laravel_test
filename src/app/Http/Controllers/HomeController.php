<?php
/**
 * Home controller
 *
 * @category controller
 * @author   Vitaliy Pyatin <mail.pyvil@gmail.com>
 */
namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        var_dump(Category::find(1)->tasks()->getQuery()->getQuery()->toSql());

        return view('index', ['categories' => '']);
    }
}
