<?php

namespace WsunBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
class ProductoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
                ->add('nombreProducto',  TextType::class,array('label'=>'Nombre Producto:'))
               //->add('imagen' ,  TextType::class,array('label'=>'Imagen:'))//, array("attr"=>array("class"=>"form form-control")))
                ->add('imagen', FileType::class, array('label' => 'Imagen del producto (5mb max.)','data_class' => NULL,
                        'label_attr' => array('class' => 'control-label col-lg-4'),
                        'required' => false,
                        'constraints' => array(
                            new NotBlank(array('message' => 'Agregar archivo de 5mb máximo.')), //
                            new \Symfony\Component\Validator\Constraints\File(array('maxSize' => 5242880 ))),
                    "attr" => array(                                                        
                            "class" => "col-lg-8",                            
                        )))
                ->add('codigoProducto', TextType::class,array('label'=>'Código Producto:')) 
                ->add('precioProducto',TextType::class,array('label'=>'Precio:'))
                ->add('observacion', TextareaType::class,array('label'=>'Descripcion:'))
                ->add('estado',  CheckboxType::class,array('label'=>'Estado:','required' => false))
                ->add('categoria', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class,
                        array('class' => 'WsunBundle\Entity\Categoria'));
//                $builder->addEventListener(FormEvents::PRE_SUBMIT, $validador);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WsunBundle\Entity\Producto'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wsunbundle_producto_edit';
    }


}
