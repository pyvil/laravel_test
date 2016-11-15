<?php
/**
 * Home controller
 *
 * @category controller
 * @author   Vitaliy Pyatin <mail.pyvil@gmail.com>
 */
namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        var_dump((new Task())->getCategory()->getQuery()->getQuery()->toSql());
        return view('index', ['categories' => Category::all(), 'tasks' => Task::all()]);
    }
}
