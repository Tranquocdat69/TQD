<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model frontend\models\Document */

$this->title = $model->dcm;
$this->params['breadcrumbs'][] = ['label' => 'Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="document-view">

    <h1><?= Html::encode($this->title) ?></h1>
<div class="row">
    
    <p class="pull-right">
        <?= Html::a('Cập nhật', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc chắn muốn xóa không?',
                'method' => 'post'
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            [
                'attribute' => 'dcm',
                'format' => 'raw',
                'value' => function ($data){
                    $url = Yii::getAlias('@web/uploads/'.$data->dcm);
                    if ($data->dcm) {
                        $demo = explode('.', $data->dcm)[1];
                    }
                    if (isset($demo)) {
                        if ($demo == 'jpg' || $demo == 'png') {
                        return Html::img($url, ['width' => '120', 'height' => '100']);
                    } else{
                       return $data->dcm.Html::a(' <span class="glyphicon glyphicon-save"></span>',$url,['title'=>'Tải xuống']);
                    }
                    } else {
                        return Html::tag('p', 'Không có tài liệu');
                    }
                    
                }
            ],
            'desc',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
</div>
