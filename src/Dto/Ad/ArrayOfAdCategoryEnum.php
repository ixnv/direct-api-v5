<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class ArrayOfAdCategoryEnum implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @JMS\Type("array<string>")
     *
     * @var AdCategoryEnum[] $Items
     */
    private $Items;

    /**
     * @param AdCategoryEnum[] $Items
     */
    public function __construct(array $Items = null)
    {
      $this->Items = $Items;
    }

    /**
     * @return AdCategoryEnum[]
     */
    public function getItems()
    {
      return $this->Items;
    }

    /**
     * @param AdCategoryEnum[] $Items
     * @return \eLama\DirectApiV5\Dto\Ad\ArrayOfAdCategoryEnum
     */
    public function setItems(array $Items)
    {
      $this->Items = $Items;
      return $this;
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset An offset to check for
     * @return boolean true on success or false on failure
     */
    public function offsetExists($offset)
    {
      return isset($this->Items[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return AdCategoryEnum
     */
    public function offsetGet($offset)
    {
      return $this->Items[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param AdCategoryEnum $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->Items[] = $value;
      } else {
        $this->Items[$offset] = $value;
      }
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to unset
     * @return void
     */
    public function offsetUnset($offset)
    {
      unset($this->Items[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return AdCategoryEnum Return the current element
     */
    public function current()
    {
      return current($this->Items);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->Items);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->Items);
    }

    /**
     * Iterator implementation
     *
     * @return boolean Return the validity of the current position
     */
    public function valid()
    {
      return $this->key() !== null;
    }

    /**
     * Iterator implementation
     * Rewind the Iterator to the first element
     *
     * @return void
     */
    public function rewind()
    {
      reset($this->Items);
    }

    /**
     * Countable implementation
     *
     * @return AdCategoryEnum Return count of elements
     */
    public function count()
    {
      return count($this->Items);
    }

}
