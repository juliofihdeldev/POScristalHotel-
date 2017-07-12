$('#modal .content .fermer').click(function(){

	$('#modal').hide();
});
$('#modalsmall .contentsmall .fermer').click(function(){

	$('#modalsmall').hide();
});

$('.addCommmande').click(function(){
	$('.loading').show();

	$('.addOptions').hide();
	var whatform = $(this).attr('name');
	$.ajax(
	{
		url: 'ajax/form.php',
		type: 'post',
		data: 'whatform='+whatform,
		dataType: 'html',
		success: function(c, r)
		{
			$('.loading').hide();

			$(".canvas1").show().html(c);
			$('.addOptions').toggle();
			
		},
		error: function(c, r, e)
		{
			alert('Apuiyer sur f5 ');
		}
	});
});

$('.addOptions2 .addCommmande').click(function(){
	$('.addOptions2').hide();
	var whatInsert = $(this).attr('name');
	$('.loading').show();
	
	$.ajax(
	{
		url: 'ajax/view.php',
		type: 'post',
		data: 'whatInsert='+whatInsert,
		dataType: 'html',
		success: function(c, r)
		{
		
			$('#modal').show();
			$('#modal .content').css({
				'width':'60%',
				'height':'550px',
				'margin-left':'15%',
				'margin-top':'0%'	
			});
			$('.loading').hide();

			$("#modal .content .info").html(c);
		},
		error: function(c, r, e)
		{
			alert('Apuiyer sur f5 ');
		}
	});
});

$('#notifications').click(function(e){
	e.preventDefault();
	$('.addOptions2').hide();
	var whatInsert = 'viewAnnonce';
	$('.loading').show();
	
	$.ajax(
	{
		url: 'ajax/view.php',
		type: 'post',
		data: 'whatInsert='+whatInsert,
		dataType: 'html',
		success: function(c, r)
		{
		
			$('#modal').show();
			$('#modal .content').css({
				'width':'20%',
				'height':'550px',
				'margin-left':'15%',
				'margin-top':'2%'	
			});
			$('.loading').hide();

			$("#modal .content .info").html(c);
		},
		error: function(c, r, e)
		{
			alert('Apuiyer sur f5 ');
		}
	});
});

$("#laRechercher").submit(function(e)
{
	e.preventDefault();
	var search = $('#theval').val();
	$.ajax(
	{
		url: 'ajax/searchresult.php',
		type: 'post',
		data: 'search='+search,
		dataType: 'html',
		success: function(c, r)
		{
			
			$(".canvas2 .info").html(c);
	
		},
		error: function(c, r, e)
		{
			
		}
	});
});


$('.forClick').click(function(){
	var commande = $(this).attr('id');
	var client = $(this).attr('name');
	$('.loading').show();
	$.ajax(
	{
		url: 'ajax/detailscommande.php',
		type: 'post',
		data: 'commande='+commande+'&client='+client,
		dataType: 'html',
		success: function(c, r)
		{
			$('.loading').hide();

			$("#modal").show();
			$("#modal .content .info").html(c);
	
		},
		error: function(c, r, e)
		{
		
		}
	});	
})

$('#parametre').click(function(){
$('.loading').show();

	$.ajax(
	{
		url: 'ajax/parametre.php',
		type: 'post',
		/* data: 'commande='+commande+'&client='+client, */
		dataType: 'html',
		success: function(c, r)
		{
			$('.loading').hide();

			$(".canvas1 ").html(c); 
			
	
		},
		error: function(c, r, e)
		{
			
		}
	});	
})

$('#rechercher').click(function(){
	
	var whatInsert = "viewClient";
	$.ajax(
	{
		url: 'ajax/view.php',
		type: 'post',
		data: 'whatInsert='+whatInsert,
		dataType: 'html',
		success: function(c, r)
		{
			$('#modal').show();
			
			$('.loading').hide();
			$('#modal .content').css({
				'width':'60%',
				'height':'550px',
				'margin-left':'15%',
				'margin-top':'0%'	
			});
			$("#modal .content .info").html(c);
		},
		error: function(c, r, e)
		{
			alert('Apuiyer sur f5 ');
		}
	});
})


$('#rapport').click(function(){
$('.loading').show();

	$.ajax(
	{
		url: 'ajax/rapport_form.php',
		type: 'post',
		/* data: 'commande='+commande+'&client='+client, */
		dataType: 'html',
		success: function(c, r)
		{
			$('.loading').hide();

			$(".canvas1 ").html(c); 
			
	
		},
		error: function(c, r, e)
		{
			alert('erro');
		}
	});	
})

