<?php
/** @var App\Model\Category $categories[] */
/** @var App\Model\Category $category */

/** @var App\Model\Task $task */
/** @var App\Model\Task $tasks[] */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>To-Do List</title>
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="{!! asset('css/app.css') !!}" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container" id="app">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">TO-DO List</a>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading lead clearfix">
                    Categories
                    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#create_category_modal">
                        Create New Category
                    </button>
                </div>
                <div class="panel-body list-group">
                    <a href="javascript:void(0)" class="list-group-item active">
                        <span class="badge">{{ count($tasks) }}</span>
                        All
                    </a>
                    @foreach ($categories as $category)
                        <a href="javascript:void(0)" class="list-group-item">
                            <span class="badge">{{ $category->getTasks()->count() }}</span>
                            {{ $category->getName()  }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading lead clearfix">
                    Tasks
                    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#create_task_modal">
                        Create New Task
                    </button>
                </div>
                <div class="panel-body">
                    <ul class="todo-list ui-sortable">
                        <li class="done">
                            <input type="checkbox" checked="checked" value="">
                            <span class="text">Complete test</span>
                            <small class="label label-danger">Category 1</small>
                            <div class="tools">
                                <i class="glyphicon glyphicon glyphicon-pencil"></i>
                                <i class="glyphicon glyphicon-remove-circle"></i>
                            </div>
                        </li>
                        <li>
                            <input type="checkbox" value="">
                            <span class="text">Learn Laravel</span>
                            <small class="label label-danger">Category 2</small>
                            <div class="tools">
                                <i class="glyphicon glyphicon glyphicon-pencil"></i>
                                <i class="glyphicon glyphicon-remove-circle"></i>
                            </div>
                        </li>
                        <li>
                            <input type="checkbox" value="">
                            <span class="text">Rule the world</span>
                            <span class="label label-success">Category 3</span>
                            <div class="tools">
                                <i class="glyphicon glyphicon glyphicon-pencil"></i>
                                <i class="glyphicon glyphicon-remove-circle"></i>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="create_category_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Create New Category</h4>
            </div>
            <div class="modal-body">
                <form id="create-category">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name">
                        {{ csrf_field() }}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary" id="categoryBtn">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>
<div id="create_task_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Create New Task</h4>
            </div>
            <div class="modal-body">
                <form id="task-create">
                    <div class="form-group">
                        <label>Task</label>
                        <input type="text" name="name" class="form-control" placeholder="Task">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category">
                            <option value="">Select value</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->getName() }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary" id="task-btn">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>
</body>
</html>
