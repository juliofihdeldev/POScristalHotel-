function closeModal()
{
	$("#modal").fadeOut();
	$("#modal .alert").hide();
	$("#modal .loading").hide();
}
function refreshModal()
{
	var url = document.location.href;
	document.location.href = url;
}
/*
$("a").click(function()
{
	$("#modal .loading").show();
	$("#modal").fadeIn();
});
*/
$(document).ready(function()
{
	var db = window.openDatabase("Database", "1.0", "Lokonation", 200000);
	db.transaction(function(tx)
	{
		tx.executeSql("CREATE TABLE IF NOT EXISTS article(id_article, couleur, qte)");
		tx.executeSql('SELECT * FROM article', [], function(da, results)
		{
			len = results.rows.length;
			
			if(len > 0)
			{
				if(len == 1)
				{
					$("#menu .content .cntItem").html(len+" Item");
				}
				else
				{
					$("#menu .content .cntItem").html(len+" Items");
				}
			}
		});
	});
});
var positionElementInPage = $('#menu').offset().top;
$(window).scroll(function() 
{
	if ($(window).scrollTop() > positionElementInPage) 
	{
		$('#menu').addClass("fixed");
	} 
	else 
	{
		$('#menu').removeClass("fixed");
	}
});
$("#lastest .content .itemm").mouseenter(function()
{
	$("#lastest .content .itemm .info").hide();
	
	$(this).find(".prix").fadeOut();
	
	$(this).find(".info").show().animate(
	{
		"margin-top": "-400px"
	});
});
$("#lastest .content .itemm .info").mouseleave(function()
{
	$("#lastest .content .itemm .prix").fadeIn();
	
	$(this).animate(
	{
		"margin-top": "400px"
	});
});
$("#lastest").mouseleave(function()
{
	$("#lastest .content .itemm .prix").fadeIn();
	
	$("#lastest .content .itemm .info").animate(
	{
		"margin-top": "400px"
	});
});
$("#contact .content table .item .it").mouseenter(function()
{
	$(this).css("color", "rgb(232, 152, 30)");
	$(this).find(".square").css("color", "rgb(232, 152, 30)");
});
$("#contact .content table .item .it").mouseleave(function()
{
	$(this).css("color", "gray");
	$(this).find(".square").css("color", "silver");
});
$("#contact .content table .item .input").focus(function()
{
	$(this).css(
	{
		"background": "white",
		"transition-duration": "500ms"
	});
});
$("#contact .content table .item .input").blur(function()
{
	$(this).css(
	{
		"background": "rgba(255, 255, 255, 0.7)",
		"transition-duration": "500ms"
	});
});
$("#contact .content table .item .submit").mouseenter(function()
{
	$(this).css(
	{
		"background": "white",
		"transition-duration": "500ms"
	});
});
$("#contact .content table .item .submit").mouseleave(function()
{
	$(this).css(
	{
		"background": "rgba(255, 255, 255, 0.3)",
		"transition-duration": "500ms"
	});
});
$("#menu .search").click(function()
{
	$("#searchDiv").slideDown();
	$("#enTete").slideUp();
	$("#searchDiv input").focus();
});
$("#searchDiv .content input").keyup(function()
{
	var id = $(this).val();
	var na = "search";
	
	$.ajax(
	{
		url: "ajaxscripts/data.php",
		type: 'post',
		dataType: 'html',
		data: 'name='+na+'&id='+id,
		success: function(c, r)
		{
			$("#carOther").slideUp();
			$("#lastest .content").html(c);
		},
		error: function(msg, c ,r)
		{
			$('#enTete').hide(); 
			$('#noConn').fadeIn(); 
			$('#loading').hide(); 
		} 
	});
});
$("#searchDiv .content .close").click(function()
{
	$("#enTete").slideDown();
	$("#searchDiv").slideUp(); 
});
$("#searchDiv .content input").blur(function()
{
	$("#carOther").slideDown();
});
$("#lastest .content .itemArt .info .txt .opt").mouseenter(function()
{
	$(this).find(".cart").css("color", "rgb(232, 152, 30)");
	$(this).css("color", "rgb(232, 152, 30)");
});
$("#lastest .content .itemArt .info .txt .opt").mouseleave(function()
{
	$(this).find(".cart").css("color", "gray");
	$(this).css("color", "gray");
});
$("#lastest .select .item").click(function()
{
	var na = $(this).attr("name");
	var co = $("#colorChooser").val();
	var cn = "";
	
	if(co.length == 0)
	{
		$("#colorChooser").val(na);
	
		if($("#colorChooser").val().length > 0)
		{
			cn = '<div class="icon">&#10003;</div>Color picked';
			$("#lastest .colChoose .holder").css("color", "green").html(cn);
		}
	}
	else
	{
		$("#colorChooser").val(na);
	
		if($("#colorChooser").val().length > 0)
		{
			cn = '<div class="icon">&#10003;</div>Color changed';
			$("#lastest .colChoose .holder").css("color", "green").html(cn);
		}
	}
	
	$("#colorChooser").val();
});
$("#addArticleForm").submit(function(e)
{
	var da = $(this).serialize();
	var cs = $("#colorChooser").val();
	var cn = "";
	
	e.preventDefault();
	
	if(cs.length <= 0)
	{
		cn = '<div class="icon">&#59141;</div>Please pick a color';
		$("#lastest .colChoose .holder").css("color", "red").html(cn);
	}
	else
	{
		$("#modal .loading").show();
		$("#modal").fadeIn();
		
		var db = window.openDatabase("Database", "1.0", "Lokonation", 200000);
		db.transaction(InsertData, ErrorCB, SuccessCB);
		
		function InsertData(tx)
		{
			tx.executeSql("CREATE TABLE IF NOT EXISTS article(id_article, couleur, qte)");
			tx.executeSql('SELECT id_article, qte FROM article WHERE id_article = "'+$("#id_article").val()+'" AND couleur = "'+$("#colorChooser").val()+'"', [], function(da, results)
			{
				var len = results.rows.length;
				
				if(len <= 0)
				{
					tx.executeSql('INSERT INTO article(id_article, couleur, qte) VALUES("'+$("#id_article").val()+'", "'+$("#colorChooser").val()+'", "'+$("#qty_article").val()+'")');
				}
				else
				{
					var qte = results.rows.item(0).qte;
					
					qte = parseInt(qte) + parseInt($("#qty_article").val());
					
					tx.executeSql('UPDATE article SET qte = "'+qte+'" WHERE id_article = "'+$("#id_article").val()+'"');
				}
			});
		}
		function ErrorCB(tx, err)
		{
			$("#modal").fadeIn();		
			$("#modal .loading").hide();		
			
			var con = '<div class="box">'
				+'<div class="head">'
					+'<table>'
						+'<tr>'
							+'<td>Lokonation.com</td>'
							+'<td align="right"><img onclick="closeModal()" src="images/token_x.png" /></td>'
						+'</tr>'
					+'</table>'
				+'</div>'
				+'<div class="body">'
					+'<table>'
						+'<tr>'
							+'<td width="70">'
								+'<div class="icon">'
									+'<img src="images/no.png" />'
								+'</div>'
							+'</td>'
							+'<td>Sorry, an error has been found.<br />'+tx+' '+err+'</td>'
						+'</tr>'
					+'</table>'
				+'</div>'
				+'<div class="foot">'
					+'<button onclick="closeModal()" class="submit">Close</button>'
				+'</div>'
			+'</div>';
			
			$("#modal .alert").show().html(con);
		}
		function SuccessCB()
		{
			$("#modal").fadeIn();		
			$("#modal .loading").hide();		
			
			var con = '<div class="box">'
				+'<div class="head">'
					+'<table>'
						+'<tr>'
							+'<td>Lokonation.com</td>'
							+'<td align="right"><img onclick="refreshModal()" src="images/token_x.png" /></td>'
						+'</tr>'
					+'</table>'
				+'</div>'
				+'<div class="body">'
					+'<table>'
						+'<tr>'
							+'<td width="70">'
								+'<div class="icon">'
									+'<img src="images/yes.png" />'
								+'</div>'
							+'</td>'
							+'<td>the product has been added to the shopping bag successfully.</td>'
						+'</tr>'
					+'</table>'
				+'</div>'
				+'<div class="foot">'
					+'<button onclick="refreshModal()" class="submit">Close</button>'
				+'</div>'
			+'</div>';
			
			$("#modal .alert").show().html(con);
		}
	}
});

