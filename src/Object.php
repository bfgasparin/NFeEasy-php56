<?php

namespace Bfgasparin\NFeEasy;

use ArrayAccess;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;

/**
 * Represents an NFe object.
 */
abstract class Object implements Arrayable, Jsonable, ArrayAccess
{
    protected $fields = [];

    protected $collections = [];

    /**
     * The object's attributes.
     *
     * @var array
     */
    protected $attributes = [];

    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $key => $value) {
            if (false !== array_search($key, $this->fields)) {
                $this->attributes[$key] = $value;
            }
        }
    }

    public static function create(array $attributes = [])
    {
        return new static($attributes);
    }

    /**
     * Get an attribute from the object.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function getAttribute($key)
    {
        if (!$key) {
            return;
        }
        if (array_key_exists($key, $this->attributes)) {
            return $this->attributes[$key];
        }
    }

    /**
     * Convert the object instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return array_map(function ($value) {
            if ($value instanceof JsonSerializable) {
                return $value->jsonSerialize();
            } elseif ($value instanceof Jsonable) {
                return json_decode($value->toJson(), true);
            } elseif ($value instanceof Arrayable) {
                return $value->toArray();
            } else {
                return $value;
            }
        }, $this->attributes);
    }

    /**
     * Convert the object instance to JSON.
     *
     * @param int $options
     *
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }

    /**
     * Dynamically retrieve attributes on the object.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function __get($key)
    {
        return $this->getAttribute($key);
    }

    /**
     * Dynamically set attributes on the object.
     *
     * @param string $key
     * @param mixed  $value
     */
    public function __set($key, $value)
    {
        /*
         * In case of the attribute is an array, we inject the desired value
         * into a Collection instance
         */
        if (false !== array_search($key, $this->collections)) {
            $newValue = $value instanceof Collection ?
                $value :
                new Collection(is_array($value) ? $value : [$value])
            ;

            $this->attributes[$key] = $newValue;

            return;
        }

        $this->attributes[$key] = $value;
    }

    /**
     * Determine if an item exists at an offset.
     *
     * @param mixed $key
     *
     * @return bool
     */
    public function offsetExists($key)
    {
        return array_key_exists($key, $this->attributes);
    }

    /**
     * Get an item at a given offset.
     *
     * @param mixed $key
     *
     * @return mixed
     */
    public function offsetGet($key)
    {
        return $this->attributes[$key];
    }

    /**
     * Set the item at a given offset.
     *
     * @param mixed $key
     * @param mixed $value
     */
    public function offsetSet($key, $value)
    {
        if (is_null($key)) {
            $this->attributes[] = $value;
        } else {
            $this->attributes[$key] = $value;
        }
    }

    /**
     * Unset the value for a given offset.
     *
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->$offset);
    }

    /**
     * Convert the object to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }
}
