<?php

use backend\models\Menu;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">
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
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'parent')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(
                            Menu::find()->where(['parent' => 0])->all(),
                            'id_menu',
                            'nama'
                        ),
                        'language' => 'en',
                        'options' => ['placeholder' => 'Pilih Parent'],
                        'pluginOptions' => [
                            // 'allowClear' => true,
                            'tags' => true,
                            'tokenSeparators' => [',', ' '],
                            'maximumInputLength' => 10
                        ],
                    ])->label('Parent')
                    ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'status')->textInput() ?>

                    <?= $form->field($model, 'no_urut')->textInput(['type' => 'hidden'])->label(false) ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('<i class="far fa-save"></i> Simpan', ['class' => 'btn btn-success btn-flat']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>