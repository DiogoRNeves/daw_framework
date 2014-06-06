<?php $this->widget('zii.widgets.CMenu',array(
	'items'=>array(
		array('label'=>'Home', 'url'=>array('/site/index')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
		array('label' => 'Cities', 'url'=>array('/city/index') ),
		array('label' => 'Countries', 'url'=>array('/country/index') ),
		array('label' => 'Users', 'url'=>array('/user/index') ),
		array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
		array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
		array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
		),
	)); ?>