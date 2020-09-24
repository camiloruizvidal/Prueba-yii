<?php
/* @var $this TblProductosController */
/* @var $model TblProductos */

$this->breadcrumbs=array(
	'Tbl Productoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblProductos', 'url'=>array('index')),
	array('label'=>'Create TblProductos', 'url'=>array('create')),
	array('label'=>'View TblProductos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblProductos', 'url'=>array('admin')),
);
?>

<h1>Update TblProductos <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>