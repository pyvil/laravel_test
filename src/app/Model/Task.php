<?php
/**
 * Task model
 *
 * @category model
 * @author   Vitaliy Pyatin <mail.pyvil@gmail.com>
 */
namespace App\Model;

class Task extends ModelAbstract
{
    /**
     * Attributes list
     *
     * @var array
     */
    protected $attributes = [
        'name' => '',
        'created_at' => '',
        'updated_at' => ''
    ];
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'task';
}
