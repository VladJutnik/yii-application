<?php

namespace common\components;

use yii\base\Component;
use yii\helpers\ArrayHelper;


class UnivirsalFunctions extends Component
{
    public function statusView($id = false)
    {
        $item = ['показать', 'скрыть'];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }
    public function statusView2($id = false)
    {
        return '111';
    }

    public function statusYesNo($id = false)
    {
        $item = [
            '' => '',
            0 => 'нет',
            1 => 'да',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }


    public function FederalDistrictItems()
    {
        //return ArrayHelper::map(FederalDistrict::find()->orderBy(['name' => SORT_ASC])->all(), 'id', 'name');
    }

    public function RegionItems($federal_id = false)
    {
        if ($federal_id != false) {
            $where = ['district_id' => $federal_id];
        } else {
            $where = ['district_id' => 1];
        }

        //return ArrayHelper::map(Region::find()->where($where)->orderBy(['name' => SORT_ASC])->all(), 'id', 'name');
    }

    public function MunicipalityItems($region_id = false)
    {
        if ($region_id != false) {
            $where = ['region_id' => $region_id];
        } else {
            $where = ['region_id' => 1];
        }

        //return ArrayHelper::map(
        //    Municipality::find()->where($where)->orderBy(['name' => SORT_ASC])->all(),
        //    'id',
        //    'name'
        //);
    }
}