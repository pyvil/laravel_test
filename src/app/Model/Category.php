<?php
/**
 * Category model
 *
 * @category controller
 * @author   Vitaliy Pyatin <mail.pyvil@gmail.com>
 */


/**
 * Property list
 *
 * @property int $id
 * @property string $name
 * @property string $createdAt (created_at)
 * @property string $updatedAt (updated_at)
 */
namespace App\Model;

class Category extends ModelAbstract
{
    /**
     * Connected PK
     *
     * @var string
     */
    const CONNECTED_PK = 'id_task';
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
    protected $table = 'category';

    /**
     * Relate category to task model (through taskcategory model)
     *
     * In order to Laravel behavior in hasManyThrough - use method changePrimaryKey (@see ModelAbstract::changePrimaryKey)
     * in order to change primary in query
     *  "select * from `task` inner join `task_category` on `task_category`.`id_task` = `task`.`id` where `task_category`.`id_category` = ?"
     * because, by default it use primary key (in this case: table - task_category, PK - id; and it need to be changed to id_task)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function tasks()
    {
        return $this->changePrimaryKey(self::CONNECTED_PK)
                    ->hasManyThrough('App\Model\Task', 'App\Model\TaskCategory', 'id_category', 'id', 'id');
    }

}