$('#retrait').click(function(){
$('.loading').show();

	$.ajax(
	{
		url: 'ajax/retrait_form.php',
		type: 'post',
		/* data: 'commande='+commande+'&client='+client, */
		dataType: 'html',
		success: function(c, r)
		{
			$('.loading').hide();

			$(".canvas1 ").html(c); 
			
	
		},
		error: function(c, r, e)
		{
			
		}
	});	
})

$('#tr_retrait').submit(function(e){
	e.preventDefault();
	var da = $(this).serialize();
	$('.loading').show();	
	$.ajax(
	{
		url: 'ajax/tr_retrait.php',
		type: 'POST',
		data: 'da='+da,
		dataType: 'html',
		success: function(c, r)
		{
			
			$("#modalsmall").show();
			
				$('#modalsmall .contentsmall').css({
				'width':'20%',
				'height':'100px',
				'margin-left':'40%',
				'margin-top':'5%'	
			});
			
			$("#modalsmall .contentsmall .infosmall").html(c)
			$('.loading').hide();
		},
		error: function(c, r, e)
		{
		
		}
	});	
})

$('#selecttype').change(function(){	
	
	var selecttype = $(this).val();
	$('#date1,#date2,#date3,#date4').addClass('itemdate');
	
	if(selecttype == "day")
	{
		$('#date1').removeClass('itemdate');
	}
	else if(selecttype == "week")
	{
		$('#date2').removeClass('itemdate');
	}
	else if(selecttype == "month")
	{
		$('#date3').removeClass('itemdate');
	}
	else if(selecttype == "year")
	{
		$('#date4').removeClass('itemdate');
	}
});

/* $("#viexCommandeClient").click(function(e)
{
	var da = $(this).attr('name');	
	e.preventDefault();
	$.ajax(
	{
		url: 'ajax/commande_du_client.php',
		type: 'post',
		data: 'da='+da,
		dataType: 'html',
		success: function(c, r)
		{
			
			$("#modal").show();
			$("#modal .content .info").html(c)
		},
		error: function(c, r, e)
		{
			alert('error');
		}
	});
}); */
	
$(".modifierArticle").click(function(e)
{
	var da = $(this).attr('name');	
	e.preventDefault();

	$.ajax(
	{
		url: 'edit_articles.php',
		type: 'post',
		data: 'da='+da,
		dataType: 'html',
		success: function(c, r)
		{
			
			$("#modalsmall").show();
			$("#modalsmall .contentsmall .infosmall").html(c)
		},
		error: function(c, r, e)
		{
			
		}
	});
});


$("#reinitialiser").click(function(e)
{
	$('.loading').show();
	
	var da = $(this).attr('name');	
	e.preventDefault();
	$.ajax(
	{
		url: 'ajax/reinitialiser_demande.php',
		type: 'post',
		data: 'da='+da,
		dataType: 'html',
		success: function(c, r)
		{
			$("#modalsmall").show();
			$("#modalsmall .contentsmall .infosmall").html(c)
			$('.loading').hide();
		},
		error: function(c, r, e)
		{
			
		}
	});
});
$('#modal').mouseover(function(){
	$('.addOptions2').hide();
	$('.addOptions').hide();
})
	
$('#abc').submit(function(e){
	e.preventDefault();
	$('.loading').show();
	var client = $('#client').val();
	var whatInsert = "viewClient";
	$.ajax(
	{
		url: 'ajax/searchresult_client.php',
		type: 'post',
		data: 'whatInsert='+whatInsert+'&client='+client,
		dataType: 'html',
		success: function(c, r)
		{
			$('.loading').hide();
			$('#modal .content').css({
				'width':'60%',
				'height':'550px',
				'margin-left':'15%',
				'margin-top':'0%'	
			});
			$("#modal .content .info table#menuView").html(c);
		},
		error: function(c, r, e)
		{
			alert('Apuiyer sur f5 ');
		}
	});
})

$(".del_for_detail").click(function(e)
{
	var da = $(this).attr('id');	
	var des = $(this).attr('name');	
	e.preventDefault();
	$.ajax(
	{
		url: 'del_artic_del_commande.php',
		type: 'post',
		data: 'da='+da+'&des='+des,
	/* 	data: 'commande='+commande+'&client='+client, */
		dataType: 'html',
		success: function(c, r)
		{
			
			$(".detcommande").html(c)
		},
		error: function(c, r, e)
		{
			
		}
	});
});
$(".editClient").click(function(e)
	{
		var da = $(this).attr('id');	
		e.preventDefault();
	
		$.ajax(
		{
			url: 'edit_client.php',
			type: 'post',
			data: 'da='+da,
			dataType: 'html',
			success: function(c, r)
			{
				
				$("#modalsmall").show();
				$("#modalsmall .contentsmall .infosmall").html(c)
			},
			error: function(c, r, e)
			{
				
			}
		});
	});
	

