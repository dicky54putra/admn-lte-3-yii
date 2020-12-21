<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">
    <div class="card card-primary card-outline">
        <div class="card-header" style="height: 70px;">
            <h2>
                <?= Html::encode($this->title) ?>
                <p class="float-right">
                    <?= Html::a('<i class="far fa-arrow-alt-circle-left"></i> Kembali', ['index'], ['class' => 'btn btn-warning btn-sm btn-flat']) ?>
                    <?= Html::a('<i class="far fa-edit"></i> Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm btn-flat']) ?>
                    <?= Html::a('<i class="far fa-trash-alt"></i> Hapus', ['delete', 'id' => $model->id], [
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
                    // 'id',
                    'username',
                    // 'auth_key',
                    // 'password_hash',
                    'email:email',
                    'name',
                    'photo',
                    [
                        'attribute' => 'status',
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
                        'attribute' => 'created_at',
                        'value' => function ($model) {
                            return date('d F Y H:i', $model->created_at);
                        }
                    ],
                    // 'verification_token',
                ],
            ]) ?>

        </div>
    </div>
</div>