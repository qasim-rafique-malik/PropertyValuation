<?php

namespace Modules\Valuation\Entities;

use Modules\Valuation\Entities\ValuationBaseModel;
use Zoha\Metable;

class ValuationProperty extends ValuationBaseModel
{
    use Metable;
    const DimensionsMetaKey = 'propertyDimensions';
    const AddOnCostMetaKey = 'propertyAddOnCost';
    const FinancialAcquisitionCost='FinancialAcquisitionCost';
    const FinancialBuildUpCost='FinancialBuildUpCost';
    const FinancialAddOnCost='FinancialAddOnCost';

    protected $metaTable = 'valuation_property_meta';
    protected $fillable = array();
}
