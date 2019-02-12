<?php

namespace DigipolisGent\SymfonyCommon\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class Select2Type
 *
 * @package DigipolisGent\SymfonyCommon\Form
 */
class Select2Type extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('attr', ['select2' => '']);
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}
