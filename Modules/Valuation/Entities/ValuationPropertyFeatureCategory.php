<?php

namespace Modules\Valuation\Entities;

class ValuationPropertyFeatureCategory extends ValuationBaseModel
{
    //protected $table = 'valuation_property_feature_category';
    public $timestamps = true;
    protected $fillable = ['id','company_id','category_name'];
}
