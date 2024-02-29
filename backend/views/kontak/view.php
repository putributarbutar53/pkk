<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kontak */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Kontak', 'url' => ['index']];
\yii\web\YiiAsset::register($this);
?>
<div class="kontak-view">

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'condensed' => true,
        'hover' => true,
        'mode' => DetailView::MODE_VIEW,
        'panel' => [
            'heading' => 'Detail Kontak ',
            'type' => DetailView::TYPE_INFO,
        ],
        'buttons1' => '',
        'hAlign' => 'left',
        'vAlign' => 'top',
        'attributes' => [
            'id',
            'alamat',
            'email:email',
            'telepon',
            'fax',
            'no_hp',
            'facebook',
            'instagram',
            'twitter',
            'youtube',
            //'latitude',
            //'longitude',
            
        ],
    ]) ?>

</div>
