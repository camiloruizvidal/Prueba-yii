<?php
/* @var $this TblProductosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Productoses',
);

$this->menu=array(
	array('label'=>'Create TblProductos', 'url'=>array('create')),
	array('label'=>'Manage TblProductos', 'url'=>array('admin')),
);
?>

<h1>Tbl Productoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
