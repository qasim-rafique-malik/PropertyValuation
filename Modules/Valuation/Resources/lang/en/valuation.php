<?php
$valuationLang = array();
$valuationLang['orderOrigination'] = 'Order Origination';
$valuationLang['moduleName'] = 'Valuation';
$valuationLang['dashboard'] = 'Valuation Dashboard';

//Left menu
$leftMenu = array();
$leftMenu['levelOneName'] = $valuationLang['moduleName'];
$leftMenu['settings'] = 'Settings';
$valuationLang['leftMenu'] = $leftMenu;

$menu = array();
$menu['title'] = 'Menu';
$menu['totalMenu'] = 'Total Menu';
$menu['createMenu'] = 'Create Menu';
$menu['editMenu'] = 'Edit Menu';
$menu['menuParent'] = 'Menu Parent';
$menu['validationName'] = 'Validation Name';
$menu['route'] = 'Route';
$valuationLang['menu'] = $menu;

$settings = array();
$settings['title'] = 'Settings';
$settings['country'] = 'Country';
$valuationLang['settings'] = $settings;

$governorate = array();
$governorate['title'] = 'Governorate';
$governorate['totalGovernorate'] = 'Total Governorate';
$governorate['createGovernorate'] = 'Create Governorate';
$governorate['editGovernorate'] = 'Edit Governorate';
$governorate['selectCountry'] = 'Select Country';
$valuationLang['governorate'] = $governorate;

$city = array();
$city['title'] = 'City';
$city['totalCity'] = 'Total City';
$city['createCity'] = 'Create City';
$city['editCity'] = 'Edit City';
$city['selectCountry'] = 'Select Country';
$city['selectGovernorate'] = 'Select Governorate';
$valuationLang['city'] = $city;

$block = array();
$block['title'] = 'Block';
$block['totalBlock'] = 'Total Block';
$block['createBlock'] = 'Create Block';
$block['editBlock'] = 'Edit Block';
$block['selectCountry'] = 'Select Country';
$block['selectGovernorate'] = 'Select Governorate';
$block['selectCity'] = 'Select City';
$valuationLang['block'] = $block;


$property = array();
$property['title'] = 'Property';
$property['total'] = 'Total Property';
$property['selectCity'] = 'Select City';
$property['selectTypes'] = 'Select Type';
$property['selectClassification'] = 'Select Classification';
$property['selectCategorization'] = 'Select Categorization';
$property['createProperty'] = 'Create Property';
$property['editProperty'] = 'Edit Property';
$valuationLang['property'] = $property;

$type = array();
$type['title'] = 'Property Type';
$type['propertyList'] = 'List of properties';
$type['total'] = 'Total Property Type';
$type['createPropertyType'] = 'Create Property Type';
$type['editPropertyType'] = 'Edit Property Type';
$valuationLang['property']['type'] = $type;

$classification = array();
$classification['title'] = 'Property Classification';
$classification['total'] = 'Total Property Classification';
$classification['createPropertyClassification'] = 'Create Property Classification';
$classification['editPropertyClassification'] = 'Edit Property Classification';
$valuationLang['property']['classification'] = $classification;

$categorization = array();
$categorization['title'] = 'Property Categorization';
$categorization['total'] = 'Total Property Categorization';
$categorization['createPropertyCategorization'] = 'Create Property Categorization';
$categorization['editPropertyCategorization'] = 'Edit Property Categorization';
$valuationLang['property']['categorization'] = $categorization;

$class = array();
$class['title'] = 'Property Class';
$class['total'] = 'Total Property Class';
$class['createPropertyClass'] = 'Create Property Class';
$class['editPropertyClass'] = 'Edit Property Class';
$valuationLang['property']['class'] = $class;


return $valuationLang;