<?php

namespace WsunBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use \Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class DetallePedidoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
           
//            $validador = function(FormEvent $event) {
//            var_dump($event->getData());die;      
//       };
        
        $builder->add('codigo')
                ->add('cantidad')
                ->add('valorUnitario')
                ->add('valorTotal')
                ->add('observaciones',  \Symfony\Component\Form\Extension\Core\Type\TextareaType::class)
                ->add('idProducto');    
                //->add('idPedido',  HiddenType::class);
      // $builder->addEventListener(FormEvents::PRE_SUBMIT, $validador);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WsunBundle\Entity\DetallePedido'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'detallepedido';
    }


}
