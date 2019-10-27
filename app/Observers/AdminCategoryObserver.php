<?php

namespace App\Observers;

use App\Models\Admin\Category;
use Str;

class AdminCategoryObserver
{
    public function creating(Category $category) {
        $this->setAlias($category);
    }

    public function updating(Category $category)
    {
        $this->setAlias($category);
    }

    public function deleted(Category $category)
    {
        //
    }

    public function restored(Category $category)
    {
        //
    }

    public function forceDeleted(Category $category)
    {
        //
    }

    public function setAlias(Category $category) {
        if (empty($category->alias)) {
            $category->alias = Str::slug($category->title) . rand(10, 999);
        }
    }
}
