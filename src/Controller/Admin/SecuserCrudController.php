<?php

namespace App\Controller\Admin;

use App\Entity\Secuser;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;

class SecuserCrudController extends AbstractCrudController
{   

    public static function getEntityFqcn(): string
    {
        return Secuser::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('email'),
            Field::new('password'),
            ArrayField::new('roles'),
        ];
    }
    
}
