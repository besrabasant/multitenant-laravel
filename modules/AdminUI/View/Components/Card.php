<?php

namespace Modules\AdminUI\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    /**
     * @inheritDoc
     */
    public function render()
    {
        return view('modules.admin-ui.components.card');
    }
}
