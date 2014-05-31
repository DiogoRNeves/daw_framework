<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'username',
		'password',
		'email',
		array(               // website displayed as a link
            'label'=>$model->getAttributeLabel('site'),
            'type'=>'raw',
            'value'=>CHtml::link($model->site, 
            	CHtml::encode($model->site), array('target'=>'_blank')),
        ),
		array(               // related city displayed as a link
            'label'=>$model->getAttributeLabel('city_id'),
            'type'=>'raw',
            'value'=>CHtml::link(CHtml::encode($model->city->name),
                                 array('city/view','id'=>$model->city->id)),
        ),
	),
)); ?>
