<?php
/**
 * Abstract model in additional to Base Model
 *
 * @category model
 * @author   Vitaliy Pyatin <mail.pyvil@gmail.com>
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

abstract class ModelAbstract extends Model
{

    /**
     * Fill attribute data
     *
     * @param array $data attributes data
     *
     * @return $this
     */
    public function fillData(array $data)
    {
        foreach ($data as $key => $value) {
            if (isset($this->attributes[$key])) {
                $this->setAttribute($key, $value);
            }
        }
        $this->setCreatedAt(date('Y-m-d H:i:s'));
        $this->setUpdatedAt(date('Y-m-d H:i:s'));

        return $this;
    }

    /**
     * Simply validation model
     *
     * @return bool
     */
    public function validate()
    {
        foreach ($this->getAttributes() as $key => $value) {
            if (empty($this->attributes[$key])) {
                return false;
            }
        }
        return true;
    }

    /**
     * Change primary key dynamically
     *
     * @param string $value value
     *
     * @return $this
     */
    public function changePrimaryKey($value)
    {
        $this->primaryKey = $value;
        return $this;
    }
}