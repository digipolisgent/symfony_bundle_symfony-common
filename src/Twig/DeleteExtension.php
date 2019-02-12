<?php

namespace DigipolisGent\SymfonyCommon\Twig;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeleteExtension extends \Twig_Extension
{
    /**
     * @var Options
     */
    private $resolver;

    /**
     * DeleteExtension constructor.
     */
    public function __construct()
    {
        $this->resolver = new OptionsResolver();
        $this->resolver->setRequired(['entity', 'uri']);
        $this->resolver->setDefault('label', 'delete');
        $this->resolver->setDefault('randomid', uniqid('',false));
        $this->resolver->setDefault('class', 'btn-flat btn-danger');
        $this->resolver->setDefault('icon', null);
    }

    public function getFunctions()
    {
        return [
            'delete_button' => new \Twig_SimpleFunction('delete_button', [$this, 'render'], [
                'is_safe'           => ['html'],
                'needs_environment' => true,
            ]),
        ];
    }

    public function render(\Twig_Environment $twig, $options)
    {
        return $twig->render('SymfonyCommonBundle:common:delete.html.twig', $this->resolver->resolve($options));
    }
}
