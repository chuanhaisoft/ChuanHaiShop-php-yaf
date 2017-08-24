(function($) {
$.fn.EJFValidate = {
	version : 1.0,
	spice : 'EJSv_',
	normalizedNames : false,
	uniqueName : function(){
		
		if($.fn.EJFValidate.normalizedNames == false)
		{
			//alert('uniqueName : '+$.fn.EJFValidate.normalizedNames);
			$('input[type="hidden"]').each(function(){		
				// this causes a problem with hidden fields insert on purpose (and not automatically 
				// by yii. All hidden input fields names are changed.
				var e = $(this);
				e.attr('name',$.fn.EJFValidate.spice+e.attr('name'));
			});	
			$.fn.EJFValidate.normalizedNames = true;	
		}
	},
	restoreName:function(){		
		if($.fn.EJFValidate.normalizedNames == true)
		{
			//alert('restoreName'+$.fn.EJFValidate.normalizedNames);
			$('input[type="hidden"]').each(function(){		
				var e = $(this);
				e.attr('name',e.attr('name').substring($.fn.EJFValidate.spice.length));
			});	
			$.fn.EJFValidate.normalizedNames=false;
		}		
	},
	submitHandler:function(form){		
		//alert("submitHandler ...");		
		$.fn.EJFValidate.restoreName();		
		form.submit();		
	}
};	
})(jQuery);
jQuery.validator.addMethod("equalToConst", function(value, element, params) { 
	try {
		switch( element.nodeName.toLowerCase() ) {
		case 'input':
			// specific for checkbox : in Yii a checkbox value is set to 0 (checked) or 1 (unchecked)
			// As the yii required validator would always be true, user must use the 'compare' validator
			// together with a constant value : true or 1 for checked, false or 0 for unchecked. 
			if ( this.checkable(element) ){
				//alert( 'equalToConst - params : '+params+' value : '+ value+ ' isChecked : '+$(element).is(':checked'));
				var strParam = String(params);
				var paramIsTrue = (strParam.toLowerCase() === 'true' || strParam == '1');

				return    (   $(element).is(':checked') && paramIsTrue) 
						||( ! $(element).is(':checked') && !paramIsTrue);
			}
		default:
			return this.optional(element) || value == params;
		}		
	}catch(Err){
		return true;
	}

}, "Please enter value {0}"); 

/**
 * params options : 
 * 		integerOnly : (boolean)
 * 		max         : (number)
 *      min         : (number)
 *      tooBig      : (string)
 *      tooSmall    : (string)
 *      notInt      : (string)
 *      msg         : (string)      
 */
jQuery.validator.addMethod("numerical", function(value, element, params) { 

	if(value === undefined || value == '')
		return true;
	if( params.integerOnly == true && /^[-+]?[0-9]*[0-9]+$/.test(value) == false)
	{
    	//alert('no match : not integer');
    	$(element).attr('msgId',1);	// not integer
    	return false;
    }
    else if( /^[-+]?[0-9]*\.?[0-9]+$/.test(value) == false) 
    {
    	//alert('no match : not number');
    	$(element).attr('msgId',2);	// not numerical
    	return false;
    } 
	if( params.max && ( 
    		(params.integerOnly && parseInt(value) > params.max) ||
    		(parseFloat(value) > params.max)
		)){
    	//alert('out of range (over max)');
    	$(element).attr('msgId',3);	// tooBig
    	return false;
    }
	if( params.min != null && ( 
			(params.integerOnly && parseInt(value) < params.min) ||
			(parseFloat(value) < params.min)
		)){
		//alert('out of range (below min)');
		$(element).attr('msgId',4);	// tooSmall
		return false;
	}
    return true;

}, function(params, element){
		var msgId = parseInt($(element).attr('msgId'));
		$(element).removeAttr('msgId');
			
		if( msgId == 3 && params.tooBig !== undefined )
			return params.tooBig;
		if( msgId == 4 && params.tooSmall !== undefined )
			return params.tooSmall;
		if( msgId == 1 && params.notInt !== undefined)
			return params.notInt;
		if(params.msg !== undefined )	
			return params.msg;
		else
			return "please enter a numerical value";
	
	}
);
/**
 * If the regexp can't be evaluated, this rule returns true. This is because PHP and JS
 * RegExp are not 100% compatible so if the Regexp can't be used on client side, it will
 * be validate by server. 
 * params : the regexp pattern to apply to 'value'
 */
jQuery.validator.addMethod("match", function(value, element, params) { 
	
	if(value === undefined || value == '')
		return true;
	var match=false;
	try{
		match = eval(params).test(value);
	}catch(err){
		//alert("error: "+err);
		return true;
	}
	//alert("return "+match);
	return match;
}, "Please enter value {0}"); 



