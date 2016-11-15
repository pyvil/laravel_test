<?php
/**
 * Task controller
 *
 * @category controller
 * @author   Vitaliy Pyatin <mail.pyvil@gmail.com>
 */
namespace App\Http\Controllers;

use App\Model\Task;
use App\Model\TaskCategory;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;

class TaskController extends Controller
{
    /**
     * Create new task
     *
     * @param Request $request request
     *
     * @return mixed
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $model = new Task();
            if ($model->fillData($request->all())->validate() && $model->save()) {
                $modelRel = new TaskCategory();
                $modelRel->setAttribute('id_task', (int) $model->id);
                $modelRel->setAttribute('id_category', (int) $request->all()['category']);
                $modelRel->save();
                return response()->json(['data' => $model->toArray(), 'status' => 1]);
            }
            return response()->json(['data' => [], 'status' => 0]);
        }
        return redirect('/');
    }

    /**
     * Update task
     *
     * @param Request $request request
     * @param integer $id      task id
     *
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $model = Task::find($id);
            if ($model && $model->fillData($request->all())->validate() && $model->save()) {
                return response()->json(['data' => $model->toArray(), 'status' => 1]);
            }
            return response()->json(['data' => [], 'status' => 0]);
        }
        return redirect('/');
    }

    /**
     * Delete task
     *
     * @param Request $request request
     * @param integer $id      task id
     *
     * @return mixed
     */
    public function delete(Request $request, $id)
    {
        if ($request->ajax()) {
            $model = Task::find($id);
            if ($model && $model->delete()) {
                return response()->json(['data' => [], 'status' => 1]);
            }
            return response()->json(['data' => [], 'status' => 0]);
        }
        return redirect('/');
    }
}
