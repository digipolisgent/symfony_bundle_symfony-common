<?php

namespace DigipolisGent\SymfonyCommon\Entity;

use Doctrine\Common\Collections\Collection;

trait CollectionManipulator
{
    /**
     * Add or removes an element from the collection
     * 
     * @param Collection $collection
     * @param $element
     * @param string $action
     */
    public function manipulate(Collection $collection, $element, $action = 'add')
    {
        if(is_array($element) || $element instanceof Collection) {
            foreach($element as $e) {
                $this->manipulate($collection, $e,  $action);
            }
        }

        if ($action === 'add') {
            $collection->add($element);
        }

        if($action === 'remove') {
            $collection->removeElement($element);
        }

        throw new \InvalidArgumentException(sprintf('Action %s is not a valid action, either add or remove', $action));
    }
}
