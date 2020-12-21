<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Menu */

$this->title = 'Detail Menu: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="menu-view">
    <div class="card card-primary card-outline">
        <div class="card-header" style="height: 70px;">
            <h2>
                <?= Html::encode($this->title) ?>
                <p class="float-right">
                    <?= Html::a('<i class="far fa-arrow-alt-circle-left"></i> Kembali', ['index'], ['class' => 'btn btn-warning btn-sm btn-flat']) ?>
                    <?= Html::a('<i class="far fa-edit"></i> Ubah', ['update', 'id' => $model->id_menu], ['class' => 'btn btn-primary btn-sm btn-flat']) ?>
                    <?= Html::a('<i class="far fa-trash-alt"></i> Hapus', ['delete', 'id' => $model->id_menu], [
                        'class' => 'btn btn-danger btn-sm btn-flat',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
            </h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'nama',
                            'url:url',
                            'parent',
                            'no_urut',
                            'icon',
                            [
                                'attribute' => 'status',
                                'format' => 'html',
                                'value' => function ($model) {
                                    if ($model->status == 1) {
                                        return '<span class="badge badge-primary">Aktif</span>';
                                    } else {
                                        return '<span class="badge badge-warning">Tidak Aktif</span>';
                                    }
                                }
                            ],
                        ],
                    ]) ?>
                </div>
                <div class="col-md-4">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
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
                                    Html::a('<i class="fas fa-redo"></i>', ['view', 'id' => $model->id_menu], [
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
            </div>
        </div>
    </div>
</div>