<?php

namespace App\Form\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class IsEditListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'onPreSetData',
        );
    }

    public function onPreSetData(FormEvent $event)
    {
        $dataForm = $event->getData();
        $form     = $event->getForm();

        if (null != $dataForm->getId()) {
            $form->add('isEdit', HiddenType::class,
                [
                    "mapped" => false,
                    'data'   => "true",
                ]
            );
        } else {
            $form->add('isEdit', HiddenType::class,
                [
                    "mapped" => false,
                    'data'   => "false",
                ]
            );
        }
    }
}
