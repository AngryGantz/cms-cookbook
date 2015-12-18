<?php

namespace App;

use SleepingOwl\Admin\FormItems\NamedFormItem;

class MyItem extends NamedFormItem
{

    public function render()
    {
        $params = $this->getParams();
        // $params will contain 'name', 'label', 'value' and 'instance'
        return view('my-form-item-view', $params);
    }

}