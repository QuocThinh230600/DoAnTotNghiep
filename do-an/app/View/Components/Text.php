<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Text extends Component
{
    public $name;

    public $label;

    public $placeholder;

    public $disabled;

    public $required;

    public $id;

    public $slug;

    public $type;

    public $title;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string $label
     * @param string $placeholder
     * @param string|null $disabled
     * @param string|null $required
     * @param string|null $id
     * @param string|null $slug
     * @param string|null $title
     * @param string $type
     * @author 
     */
    public function __construct(string $name, string $label, string $placeholder, string $disabled = null, string $required = null, string $id = null, string $slug = null, string $title = null, string $type = 'text')
    {
        $this->name        = $name;
        $this->label       = label($label);
        $this->placeholder = placeholder($placeholder);
        $this->disabled    = $disabled;
        $this->required    = $required;
        $this->id          = $id;
        $this->slug        = $slug;
        $this->title       = $title;
        $this->type        = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.text');
    }

    /**
     * CSS none if type hidden
     * @return string
     * @author 
     */
    public function hiddenCSS(): string
    {
        return ($this->type == 'hidden') ? 'd-none' : '';
    }

    /**
     * Set id attribute for tag if another null
     * @return string
     * @author 
     */
    public function attrId(): string
    {
        return ($this->id != null) ? 'id=' . $this->id : '';
    }

    /**
     * Set slug attribute for tag if another null
     * @return string
     * @author 
     */
    public function attrSlug(): string
    {
        return ($this->slug != null) ? 'slug=' . $this->slug : '';
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
     * Add class title for tag if exist title tag
     * @return string
     * @author 
     */
    public function attrTitle(): string
    {
        return ($this->title != null) ? 'title=' . $this->title : '';
    }

    /**
     * Add class title for tag if exist slug
     * @return string
     * @author 
     */
    public function attrSlugTitle(): string
    {
        return ($this->slug != null) ? 'title' : '';
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
