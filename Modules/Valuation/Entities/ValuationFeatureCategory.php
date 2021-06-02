<?php

namespace Modules\Valuation\Entities;
use Modules\Valuation\Entities\ValuationBaseModel;
class ValuationFeatureCategory extends ValuationBaseModel
{
    protected $table = 'property_feature_category';
    public $timestamps = true;
    protected $fillable = ['id','company_id','category_name'];
    public function category()
    {
       return $this->hasMany('Modules\Valuation\Entities\ValuationFeature');
    }
}
