$('#select-area').on('change',function() {
	//$('#area-textbox').val($(this).val());
	//console.log($(this).val());
	$.get( "processes/display_vendor_list.php?area=" + $(this).val(), function( data ) {
	  $("#vendors-list").html( data );
	});
});

function submission(data,data_for)
{
    $.ajax({
           url: "processes/submission.php",
           type: "POST",
           data: "data="+data+"&data_for="+data_for,
           dataType: 'json',
           success:function(response){   
               if(response.error == "0")
               {                    
					window.location.href = "products.php";					
               }
               else
               {
                    window.alert("error!");
               }
           }
        });
}

function activate_deactivate_cake(status, id)
{
    $.ajax({
           url: "processes/activate_deactivate_cake.php",
           type: "POST",
           data: "update_status="+status+"&cake_id="+id,
           dataType: 'json',
           success:function(response){   
               if(response.error == "0")
               {
                    $("#status_error").hide();
                    $('#status_success').show();
                    $('#successmsg').html(response.message);
                    $('#actdect'+id).replaceWith(response.button);  
					$('#actdecttext'+id).replaceWith(response.text);  					
               }
               else
               {
                    $('#status_success').hide();
                    $("#status_error").show();
                    $('#errormsg').html(response.message);
               }
           }
        });
}

function displayproductdetails(id)
{
    $.ajax({
           url: "processes/load_product_details_modal.php",
           type: "POST",
           data: "id="+id,
           dataType: 'json',
           success:function(response){   
               if(response.error == "0")
               {
					$('#productModal').html(response.message);
					$('#productModal').modal('show');										
					$('.simpleLens-lens-image').simpleLens({
						loading_image: 'img/loading.gif'
					});
                        
               }
               else
               {
                    $('#productModal').modal('hide');
               }
           }
        });
}

function updatecart()
{	
    $.ajax({
           url: "processes/update_cart.php",
           type: "POST",
           dataType: 'json',
           success:function(response){   
               if(response.error == "0")
               {
					$('.mini-cart-dropdown').html(response.cartdiv);
					$('.mini-cart-items').html(response.items);
                        
               }
               else
               {
                    alert('error adding product to cart');
				}
           }
        });
}


function addtocart(action,id)
{
	var queryString = "";
	var count = $("#qty_"+id).val();
	if(count == "" || !count)
	{
		count = 1;
	}	
	
	if(action != "") {
		switch(action) {
			case "add":
				queryString = 'action='+action+'&product_id='+ id+'&count='+count;
			break;
			case "remove":
				queryString = 'action='+action+'&product_id='+ id;
			break;
			case "empty":
				queryString = 'action='+action;
			break;
		}	 
	}
    $.ajax({
           url: "processes/add_to_cart.php",
           type: "POST",
           data: queryString,
           dataType: 'json',
           success:function(response){   
               if(response.error == "0")
               {
					$('.mini-cart-dropdown').html(response.cartdiv);
					$('.mini-cart-items').html(response.items);
                        
               }
               else
               {
                    alert('error adding product to cart');
				}
           }
        });
}

function updatesfromcart(action,id)
{
	var queryString = "";
	var count = $("#qty_"+id).val();
	if(count == "" || !count)
	{
		count = 1;
	}	
	
	if(action != "") {
		switch(action) {
			case "add":
				queryString = 'action='+action+'&product_id='+ id+'&count='+count;
			break;
			case "remove":
				queryString = 'action='+action+'&product_id='+ id;
			break;
			case "empty":
				queryString = 'action='+action;
			break;
		}	 
	}
    $.ajax({
           url: "processes/updates_from_cart.php",
           type: "POST",
           data: queryString,
           dataType: 'json',
           success:function(response){   
               if(response.error == "0")
               {
					$('.cartpage').html(response.cartdiv);					
                        
               }
               else
               {
                    alert('error adding product to cart');
				}
           }
        });
	updatecart();	
}

function submitshippingdetails()
{	
	var firstname = $('#firstname').val();
	var middlename = $('#middlename').val();
	var lastname = $('#lastname').val();
	var address = $('#address').val();
	var company = $('#company').val();
	var city = $('#city').val();
	var state = $('#state').val();
	var pincode = $('#pincode').val();
	var country = $('#country').val();
	var contact = $('#contact').val();
	var email = $('#email').val();
	var msg = $('#msg').val();
	var delivery = $('#delivery').val();	
    $.ajax({
           url: "processes/submit_shipping_details.php",
           type: "POST",
		   data: "firstname="+firstname+"&middlename="+middlename+"&lastname="+lastname+"&address="+address+"&company="+company+"&city="+city+"&state="+state+"&pincode="+pincode+"&country="+country+"&contact="+contact+"&email="+email+"&msg="+msg+"&delivery="+delivery,
           dataType: 'json',
           success:function(response){   
               if(response.error == "0")
               {
					$("#checkut5").collapse('show');
					$("#checkut2").collapse('hide'); 					
               }
               else
               {
                    alert(response.message);
			   }
           }
        });
}

function paymentmethod()
{
	var paymenttype = $("input[name='payment_type']:checked").val();
	if(!paymenttype)
	{
		paymenttype = "";
	}
	if(paymenttype == "cod")
	{
		$("#checkut6").collapse('show');
		$("#checkut5").collapse('hide');   
		$(".user-order-plce").html('<button class="common-btn floatright" onClick="location.href =\'order_completed.php\';">place order</button>');
	}
	else if(paymenttype == "payumoney")
	{
		$("#checkut6").collapse('show');
		$("#checkut5").collapse('hide');   
		$(".user-order-plce").html('<button class="common-btn floatright" onClick="location.href =\'make_payment.php\';">place order</button>');
	}
	else
	{
		$("#checkut6").collapse('show');
		$("#checkut5").collapse('hide');   
		$(".user-order-plce").html('<h5>Please select payment method from Step 3.</h5>');
	}
		
}


function enableaddressfield()
{
	$('.shipping-address-selection').addClass('display-hide');
	$('.user-billing-info').removeClass('display-hide');
}

function disableaddressfield()
{	
	$('.user-billing-info').addClass('display-hide');
	$('.shipping-address-selection').removeClass('display-hide');
}

function checkaddressselection(id)
{	
	var address = $("input[name='check_addrs']:checked").val();
	var msg = $('#cake_msg').val();
	var delivery = $('#cake_delivery').val();	
	if(!address)
	{
		alert("Please select one address");		
	}
	else
	{
		$.ajax({
           url: "processes/check_address_selection.php",
           type: "POST",
		   data: "address="+address+"&msg="+msg+"&delivery="+delivery,
           dataType: 'json',
           success:function(response){   
               if(response.error == "0")
               {
					$("#checkut5").collapse('show');
					$("#checkut2").collapse('hide'); 					
               }
               else
               {
                    alert(response.message);
			   }
           }
        });
	}
	//$('.user-billing-info').addClass('display-hide');
	//$('.shipping-address-selection').removeClass('display-hide');
}

$('#ajax-div').on('click', 'li', function() {
	$.redirect("product-sample.php",{ vendor: ''+$(this).text()+''});
	//$('#vendor').val($(this).text());
	//window.location="product-sample.php";
});