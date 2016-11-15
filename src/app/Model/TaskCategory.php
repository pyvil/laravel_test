<?php
/**
 * Task category relation model
 *
 * @category model
 * @author   Vitaliy Pyatin <mail.pyvil@gmail.com>
 */
namespace App\Model;

class TaskCategory extends ModelAbstract
{
    /**
     * table
     * 
     * @var string
     */
    const TABLE = 'task_category';
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'task_category';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'id_task';

    /**
     * Attributes list
     *
     * @var array
     */
    protected $attributes = [
        'id_task' => '',
        'id_category' => ''
    ];
}
