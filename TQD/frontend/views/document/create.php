<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Document */

$this->title = 'Tạo tài liệu văn bản';
$this->params['breadcrumbs'][] = ['label' => 'Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-create">

   <div class="panel panel-primary">
   	<div class="panel-heading">
   		 <h1><?= Html::encode($this->title) ?></h1>
   	</div>
   	<div class="panel-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
   	</div>
   </div>

</div>
