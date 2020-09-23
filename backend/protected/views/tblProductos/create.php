<?php
/* @var $this TblProductosController */
/* @var $model TblProductos */

$this->breadcrumbs=array(
	'Tbl Productoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblProductos', 'url'=>array('index')),
	array('label'=>'Manage TblProductos', 'url'=>array('admin')),
);
?>

<h1>Create TblProductos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>