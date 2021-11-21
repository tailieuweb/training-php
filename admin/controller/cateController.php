<?php

namespace SmartWeb\Controller;

use SmartWeb\Models\ObjectAssembler;
use SmartWeb\Models\Category;

class CategoryController
{
    private Category $cate;
    public function __construct(string $conf)
    {
        $assembler = new ObjectAssembler($conf);
        $this->cate = $assembler->getComponent(Category::class);
    }
    public function display_cate()
    {
        $result = $this->cate->getCategory();

        $select = <<< Select
            <select name="CategoryID" id="CategoryID">
            <option value="">Selected one</option>
        Select;
        foreach ($result as $key => $value) {
            $select .= <<< Select
            <option value="{$value['CategoryID']}">{$value['CategoryName']}</option>
            Select;
        }
        $select .= <<< Select
        </select>
        Select;
        return $select;
    }

    public function delete()
    {
    }
}
