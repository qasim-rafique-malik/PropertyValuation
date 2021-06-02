<?php

namespace Modules\Valuation\Entities;
use Modules\Valuation\Entities\ValuationBaseModel;
class ValuationFeature extends ValuationBaseModel
{
    protected $table = 'valuation_property_feature';
    public $timestamps = true;
    protected $fillable = ['category_id','company_id','feature_name','field_type','sub_fields'];

    public function categoryBaseFeature()
    {
         
         return $this->belongsTo('Modules\Valuation\Entities\ValuationFeatureCategory');
    }
    public function getFeature()
    {
       return $this->join('property_feature_category', 'valuation_property_feature.category_id', '=', 'property_feature_category.id')
            ->select('valuation_property_feature.*', 'property_feature_category.category_name')
            ->get();
    }
}
