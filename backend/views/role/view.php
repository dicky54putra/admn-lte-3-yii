<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Role */

$this->title = 'Detail Role: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Role', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="role-view">

    <div class="card card-primary card-outline">
        <div class="card-header" style="height: 70px;">
            <h2>
                <?= Html::encode($this->title) ?>
                <p class="float-right">
                    <?= Html::a('<i class="far fa-arrow-alt-circle-left"></i> Kembali', ['index'], ['class' => 'btn btn-warning btn-sm btn-flat']) ?>
                    <?= Html::a('<i class="far fa-edit"></i> Ubah', ['update', 'id' => $model->id_role], ['class' => 'btn btn-primary btn-sm btn-flat']) ?>
                    <?= Html::a('<i class="far fa-trash-alt"></i> Hapus', ['delete', 'id' => $model->id_role], [
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
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    // 'id_role',
                    'nama',
                ],
            ]) ?>

        </div>
    </div>
</div>