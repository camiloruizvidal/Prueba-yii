<?php
/* @var $this TblProductosController */
/* @var $model TblProductos */

$this->breadcrumbs=array(
	'Tbl Productoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblProductos', 'url'=>array('index')),
	array('label'=>'Create TblProductos', 'url'=>array('create')),
	array('label'=>'Update TblProductos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblProductos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblProductos', 'url'=>array('admin')),
);
?>

<h1>View TblProductos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		'reference',
		'stock',
		'currency',
		'price',
	),
)); ?>
