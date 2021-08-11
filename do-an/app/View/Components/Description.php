<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Description extends Component
{
    public $label;

    public $name;

    public $maxlength;

    public $placeholder;

    public $disabled;

    public $required;

    /**
     * Create a new component instance.
     *
     * @param string $label
     * @param string $name
     * @param int $maxlength
     * @param string|null $placeholder
     * @param string|null $disabled
     * @param string|null $required
     */
    public function __construct(string $label, string $name, int $maxlength = 320, string $placeholder = null, string $disabled = null, string $required = null)
    {
        $this->label       = label($label);
        $this->name        = $name;
        $this->maxlength   = $maxlength;
        $this->placeholder = placeholder($placeholder);
        $this->disabled    = $disabled;
        $this->required    = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.description');
    }

    /**
     * Set disabled attribute for tag if another null
     * @return string
     * @author 
     */
    public function attrDisabled(): string
    {
        return ($this->disabled != null) ? 'disabled=' . $this->disabled : '';
    }

    /**
     * Add html required
     * @return string
     * @author 
     */
    public function attrRequired(): string
    {
        return ($this->required != null) ? '<span class="text-danger">*</span>' : '';
    }
}
