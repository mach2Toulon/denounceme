<?php
namespace dme\DenounceMeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PostType extends AbstractType {
  
  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder->add('from_pseudo', null, array('label' => "Ton pseudo"))
            ->add('to_pseudo',   null, array('label' => "Son pseudo"))
            ->add('denounce',    null, array('label' => "Ta dénonciation"));
  }
  
  public function getDefaultOptions(array $options) {
    return array(
      'data_class' => 'dme\DenounceMeBundle\Entity\Post',
    );
}

  public function getName() {
    return 'Post';
  }
}