$("#menu .content .link .cntItem").click(function()
{
	var na = "shop";
	
	$("#modal .loading").show();
	$("#modal").fadeIn();
	
	$.ajax(
	{
		url: "ajaxscripts/data.php",
		type: 'post',
		dataType: 'html',
		data: 'name='+na,
		success: function(c, r)
		{
			$("#modal .shop").show().html(c);
			$("#modal .loading").hide();
		},
		error: function(msg, c ,r)
		{
			$('#enTete').hide(); 
			$('#noConn').fadeIn(); 
			$('#loading').hide(); 
		} 
	});
});

$("#addNewsletter").submit(function(e)
{
e.preventDefault();
	var da = $(this).serialize();
	
	$.ajax(
	{
		url: "php/data.php",
		type: 'post',
		dataType: 'html',
		data:da,
		success: function(c, r)
		{
			$(".btnInfoResult").show();
			$(".infoResult .infoResultText").show().html(c);
			$('.input').val('');
		},
		error: function(msg, c ,r)
		{
		
		} 
	});
});

$("#sendMessage").submit(function(e)
{
	e.preventDefault();
	var da = $(this).serialize();

	$.ajax(
	{
		url: "php/data.php",
		type: 'post',
		dataType: 'html',
		data:da,
		success: function(c, r)
		{
			
			$(".btnInfoResult").show();
			$(".infoResult .infoResultText").show().html(c);
		},
		error: function(msg, c ,r)
		{
		
		} 
	});
});