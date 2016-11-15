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
     * table
     * 
     * @var string
     */
    const TABLE = 'category';
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
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function getTasks()
    {
        return $this->hasManyThrough('App\Model\Task', 'App\Model\TaskCategory', 'id_category', 'id', 'id');
    }

    /**
     * Category name
     * 
     * @return string
     */
    public function getName()
    {
        return $this->getAttributeValue('name');
    }

    /**
     * Category created_date
     *
     * @return string|null
     */
    public function getCreatedAt()
    {
        if ($this->getAttributeValue('created_at')) {
            return $this->getAttributeValue('created_at');
        }
        return null;
    }

    /**
     * Category created_date
     *
     * @return string|null
     */
    public function getUpdatedAt()
    {
        if ($this->getAttributeValue('updated_at')) {
            return $this->getAttributeValue('updated_at');
        }
        return null;
    }
}
