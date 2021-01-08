<?php
/**
 * Helper to build admin option fields
 *
 * @author        Flexible Web Design
 * @package       flexizoom-woocommerce-zoom-magnifier
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

if (!function_exists('flxizoom_admin_field_switcher')) {
	function flxizoom_admin_field_switcher($name, $default = null, $label = '', $desc = '', $info = '', $is_disabled = true)
	{
		$value = flexizoom_get_option($name, $default);
		$desc_template = $desc && !empty($desc) ? '<div class="flexizoom-admin-form-group-desc">' . $desc . '</div>' : '';
		$info_template = $info && !empty($info) ? ' <span class="dashicons dashicons-editor-help" data-toggle="tooltip" title="' . $info . '"></span>' : '';

		$isActive = flexizoom_get_option($name, $default) === 'on';
		$checked = $isActive ? "checked" : "";
		$pro_template = $is_disabled ? flxizoom_admin_field_pro_text() : '';

		$template = '
	     <div class="form-group row align-items-center" data-field-name="${name}">
	        <label class="col-md-3 col-form-label text-md-right" for="${name}">${label}${info_template}</label>
	        <div class="col-md-9 d-flex align-items-center">
	            <div class="form-check form-switch">
				     <input type="hidden"
	                       value="${value}"
	                       id="${name}_value"
	                       name="flexizoom_options[${name}]"
	                       class="flexizoom-switcher-checkbox"
	                       >
				    <input
				    	onchange="${name}_value.value = this.checked ? \'on\' : \'off\'"
				    	class="form-check-input"
				    	type="checkbox"
				    	id="${name}" ${checked} ${disabled} >
				</div>
	            ${desc_template}
	        </div>
	        ${pro_template}
	    </div>
   ';
		return strtr($template, array(
		  '${name}' => $name,
		  '${default}' => $default,
		  '${label}' => $label,
		  '${checked}' => $checked,
		  '${value}' => $value,
		  '${desc_template}' => $desc_template,
		  '${info_template}' => $info_template,
		  '${disabled}' => $is_disabled ? 'disabled' : '',
		  '${pro_template}' => $pro_template,
		));
	}
}
if (!function_exists('flxizoom_admin_field_textbox')) {
	function flxizoom_admin_field_textbox($name, $default = null, $label = '', $type = 'text', $min = '', $desc = '', $info = '', $right_label = '', $min_length = '', $max_length = '', $is_disabled = true)
	{
		$value = flexizoom_get_option($name, $default);
		$desc_template = $desc && !empty($desc) ? '<div class="flexizoom-admin-form-group-desc">' . $desc . '</div>' : '';
		$info_template = $info && !empty($info) ? ' <span class="dashicons dashicons-editor-help" data-toggle="tooltip" title="' . $info . '"></span>' : '';
		$right_label_template = $right_label && !empty($right_label) ? '<span>' . $right_label . '</span>' : '';
		$right_label_class_name = $right_label && !empty($right_label) ? 'flexizoom-admin-input-has-right-label' : '';
		$pro_template = $is_disabled ? flxizoom_admin_field_pro_text() : '';

		$template = '
		<div class="form-group row" data-field-name="${name}">
	        <label for="${name}" class="col-md-3 col-form-label text-md-right">${label}${info_template}</label>
	        <div class="col-md-9 d-flex align-items-center">
                <div class="${right_label_class_name}">
                    <input type="${type}" min="${min}" name="flexizoom_options[${name}]"
                           id="${name}"
                           minlength="${min_length}"
                           maxlength="${max_length}"
                           value="${value}"
                           ${disabled}>
                    ${right_label_template}
                </div>
                ${desc_template}
            </div>
            ${pro_template}
		</div>
    ';
		return strtr($template, array(
		  '${name}' => $name,
		  '${label}' => $label,
		  '${type}' => $type,
		  '${min}' => $min,
		  '${value}' => $value,
		  '${desc_template}' => $desc_template,
		  '${info_template}' => $info_template,
		  '${right_label_template}' => $right_label_template,
		  '${right_label_class_name}' => $right_label_class_name,
		  '${min_length}' => $min_length,
		  '${max_length}' => $max_length,
		  '${disabled}' => $is_disabled ? 'disabled' : '',
		  '${pro_template}' => $pro_template,
		));
	}
}
if (!function_exists('flxizoom_admin_field_colorpicker')) {
	function flxizoom_admin_field_colorpicker($name, $default = null, $label = '', $type = 'text', $min = '', $desc = '', $info = '', $right_label = '', $is_disabled = true)
	{
		$value = flexizoom_get_option($name, $default);
		$desc_template = $desc && !empty($desc) ? '<div class="flexizoom-admin-form-group-desc">' . $desc . '</div>' : '';
		$info_template = $info && !empty($info) ? ' <span class="dashicons dashicons-editor-help" data-toggle="tooltip" title="' . $info . '"></span>' : '';
		$right_label_template = $right_label && !empty($right_label) ? '<span>' . $right_label . '</span>' : '';
		$right_label_class_name = $right_label && !empty($right_label) ? 'flexizoom-admin-input-has-right-label' : '';
		$pro_template = $is_disabled ? flxizoom_admin_field_pro_text() : '';

		$template = '
		<div class="form-group row" data-field-name="${name}">
	        <label for="${name}" class="col-md-3 col-form-label text-md-right">${label}${info_template}</label>
	        <div class="col-md-9 d-flex align-items-center">
                <div class="${right_label_class_name}">
                    <input type="text"
                    	value="${value}"
                    	name="flexizoom_options[${name}]"
                    	data-default-color="${value}"
                    	class="flexible-input-color-picker" ${disabled} />
                    ${right_label_template}
                </div>
                ${desc_template}
            </div>
            ${pro_template}
		</div>
    ';
		return strtr($template, array(
		  '${name}' => $name,
		  '${label}' => $label,
		  '${type}' => $type,
		  '${min}' => $min,
		  '${value}' => $value,
		  '${desc_template}' => $desc_template,
		  '${info_template}' => $info_template,
		  '${right_label_template}' => $right_label_template,
		  '${right_label_class_name}' => $right_label_class_name,
		  '${disabled}' => $is_disabled ? 'disabled' : '',
		  '${pro_template}' => $pro_template
		));
	}
}
if (!function_exists('flxizoom_admin_field_progressbar')) {
	function flxizoom_admin_field_progressbar($name, $default = null, $min = null, $max = '', $step = '', $label = '', $desc = '', $info = '', $is_disabled = true)
	{
		$value = flexizoom_get_option($name, $default);
		$desc_template = $desc && !empty($desc) ? '<div class="flexizoom-admin-form-group-desc">' . $desc . '</div>' : '';
		$info_template = $info && !empty($info) ? ' <span class="dashicons dashicons-editor-help" data-toggle="tooltip" title="' . $info . '"></span>' : '';
		$pro_template = $is_disabled ? flxizoom_admin_field_pro_text() : '';

		$template = '
		<div class="form-group row" data-field-name="${name}">
	        <label for="${name}" class="col-md-3 col-form-label text-md-right">${label}${info_template}</label>
	        <div class="col-sm-5 d-flex align-items-center">
	            <div class="d-flex align-items-center flex-grow-1">
	                <input type="range" name="flexizoom_options[${name}]" class="custom-range"
	                       value="${value}" min="${min}" max="${max}" step="${step}"
	                       id="${name}" oninput="num.value = this.value" ${disabled}>
	                <output id="num" class="flexizoom-admin-zoom-level-value">${value}</output>
	            </div>
	            ${desc_template}
	        </div>
	        ${pro_template}
		</div>
    ';
		return strtr($template, array(
		  '${name}' => $name,
		  '${label}' => $label,
		  '${min}' => $min,
		  '${max}' => $max,
		  '${step}' => $step,
		  '${value}' => $value,
		  '${desc_template}' => $desc_template,
		  '${info_template}' => $info_template,
		  '${disabled}' => $is_disabled ? 'disabled' : '',
		  '${pro_template}' => $pro_template,
		));
	}
}
if (!function_exists('flxizoom_admin_field_radiogroupbtns')) {
	function flxizoom_admin_field_radiogroupbtns($name, $default = '', $label = '', $options = Array(), $desc = '', $info = '')
	{
		$value = flexizoom_get_option($name, $default);
		$desc_template = $desc && !empty($desc) ? '<div class="flexizoom-admin-form-group-desc">' . $desc . '</div>' : '';
		$info_template = $info && !empty($info) ? ' <span class="dashicons dashicons-editor-help" data-toggle="tooltip" title="' . $info . '"></span>' : '';

		$btns_template = '';
		foreach ($options as $option) {
			$btn_disabled = isset($option['disabled']) && $option['disabled'] ? "disabled" : '';
			$btn_checked = isset($option['name']) && $option['name'] === $value ? "checked" : "";
			$btn_template = '
				<input type="radio" value="${btn_name}" class="btn-check" name="flexizoom_options[${name}]" id="${name}_${btn_name}" autocomplete="off" ${btn_checked} ${btn_disabled}>
  				<label class="btn btn-outline-secondary" for="${name}_${btn_name}">${label}</label>
			';
			$btns_template .= strtr($btn_template, array(
			  '${name}' => $name,
			  '${btn_name}' => isset($option['name']) ? $option['name'] : '',
			  '${btn_checked}' => $btn_checked,
			  '${label}' => isset($option['label']) ? $option['label'] : '',
			  '${btn_disabled}' => $btn_disabled
			));
		}

		$template = '
     <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">${label}${info_template}</label>
        <div class="col-md-9 d-flex align-items-center">
            <div class="btn-group" role="group">${btns_template}</div>
            ${desc_template}
        </div>
    </div>
   ';
		return strtr($template, array(
		  '${name}' => $name,
		  '${label}' => $label,
		  '${value}' => $value,
		  '${btns_template}' => $btns_template,
		  '${desc_template}' => $desc_template,
		  '${info_template}' => $info_template,
		));
	}
}
if (!function_exists('flxizoom_admin_field_select')) {
	function flxizoom_admin_field_select($name, $default = '', $label = '', $options = Array(), $desc = '', $info = '', $is_disabled = true)
	{
		$value = flexizoom_get_option($name, $default);
		$desc_template = $desc && !empty($desc) ? '<div class="flexizoom-admin-form-group-desc">' . $desc . '</div>' : '';
		$info_template = $info && !empty($info) ? ' <span class="dashicons dashicons-editor-help" data-toggle="tooltip" title="' . $info . '"></span>' : '';

		$options_template = '';
		foreach ($options as $option) {
			$option_selected = isset($option['name']) && $option['name'] === $value ? "selected" : "";
			$option_template = '<option value="${btn_name}" ${disabled} ${option_selected} >${label}</option>';
			$options_template .= strtr($option_template, array(
			  '${name}' => $name,
			  '${btn_name}' => isset($option['name']) ? $option['name'] : '',
			  '${option_selected}' => $option_selected,
			  '${label}' => isset($option['label']) ? $option['label'] : '',
			  '${disabled}' => $is_disabled ? 'disabled' : '',
			));
		}
		$template = '
     <div class="form-group row">
        <label for="${name}" class="col-md-3 col-form-label text-md-right">${label}${info_template}</label>
        <div class="col-md-9 d-flex align-items-center">
            <select class="custom-select" id="${name}"
                    name="flexizoom_options[${name}]">
                ${options_template}
            </select>
            ${desc_template}
        </div>
        ${flxizoom_admin_field_pro_text}
    </div>
   ';
		return strtr($template, array(
		  '${name}' => $name,
		  '${label}' => $label,
		  '${value}' => $value,
		  '${options_template}' => $options_template,
		  '${desc_template}' => $desc_template,
		  '${info_template}' => $info_template,
		));
	}
}
if (!function_exists('flxizoom_admin_field_pro_text')) {
	function flxizoom_admin_field_pro_text()
	{
		return '<div class="flexizoom-admin-pro-only">Available in PRO only</div>';
	}
}
