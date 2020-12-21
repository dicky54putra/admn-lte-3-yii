<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_menu',
            'nama',
            'url:url',
            'parent',
            'no_urut',
            //'icon',
            'status',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Aksi',
                'headerOptions' => ['style' => 'color:#337ab7; min-width:130px;'],
                'template' => "{view} {update} {delete}",
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<i class="far fa-eye"></i>', $url, [
                            'title' => Yii::t('app', 'lead-view'),
                            'class' => 'btn btn-sm btn-flat btn-outline-primary'
                        ]);
                    },

                    'update' => function ($url, $model) {
                        return Html::a('<i class="far fa-edit"></i>', $url, [
                            'title' => Yii::t('app', 'lead-update'),
                            'class' => 'btn btn-sm btn-flat btn-outline-success'
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<i class="far fa-trash-alt"></i>', $url, [
                            'title' => Yii::t('app', 'lead-delete'),
                            'data' => [
                                'confirm' => 'Anda yakin ingin menghapus data?',
                                'method' => 'post'
                            ],
                            'class' => 'btn btn-sm btn-flat btn-outline-danger'
                        ]);
                    },

                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = "view/" . $model->id_menu;
                        return $url;
                    }

                    if ($action === 'update') {
                        $url = "update/" . $model->id_menu;
                        return $url;
                    }

                    if ($action === 'delete') {
                        $url = "delete/" . $model->id_menu;
                        return $url;
                    }
                }
            ],
        ],
        'containerOptions' => ['style' => 'overflow: auto'],
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        'pjax' => true,
        'toolbar' =>  [
            [
                'content' =>
                Html::a('<i class="fas fa-plus"></i> Tambah', ['create'], [
                    'class' => 'btn btn-success',
                ]) . ' ' .
                    Html::a('<i class="fas fa-redo"></i>', ['index'], [
                        'class' => 'btn btn-outline-secondary',
                        'data-pjax' => 0,
                    ]),
                'options' => ['class' => 'btn-group mr-2']
            ],
            '{export} {toggleData}',
        ],
        'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        'export' => [
            'fontAwesome' => false
        ],
        'responsiveWrap' => false,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => $this->title,
        ],
        'persistResize' => false,
        'toggleDataOptions' => ['minCount' => 10],
        'itemLabelSingle' => 'book',
        'itemLabelPlural' => 'books'
    ]); ?>
</div>