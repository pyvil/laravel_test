<?php
/**
 * Task model
 *
 * @category model
 * @author   Vitaliy Pyatin <mail.pyvil@gmail.com>
 */
namespace App\Model;

use Symfony\Component\Console\Tests\Descriptor\TextDescriptorTest;

class Task extends ModelAbstract
{
    /**
     * table
     *
     * @var string
     */
    const TABLE = 'task';
    /**
     * Attributes list
     *
     * @var array
     */
    protected $attributes = [
        'name' => '',
        'is_done' => 0,
        'created_at' => '',
        'updated_at' => ''
    ];
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'task';

    /**
     * Relate task to category model (through taskcategory model)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function getCategory()
    {
        return $this->hasMany('App\Model\TaskCategory', 'id_task', 'id')
            ->join(Category::TABLE, TaskCategory::TABLE . '.id_category', '=', Category::TABLE . '.id')
            ->where('')
            ->select(Category::TABLE . '.*');
    }
}
