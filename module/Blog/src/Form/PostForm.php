<?php

namespace Blog\Form;

use Laminas\Form\Form;

class PostForm extends Form
{
    public function init()
    {
        $this->add([
           'name' => 'post',
           'type' => PostFieldset::class,
        ]);

        $this->add([
           'name' => 'submit',
           'type' => 'submit',
            'attributes' => [
                'value' => 'Insert new Post',
            ],
        ]);
    }
}