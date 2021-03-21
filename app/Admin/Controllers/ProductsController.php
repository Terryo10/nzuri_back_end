<?php

namespace App\Admin\Controllers;

use App\Models\Products;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Services;
use App\Models\Categories;

class ProductsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Products';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Products());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('image_path', __('Image path'));
        $grid->column('categories_id', __('Category'));
        $grid->column('price', __('Price'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Products::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('image_path', __('Image path'));
        $show->field('categories_id', __('Categories id'));
        $show->field('price', __('Price'));
        $show->field('quantity', __('Quantity'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Products());

        $form->text('name', __('Name'));
        $form->image('image_path', __('Image path'));
        $form->number('quantity', __('Quantity'));
        $form->decimal('price', __('price'));
        $form->select('categories_id', __('Select Product Category'))->options(Categories::all()->pluck('name', 'id'));

        return $form;
    }
}
