<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = 'Thông tin người dùng';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1 class="text-center"><b><?= Html::encode($this->title) ?></b></h1>

    
    <div class="container">
     <div class="panel panel-primary">
         <div class="panel-heading">
             <h3 class="panel-title">Thông tin chi tiết</h3>
         </div>
         <div class="panel-body">
             <div class="row">
         <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <img src="uploads/<?= Yii::$app->user->identity->img; ?>" alt="Avatar" class="img-responsive" width=300 height=300 style = 'border-radius: 100% '>
         </div>
         <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <p class="pull-right">
                <?= Html::a('Cập nhật thông tin', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'username',
                    'firstname',
                    'lastname',
                    'phone',
                    'date_of_birth:date',
        ],
    ]) ?>
</div>
</div>
         </div>
     </div>
</div>

</div>
