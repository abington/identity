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
 * Interface Identifiable
 * A class having an TypeInterface based id
 */
interface Identifiable
{
    /**
     * Return the id
     *
     * @return TypeInterface
     */
    public function id();

    /**
     * Return the value of the id
     *
     * @return mixed
     */
    public function vId();
}