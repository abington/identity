<?php
/**
 * chippyash/identity
 *
 * @author    Ashley Kitson
 * @copyright Ashley Kitson, 2017, UK
 * @license   GPL V3+ See LICENSE.md
 */
namespace Chippyash\Identity;

use Chippyash\Type\Interfaces\TypeInterface;

/**
 * Trait implementing the Identifiable interface
 */
trait Identifying
{
    /**
     * @var TypeInterface
     */
    protected $id;

    /**
     * Return the id
     *
     * @return TypeInterface
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Return the value of the id
     *
     * @return mixed
     */
    public function vId()
    {
        return $this->id->get();
    }
}