<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'username',
            'email:email',
            [
                'attribute' => 'status',
                'filter' => [10 => 'aktif', 9 => 'Tidak Aktif'],
                'format' => 'html',
                'value' => function ($model) {
                    if ($model->status == 10) {
                        return '<span class="badge badge-primary">Aktif</span>';
                    } else {
                        return '<span class="badge badge-warning">Tidak Aktif</span>';
                    }
                }
            ],

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
                        $url = "view/" . $model->id;
                        return $url;
                    }

                    if ($action === 'update') {
                        $url = "update/" . $model->id;
                        return $url;
                    }

                    if ($action === 'delete') {
                        $url = "delete/" . $model->id;
                        return $url;
                    }
                }
            ],
        ],
        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        'pjax' => true, // pjax is set to always true for this demo set your toolbar
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
        // set export properties
        'export' => [
            'fontAwesome' => false
        ],
        // parameters from the demo form
        // 'bordered' => $bordered,
        // 'striped' => $striped,
        // 'condensed' => $condensed,
        'responsiveWrap' => false,
        // 'hover' => $hover,
        // 'showPageSummary' => $pageSummary,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => $this->title,
        ],
        'persistResize' => false,
        'toggleDataOptions' => ['minCount' => 10],
        // 'exportConfig' => $exportConfig,
        'itemLabelSingle' => 'book',
        'itemLabelPlural' => 'books'
    ]); ?>
</div>