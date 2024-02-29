<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PokjaSekretariat */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Pokja Sekretariat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pokja-sekretariat-view">

    <p>
        <?= Html::a('Ubah Pokja Sekretariat', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Hapus Pokja Sekretariat', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'condensed' => true,
        'hover' => true,
        'mode' => DetailView::MODE_VIEW,
        'panel' => [
            'heading' => 'Detail Pokja Sekretariat',
            'type' => DetailView::TYPE_INFO,
        ],
        'buttons1' => '',
        'hAlign' => 'left',
        'vAlign' => 'top',
        'attributes' => [
            [
                'attribute' => 'papan_data',
            'label' => 'Data',
            'format' => 'raw',
                'value' => Html::img($model->papan_data, ['width' => 400])
        ],
            [
                'attribute' => 'program_kerja',
            'label' => 'Program Kerja',
            'format' => 'raw',
            ],
        ],
    ])
    ?>

</div>
