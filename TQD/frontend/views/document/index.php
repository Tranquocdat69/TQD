<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DocumentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tài liệu văn bản';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-index">

    <h1 class="text-center"><b><?= Html::encode($this->title) ?></b></h1>

    <p class="pull-right">
        <?= Html::a('Thêm mới tài liệu văn bản', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'dcm',
                'format' => 'html',
                'value' => function ($data){
                    $url = Yii::getAlias('@web/uploads/'.$data->dcm);
                    if ($data->dcm) {
                        $demo = explode('.', $data->dcm)[1];

                    }
                    if (isset($demo)) {
                        if ($demo == 'jpg' || $demo == 'png') {
                        return Html::img($url, ['width' => '120', 'height' => '100']);
                    } else {
                        return $data->dcm.Html::a(' <span class="glyphicon glyphicon-save"></span>',$url,['title'=>'Tải xuống']);
                    }
                    } else {
                        return Html::tag('p', 'Không có tài liệu');
                    }
                    
                }
            ],
            'desc',
            'created_at:date',
            'updated_at:date',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons'=>[
                    'view' => function($url,$model){
                        return  Html::a('Xem chi tiết',$url,['class' => 'btn btn-xs btn-info']);
                    },
                    'update' => function($url,$model){
                        return Html::a('Cập nhật',$url,['class'=>'btn btn-xs btn-success']);
                    },
                    'delete' => function($url,$model){
                        return Html::a('Xóa',$url,[
                            'class'=>'btn btn-xs btn-danger',
                            'data'=>[
                                'confirm'=>'Bạn có chắc chắn muốn xóa tài liệu văn bản '.$model->dcm.' không?',
                                'method'=>'post'
                            ]
                        ]);
                    }
                ]
        ]
        ],
    ]); ?>


</div>
