<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ExperiencesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kinh nghiệm';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="experiences-index">

    <h1 class="text-center"><b><?= Html::encode($this->title) ?></b></h1>

    <p class="pull-right">
        <?= Html::a('Thêm mới kinh nghiệm', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

           /* 'id',
            'user_id',*/
            'exp',
            'company',
            'started_date:date',
            'end_date:date',
            //'created_at',
            //'updated_at',

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
                                'confirm'=>'Bạn có chắc chắn muốn xóa kinh nghiệm công việc '.$model->exp.' không?',
                                'method'=>'post'
                            ]
                        ]);
                    }
                ]
        ],
        ],
    ]); ?>


</div>
