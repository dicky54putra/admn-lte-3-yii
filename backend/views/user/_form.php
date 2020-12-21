<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
    <div class="card card-primary card-outline">
        <div class="card-header" style="height: 70px;">
            <h2>
                <?= Html::encode($this->title) ?>
                <p class="float-right">
                    <?= Html::a('<i class="far fa-arrow-alt-circle-left"></i> Kembali', ['index'], ['class' => 'btn btn-warning btn-sm btn-flat']) ?>
                </p>
            </h2>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('<i class="far fa-save"></i> Simpan', ['class' => 'btn btn-success btn-flat']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>