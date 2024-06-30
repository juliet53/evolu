<?php

namespace App\Controller\Admin;

use App\Entity\Certification;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CertificationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Certification::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
       // yield from parent::configureFields($pageName);
        yield TextField::new('nom');
        yield TextField::new('description');
        yield BooleanField::new('statut');
       yield TextareaField::new('imageFile')->setFormType(VichImageType::class);
        yield AssociationField::new('matiere');
        yield AssociationField::new('enseignant');
        yield AssociationField::new('user');
    }
    
}
