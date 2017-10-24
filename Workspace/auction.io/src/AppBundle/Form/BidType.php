<?php
/**
 * Created by PhpStorm.
 * User: mateusz
 * Date: 24.10.17
 * Time: 11:34
 */

namespace AppBundle\Form;


use AppBundle\Entity\Offer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BidType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("price", NumberType::class, ["label" => "Cena"])
            ->add("submit", SubmitType::class, ["label" => "Licytuj"]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults(["data_class" => Offer::class]);
    }
}